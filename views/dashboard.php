<?php require_once("../server/connect.php"); ?>
<?php include_once("../session.php"); ?>
<?php require_once("hasAccessUser.php"); ?>
<?php include_once("library.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php include_once("bootstrap.php"); ?>
</head>
<body class="dashboard_background">
	<?php include_once("menubar.php"); ?>
	<div class="container-fluid">
		<div class="row my-3">
			<div class="col-sm-3">
<div class="list-group">
<a href="user_profile.php" class="list-group-item"><i class="bi bi-person-circle"></i> Profile</a>
<a href="send_files_to_users.php" class="list-group-item"><i class="bi bi-send-fill"></i> Send Files</a>
<a href="list_of_key_requests.php" class="list-group-item"><i class="bi bi-key-fill"></i> Key Requests</a>
<a href="list_of_files_send_by_me.php" class="list-group-item"><i class="bi bi-send-check-fill"></i> Files sent by me</a>
<a href="list_of_files_send_by_other_users.php" class="list-group-item"><i class="bi bi-people"></i> Files sent by another</a>
<?php 
if(isset($_SESSION['user_type'])){
	if($_SESSION['user_type']=='admin'){
?>
<a href="users.php" class="list-group-item"><i class="bi bi-info-circle-fill"></i> User registeration request</a>
<a href="leaker_user_list.php" class="list-group-item"><i class="bi bi-paint-bucket"></i> Leaker</a>
<?php
	}
	elseif($_SESSION['user_type']=='user'){
?>
<?php
	}
}
 ?>
</div>
				
			</div>
			<!-- col -->
			<div class="col-sm-9">
			
			
<?php if( $_SESSION['user_type'] == "admin" ){ ?>

<div class="row">
	<div class="col-sm-3">
		<div class="card mb-3">
			<div class="card-body">
			<h6>No of Active Users</h6>
			<?php 
				$sql="SELECT * FROM users";
				$result=mysqli_query($conn,$sql);
				$total=mysqli_num_rows($result);
			?>
			<?=$total?>
			</div>
		</div>
	</div>	
	<div class="col-sm-3">
		<div class="card mb-3">
			<div class="card-body">
			<h6>Leaked Data</h6>
			<?php 
				$sql="SELECT * FROM leakers";
				$result=mysqli_query($conn,$sql);
				$total=mysqli_num_rows($result);
			?>
			<?=$total?>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card mb-3">
			<div class="card-body">
			<h6>Blocked Users</h6>
			<?php 
				$sql="SELECT * FROM users WHERE blocked='1'";
				$result=mysqli_query($conn,$sql);
				$total=mysqli_num_rows($result);
			?>
			<?=$total?>
			</div>
		</div>
	</div>

	<div class="col-sm-3">
		<div class="card mb-3">
			<div class="card-body">
			<h6>File transferred</h6>
			<?php 
				$sql="SELECT * FROM data_files";
				$result=mysqli_query($conn,$sql);
				$total=mysqli_num_rows($result);
			?>
			<?=$total?>
			</div>
		</div>
	</div>
</div>
<!-- row -->

<?php } ?>

			



			</div>
			<!-- col 9 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</body>
</html>