<?php
session_start();

require 'connection.php';

$query = "DELETE FROM `cart`";
	mysqli_query($conn,$query);
session_unset();
session_destroy();

echo '<script type="text/javascript">';
echo 'alert("User Looged Out")';
echo '</script>';
echo '<script type="text/javascript">';
echo 'window.location.href="LandingPage.php"';
echo '</script>';
?>