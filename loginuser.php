<?php
session_start();
?>
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
            background-image: url("./img/background5.jpg");
            background-color: rgba(0, 0, 0, 0.5);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }     
        select{
            float:none;
        }
</style>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log-In</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/js/all.js"></script>
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
<br>
<br>
<div class="container-fluid" style="">
    <div class="form-container">
    <h3>Login</h3>
    
    <form action="loginuser.php" method="POST">
        <div class="center">
        <select name="loginSelect" id=mySelect>
        <option value=userlogin>User Login</option>
        <option value=adminlogin>Admin Login</option>
        </select>
        </div>
        <p>Username:</p>
        <input class="form" type="text" name="userUsername" placeholder="Username..." required>
        <p>Password:</p>
        <input class="form" type="password" name="userPass" placeholder="Password..." required>
        <input type="submit" name=loginnow class="button" value="Sign In">
    </form>
    <a href="registerPanel.php"><button class="btn btn-success" id=myregister>Register</button></a>
    </div>
    </div> 
</body>
</html>
<?php
if(isset($_POST['loginnow'])){
    if($_POST['loginSelect']=='userlogin'){
    $userUsername = $_POST['userUsername'];
    $userPass = $_POST['userPass'];
    $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
    $display = "SELECT * FROM userlogin WHERE username = '".$userUsername."' AND password = '".$userPass."' AND userType='user'";
    $result = mysqli_query($conn,$display);
    $num1 = mysqli_num_rows($result);
    if($num1>0){
        $_SESSION['UserUser'] = $_POST['userUsername'];

        header("Location: shoplist.php");
    }
    else{
       echo "<script>alert('Incorect Username Or Password')</script>";
    }
    }
    if($_POST['loginSelect']=='adminlogin'){
        $userUsername = $_POST['userUsername'];
        $userPass = $_POST['userPass'];
        $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
        $display = "SELECT * FROM userlogin WHERE username = '".$userUsername."' AND password = '".$userPass."' AND userType='admin'";
        $result = mysqli_query($conn,$display);
        $num1 = mysqli_num_rows($result);
        if($num1>0){
            $_SESSION['adminUser'] = $_POST['userUsername'];
            header("Location: adminpanel/adminpanel.php");
        }
        else{
           echo "<script>alert('Incorect Username Or Password')</script>";
        }
    }
}
?>
<script>
document.getElementById('mySelect').addEventListener("change",function(){
    if(document.getElementById("mySelect").selectedIndex == "0"){
    document.getElementById("myregister").style.visibility = "visible";
}
if(document.getElementById("mySelect").selectedIndex == "1"){
    document.getElementById("myregister").style.visibility = "hidden";
}
})

</script>