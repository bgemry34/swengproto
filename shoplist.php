<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/all.js"></script>
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

<div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-11 ml-sm-auto col-lg-12 px-4 row" id='product-list'>

        </main>
      </div>
    </div>
</body>
</html>
<script>
var xhr = new XMLHttpRequest;
xhr.open('GET', 'myphp.php', true)

xhr.onload = function(){
    if(this.status==200){
        var items = JSON.parse(this.responseText);
        console.log(items);
        let output='';

        for(var i in items){
        output+= '<div class="col-md-3 col-xs-2 col-sm-4">'+
        '<a href="item.php?product='+items[i].productId+'" >'+
        '<img class="w-100 rounded mx-auto d-block" src="./img/productImages/'+items[i].productImage+'">'+
        '<p class="text-center">'+items[i].productName+'</p>'+
        '<p class="display-5 text-center"> &#8369;'+items[i].productPrice+'</p>'+
        '</a>'+
        '</div>';
        }
        document.getElementById('product-list').innerHTML = output;
    }
}
xhr.send(); 
document.getElementById('rubber').addEventListener("click",function(){
  xhr.open('GET', 'rubber.php', true)

xhr.onload = function(){
    if(this.status==200){
        var items = JSON.parse(this.responseText);
        console.log(items);
        let output='';
        var myNode = document.getElementById('product-list');
        while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
        }
        for(var i in items){
        output+= '<div class="col-md-3 col-xs-2 col-sm-4">'+
        '<a href="item.php?product='+items[i].productId+'" >'+
        '<img class="w-100 rounded mx-auto d-block" src="'+items[i].productImage+'">'+
        '<p class="text-center">'+items[i].productName+'</p>'+
        '<p class="display-5 text-center"> &#8369;'+items[i].productPrice+'</p>'+
        '</a>'+
        '</div>';
        }
        document.getElementById('product-list').innerHTML = output;
    }
}
xhr.send(); 
})

document.getElementById('blade').addEventListener("click",function(){
  xhr.open('GET', 'blade.php', true)

xhr.onload = function(){
    if(this.status==200){
        var items = JSON.parse(this.responseText);
        console.log(items);
        let output='';
        var myNode = document.getElementById('product-list');
        while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
        }
        for(var i in items){
        output+= '<div class="col-md-3 col-xs-2 col-sm-4">'+
        '<a href="item.php?product='+items[i].productId+'" >'+
        '<img class="w-100 rounded mx-auto d-block" src="'+items[i].productImage+'">'+
        '<p class="text-center">'+items[i].productName+'</p>'+
        '<p class="display-5 text-center"> &#8369;'+items[i].productPrice+'</p>'+
        '</a>'+
        '</div>';
        }
        document.getElementById('product-list').innerHTML = output;
    }
}
xhr.send(); 
})

document.getElementById('shoes').addEventListener("click",function(){
  xhr.open('GET', 'shoes.php', true)

xhr.onload = function(){
    if(this.status==200){
        var items = JSON.parse(this.responseText);
        console.log(items);
        let output='';
        var myNode = document.getElementById('product-list');
        while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
        }
        for(var i in items){
        output+= '<div class="col-md-3 col-xs-2 col-sm-4">'+
        '<a href="item.php?product='+items[i].productId+'" >'+
        '<img class="w-100 rounded mx-auto d-block" src="'+items[i].productImage+'">'+
        '<p class="text-center">'+items[i].productName+'</p>'+
        '<p class="display-5 text-center"> &#8369;'+items[i].productPrice+'</p>'+
        '</a>'+
        '</div>';
        }
        document.getElementById('product-list').innerHTML = output;
    }
}
xhr.send(); 
})

document.getElementById('showall').addEventListener("click",function(){
  xhr.open('GET', 'myphp.php', true)

xhr.onload = function(){
    if(this.status==200){
        var items = JSON.parse(this.responseText);
        console.log(items);
        let output='';
        var myNode = document.getElementById('product-list');
        while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
        }
        for(var i in items){
        output+= '<div class="col-md-3 col-xs-2 col-sm-4">'+
        '<a href="item.php?product='+items[i].productId+'" >'+
        '<img class="w-100 rounded mx-auto d-block" src="'+items[i].productImage+'">'+
        '<p class="text-center">'+items[i].productName+'</p>'+
        '<p class="display-5 text-center"> &#8369;'+items[i].productPrice+'</p>'+
        '</a>'+
        '</div>';
        }
        document.getElementById('product-list').innerHTML = output;
    }
}
xhr.send(); 
})



</script>

