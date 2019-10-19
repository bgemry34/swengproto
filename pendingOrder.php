<?php
session_start();
if(isset($_SESSION['UserUser'])){
}
else{
    header("location: loginuser.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pending Orders</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/all.js"></script>

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container">
  <a class="navbar-brand" href="index.php"><h3>Table Tennis Shop</h3></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item color-me"><a class="nav-link" href="index.php">Home</a></li>
				<li class="nav-item color-me"><a class="nav-link" href="shoplist.php">Shop</a></li>
				<li class="nav-item color-me"><a class="nav-link" href="#">About Us</a></li>
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

 <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th>Transaction Id</th>
                    <th>Full Name</th>
                     <th>Address</th>
                     <th>Contact Number</th>
                     <th>Mode Of Payment</th>
                     <th>Status</th>
                   </thead>
    <tbody>
    <?php
                $username = $_SESSION['UserUser'];
                $conn=mysqli_connect("localhost","root","","orderingsystem12") or die("No Connection");
                $display = "SELECT * FROM `transactiontable` where username='$username' group by transactionId";
                $result = mysqli_query($conn,$display);
                while($rec=mysqli_fetch_array($result)){
                    $transactionId = $rec["transactionId"];
                    $fullname = $rec['fullname'];
                    $address = $rec['address'];
                    $contactNum = $rec['contactnumber'];
                    $mop = $rec['modeofpayment'];
                    $stattus = $rec['paidStatus'];
                    $mystatus = "";
                    if($stattus>0){
                      $mystatus="<td style='color:limegreen;'>Paid</td>";
                    }
                    else{
                      $mystatus="<td style='color:red;'>Pending</td>";
                    }
                    echo "
                    <tr>
                    <td>$transactionId</td>
                    <td>$fullname</td>
                    <td>$address</td>
                    <td>$contactNum</td>
                    <td>$mop</td>
                    $mystatus
                    </tr>
                    ";
                }
            ?>
    </tbody>
        
</table>


            </div>
            
        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
            <div class="form-group">
            <input class="form-control " type="text" placeholder="Mohsin">
            </div>
            <div class="form-group">
            <input class="form-control " type="text" placeholder="Irshad">
            </div>
            <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>

</body>
</html>
<script>
  var name = document.getElementById('mysdf').innerHTML;
  alert(name);
</script>