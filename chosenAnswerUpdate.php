<?php
include("inc/auth.inc.php");
include_once("inc/layout.inc.php");
$type = $_COOKIE['PLAYTYPE'];

	echo "<script src=\"js/dodsoneng.js\"></script>" ;

	$file_log = fopen("logs/chanswer.txt", "w");

	$rowId = intval($_GET['rowId']);
	$answerId = intval($_GET['answerId']);

	$log = "LOG> rowId=[$rowId] -- answerId=[$answerId]\n";
	fwrite ($file_log, $log);
	
	// Create a SqlPestCloudHelper object
	$sqlHelper = new SqlTriviaHelper;
	
	// Get the current counters
	$query = "SELECT * FROM tbltrivia WHERE triviaId=$rowId";
	$sqlHelper->select($query);
	
	$numRows = $sqlHelper->numRows;
	$log = "LOG> numRows found for user=$numRows \n";
	fwrite ($file_log, $log);
		
	if ($numRows > 0) {
		$row = $sqlHelper->nextRow();
		$triviaAnsCorr = $row['triviaAnsCorr'];
		$triviaAnsWr1  = $row['triviaAnsWr1'];
		$triviaAnsWr2  = $row['triviaAnsWr2'];
		$triviaAnsWr3  = $row['triviaAnsWr3'];
	}
	else {
		$log = "LOG> no rows found, the counters can't be updated \n";
		fwrite ($file_log, $log);
		fclose ($file_log);
		return;		
	}		
	
	// Update the counter according to given answer
	if ($answerId == 0) {
		$triviaAnsCorr ++;
		$updateQuery = "UPDATE tbltrivia SET triviaAnsCorr=$triviaAnsCorr where triviaId=$rowId";

		$log = "LOG> $updateQuery \n";
		fwrite ($file_log, $log);
	}
	else if ($answerId == 1) {
		$triviaAnsWr1 ++;
		$updateQuery = "UPDATE tbltrivia SET triviaAnsWr1=$triviaAnsWr1 where triviaId=$rowId";

		$log = "LOG> $updateQuery \n";
		fwrite ($file_log, $log);
	}
	else if ($answerId == 2) {
		$triviaAnsWr2 ++;
		$updateQuery = "UPDATE tbltrivia SET triviaAnsWr2=$triviaAnsWr2 where triviaId=$rowId";

		$log = "LOG> $updateQuery \n";
		fwrite ($file_log, $log);
	}
	else if ($answerId == 3) {
		$triviaAnsWr3 ++;
		$updateQuery = "UPDATE tbltrivia SET triviaAnsWr3=$triviaAnsWr3 where triviaId=$rowId";

		$log = "LOG> $updateQuery \n";
		fwrite ($file_log, $log);
	}
	
    $sqlHelper->update ($updateQuery);
	
?>
