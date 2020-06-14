<?php
	require '../connection.php';
	require '../header.php';

if (!isset($_SESSION['email'])) {
		echo '<script type="text/javascript">';
		echo 'alert("User not logged in!")';
		echo '</script>';
		echo '<script type="text/javascript">';
		echo 'window.location.href="../logincustomer.html"';
		echo '</script>';
	}
	else if(isset($_POST['Checkout']) != 0){
		
		$query = "SELECT * FROM `cart` WHERE email= '$_SESSION[email]'";
			$data = mysqli_query($conn, $query);
			while($result = mysqli_fetch_array($data)){

				$id=$result['SL'];
				$user=$result['email'];
				$item=$result['Name'];
				$price=$result['Price'];
				$type=$result['type'];


				$query = "INSERT INTO `orders` (`SL`, `email`, `Name`, `Price`, `type` ) VALUES ('$id', '$user','$item','$price' ,'$type')";
				mysqli_query($conn,$query);

			}
		echo '<script type="text/javascript">';
		echo 'alert("Order Successful!")';
		echo '</script>';
		echo '<script type="text/javascript">';
		echo 'window.location.href="../LandingPage.php"';
		echo '</script>';
		exit();

	
}

	?>