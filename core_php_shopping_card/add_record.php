<?php 
    
   include_once("connection.php");


if(isset($_POST["submit"])) {
	$name= $_POST['name'];
	$code= $_POST['code'];
	$price= $_POST['price'];
	$size1 = getimagesize($_FILES['imgname1']['tmp_name']);
	$allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
			
			
			$upload_name1=$_FILES['imgname1']['name'];
			$upload_name1 = rand().$upload_name1;
			$upload_temp1=$_FILES['imgname1']['tmp_name'];
			if(false === ($allowed_filetypes))
			  {
				 $errors[]="Please select a valid type of file";
			  }
	$query= "insert into tblproduct  set name='$name', code='$code', price='$price', image='product-images/$upload_name1'";
      //print_r($query); exit;
$res=mysqli_query($con,$query)  or die(mysqli_error($con));
				if(mysqli_affected_rows($con)>0)
					{	
						$msg="Success fully Add Record";
						
						move_uploaded_file($upload_temp1,"product-images/".$upload_name1);
						header("location:manage_shopping_card.php?msg=$msg");
					}
          else {
	 
	      print "Failed To connected The Record".$query. mysqli_error($con);
         }
}
    
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="font-family: OCR A Std, monospace">

<div class="container">
  
<legend><h2>Add Record</h2></legend>
<form class="form-horizontal" style="margin-left: 250px;" method="post" action="" enctype="multipart/form-data">



  <fieldset>
    
    
   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Product Name</label>
      <div class="col-lg-4">
        <input class="form-control" id="name" placeholder=" Write Product Name" type="text" name="name" required>
        
      </div>
      </div>
      
      
      
      
      
       <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Product Code</label>
      <div class="col-lg-4">
        <input class="form-control" id="address" placeholder="Enter Product Code" type="text" name="code" required >
        
      </div>
      </div>
      
       
       <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Price</label>
      <div class="col-lg-4">
        <input class="form-control" id="city" placeholder="Product Price" type="text" name="price">
        
      </div>
      </div>
       <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Product Image</label>
      <div class="col-lg-4">
      	<samp style="color:red">Image Size 250X155</samp>
        <input type="file" name="imgname1">
        
      </div>
      </div>
      </fieldset>
<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"></label>
      <div class="col-lg-4">
    <input class="btn btn-info" type="submit" name="submit" value="Submit">
      </div>
      </div>
     



</form>
</div>

</body>
</html>
