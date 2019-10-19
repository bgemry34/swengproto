<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
	<div class="container-fluid">
  <a class="navbar-brand" href="index.php"><img src="./img/logo.png" style="height: 50px" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item color-me"><a class="nav-link" href="index.php">Home</a></li>
				<li class="nav-item color-me"><a class="nav-link" href="shoplist.php">Shop</a></li>
				<?php
                if(isset($_SESSION['UserUser'])){
                    $myuseruser =$_SESSION['UserUser'];
					echo "<li class='nav-item color-me'><a class='nav-link' href=#>". $myuseruser ."</a></li>";
					echo "<li class='nav-item color-me'><a class='nav-link' href=mycart.php>My Cart</a></li>";
                    echo "<li class='nav-item color-me'><a class='nav-link' href=logout.php>Log-Out</a></li>";
                }
                else{
                    echo "<li class='nav-item color-me'><a class='nav-link' href=loginuser.php>Log-in</a></li>";
                }
                ?>
			</ul>
		</div>
	</div>
</nav>

<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
<div class="carousel-inner">
	<div class="carousel-item active" style="background-color:black;">
		<img style="height:90vh; opacity:0.5;"src="img/background.png" alt="">
		<div class="carousel-caption">
			<h1 class="display-2">Tully's Coffee Shop</h1>
			<button type="button" class="btn btn-outline-light btn-lg">Shop Now</button>
		</div>
	</div>
	<div class="carousel-item" style="background-color:black;"><img src="./img/background2.jpg" style="opacity:0.5; height:90vh;" alt="">
	<div class="carousel-caption">
			<h2 class="display-3">Taste as good as it smells.</h2>
		</div>
</div>
	<div class="carousel-item" style="background-color:black;"><img src="./img/background3.jpg" style="opacity:0.5; height:90vh;" alt="">
	<div class="carousel-caption">
			<h2 class="display-3">The coffee-er coffee.</h2>
		</div>
</div>
</div>
</div>
<hr class="my-4">
<!--- Fixed background -->
<figure>
	<div class="fixed-wrap">
		<div id="fixed"></div>
		</div>
	</div>
</figure>

<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h3 class="display-4">Best Selling</h3>
		</div>
		<hr>
	</div>
</div>

<!--- Cards -->
<div class="container-fluid padding">
	<div class="row padding">

		<div class="col-md-4">
			<div class="card">
					<img class="card-img-top" src="img/pasta.jpg">
					<div class="card-body">
						<h4 class="card-title">Pasta</h4>
						
						<a style="float: right;" href="#" class="btn btn-success">Shop now</a>
					</div>
			</div>
		</div>

		<div class="col-md-4">
				<div class="card">
						<img class="card-img-top" src="img/coffee2.jpg">
						<div class="card-body">
							<h4 class="card-title">Coffee</h4>
							<a style="float: right;" href="#" class="btn btn-success">Shop now</a>
					</div>
			</div>
		</div>

			<div class="col-md-4">
				<div class="card">
						<img class="card-img-top" src="img/bread.jpg">
						<div class="card-body">
							<h4 class="card-title">Bread</h4>
							<a style="float: right;" href="#" class="btn btn-success">Shop now</a>
						</div>
				</div>
		</div>

	</div>
</div>
<!--- Connect -->
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Connect</h2>
		</div>
		<div class="col-12 padding" id="social">
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
		</div>
	</div>
</div>

<!--- Footer -->
<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-6">
				<h2 class="display-5">Tully's Coffee Shop</h2>
				<hr class="bg-light">
				<p>(02)441-0366</p>
				<p>304-E McArthur Highway</p>
				<p>Valenzuela City 1446</p>
			</div>
			<div class="col-md-6">
				<hr class="light">
				<h4>Our Hour</h4>
				<hr class="light">
				<p>Everyday: 7:00 AM - 12:00 AM</p>
			</div>
		</div>
	</div>
</footer>

</body>
</html>













