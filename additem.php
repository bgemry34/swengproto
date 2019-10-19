<?php
session_start();
if(isset($_SESSION['UserUser'])){
// Connect to a database 
$conn = mysqli_connect('localhost', 'root', '', 'orderingsystem12');

//check for POST variable
    $username = $_SESSION['UserUser'];
    $productID = $_POST['ID'];
    $quantity = $_POST['quantity'];
    $price = $_POST['itemPrice'];
    $itemName = $_POST['itemName'];   
    $imgUrl= $_POST['imgUrl'];
    $total = $price * $quantity;

    $query = "INSERT INTO userorderlist(username, productId, productName, productPrice, productImage, quantity, total) 
            VALUES('$username', '$productID', '$itemName', '$price', '$imgUrl', '$quantity', '$total')";
    
    if(mysqli_query($conn, $query)){
        echo 'User Added';
    }
    else{
        echo 'Error:'.  mysqli_error($conn);
    }
}
else{
    echo 'window.location.replace("loginuser.php")</script>';
}