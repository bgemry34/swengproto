<?php 
session_start();
if(isset($_SESSION['adminUser'])){   
} 
else{
    header("Location: ../loginuser.php");
}
$connect=mysqli_connect("localhost","root","","orderingsystem12") or die("No Connection");
$query = "SELECT transactionId, fullname, address, contactnumber, modeofpayment, paidStatus, SUM(total), orderDate FROM `transactiontable` group by transactionId";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Admin Panel</title>
  <script src=".././js/jquery310.min.js"></script>
  <link rel="stylesheet" href=".././css/bootstrap336.min.css"/>
  <script src=".././js/bootstrap337.min.js"></script>
 </head>
 <body>
 <nav class="navbar navbar-inverse navbar-static-top">
	        <div class="container">
	            <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class = "sr-only">Toggle navigation</span>
						<span class = "glyphicon 	glyphicon glyphicon-th" style="color: white;"></span>
					</button>
					<a class="navbar-brand" href="adminpanel.php">Admin Panel</a>
				</div>
	            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">

<li><a href="adminpanel.php">Show Orders</a></li>
<li><a href="adminItems.php">Show Items</a></li>
<li><a href="accounts.php">Accounts</a></li>
    <li><a href=#>Admin: <?php echo $_SESSION['adminUser'];?></a></li>
    <li><a href="../logout.php">Log-Out</a></li>

</ul>
		        </div>
	      </div>
      </nav>


  <div class="container">

  <form action=adminpanel.php>
  <input type=text class=form name=inputsearch placeholder='Search...' required>
  <select class=form name=searchType>
                <option value='fullname'>Full Name</option>
                <option value='id'>Transaction Id</option>
  </select>
  <input type=submit name=searchNow class='btn btn-success btn-sm' value=Search>
  </form>

   <div class="table-responsive">
    <table class="table table-bordred table-striped">
    <thead>
                   
                   <th>Transaction Id</th>
                    <th>Full Name</th>
                     <th>Address</th>
                     <th>Contact Number</th>
                     <th>Mode Of Payment</th>
                     <th>Amount</th>
                     <th>Date</th>
                     <th>Status</th>
                     <th>Action</th>
                     <th></th>
                   </thead>
     <?php
     if(isset($_GET['searchNow'])){
       if($_GET['searchType']=="id"){
      $tosearch = $_GET['inputsearch'];
      $query = "SELECT transactionId, fullname, address, contactnumber, modeofpayment, paidStatus, SUM(total), orderDate FROM `transactiontable` WHERE transactionId='$tosearch' group by transactionId";
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
         $transactionId = $row["transactionId"];
         $fullname = $row['fullname'];
         $address = $row['address'];
         $contactNum = $row['contactnumber'];
         $mop = $row['modeofpayment'];
         $stattus = $row['paidStatus'];
         $total = $row['SUM(total)'];
         $date = $row['orderDate'];
         $mystatus = "";
         $paidBtn = "";
         if($stattus>0){
           $mystatus="<td style='color:limegreen;'>Paid</td>";
           $paidBtn ="<td><form action=adminpanel.php?pending=$transactionId method=Post><input type=Submit class='btn btn-danger btn-sm' name=Pending value=Pending></form></td>";
         }
         else{
           $mystatus="<td style='color:red;'>Pending</td>";
           $paidBtn ="<td><form action=adminpanel.php?paid=$transactionId method=Post><input type=Submit class='btn btn-success btn-sm' name=Paid value=Paid></form></td>";
         }
         echo "
         <tr>
         <td id=transId>$transactionId</td>
         <td>$fullname</td>
         <td>$address</td>
         <td>$contactNum</td>
         <td>$mop</td>
         <td>".number_format($total,2, '.', ',')." PHP</td>
         <td>$date</td>
         $mystatus
         $paidBtn 
         <td><button type=button name=view class='btn btn-primary btn-sm view' id=$transactionId >View Order</button></td>
         </tr>
         ";
      }
       }
       else{
        $tosearch = $_GET['inputsearch'];
        $query = "SELECT transactionId, fullname, address, contactnumber, modeofpayment, paidStatus, SUM(total), orderDate FROM `transactiontable` WHERE fullname like '%" . $tosearch . "%' group by transactionId";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {
           $transactionId = $row["transactionId"];
           $fullname = $row['fullname'];
           $address = $row['address'];
           $contactNum = $row['contactnumber'];
           $mop = $row['modeofpayment'];
           $stattus = $row['paidStatus'];
           $total = $row['SUM(total)'];
           $date = $row['orderDate'];
           $mystatus = "";
           $paidBtn = "";
           if($stattus>0){
             $mystatus="<td style='color:limegreen;'>Paid</td>";
             $paidBtn ="<td><form action=adminpanel.php?pending=$transactionId method=Post><input type=Submit class='btn btn-danger btn-sm' name=Pending value=Pending></form></td>";
           }
           else{
             $mystatus="<td style='color:red;'>Pending</td>";
             $paidBtn ="<td><form action=adminpanel.php?paid=$transactionId method=Post><input type=Submit class='btn btn-success btn-sm' name=Paid value=Paid></form></td>";
           }
           echo "
           <tr>
           <td id=transId>$transactionId</td>
           <td>$fullname</td>
           <td>$address</td>
           <td>$contactNum</td>
           <td>$mop</td>
           <td>".number_format($total,2, '.', ',')." PHP</td>
           <td>$date</td>
           $mystatus
           $paidBtn 
           <td><button type=button name=view class='btn btn-primary btn-xm view' id=$transactionId >View Order</button></td>
           </tr>
           ";
        }
       }
     }
     while($row = mysqli_fetch_array($result))
     {
        $transactionId = $row["transactionId"];
        $fullname = $row['fullname'];
        $address = $row['address'];
        $contactNum = $row['contactnumber'];
        $mop = $row['modeofpayment'];
        $stattus = $row['paidStatus'];
        $total = $row['SUM(total)'];
        $date = $row['orderDate'];
        $mystatus = "";
        $paidBtn = "";
        if($stattus>0){
          $mystatus="<td style='color:limegreen;'>Paid</td>";
          $paidBtn ="<td><form action=adminpanel.php?pending=$transactionId method=Post><input type=Submit class='btn btn-danger btn-sm' name=Pending value=Pending></form></td>";
        }
        else{
          $mystatus="<td style='color:red;'>Pending</td>";
          $paidBtn ="<td><form action=adminpanel.php?paid=$transactionId method=Post><input type=Submit class='btn btn-success btn-sm' name=Paid value=Paid></form></td>";
        }
        echo "
        <tr>
        <td id=transId>$transactionId</td>
        <td>$fullname</td>
        <td>$address</td>
        <td>$contactNum</td>
        <td>$mop</td>
        <td>".number_format($total,2, '.', ',')." PHP</td>
        <td>$date</td>
        $mystatus
        $paidBtn 
        <td><button type=button name=view class='btn btn-primary view' id=$transactionId >View Order</button></td>
        </tr>
        ";
     }
     ?>
     
    </table>
   </div>
   
  </div>
 </body>
