<?php
session_start();
?>
<style>
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title id=myitemname></title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/all.js"></script>
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
<!-- items -->
<div class="container padding">
        <div class="row">
        <div class="col-md-4">
            <img class="card-img" id="item-img">
        </div>
		<div class="col-md-8">
            <h2 id="item-name"></h2>
            <h5>Description:</h5>
            <p class="lead" id="item-description"></p>
            <p class="lead" id="item-price">Price: &#8369;</p>
            <p class="lead">Quantity:</p>
            <div class="input-group col-md-5 col-xs-12 pl-0">
                <button class="btn btn-danger" id="buttondec" type="button" style="font-size: 20px; font-weight: 900; padding-top: 0;">-</button>
                <input type="number" id="quantity" class="form-control" value="1">
                <div class="input-group-append">
                <button class="btn btn-success" id="buttoninc" type="button" style="font-size: 20px; font-weight: 900; padding-top: 0;">+</button> 
            </div>
        </div>
        <br>
        <?php
        if(isset($_SESSION['UserUser'])){
        echo "<button class='btn btn-primary' id='buynow'>Buy Now</button>";    
        }
        else{
            echo "<a href=loginuser.php><button class='btn btn-primary'>Log-in</button></a>";   
        }
        ?>
    </div>
    <script>
        var urlParams = new URLSearchParams(window.location.search);
var xhr = new XMLHttpRequest;
var product= urlParams.toString('product');
//button up and down
document.getElementById('buttondec').addEventListener('click',function(){
    var num =document.getElementById('quantity');
    if(num.value!=0){
        num.value--;
    }
    if(num.value==0){
        document.getElementById('buynow').disabled = true;
        document.getElementById('buynow').style.opacity = "0.5" ;
    }
});
document.getElementById('buttoninc').addEventListener('click',function(){
    
    document.getElementById('quantity').value++;
    if(document.getElementById('quantity').value>=0){
        document.getElementById('buynow').disabled = false;
        document.getElementById('buynow').style.opacity = "1" ;
    }
});

//buy now button

//quantity input form
document.getElementById('quantity').addEventListener('keypress', function(){
    if(document.getElementById('quantity').value<=0){
        document.getElementById('buynow').disabled = true;
        document.getElementById('buynow').style.opacity = "0.5" ;
    }
});

//Load Image & name & description   
xhr.open('GET', 'myitem.php?'+product+'', true);
xhr.onload = function(){
    if(this.status==200){
        var item = JSON.parse(this.responseText);
           document.getElementById('item-img').setAttribute('src','./img/productImages/'+item[0].productImage);
           document.getElementById('item-name').appendChild(document.createTextNode(item[0].productName));
           document.getElementById('myitemname').appendChild(document.createTextNode(item[0].productName));
           document.getElementById('item-price').appendChild(document.createTextNode(item[0].productPrice));
           document.getElementById('item-description').appendChild(document.createTextNode(item[0].itemDescription));
           document.getElementById('buynow').addEventListener('click',function(){
            var myID = 'ID='+item[0].productId+'&quantity='+document.getElementById('quantity').value+
            '&itemPrice='+item[0].productPrice+
            '&itemName='+item[0].productName+
            '&imgUrl='+item[0].productImage;
            
            xhr.open('POST','additem.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
            if(xhr.status==200){
                console.log(this.responseText);
                //go to my cart
                window.location.href = 'mycart.php';
            }
            }   
            xhr.send(myID)
           });
        }
}
xhr.send(); 


    </script>

</body>
</html>

