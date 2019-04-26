<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 

<style>
    .succcess {
		color:green;
		background-color:#FF9;
		font-size:30px;
		
	}
</style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<?php 
include_once('connection.php');
 session_start();
 if(isset($_SESSION['email'])) {
 $email= $_SESSION['email'];
 $query = "SELECT * from admin WHERE u_name='$email'  ";
 $data= mysqli_query($con,$query);
 $reautl= mysqli_fetch_assoc($data);
 
?>

<body>
<div class="jumbotron">
<h1 align="center">Welcome : <strong><?php print $reautl['name']; ?></strong></h1>
</div>

 <?php
   /*$query = ("select * from police_station");
       $data= mysqli_query($con,$query);  
   */
	   $count= 0;
  $result= mysqli_fetch_assoc($data);
  
if(isset($_GET['msg']) && $_GET['msg'] !="") {
	$msg= $_GET['msg']; 
	?>
    <table  cellpadding="0" cellspacing="0" align="center" <?php if($msg == 'record update successfully') { print 'style="color:white; background-color:green; font-size:40px; border-radius:28px; margin-top:50px; padding:30px;"'; }  if($msg == 'Can not to Update Record') { print 'style="color:white; background-color:red; font-size:40px; padding:40px;"'; }?>    >
    <tr >  
     <td  > 
           <?php print $msg;  ?>
           
      </td>
    </tr>
    </table>
    <?php } ?>

<div style=" margin-top:-50px;">
<?php include_once('manage_shopping_card.php'); ?>
<?php } else {
	header('location:login.php'); }
	 ?>
</div>
</body>
</html>