</html>

<div id="post_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content"> 
  <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          <h4 class="modal-title custom_align" id="Heading">Ordered Items</h4>
          </div>
   <div class="modal-body">
   <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th>Item Name</th>
                    <th>Quantity  </th>

                  </thead>

                  <tbody id=post_detail>
                    
                    </tbody>

    </table>
   </div>
   <div class="modal-footer ">
          <button type="button" id=closeModal class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 100%;">Close</button>
          </div>
  </div>
 </div>
</div>

 <!-- Add Item modal -->
 <div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add Item</h4>
      </div>
          <div class="modal-body">
          <form action=adminItems.php method=POST>
            <div class=form-group>
            <p>Product Name:</p> 
            <input class=form-control name=productName type=text placeholder='Product Name...' required>
            <p style='padding-top: 10px;'>Product Type:</p>
            <select class=form-control  name=productType>
            <option value='blade' >Blade</option>
                <option value='rubber'>Rubber</option>
                <option value='shoes'>Shoes</option>
            </select>
            <p style='padding-top: 10px;'> Product Price:</p> 
            <input class=form-control name=productPrice type=text onkeypress='numonly(event)' placeholder='Price...' required>

            <p style='padding-top: 10px;'> Product Description:</p> 
            <textarea rows=2 class=form-control name=productDescription placeholder='Description....' required></textarea>

            <p style='padding-top: 10px;'> Product Image Link:</p> 
            <textarea rows=2 class=form-control name=productImage placeholder='Image Link....' required></textarea>
            <input type=submit class='btn btn-success btn-lg' style='width: 100%; margin-top:10px;'; name=additem value="Add Item">
            </div>
            </form>
            </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
</body>
</html>


<script>
$(document).ready(function(){
 
 function fetch_post_data(post_id)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{post_id:post_id},
   success:function(data)
   {
    $('#post_modal').modal('show');
    $('#post_detail').html(data);
   }
  });
 }

 $(document).on('click', '.view', function(){
  var post_id = $(this).attr("id");
  fetch_post_data(post_id);
 });
 
});
</script>
<?php
if(isset($_POST['Paid'])){
  $transId = $_GET['paid'];
  $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
  $display = "UPDATE `transactiontable` SET `paidStatus` = '1' WHERE transactionId ='$transId'";
  if (mysqli_query($conn, $display)) {
    echo '<script>alert("Update Successfully");
    window.location.replace("adminpanel.php")</script>';
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
}
if(isset($_POST['Pending'])){
  $transId = $_GET['pending'];
  $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
  $display = "UPDATE `transactiontable` SET `paidStatus` = '0' WHERE transactionId ='$transId'";
  if (mysqli_query($conn, $display)) {
    echo '<script>alert("Update Successfully");
    window.location.replace("adminpanel.php")</script>';
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
}

if(isset($_POST['additem'])){
  $productName = $_POST['productName'];
  $productType =  $_POST['productType'];
  $productPrice = $_POST['productPrice'];
  $productDescription = $_POST['productDescription'];
  $productImage = $_POST['productImage'];
  $conn=mysqli_connect("localhost","root","","orderingsystem12");
      $display = "INSERT INTO myitems(productName, productType, productPrice, itemDescription, productImage) Values('$productName', '$productType','$productPrice','$productDescription','$productImage')";
      if (mysqli_query($conn, $display)) {
          echo "<script>alert('Added Successfully');window.location.replace('adminItems.php')</script>";
      } else {
          echo "Error updating record: " . mysqli_error($conn);
      }
}
