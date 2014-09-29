<?php
include("inc/auth.inc.php");
include_once("inc/layout.inc.php");
include("getUserLevel.php");


	$type = $_COOKIE['PLAYTYPE'];

	echo "<script src=\"js/dodsoneng.js\"></script>" ;

$file_log = fopen("logs/prcgame.txt", "w");

	/// Get parameters passed in the URL
	$numOfQuestions = intval($_GET['numOfQuestions']);
	$questionId = intval($_GET['questionId']);

	/// Get the user ID
	$user = _check_auth($_COOKIE);
	$name = $user['user_name'];
	$userId = $user['user_id'];

$log = "LOG> questionId=[$questionId]\n";
fwrite ($file_log, $log);

	// Create a SqlPestCloudHelper object
	$sqlHelper = new SqlTriviaHelper;

	// Get the level user is at
	$level = getUserLevel ($sqlHelper, $file_log, $userId, $type, $name);	

	/*
	==================================================================================
	 DETERMINING THE TRIVIA ID BASED ON:
	 user is member
	 	a) lowest count for the user ID (if more than 1 => random the set)
	 	b) question level correspondent to the user total score at the moment
	 user is guest
	 	a) random
	==================================================================================
	*/
	$t0 = microtime(true);
	if ($type == "member") {
		$query = "SELECT triviaID FROM tbltrivia WHERE triviaID NOT IN (SELECT triviaID FROM trvusr WHERE userID=$userId AND (level BETWEEN 1 AND $level)) ORDER BY RAND() LIMIT 1";
	}
	else {
		$query = "SELECT triviaID FROM tbltrivia ORDER BY RAND() LIMIT 1";
	}
	$sqlHelper->select($query);
	$numRows  = $sqlHelper->numRows;
	$log = "LOG> numRows=[$numRows] for query: [$query]\n";
	fwrite ($file_log, $log);
	
	/// IF no row found, it means that all the trivias were already seen by the given user
	if ($numRows == 0) { 
	
		/// SELECT the triviaID from trvusr VIEW, raddomly, with the lowest count
		$query = "SELECT triviaID FROM trvusr WHERE userID=$userId ORDER BY count ASC, RAND() LIMIT 1";
		$sqlHelper->select($query);
		$numRows  = $sqlHelper->numRows;
		$log = "LOG> numRows=[$numRows] for query: [$query]\n";
		fwrite ($file_log, $log);
		
	}
	
	$row = $sqlHelper->nextRow();
	$triviaID = $row['triviaID'];
	$log = "LOG> triviaID=[$triviaID]\n";
	fwrite ($file_log, $log);
			
	$t1 = microtime(true) ;
	$mytime = $t1 - $t0;
	$log = "LOG> elapsed=[$mytime]\n"	;
	fwrite ($file_log, $log);

	/*
	==================================================================================
	 PREPARING THE PAGE TO RETURN
		 a) Access the trivia data using the trivia ID.
		 b) Replace special characters
		 c) Prepare the arrays
		 	answers 	=> contain the answer text on display order 
		 	answersid	=> contain the answer db id order on display order
		 	buttonId	=> contain the DIV id lable for the return page on button order
		 d) Update the question count table
		 e) Make the return page (AJAX)
	==================================================================================
	*/	
	$query = "SELECT * FROM tbltrivia WHERE triviaID = $triviaID";
	$sqlHelper->select($query);
    $numRows = $sqlHelper->numRows;
	$log = "LOG> numRows=[$numRows] for query: [$query]\n";
    fwrite ($file_log, $log);
    
	// IF found the TRIVIA
	if ($numRows > 0) {
		$row = $sqlHelper->nextRow();
    
		$question 	= 	$row['triviaQuestion'];
		$correct 	= 	$row['triviaCorrAnswer'];
		$wrong1 	= 	$row['triviaWrong1'];
		$wrong2 	= 	$row['triviaWrong2'];
		$wrong3 	= 	$row['triviaWrong3'];
		$reference  =   $row['triviaReference'];
			
		// Replace special characters which breaks the AJAX.
		$spchars = array ("'" =>"&lsquo;", "\"" =>"&ldquo;", "\x91" =>"&lsquo;", "\x92" =>"&lsquo;","\x93" =>"&ldquo;", "\x94" =>"&ldquo;", "\x60" =>"&acute;", "\x85"=>"&hellip;" );
		$question = strtr ($question, $spchars);
		$correct  = strtr ($correct,  $spchars);
		$wrong1   = strtr ($wrong1,   $spchars);
		$wrong2   = strtr ($wrong2,   $spchars);
		$wrong3   = strtr ($wrong3,   $spchars);
		
		/// Associate the correct answer to a random button. And then check if any answer contains 
		/// the string "of the above", if yes IT MUST be the 4th button.
		if (strpos($correct, "of the above") > 0) {
		    $correctButton = 4;
			$answers = array ($correct, $wrong1, $wrong2, $wrong3);
			$answerId = array (0, 1, 2, 3);
		} 
		else if (strpos($wrong1, "of the above") > 0) {
			$correctButton = mt_rand (1,3);
			$answers = array ($correct, $wrong3, $wrong2, $wrong1);
			$answerId = array (0, 3, 2, 1);
		}
		else if (strpos($wrong2, "of the above") > 0) {
			$correctButton = mt_rand (1,3);
			$answers = array ($correct, $wrong1, $wrong3, $wrong2);
			$answerId = array (0, 1, 3, 2);
		}
		else {
			$correctButton = mt_rand (1,4);
			$answers = array ($correct, $wrong1, $wrong2, $wrong3);
			$answerId = array (0, 1, 2, 3);
		}

		$buttonId = array ("none", "button1","button2","button3", "button4");
		
		// If the user is member, Update the Question Counter Table
		if ($type == "member") {
			// 1. Check if there is already a row for the combination trivia/user
			$query = "SELECT qcCount FROM questioncount WHERE qcUserID=$userId AND qcTriviaID=$triviaID";
			$sqlHelper->select($query);
			$numRows = $sqlHelper->numRows;
			$log = "LOG> numRows=[$numRows] for query: [$query]\n";
			fwrite ($file_log, $log);
		
			// 2. If a row was found then update the question counter
			if ($numRows > 0) {
				$row = $sqlHelper->nextRow();
				$qcCount = $row ['qcCount']; // obtain the corrent count value
				$qcCount ++;				 // increment counter
			
				$query = "UPDATE questioncount SET qcCount=$qcCount WHERE qcUserID=$userId AND qcTriviaID=$triviaID";
				$sqlHelper->update($query);
				$log = "LOG> numRows=[$numRows] for query: [$query]\n";
				fwrite ($file_log, $log);
			}
			// Else insert a new row for the pair userID/triviaId with counter=1
			else {
				$qcCount = 1; // first time the question is asked for this user
				$query = "INSERT INTO questioncount (qcCount, qcUserID, qcTriviaID) VALUES ($qcCount, $userId, $triviaID)";
				$sqlHelper->insert($query);
				$log = "LOG> numRows=[$numRows] for query: [$query]\n";
				fwrite ($file_log, $log);
			}
		}
		
	}

    // Make the return page (AJAX) to be displayed
    // If playing BTC game ELSE playing Classic Game
    if ($numOfQuestions == 0) {
		echo "<h3>Question $questionId </h3><br>";
		//$numOfQuestions = $questionId + 1; // Enforces that the game will be played "forever" (until timer expires)
	}	
	else {
		echo "<h3>Question $questionId of $numOfQuestions</h3><br>";
	}
	
	echo "<p>$question</p>";
	echo "<br><br>";
	
	$w = 1;
	for ($b=1; $b <= 4; $b ++) {
		if ($b == $correctButton) {
			echo "<p><a id=\"$buttonId[$b]\" class=\"btn btn-inverse btn-block\" onclick=\"selectedAnswer(0,'$buttonId[$correctButton]','$buttonId[$b]','$question','$answers[0]','$answers[0]','$reference',$triviaID)\">\"$answers[0]\"</a></p>";
		}
		else {
			echo "<p><a id=\"$buttonId[$b]\" class=\"btn btn-inverse btn-block\" onclick=\"selectedAnswer($answerId[$w],'$buttonId[$correctButton]','$buttonId[$b]','$question','$answers[0]','$answers[$w]','$reference',$triviaID)\">\"$answers[$w]\"</a></p>";
			$w ++;
		}
	}
	echo "<p><br><a id=\"nextbttn\" class=\"btn btn-info btn-block\" onclick=\"showNext('$numOfQuestions')\">Continue></a></p>";

// NOTE by Sergio: I used this sleep to test situations with slow response teim from server
// sleep (3);

	$t1 = microtime(true) ;
	$mytime = $t1 - $t0;
	$log = "LOG> total elapsed=[$mytime]\n";
	fwrite ($file_log, $log);
	
?>
