<?php
require 'connection.php';
require "header.php";
error_reporting(E_ERROR | E_PARSE);

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
<body onload="doShowAll()">

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="">FoodShala</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="LandingPage.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      
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


	<form method="POST" action="">
		<div class="menuinner">
			<?php
			
			require 'connection.php';
			require "header.php";
			$total=0;

					$query = "SELECT * FROM `orders` ";
					$data = mysqli_query($conn, $query);
					while($result = mysqli_fetch_array($data)){
						echo "Order By : "; 
						echo  $result['email'];

					if ($result['type'] == Veg) {

						echo "<div class='item'>";
						echo "<img class='type' src='IMAGES/veg.png'>";
						echo "<p style='font-size: 30px'><b id='Name'>";
						echo  $result['Name'];
						echo "</b></p><br>";
						echo "<b>Price :<b id='Price'>";
						echo $result['Price'];
						echo "</b></b>";
						echo "</div >";
					}	
					else if ($result['type'] == Non-Veg) {

						echo "<div class='item'>";
						echo "<img class='type' src='IMAGES/nonveg.png'>";
						echo "<p style='font-size: 30px'><b id='Name'>";
						echo  $result['Name'];
						echo "</b></p><br>";				
						echo "<b>Price :<b id='Price'>";
						echo $result['Price'];
						echo "</b></b>";
						echo "</div >";
					}	
				}
			?>

			<div class="col-xs-3">
              <button name="Checkout" type="submit" class="btn btn-success btn-block">
                Order Complete
              </button>
           </div>

          </div>
    </form>
    <?php
    require 'connection.php';
    if (isset($_POST['Checkout'])!=0) {
	$query = "DELETE FROM `orders`";
	mysqli_query($conn,$query);
	
	}
    ?>

</body>
</html>