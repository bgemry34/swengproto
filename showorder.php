<?php
// Connect to a database 
if(isset($_POST['transId'])){
$conn = mysqli_connect('localhost', 'root', '', 'orderingsystem12');
$myuseruser = $_POST['transId'];

$query = "SELECT * FROM `transactiontable` WHERE transactionId='$myuseruser'";

//get result

$result = mysqli_query($conn, $query);

//fetch data

$item = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($item);
}