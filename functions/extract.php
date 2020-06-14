<?php

	require '../connection.php';

	$email = $conn->real_escape_string($_POST['email']);
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM `registercustomer` where `email` = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo '<script type="text/javascript">';
		echo 'alert("SQL Error 1")';
		echo '</script>';
		echo '<script type="text/javascript">';
		echo 'window.location.href="../logincustomer.html"';
		echo '</script>';
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if ($row = mysqli_fetch_assoc($result)) {
			
			if ($password !== $row['Password']){
				echo '<script type="text/javascript">';
				echo 'alert("Wrong Password")';
				echo '</script>';
				echo '<script type="text/javascript">';
				echo 'window.location.href="../logincustomer.html"';
				echo '</script>';
				exit();
			}
			else if($password == $row['Password']){
				session_start();
				$_SESSION['email'] = $row['email'];


				echo '<script type="text/javascript">';
				echo 'alert("Login Successful")';
				echo '</script>';
				echo '<script type="text/javascript">';
				echo 'window.location.href="../menu.php"';
				echo '</script>';
				exit();
			}
			else{
				echo '<script type="text/javascript">';
				echo 'alert("Wrong Password")';
				echo '</script>';
				echo '<script type="text/javascript">';
				echo 'window.location.href="../logincustomer.html"';
				echo '</script>';
				exit();
			}
		}
		else{
			echo '<script type="text/javascript">';
			echo 'alert("No User")';
			echo '</script>';
			echo '<script type="text/javascript">';
			echo 'window.location.href="../logincustomer.html"';
			echo '</script>';
			exit();
		}
	}


