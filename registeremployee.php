<?php
	if(isset($_POST['registeremployee'])){
		
	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

	<div class="outer">
		<fieldset>	
			<h1 class="headingregister">Register</h1>
			<div class="inner">
				<form class="formregister" action="functions/insert1.php" method="POST" >
					First name:<br> <input type="text" name="firstname"><br><br>
					Last name:<br> <input type="text" name="lastname"><br><br>
					Email: <br><input type="email" name="email" required><br><br>
					
					
					Designation:<br>
					<input type="radio" name="Designation" value="Chef">Chef<br>
					<input type="radio" name="Designation" value="Manager">Manager<br>
					<input type="radio" name="Designation" value="Staff">Staff<br><br>
			

					Password:<br> <input type="Password" name="Password" min="8"><br>
					Re-Type Password: <br><input type="Password" name="RePassword" required><br><br>
					<button type="submit" value="Register" >Register</button>
					<button type="reset" >Reset</button>
				</form>
			</div>
		</fieldset>	
	</div>

</body>
</html>
