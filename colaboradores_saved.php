<?php

	$filename = basename(__FILE__, '.php');
	
	include_once("inc/auth.inc.php");
	include('header.php');
	$sqlHelper = new SqlDavanceHelper;
	
?>
<body>
        <!-- Wrapper Start -->
        <div id="wrapper" class="container-fluid">
            <!-- Header -->
            <div class="ie-dropdown-fix" >
                <!-- Header -->
                <div class="row-fluid" id="header">
                    <!-- Logo -->
                    <div class="span5">
                        <a href="#"><img src="images/logo.png" alt="logo" /></a>
                    </div>
                    <!-- Social / Contact -->
                    <div class="span4 pull-right">
                        <!-- Social Icons -->
                        <ul class="social-icons">
                        </ul>

                        <!-- Contact Details -->
 						<!-- TO BE DELETED by sergioeng 
                        <div id="contact-top">
                            <ul>
								<li><i class="icon-user"></i><a href="#">Sign Up!</a></li>
								
                            </ul>
                        </div>
						-->
                    </div>

                </div>
                <!-- Header / End -->

                <!-- Navigation -->
                <?php
					include("navbar.php");
				?>
                <div class="clear"></div>

            </div>
            <!-- Navigation / End -->
			
			
			<!-- Content -->
			<div align="center" class="row-fluid">
				<br><br>
			
			
			<?php
			
				//check if the form has been submitted
				if(isset($_POST['submit'])){
					$errors = array(); // Initialize error array.
				
					// Check for a email
					if (empty($_POST['new_email'])){
						$errors[] = 'You forgot to enter an email.';
					} else {
						$tempEmail = trim($_POST['new_email']);
						if(!filter_var($tempEmail, FILTER_VALIDATE_EMAIL)) {
							$errors[] = 'Please enter a valid email address';
						} else {
							$email = trim($_POST['new_email']);
						}
					}
					
					// Check for a first name
					if (empty($_POST['new_password'])){
						$errors[] = 'You forgot to enter a password.';
					} else {
						$password = trim($_POST['new_password']);
					}
					
					// Check for a last name
					if (empty($_POST['new_confirm'])){
						$errors[] = 'You forgot to enter your password twice.';
					} else {
						$confirm = trim($_POST['new_confirm']);
					}
					
					// Check for a last name
					if (empty($_POST['new_year'])){
						$year = 0;
					} else {
						$year = trim($_POST['new_year']);
					}
					
					// Check for a last name
					if (empty($_POST['new_country'])){
						$country = "N/A";
					} else {
						$country = str_replace(" ", "%20", ($_POST['new_country']));
					}
					
					if ($password != $confirm && $password != null) {
						$errors[] = 'Your password does not match the confirmation.';
					}
					
					//enter the new user if it doesn't already exist
					if (empty($errors)){ // if everything's okay.

						// first do a select to see if the username already exists
						$sqlHelper->select("SELECT btUser FROM users WHERE btUser = '$email' ");

						if ($sqlHelper->numRows == 0) {
					
							// encrypt the password before storing it in the database
							$hash = $password;//crypt($new_pass, '44A44B');
							
							// Make the query.
							$success = $sqlHelper->insert("INSERT INTO users (btUser, btPass, btAge, btCountry, btos, btRegDate) VALUES ('$email', '$hash', '$year', '$country', 'web', '$currentTime')");
							
							if ($success) { // if it ran ok.
							
								/* Send an email
								$headers = "From:" . $from;
								$ubject = "Survivor Series Account Info";
								$message = "This e-mail is 	Grover Survivor Pool";
								// The mail sending has been commented out.  it needs to be put back in when the code is ready for it.
								mail($email,$subject,$message,$headers);
								
								echo "<h3>$first $last is now registered</h3>";
								echo "<br>An email has been sent to $email with the password for this account.<br><br>";
								echo '<p><a href="index.php">Add Another User --></a></p>';
								echo '<br>';
								
								exit();
								*/

								echo "<h2>You are Now Registered!</h2><br>";
								echo "<h4>With this account you can keep track of games played and total score.</h4><br>";
								echo "<h4>You can also see how you compare to your age group and country!</h4><br><br>";
								echo "<a class='btn-success btn-large' href='login.php'>Login & Play!</a>";
								echo "<br><br><br><br><br><br><br><br><br><br></div>";
								
								include("footer.php");
								?>

								<!-- Footer / End -->
								
								</body>

								</html>
								<?php
								exit();
								
							} else {
								echo "There was a problem added the user";
								exit();
							}
							
						} else { // if it did not run ok.
						
							echo '<h3>Problem Adding User</h3>';
							echo '<h4>This user already exists<h4><br><br>';
							echo "<a class='btn-success btn-large' href='login.php'>Login & Play!</a>";
							echo "<br><br><br><br><br><br><br><br><br><br></div>";
							include("footer.php");
							?>

								<!-- Footer / End -->
								
								</body>

								</html>
								<?php
							exit();
							
						}
					
					} else { // report the errors
					
						echo '<p class="error"><h5>The Following error(s) occurred:<h5><br />';
						foreach($errors as $msg) { // print each error.
							echo "<font size='3'> - $msg</font><br />\n";
						}
					
					} // End of if(empty($errors)) IF.
					
				} // end of the main submit conditional.
			
			?>


            <!-- Content continues -->
				<form align="left" class="form-signin" action="colaboradores.php" method="post">
					<fieldset>
						<!-- Address form -->
						<h3 align="center" >Criar um novo usuario</h3>
				 
						<!-- email input-->
						<div class="control-group">
							<label class="control-label">Usuario</label>
							<div class="controls">
								<input id="email" name="new_email" type="text" placeholder="email"
								class="input-xlarge" value="<?php if (isset($_POST['new_email'])) echo $_POST['new_email']; ?>" >
								<p class="help-block"></p>
							</div>
						</div>
						<!-- first name input-->
						<div class="control-group">
							<label class="control-label">Senha</label>
							<div class="controls">
								<input id="first-name" name="new_password" type="password" placeholder="Password"
								class="input-xlarge" value="<?php if (isset($_POST['new_password'])) echo $_POST['new_password']; ?>">
								<p class="help-block"></p>
							</div>
						</div>
						<!-- last name input-->
						<div class="control-group">
							<label class="control-label">Confirmar senha</label>
							<div class="controls">
								<input id="last-name" name="new_confirm" type="password" placeholder="Confirm Password"
								class="input-xlarge" value="<?php if (isset($_POST['new_confirm'])) echo $_POST['new_confirm']; ?>">
								<p class="help-block"></p>
							</div>
						</div>
						<!-- Entries amount -->
						<!-- Entries amount -->
					</fieldset>
				</form>
			</div>
			<br>
				
            <!-- Blog  End -->
        </div>
        <!-- Wrapper / End -->

        <!-- Footer -->

        <!-- Footer Top -->
       <?php
		include("topfooter.php");
	   ?>
        <!-- Footer / Bottom -->
	<?php
		include("footer.php");
	?>

        <!-- Footer / End -->
    </body>

</html>
