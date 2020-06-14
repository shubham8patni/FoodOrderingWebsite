<?php

	require '../connection.php';

	$firstname = $conn->real_escape_string($_POST['firstname']);
	$lastname = $conn->real_escape_string($_POST['lastname']);
	$email = $conn->real_escape_string($_POST['email']);
	$designation= $conn->real_escape_string($_POST['Designation']);
	$Password = md5($_POST['Password']);
	$repassword = md5($_POST['RePassword']);

	if ($Password !== $repassword){
		echo '<script type="text/javascript">';
		echo 'alert("Password do not match")';
		echo '</script>';
		echo '<script type="text/javascript">';
		echo 'window.location.href="../registeremployee.php"';
		echo '</script>';
		exit();
	}
	else{
		$stmt1 = "SELECT email FROM registeremployee WHERE email=?";
		$stmt2 = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt2, $stmt1)){
			echo '<script type="text/javascript">';
			echo 'alert("connection error")';
			echo '</script>';
			echo '<script type="text/javascript">';
			echo 'window.location.href="../registeremployee.php"';
			echo '</script>';
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt2, "s", $email);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$resultCheck = mysqli_stmt_num_rows($stmt2);
			if ($resultCheck > 0) {
				echo '<script type="text/javascript">';
				echo 'alert("Email already exist")';
				echo '</script>';
				echo '<script type="text/javascript">';
				echo 'window.location.href="../registeremployee.php"';
				echo '</script>';
				exit();
			}
			else{
				$stmt1 = "INSERT INTO `registeremployee` (`id`, `firstname`, `lastname`, `email`, `designation`, `password`) VALUES (NULL, '$firstname', '$lastname', '$email', '$designation', '$Password');";
				$stmt2 = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt2, $stmt1)){
					echo '<script type="text/javascript">';
					echo 'alert("connection error")';
					echo '</script>';
					echo '<script type="text/javascript">';
					echo 'window.location.href="../registeremployee.php"';
					echo '</script>';
					exit();
				}
				else {
					mysqli_stmt_bind_param($stmt2, "sssss", $firstname, $lastname, $email, $designation, $Password);
					mysqli_stmt_execute($stmt2);
					echo '<script type="text/javascript">';
					echo 'alert("Registration Successful!")';
					echo '</script>';
					echo '<script type="text/javascript">';
					echo 'window.location.href="../loginemployee.html"';
					echo '</script>';
					exit();
				}
			}

		}
			mysqli_stmt_close($stmt1);
			mysqli_close($conn);
	}






















