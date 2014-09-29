<?php
include("inc/auth.inc.php");
include_once("inc/layout.inc.php");
include("getUserLevel.php");

$type = $_COOKIE['PLAYTYPE'];

	echo "<script src=\"js/dodsoneng.js\"></script>" ;

	$file_log = fopen("logs/score.txt", "w");

	/// Parse the URL parameters
	$partialScore = intval($_GET['partialScore']);
	$isFinal = $_GET['final'];
	$bonus  = $_GET['bonus'];
	
	$user = _check_auth($_COOKIE);
	$name = $user['user_name'];
	$userId = $user['user_id'];
	
	$log = "LOG> name=[$name] userID=[$userId] partialScore=$partialScore isFinal=[$isFinal] bonus=[$bonus]\n";
	fwrite ($file_log, $log);
	
	// Create a SqlPestCloudHelper object
	$sqlHelper = new SqlTriviaHelper;

	if ($type == "member") {
		$query = "SELECT btTotalScoreWeb as totalScore, btGamesPlayedWeb as gamesPlayed, SUM(btTotalScore + btTotalScoreWeb) as totalScoreAll, SUM(btGamesPlayed + btGamesPlayedWeb) as gamesPlayedAll  FROM users WHERE btIndex = $userId";
	} else {
		$query = "SELECT gstTotalScore as totalScore, gstGamesPlayed as gamesPlayed FROM guests WHERE gstID = $userId";
	}
	
	$sqlHelper->select($query);
	
	$numRows = $sqlHelper->numRows;
	$log = "LOG> numRows found for user=$numRows\n";
	fwrite ($file_log, $log);
		
	if ($numRows > 0) {
		$row = $sqlHelper->nextRow();
		$totalScore = $row['totalScore'];
		$numGamesPlayed = $row['gamesPlayed'];
		if ($type == "member") {
			$totalScoreAll = $row['totalScoreAll'];
			$numGamesPlayedAll = $row['gamesPlayedAll'];
		}
		else {
			$totalScoreAll = $totalScore;
			$numGamesPlayedAll = $numGamesPlayed;
		}
		if ($isFinal == 'YES') {
			$currlevel = getUserLevel ($sqlHelper, $file_log, $userId, $type, $name);
			
		    $totalScore += $partialScore + $bonus;
		    $totalScoreAll += $partialScore + $bonus;
		    $numGamesPlayed ++;
		    $numGamesPlayedAll ++;
			
			if ($type == "member") {
				$updateQuery = "UPDATE users SET btTotalScoreWeb=$totalScore, btGamesPlayedWeb=$numGamesPlayed where btIndex=$userId";
			} else {
				$updateQuery = "UPDATE guests SET gstTotalScore=$totalScore, gstGamesPlayed=$numGamesPlayed where gstID=$userId";
			}
		    $sqlHelper->update ($updateQuery);
			$log = "LOG> new totalScore=$totalScore\n";
			$log = "LOG> new # games played=$numGamesPlayed\n";
			fwrite ($file_log, $log);

			$level = getUserLevel ($sqlHelper, $file_log, $userId, $type, $name);
			
			if ($level != $currlevel)
			{
				echo "<!-- Modal -->
			 		<div id=\"myModal\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
				  	<div class=\"modal-header\">
			    		<h3 id=\"myModalLabel\">Upgrade To Level $level</h3>
			  		</div>
			  		<div class=\"modal-body\">
			    		<p>Congratulations!!  You have gotten over $totalScoreAll points.<br>
			      		<br>You have now reached level $level.<br> 
			      		<br>With this upgrade you have unlocked 100 new Bible questions</p>
			  		</div>
			  		<div class=\"modal-footer\">
			    		<button class=\"btn btn-primary\" data-dismiss=\"modal\" aria-hidden=\"true\" onclick=closeModal('myModal')>Close</button>
			  		</div>
					</div>";
			}
			
			$correct = $partialScore /100;
			echo "<table class='table'>
			<tr>
			<td>Correct : $correct </td>
			<td>Games : $numGamesPlayedAll</td>
			</tr>
			<tr>
			<td>Points : $partialScore/$totalScoreAll</td>
			<td>Level : $level</td>
			</tr>
			</table>";
						
		}
		else {
			$level = getUserLevel ($sqlHelper, $file_log, $userId, $type, $name);
			echo "Points : $partialScore Level: $level";
		}
		
	}
	else {
	   /// First time playing so Total Points are 0 (zero)
	   echo "Score $partialScore";
	}
	
?>
