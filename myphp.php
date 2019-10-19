<?php

// Connect to a database 
$conn = mysqli_connect('localhost', 'root', '', 'orderingsystem12');

$query = 'SELECT * FROM `myitems`';

//get result

$result = mysqli_query($conn, $query);

//fetch data

$item = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($item);
