<!DOCTYPE html>
<html lang="en">
<style>
        .form{
            border-radius: 5px; padding: 10px; border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 20px;
        }
        .form-container{
            display: block;
            width: 50%;
            border: 1px solid #2f2f2f;
            margin-left: auto;
            margin-right: auto;
            padding: 50px;
            padding-bottom: 70px;
            background: #35424a;
            color: #f4f4f4;
            border-radius: 10px;
        }
    
        .button{
            height:38px;
            background:#e8491d;
            border:0;
            padding-left: 20px;
            padding-right:20px;
            color:#ffffff;
            float: right;
        }
        body{
            background-image: url("https://i.imgur.com/7I9uF7E.png");
            background-repeat: no-repeat;
            background-size: cover;
        }     
        #container {
    width: 100%;
    height: 100%;
    top: 0;
    position: absolute;
    visibility: hidden;
    display: none;
    background-color: rgba(22,22,22,0.5); /* complimenting your modal colors */
}
</style>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complete Bootstrap 4 Website Layout</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container">
  <a class="navbar-brand" href="index.php"><h3>Table Tennis Shop</h3></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item color-me"><a class="nav-link" href="index.html">Home</a></li>
				<li class="nav-item color-me"><a class="nav-link" href="shoplist.php">Shop</a></li>
				<li class="nav-item color-me"><a class="nav-link" href="#">About Us</a></li>
				<?php
                if(isset($_SESSION['UserUser'])){
                    $myuseruser =$_SESSION['UserUser'];
                    echo "<li class='nav-item color-me'><a class='nav-link' href=#>". $myuseruser ."</a></li>";
                    echo "<li class='nav-item color-me'><a class='nav-link' href=#>Log-Out</a></li>";
                }
                else{
                    echo "<li class='nav-item color-me'><a class='nav-link' href=loginuser.php>Log-in</a></li>";
                }
                ?>
			</ul>
		</div>
	</div>
</nav>
<br>
<br>
<div class="container-fluid" style="">
    <div class="form-container">
    <h3>Register</h3>
    
    <form action="registerPanel.php" method="POST">
        <p>Username:</p>
        <input class="form" type="text" name="userUsername" placeholder="Username..." required>
        <p>Password:</p>
        <input class="form" type="password" name="userUserpass" placeholder="Password..." required>
        <p>First Name:</p>
        <input class="form" type="text" name="userFirstname" placeholder="First Name..." required>
        <p>Last Name:</p>
        <input class="form" type="text" name="userLastname" placeholder="Last Name..." required>
        <input type="submit" name="registernow" class="btn btn-success" value="Register" style="float: right;">
    </form>
    </div>
    </div> 

</div>
</body>
</html>
<?php

if(isset($_POST['registernow'])){
    $usercheck = false;
    $warning = "";
    if(isset($_POST['userUsername'])){
        $myusername=$_POST['userUsername'];
        $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
        $display = "SELECT * FROM userlogin WHERE username = '".$myusername."'";
        $result = mysqli_query($conn,$display);
        $num1 = mysqli_num_rows($result);
        if($num1 >0){
            echo "<script>alert('Username Aready Used!');
                </script>";

        }
        else{
            $usercheck = true;
        }
    }
    if($usercheck==true){
        $myusername=$_POST['userUsername'];
        $mypassword=$_POST['userUserpass'];
        $myfirstname=$_POST['userFirstname'];
        $mylastname=$_POST['userLastname'];

        $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
        $display = "INSERT INTO userlogin (userType, username, password, firstname, lastname) VALUES('user', '$myusername', '$mypassword', '$myfirstname', '$mylastname')";
        if (mysqli_query($conn, $display)) {
            echo '<script>alert("register successfull!");
            window.location.replace("loginuser.php")</script>';
        }
        else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
