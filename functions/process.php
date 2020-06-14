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
else{
	if(isset($_POST['order']) != 0){
	if(!empty($_POST['ordered_item'])) {
	foreach($_POST['ordered_item'] as $selected) {	
	$temp = explode("x", $selected);

	$id = $temp[0];
 	$q = $temp[1];

 	$sql = "SELECT * FROM menu WHERE id = '$id'" ;
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$user=$_SESSION['email'];
	$item=$row['Name'];
	$price=$row['Price'];
	$type=$row['type'];
	//$quantity=$_POST['quantity'][$q];
	
	$query = "INSERT INTO `cart` (`SL`, `email`, `Name`, `Price`, `type` ) VALUES ('$id', '$user','$item','$price' ,'$type')";
	mysqli_query($conn,$query);
	}
	header('Location: ../cart.php');
	}
	else{
	    echo '<script type="text/javascript">';
		echo 'alert("Please select an item")';
		echo '</script>';
		echo '<script type="text/javascript">';
		echo 'window.location.href="../menu.php"';
		echo '</script>';
		exit();	}
	}
}
	?>