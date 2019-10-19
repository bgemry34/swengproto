<?php
//fetch.php
if(isset($_POST["post_id"]))
{
  $idtouse =$_POST["post_id"];
 $connect = mysqli_connect("localhost","root","","orderingsystem12");
 $output = '';
 $query = "SELECT * FROM transactiontable WHERE transactionId = '$idtouse'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $itemname = $row["productName"];
  $qty = $row['quantity'];
  $output .= "
  <tr>
  <td>$itemname</td>
  <td>$qty</td>
  </tr>
  ";
 }
 echo $output;
}
// <h2>'.$row["productName"].'</h2>
// <p><label>Author By - '.$row["post_author"].'</label></p>
// <p>'.$row["post_description"].'</p>
?>
