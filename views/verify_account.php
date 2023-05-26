<?php require_once("../server/connect.php"); ?>
<?php include_once("../session.php"); ?>
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

<div class="container">
	<div class="row">
		<div class="col-sm-4 mx-auto">
			<div class="card mt-5">
				<div class="card-body">

	<?php 
		if(isset($_POST["verify_password"])){
			$password=$_POST["password"];
			$user_id=$_SESSION['user_id'];
			$result=mysqli_query($conn,"SELECT * FROM users WHERE id='$user_id' AND password='$password'");
			if(mysqli_num_rows($result)>0){
					$downloadId=$_GET["downloadId"];
					$url="download.php?id=$downloadId";
					header("Location:$url");
					exit();
			}
			else{
				echo "<div class='alert alert-danger'>invalid password, try again.</div>";				
			}
		}
	 ?>

<form action="verify_account.php?downloadId=<?=$_GET['downloadId']?>" method="POST">
		<p class="mb-2">
			<label for="password">Please Enter your account password to download the file</label>
			<input type="password" name="password" value="" class="form-control">
		</p>
		<p class="mb-2">
			<input type="submit" name="verify_password" value="Verify Password" class="btn btn-primary">
		</p>
	</form>

					
				</div>
			</div>
		</div>
	</div>
</div>



</body>
</html>