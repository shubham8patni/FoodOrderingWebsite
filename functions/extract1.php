<?php

require '../connection.php';

	$email = $conn->real_escape_string($_POST['email']);
	$password = md5($_POST['password']);
	$Security_Code =  $conn->real_escape_string($_POST['Security_Code']);

	$sql = "SELECT * FROM `securitycode` where `Security` = ?;";
	$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo '<script type="text/javascript">';
			echo 'alert("SQL Error 1")';
			echo '</script>';
			echo '<script type="text/javascript">';
			echo 'window.location.href="../loginemployee.html"';
			echo '</script>';
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $Security_Code);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {

				if ($Security_Code !== $row['Security']){
					echo '<script type="text/javascript">';
					echo 'alert("Wrong Passcode")';
					echo '</script>';
					echo '<script type="text/javascript">';
					echo 'window.location.href="../loginemployee.html"';
					echo '</script>';
					exit();
				}
				else if($Security_Code == $row['Security']){
					
						$sql = "SELECT * FROM `registeremployee` where `email` = ?;";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo '<script type="text/javascript">';
							echo 'alert("SQL Error 1")';
							echo '</script>';
							echo '<script type="text/javascript">';
							echo 'window.location.href="../loginemployee.html"';
							echo '</script>';
							exit();
						}
						else{
							mysqli_stmt_bind_param($stmt, "s", $email);
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);
							if ($row = mysqli_fetch_assoc($result)) {
								
								if ($password !== $row['password']){
									echo '<script type="text/javascript">';
									echo 'alert("Wrong Password")';
									echo '</script>';
									echo '<script type="text/javascript">';
									echo 'window.location.href="../loginemployee.html"';
									echo '</script>';
									exit();
								}
								else if($password == $row['password']){
									session_start();
									$_SESSION['email'] = $row['email'];
									$_SESSION['user']=  'employee';


									echo '<script type="text/javascript">';
									echo 'alert("Login Successful")';
									echo '</script>';
									echo '<script type="text/javascript">';
									echo 'window.location.href="../LandingPage.php"';
									echo '</script>';
									exit();
								}
								else{
									echo '<script type="text/javascript">';
									echo 'alert("Wrong Password")';
									echo '</script>';
									echo '<script type="text/javascript">';
									echo 'window.location.href="../loginemployee.html"';
									echo '</script>';
									exit();
								}
							}
							else{
								echo '<script type="text/javascript">';
								echo 'alert("No User")';
								echo '</script>';
								echo '<script type="text/javascript">';
								echo 'window.location.href="../loginemployee.html"';
								echo '</script>';
								exit();
							}
						}
				}
			}
		}