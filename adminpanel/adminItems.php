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
  <script src=".././js/jquery310.min.js"></script>
  <link rel="stylesheet" href=".././css/bootstrap336.min.css"/>
  <script src=".././js/bootstrap337.min.js"></script>
  <script src=".././js/all.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
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
		                <li><a href="#" data-toggle=modal data-target=#additem>Add Items</a></li>
		                <li><a href="accounts.php">Accounts</a></li>
                        <li><a href=#>Admin: <?php echo $_SESSION['adminUser'];?></a></li>
                        <li><a href="../logout.php">Log-Out</a></li>
		            </ul>
		        </div>
	      </div>
      </nav>

        <div class="container table-responsive">
        <form action=adminItems.php>
        <input type=text class=form name=inputsearch placeholder='Search...' required>
        <input type=submit name=searchNow class='btn btn-success btn-sm' value=Search>
        </form>
    <table class="table table-bordred table-striped">
    <thead>
                   
                   <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Type</th>
                     <th>Product Description</th>
                     <th>Product Price</th>
                     <th>Edit</th>
                     <th>Delete</th>
                   </thead>

                   <tbody>
                   <?php
                    if(isset($_GET['searchNow'])){
                        $mysearch = $_GET['inputsearch'];
                        $conn=mysqli_connect("localhost","root","","orderingsystem12");
                        $display = "SELECT * FROM myitems where productName like '%" . $mysearch . "%'";
                        $result = mysqli_query($conn, $display);
                        while($row = mysqli_fetch_array($result)){
                       $productid = $row['productId'];
                       $productName = $row['productName'];
                       $productType = $row['productType'];
                       $productPrice = $row['productPrice'];
                       $itemDescription = $row['itemDescription'];
                       echo "
                       <tr>
                       <td>$productid</td>
                       <td>$productName</td>
                       <td>$productType</td>
                       <td>$itemDescription</td>
                       <td>$productPrice PHP</td>
                       <td><a onclick=editParams('$productid')><button class='btn btn-success btn-sm' data-title=Edit data-toggle=modal data-target=#edit><span class='glyphicon glyphicon-pencil'></span></button></a></td>
                       <td><p data-placement=top data-toggle=tooltip title=Delete><button class='btn btn-danger btn-xs' data-title=Delete data-toggle=modal data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td>
                       </tr>
                       ";
                    }
                    }
                    else{
                   $conn=mysqli_connect("localhost","root","","orderingsystem12");
                   $display = "SELECT * FROM myitems";
                   $result = mysqli_query($conn, $display);
                   while($row = mysqli_fetch_array($result)){
                       $productid = $row['productId'];
                       $productName = $row['productName'];
                       $productType = $row['productType'];
                       $productPrice = $row['productPrice'];
                       $itemDescription = $row['itemDescription'];
                       echo "
                       <tr>
                       <td>$productid</td>
                       <td>$productName</td>
                       <td>$productType</td>
                       <td>$itemDescription</td>
                       <td>$productPrice PHP</td>
                       <td><a onclick=editParams('$productid')><button class='btn btn-success btn-sm' data-title=Edit data-toggle=modal data-target=#edit><i class='fas fa-edit'></i></button></a></td>
                       <td><a onclick=deleteParams('$productid')><button class='btn btn-danger btn-sm' data-title=Delete data-toggle=modal data-target='#delete' ><i class='fas fa-trash'></i></button></a></p></td>
                       </tr>
                       ";
                   }
                }
                   ?>
                   </tbody>

     
    </table>
   </div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body" id=refresh>
          <?php
        if(isset($_GET['idtoedit'])){
        $myid =$_GET['idtoedit'];
        $conn=mysqli_connect("localhost","root","","orderingsystem12");
        $display = "SELECT * FROM myitems WHERE  productId='$myid'";
        $result = mysqli_query($conn, $display);
        while($row = mysqli_fetch_array($result)){
            $productId = $row['productId'];
            $productName = $row['productName'];
            $productType = $row['productType'];
            $productPrice = $row['productPrice'];
            $itemDescription = $row['itemDescription'];
            $productImage = $row['productImage'];
            $option="";
            if(strtolower($productType)=="coffee"){
                $option="            
                <option value='Coffee' selected=selected>Coffee</option>
                <option value='Bread'>Bread</option>
                <option value='Pasta'>Pasta</option>";
            }
            elseif(strtolower($productType)=="bread"){
                $option="            
                <option value='Coffee' >Coffee</option>
                <option value='Bread' selected=selected>Bread</option>
                <option value='Pasta'>Pasta</option>";
            }
            elseif(strtolower($productType)=="pasta"){
                $option="            
                <option value='Coffee' >Coffee</option>
                <option value='Bread'>Bread</option>
                <option value='Pasta' selected=selected>Pasta</option>";
            }
            else{
                $option="            
                <option value='Coffee' >Coffee</option>
                <option value='Bread'>Bread</option>
                <option value='Pasta'>Pasta</option>";
            }
            echo "
            <form action=adminItems.php method=POST enc>
            <input type=text value=$productId class='form-control' name=productIda style='display:none'>
            <div class=form-group>
            <p>Product Name:</p> 
            <input class=form-control name=productName type=text placeholder='$productName' required>
            <p style='padding-top: 10px;'>Product Type:</p>
            <select class=form-control  name=productType>
            $option
            </select>
            <p style='padding-top: 10px;'> Product Price:</p> 
            <input class=form-control name=productPrice type=text onkeypress='numonly(event)' placeholder='$productPrice' required>

            <p style='padding-top: 10px;'> Product Description:</p> 
            <textarea rows=2 class=form-control name=productDescription placeholder='$itemDescription' required></textarea>

            <p style='padding-top: 10px;'> Product Image Link:</p> 
            <input class=form-control type=file name=edituserfile id=edituserfile>
            <input type=submit class='btn btn-warning btn-lg' style='width: 100%; margin-top:10px;'; name=toupdate value=Update'>
            </div>
            </form>
            
            ";
        }
        }
        ?>
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
        <div class="modal-footer " id=refresh2>
        <a href="adminItems.php?idtodelete=<?php echo $_GET['idtodelete'];?>"<button type="button" id class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
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
          <form action=adminItems.php method=POST enctype="multipart/form-data">
            <div class=form-group>
            <p>Product Name:</p> 
            <input class=form-control name=productName type=text placeholder='Product Name...' required>
            <p style='padding-top: 10px;'>Product Type:</p>
            <select class=form-control  name=productType>
                <option value='Cofee' >Coffee</option>
                <option value='Bread'>Bread</option>
                <option value='Pasta'>Pasta</option>
            </select>
            <p style='padding-top: 10px;'> Product Price:</p> 
            <input class=form-control name=productPrice type=text onkeypress='numonly(event)' placeholder='Price...' required>

            <p style='padding-top: 10px;'> Product Description:</p> 
            <textarea rows=2 class=form-control name=productDescription placeholder='Description....' required></textarea>

            <p style='padding-top: 10px;'> Product Image Link:</p> 
            <input class="form-control" type="file" name="userfile" id="userfile">
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
  
