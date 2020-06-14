<?php

require '../connection.php';


	$itemname = $conn->real_escape_string($_POST['item-name']);
	$itemprice = $conn->real_escape_string($_POST['item-price']);
	$type= $conn->real_escape_string($_POST['type']);


	/*if($itemname == NULL or $itemprice == NULL ){
			echo '<script type="text/javascript">';
			echo 'alert("Empty field! please enter Item name and Item Price")';
			echo '</script>';
			echo '<script type="text/javascript">';
			echo 'window.location.href="menu.php"';
			echo '</script>';
			exit();
	}
	else{*/

		$stmt1 = "INSERT INTO `menu` (`id`, `Name`, `Price`, `type`) VALUES (NULL, '$itemname', '$itemprice', '$type');";
		$stmt2 = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt2, $stmt1)){
			echo '<script type="text/javascript">';
			echo 'alert("connection error")';
			echo '</script>';
			echo '<script type="text/javascript">';
			echo 'window.location.href="../LandingPage.php"';
			echo '</script>';
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt2, "sss", $itemname, $itemprice, $type);
			mysqli_stmt_execute($stmt2);
			echo '<script type="text/javascript">';
			echo 'alert("Item Added Successfully!")';
			echo '</script>';
			echo '<script type="text/javascript">';
			echo 'window.location.href="../insertmenu.php"';
			echo '</script>';
			exit();
		}

	//}
		