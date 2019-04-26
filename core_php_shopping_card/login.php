<?php
include_once('connection.php'); 
if(isset($_POST['submit'])) {
 $email= $_POST['email'];
 $passsword= $_POST['password'];
 print $email.$passsword;
$query = "SELECT * from admin WHERE u_name='$email' && password='$passsword' ";
$data= mysqli_query($con,$query);
 if(mysqli_num_rows($data) >0)
  {
	session_start();
	$_SESSION['email']=$email;
	$_SESSION['password']= $password;
	
	$_SESSION['login']=true;
	header('location:welcome_login.php');
	 
  }
  else {
	  header('location:login.php');
	return flase;  
  }

} 
 //header('location:login.php?msg="not ok"');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet"  />
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body style="background-color:#CFF;  margin-top:50px; margin-bottom:150px; margin-left:200px; margin-right:350px; padding-top:50px; padding-bottom:50px; padding-left:200px;  > 
<div class="container">
<div style="background-color:#CFC; border-radius:60px; padding-left:100px; padding-top:100px; padding-bottom:100px;">
<legent ><h1>Admin Login</h1></legent>

<form action="" method="post" class="form-horizontal"  >

 <div class="form-group ">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-5">

<input type="email" name="email" class="form-control"  />
</div></div>
 <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-5">

<input  class="form-control" type="password" name="password"  />
</div>
    </div>
   
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
<input type="submit" name="submit" value="submit" class="btn btn-primary"  />
</div></div>
</form>
</div></div>
</body>
</html>
