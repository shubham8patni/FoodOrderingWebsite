<?php


	require '../connection.php';

	$firstname = $conn->real_escape_string($_POST['firstname']);
	$lastname = $conn->real_escape_string($_POST['lastname']);
	$email = $conn->real_escape_string($_POST['email']);
	$cusine = $_POST['cusine'];
	$b= implode(",", $cusine );
	$preference = $_POST['preference'];
	$c= implode(",", $preference);
	$Password = md5($_POST['Password']);
	$repassword = md5($_POST['RePassword']);

	if ($Password !== $repassword){
		echo '<script type="text/javascript">';
		echo 'alert("Password do not match")';
		echo '</script>';
		echo '<script type="text/javascript">';
		echo 'window.location.href="../registercustomer.php"';
		echo '</script>';
		exit();
	}
	else{
		$stmt1 = "SELECT email FROM registercustomer WHERE email=?";
		$stmt2 = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt2, $stmt1)){
			echo '<script type="text/javascript">';
			echo 'alert("connection error")';
			echo '</script>';
			echo '<script type="text/javascript">';
			echo 'window.location.href="../registercustomer.php"';
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
				echo 'window.location.href="../registercustomer.php"';
				echo '</script>';
				exit();
			}
			else{
				$stmt1 = "INSERT INTO `registercustomer` (`id`, `firstname`, `lastname`, `email`, `cusine`, `preference`, `Password`) VALUES (NULL, '$firstname', '$lastname', '$email', '$b', '$c', '$Password');";
				$stmt2 = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt2, $stmt1)){
					echo '<script type="text/javascript">';
					echo 'alert("connection error")';
					echo '</script>';
					echo '<script type="text/javascript">';
					echo 'window.location.href="../registercustomer.php"';
					echo '</script>';
					exit();
				}
				else {
					mysqli_stmt_bind_param($stmt2, "ssssss", $firstname, $lastname, $email, $b, $c, $Password);
					mysqli_stmt_execute($stmt2);
					echo '<script type="text/javascript">';
					echo 'alert("Registration Successful!")';
					echo '</script>';
					echo '<script type="text/javascript">';
					echo 'window.location.href="../logincustomer.html"';
					echo '</script>';
					exit();
				}
			}

		}
			mysqli_stmt_close($stmt1);
			mysqli_close($conn);
	}


