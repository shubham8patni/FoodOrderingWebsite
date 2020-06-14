<?php
	
	require "header.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body class="background", background="IMAGES/background.jpg">

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">FoodShala</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <?php
	      	if (!(isset($_SESSION['email']) && isset($_SESSION['user']))) {
		      echo '<li class="food nav-item active">';
		        echo '<a class="nav-link" method="POST" name="menu" href="menu.php">MENU</a>';
		      echo "</li>";
		  	}
	      ?>
			<?php
				if (isset($_SESSION['email']) && isset($_SESSION['user'])){	      
			      echo '<li class="food nav-item active">';
			        echo '<a class="nav-link" href="insertmenu.php">ADD MENU ITEM</a>';
			      echo '</li>';
			      echo '<li class="food nav-item active">';
			        echo '<a class="nav-link" href="vieworder.php">View Orders</a>';
			      echo '</li>';
			    }
	     	?>
	      
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	    	<?php
	    		if (isset($_SESSION['email'])) {
	    			echo '<a class="btn btn-outline-light my-2 my-sm-0" href="logout.php">Logout</a>';
	    		}
	    		else{
	    			echo '<a class="btn btn-outline-light my-2 my-sm-0" href="registeroption.php">Sign up</a>';

	      			echo '<a class="btn btn-outline-light my-2 my-sm-0" href="loginoption.php">Login</a>';
	    		}
	    	?>
	      
	    </form>
	  </div>
	</nav>

	<div class="front">
		<img src="IMAGES/logo.png">
	</div><br><br><br>

	<div class="front">
		<h1>About</h1>

		<p><br><br><br>We are a technology company on a mission to equip students with relevant skills & practical exposure through internships and online trainings. Imagine a world full of freedom and possibilities. A world where you can discover your passion and turn it into your career. A world where your practical skills matter more than your university degree. A world where you do not have to wait till 21 to taste your first work experience (and get a rude shock that it is nothing like you had imagine it to be). A world where you graduate fully assured, fully confident, and fully prepared to stake claim on your place in the world. </p>	
	</div>


</body>
</html>