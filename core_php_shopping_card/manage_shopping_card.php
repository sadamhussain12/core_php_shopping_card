<?php
      $con = mysqli_connect('localhost','root','','tblproduct');
      if($con){
      	//print "Database is connnected";
      }
      	else {
      		print "not connected".mysqli_errors();
      	
      } ?>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <div class="container">
      <div class=" container-fluid" style="background-color: green; margin-top: 20px; height: 50px;"><a style="margin-top: 8px;" class="btn btn-info pull-right" href="logout.php">Logout</a></div>
	<div><a class="btn btn-success pull-right" href="add_record.php">Add Record</a></div>
	<?php if(isset($_GET['msg']) && $_GET['msg'] != ""){
		print "<p style='color:green; margin-left:300px;'>".$_GET['msg']."'</p>";
	} ?>

      <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
            	<th>S #</th>
                <th>Name</th>
                <th>Code</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
        	<?php $count = 1;
        	$query ="SELECT * FROM `tblproduct`";
        	      $data= mysqli_query($con,$query);
        	     foreach ($data as $data) { ?>
        	<tr>
                <td><?=$count++?></td>
                <td><?= $data['name']?></td>
                <td><?= $data['code']?></td>
                <td><?= $data['price']?></td>
                <td><img src="<?=$data['image']?>" width="200" height="50"></td>
                <td>
                	<a class="btn btn-info" href="edit.php?id=<?= $data['id']?>">Edit</a>&nbsp;
                	<a class="btn btn-danger" href= "delete.php?id=<?php echo $data['id'];?>"onclick="return confirm('Are you sure to delete the uploaded record???')" >Delete</a></td>

            </tr>
        <?php } ?>
        </tfoot>
    </table>
    

</div>
    
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
       <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );

    </script>