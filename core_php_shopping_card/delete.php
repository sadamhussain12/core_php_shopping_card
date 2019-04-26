<?php
include_once("connection.php");
$id=$_GET['id'];

$qry="delete from tblproduct where id=$id;";

$res=mysqli_query($con,$qry);

	if(mysqli_affected_rows($con)>0)
	{
		
		
		$msg= "Product is  deleted";
		
		header("location:manage_shopping_card.php?msg=$msg");
	}
	else
	{
		
		$msg= "Product is not deleted";
		header("location:manage_shopping_card.php?msg=$msg");
	}



?>