<?php

// Connect to a database 
$conn = mysqli_connect('localhost', 'root', '', 'orderingsystem12');

$product = $_GET['product'];

$query = "SELECT * FROM myitems WHERE productId = $product";

$result = mysqli_query($conn, $query);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);

