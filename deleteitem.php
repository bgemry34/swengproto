<?php
session_start();
if(isset($_SESSION['UserUser'])){
$conn=mysqli_connect("localhost","root","","orderingsystem12") or die("No Connection");
$username = $_SESSION['UserUser'];
$getname = $_GET['producttodelete'];
$display = "DELETE FROM userorderlist WHERE productId = '$getname' AND username = '$username'";
if (mysqli_query($conn, $display)) {
    header("Location: mycart.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}