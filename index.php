<?php
	session_start();
	include_once("inc/auth.inc.php");

	$user = _check_auth($_COOKIE, false);
	$filename = basename(__FILE__, '.php');
//echo "index.php => filename=[$filename]";

	$name = $user['username'];
	$userID = $user['colaborador_id'];
/*
$_SESSION['user_id'] = $userID;
*/
	include("header.php");
?>
    <body>

        <!-- Wrapper Start -->
        <div id="wrapper" class="container-fluid">
		
            <?php
				include("body_header.php");
/*				
				$sqlHelper = new SqlDavanceHelper;
				$sqlHelper->select("SELECT COUNT(*) AS totalUsers, SUM(btTotalScore + btTotalScoreWeb) AS totalScores, SUM(btGamesPlayed + btGamesPlayedWeb) AS totalGames FROM users");

				$row =  $sqlHelper->nextRow();
				$totalGP=number_format($row['totalGames']);
				$totalScore=number_format($row['totalScores']);
				$totalUsers=number_format($row['totalUsers']);
*/
			?>

            <!-- Content -->
			<div class="row-fluid">
				<div class="container-narrow">
					<div class="jumbotron">
						<h1>Sistema de Gerenciamento</h1>
						<p class="lead">bla-bla-bla</p>
						<!--a class="btn btn-large btn-success" href="#">Sign Up</a> -->
						<!-- <a class="btn btn-large" href="classictrivia.php">Play Now!</a> -->
					</div> <!-- end of jumbotron -->
				</div> <!-- end of container-narrow -->
			</div> <!-- end of row-fluid -->

            <!-- Features Start -->
            <!-- Features #nd -->
			
            <!-- Blog  End -->
        </div>
        <!-- Wrapper / End -->

        <!-- Footer -->

	<?php
        //Footer Top 
		//include("topfooter.php");

        //Footer / Bottom
		include("footer.php");
		
		//Google Analytics
		//include("analytics.php");
	?>

        <!-- Footer / End -->
    </body>

</html>
