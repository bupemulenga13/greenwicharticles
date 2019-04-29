<?php

	require_once "connection.php";
	
	if(isset($_REQUEST['delete_id']))
	{
		// select image from db to delete
		$id=$_REQUEST['delete_id'];	//get delete_id and store in $id variable
		
		$select_stmt= $db->prepare('SELECT * FROM tbl_file WHERE id =:id');	//sql select query
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute();
		$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		unlink("upload/".$row['image']); //unlink function permanently remove your file
		
		//delete an orignal record from db
		$delete_stmt = $db->prepare('DELETE FROM tbl_file WHERE id =:id');
		$delete_stmt->bindParam(':id',$id);
		$delete_stmt->execute();
		
		header("Location:index.php");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Greenwich</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
		
</head>

	<body>
	
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin_home.php">Greenwich Articles</a>
        </div>
   <!--    <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://onlyxscript.blogspot.in/2018/04/how-to-upload-insert-update-and-delete.html">Back to Tutorial</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>Admin Page</h1>
				
				<h3>
				<?php
				session_start();

				if(!isset($_SESSION['admin_login']))	//check unauthorize user not direct access in "admin_home.php" page
				{
					header("location: ../index.php");  
				}

				if(isset($_SESSION['employee_login']))	//check employee login user not access in "admin_home.php" page
				{
					header("location: ../employee/employee_home.php");	
				}

				if(isset($_SESSION['user_login']))	//check user login user not access in "admin_home.php" page
				{
					header("location: ../user/user_home.php");
				}
				
				if(isset($_SESSION['admin_login']))
				{
				?>
					Welcome,
				<?php
						echo $_SESSION['admin_login'];
				}
				?>
				</h3>
					<a href="../logout.php">Logout</a>
			</center>
			
		</div>
		
		<br><br><br><br><br>
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Admin Show Record
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>role</th>
											<th>Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									require_once '../connection.php';
									$select_stmt=$db->prepare("SELECT id,username,email,role FROM user");
									$select_stmt->execute();
									
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["role"]; ?></td>
											<td>...............</td>
                                        </tr>
									<?php 
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		
	</div>
			
	</div>
										
				<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <!--  <h3><a href="add.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add File</a></h3> -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$select_stmt=$db->prepare("SELECT * FROM tbl_file");	//sql select query
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                 <!--       <td><?php echo $row['name']; ?></td>
                                            <td><img src="upload/<?php echo $row['image']; ?>" width="100px" height="60px"></td>
                                            <td><a href="edit.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                                            <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td> -->
											<td><a href="uploads/<?php echo $row['image']; ?>" download>Download</td>
                                        </tr>
                                    <?php
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
		</div>
		
	</div>
			
	</div>
									
	</body>
</html>
										
	</body>
</html>