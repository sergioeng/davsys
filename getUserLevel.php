<?php

function getUserLevel ($sqlHelper, $file_log, $userId, $type, $name)
{
	/*
	==================================================================================
	 DETERMINING THE QUESTION LEVEL THE USER CAN ACCESS BASED ON HIS TOTAL SCORE
	         	  0 -    10,000  -  User @ level 1
  			 10,000 -    40,000  -  User @ level 2
			 40,000 -   100,000  - User @ level 3
			100,000 -   250,000  - User @ level 4
			250,000 -   400,000  - User @ level 5
			400,000 - 1,000,000  - User @ level 6
			>>> 1,000,000            - User @ level 7
	==================================================================================
	*/
 	/// If the user is member calculate the total score, in order to retrieve the proper question level.
 	$usrTotalScore = 0;
	if ($type == "member") {
	 	$query = "SELECT btTotalscore, btTotalscoreWeb FROM users WHERE btIndex=$userId";
 		$sqlHelper->select($query);
		$numRows  = $sqlHelper->numRows;
		
		$log = "LOG> numRows=[$numRows] for query: [$query]\n";
		fwrite ($file_log, $log);
	
		/// IF no row found, it means the user doesnt exist !!!
		if ($numRows > 0) { 
			$row = $sqlHelper->nextRow();
			$usrTotalScore = $row['btTotalscore'] + $row['btTotalscoreWeb'];
		}
	}
	
	/// Level calculation
	if      ($usrTotalScore >= 0      && $usrTotalScore < 10000)   $level = 1;
	else if ($usrTotalScore >= 10000  && $usrTotalScore < 40000)   $level = 2;
	else if ($usrTotalScore >= 40000  && $usrTotalScore < 100000)  $level = 3;
	else if ($usrTotalScore >= 100000 && $usrTotalScore < 250000)  $level = 4;
	else if ($usrTotalScore >= 250000 && $usrTotalScore < 400000)  $level = 5;
	else if ($usrTotalScore >= 400000 && $usrTotalScore < 1000000) $level = 6;
	else 														   $level = 7;

	$log = "LOG> user=[$name] userID=[$userId] totalScore: [$usrTotalScore] level: [$level]\n";
	fwrite ($file_log, $log);
	
	return $level;
}
?>