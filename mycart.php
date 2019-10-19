<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Cart</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>

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

    <div class="container-fluid  padding">
        <a href=pendingOrder.php class=nav-link style="float:right;">Show pending Orders</a>
        <h2 class="ml-auto">Your Cart</h2>
        <div class="row hidden-xs">
        <div class="col-md-6">Description</div>
        <div class="col-md-2">Quantity</div>
        </div>

        <ul class="list-group row" id="order-list">
            <?php
                $username = $_SESSION['UserUser'];
                $conn=mysqli_connect("localhost","root","","orderingsystem12") or die("No Connection");
                $display = "SELECT productName, productImage, productPrice, SUM(quantity), productId FROM userorderlist WHERE username = '$username' GROUP BY productName";
                $result = mysqli_query($conn,$display);
                while($rec=mysqli_fetch_array($result)){
                    $productname = $rec["productName"];
                    $productimage = $rec['productImage'];
                    $price = $rec['productPrice'];
                    $qty = $rec['SUM(quantity)'];
                    $productId= $rec['productId'];
                    echo "<li class='list-group-item col-xs-12 col-md-12'>
                    <div class=row>
                    <img class='col-md-2 col-xs-2 w-25 h-25 hidden-xs-down' src=img/productImages/$productimage>
                    <p class='col-md-4 m-auto'>$productname</p>
                    <div class='col-md-2 m-auto'><input type=text disabled class=form-control style='width: 90px; background-color: #f4f4f4;' value=$qty></div>
                    <div class='col-md-3 m-auto'>Price: &#8369;$price</div>
                    <div class='col-md-1 m-auto'><a href=deleteitem.php?producttodelete=$productId><button class='btn btn-danger'>X</button></a></div>
                    </div>
                    </li>";
                }
            ?>
        </ul>
    <br>
        <ul style="list-style: none;  text-align: center;">
                <li>
                <div style='display: flex;'>
                <?php
                            $username = $_SESSION['UserUser'];
                            $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
                            $display = "SELECT COUNT(productName),SUM(total) FROM userorderlist WHERE username= '$username'" ;
                            $result = mysqli_query($conn,$display);
                            while($rec=mysqli_fetch_array($result)){
                                $theitem = $rec['COUNT(productName)'];
                                $thecost = $rec['SUM(total)'];
                                echo "              
                                <li>
                                <div style='display: flex;'>
                                <div style='width: 40%; text-align: center; position:relative;; right: 45px;'><p>Number of Item: $theitem </p></div>
                                <div style='width: 60%; text-align: center'><p>Total: $thecost</p></div>
                                </li>";
                            }
                        
                ?>
                </li>
        </ul>
    </div>
    
    <?php
        $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
        $display = "SELECT productName, productImage, productPrice, SUM(quantity) FROM userorderlist WHERE username = '$username' GROUP BY productName";
        $result = mysqli_query($conn,$display);
        $num1 = mysqli_num_rows($result);
        if($num1>0){
            echo "
            <div class='container padding'>
            <h5 class=ml-auto>CheckOut Information:</h5>
            <hr>
            
            <div class=form-group>
            <form method=POST action=mycart.php>
                <label for=FullName>Full Name:</label>
                <input type=text class=form-control name=fullname id=FullName placeholder='Full Name...' required>
                <label for=address>Address:</label>
                <input type=text class=form-control name=address id=address placeholder='Address...' required>
                <label for=cnumber>Contact Number:</label>
                <input type=text onkeypress='numonly(event)' name=contactnumber class=form-control id=cnumber placeholder='Contact Number...' required>
                <label for=mop>Mode of Payment:</label>
                <select class=form-control id=mop name=modeofpayment>
                <option value='Bank Deposit'>Bank Deposit</option>
                <option value='Cash On Delivery'>Cash On Delivery</option>
                </select>
                <input type=submit name=checkoutBtn class='btn btn-success float-right mt-3' value=Checkout>
                </form>  
            </div>       
            </div>";
        }
    ?>



<script>
function numonly(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
</body>
</html>

<?php
if(isset($_POST['checkoutBtn'])){

    $username = $_SESSION['UserUser'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $contactnumber =$_POST['contactnumber'];
    $modeofpayment = $_POST['modeofpayment'];
    $conn=mysqli_connect("localhost","root","","orderingsystem12") or die("No Connection");
    $displaycount = "SELECT * FROM transactionTable";
    $result = mysqli_query($conn,$displaycount);
    $autogeneratedNum = mysqli_num_rows($result);
    $display = "SELECT productName, productImage, productPrice, SUM(quantity), total FROM userorderlist WHERE username = '$username' GROUP BY productName";
    $result = mysqli_query($conn,$display);
    while($rec=mysqli_fetch_array($result)){
        $productname = $rec["productName"];
        $productimage = $rec['productImage'];
        $price = $rec['productPrice'];
        $qty = $rec['SUM(quantity)'];
        $total = $rec['total'];
        $transactionId = $autogeneratedNum + 4000;
        date_default_timezone_set('Asia/Hong_Kong');
        $date = date('m/d/y');

        $display2 = "INSERT INTO transactiontable (transactionId ,username, fullname, address, contactnumber, modeofpayment, productName, productPrice, quantity, total, orderDate) VALUES('$transactionId', '$username', '$fullname', '$address', '$contactnumber', '$modeofpayment', '$productname', '$price', '$qty', '$total', '$date')";
        if (mysqli_query($conn, $display2)) {
                $username = $_SESSION['UserUser'];
                $getname = $_GET['producttodelete'];
                $display2 = "DELETE FROM userorderlist WHERE username = '$username'";
                if (mysqli_query($conn, $display2)) {
                    echo "<script>alert('Ordered Successfully!')
                    window.location.replace('mycart.php')</script>";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
        }
        else {
            echo "Error updating record: " . mysqli_error($conn);
        }

    }
}