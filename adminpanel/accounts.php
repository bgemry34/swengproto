<?php
session_start();
if(isset($_SESSION['adminUser'])){   
} 
else{
    header("Location: ../loginuser.php");
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Admin Panel</title>
  <script src=".././js/jquery3_1_9.min.js"></script>
  <link rel="stylesheet" href=".././css/bootstrap336.min.css" />
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
	  <div class="container table-responsive">
	  <a href="#" data-toggle=modal data-target=#adduser><button class="btn btn-success">Add User</button></a>
	  <table class="table table-bordred table-striped">
    <thead>
                   
                   <th>User Type</th>
                    <th>Username</th>
                    <th>Password</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                   </thead>
				   <tbody>
				   <?php
				 	 $conn=mysqli_connect("localhost","root","","orderingsystem12");
					  $display = "SELECT * FROM userlogin";
					  $result = mysqli_query($conn, $display);
					  while($row = mysqli_fetch_array($result)){
						  $usertype = $row['userType'];
						  $username = $row['username'];
						  $password = $row['password'];
						  $firstname = $row['firstname'];
						  $lastname = $row['lastname'];
						  echo "
						  <tr>
						  <td>$usertype</td>
						  <td>$username</td>
						  <td>$password</td>
						  <td>$firstname</td>
						  <td>$lastname</td>
						  </tr>
						  ";  
					  }
				   ?>
				   </tbody>

                   <tbody>
				   </table>
				   </div>

				   <!-- Add User modal -->
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add User</h4>
      </div>
          <div class="modal-body">
          <form action=accounts.php method=POST>
            <div class=form-group>
			<p style='padding-top: 10px;'>User Type:</p>
			<select class=form-control  name=userType>
            <option value='admin' >Admin</option>
            <option value='user'>User</option>
            </select>
            <p>Username:</p> 
            <input class=form-control name=username type=text placeholder='Username...' required>
            <p style='padding-top: 10px;'>Password:</p> 
            <input class=form-control name=password type=password placeholder='Price...' required>
			<p>First Name:</p> 
            <input class=form-control name=firstname type=text placeholder='First name...' required>
			<p>Last Name:</p> 
            <input class=form-control name=lastname type=text placeholder='Last Name...' required>
            <input type=submit class='btn btn-success btn-lg' style='width: 100%; margin-top:10px;'; name=adduser value="Add Item">
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
<?php
if(isset($_POST['adduser'])){
	$usertype = $_POST['userType'];
    $username =  $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $conn=mysqli_connect("localhost","root","","orderingsystem12");
        $display = "INSERT INTO userlogin(userType, username, password, firstname, lastname) Values('$usertype', '$username','$password','$firstname','$lastname')";
        if (mysqli_query($conn, $display)) {
            echo "<script>alert('Added Successfully');window.location.replace('accounts.php')</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
}