function editParams(post_id){
    history.pushState(null, null, "adminItems.php?idtoedit="+post_id+"#edit");
    $('#refresh').load(document.URL +  ' #refresh');
}

function deleteParams(post_id){
    history.pushState(null, null, "adminItems.php?idtodelete="+post_id+"#delete");
    $('#refresh2').load(document.URL +  ' #refresh2');
}

function todelete(post_id){
    window.location.replace('adminItems.php?idtodelete='+post_id)
}

function numonly(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
<?php
if(isset($_POST['toupdate'])){
    $idtouse = $_POST['productIda'];
    $productName = $_POST['productName'];
    $productType =  $_POST['productType'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];
    $productImage = $_POST['productImage'];

    $conn=mysqli_connect("localhost","root","","orderingsystem12");
        $display = "UPDATE `myitems` SET `productName` = '$productName', `productType`= '$productType', `productPrice`='$productPrice', `itemDescription`='$productDescription', `productImage`='$productImage' WHERE productId ='$idtouse'";
        if (mysqli_query($conn, $display)) {
            echo "<script>window.location.replace('adminItems.php')</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
//adding product and uploading file to database 
}
if(isset($_POST['additem'])){
    $productName = $_POST['productName'];
    $productType =  $_POST['productType'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];
    $file = $_FILES['userfile'];

    $fileName =  $_FILES['userfile']['name'];
    $fileTmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileError = $_FILES['userfile']['error'];
    $fileType = $_FILES['userfile']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError===0){
            if($fileSize<2*1048576){
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = '../img/productImages/'.$fileNameNew;
              $conn=mysqli_connect("localhost","root","","orderingsystem12");
              $display = "INSERT INTO myitems(productName, productType, productPrice, itemDescription, productImage) Values('$productName', '$productType','$productPrice','$productDescription','$fileNameNew')";
              if (mysqli_query($conn, $display)) {
                  echo "<script>alert('Added Successfully');window.location.replace('adminItems.php')</script>";
              } else {
                  echo "Error updating record: " . mysqli_error($conn);
              }
              move_uploaded_file($fileTmpName, $fileDestination);
            }else{
              echo "file size is too big";
            }
        }else{
          echo "there was an error uploading your file";
        }
    }else{
      echo "error file type";
    }

        
}

if(isset($_GET['idtodelete'])){
    $idtodelete =$_GET['idtodelete'];
    $conn=mysqli_connect('localhost','root','','orderingsystem12') or die("No Connection");
    $display = "DELETE FROM myitems WHERE productId ='$idtodelete'";
    if (mysqli_query($conn, $display)) {
      echo '<script>alert("Delete Successfully");
      window.location.replace("adminItems.php")</script>';
    }
    else {
      echo "Error updating record: " . mysqli_error($conn);
    } 
    
  }




