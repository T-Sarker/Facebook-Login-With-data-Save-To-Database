<?php
session_start();

if(!isset($_SESSION['access_token'])){
	header("Location: login.php");
	exit();
}
?>
<?php
$conn = mysqli_connect("localhost","userName","password","dbName");

// Check connection
if (!$conn) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}else{
    
}

if(isset($_POST['submit'])){
    $email = $_SESSION['userData']['email'];
    $name = $_SESSION['userData']['first_name'].$_SESSION['userData']['first_name'];
    $pass = $_POST['password'];
    $query = "INSERT INTO tbl_test(email,name,password) VALUES('$email','$name','$pass')";
    $result = mysqli_query($conn,$query);
    
    if($result){
        echo "<p class='alert alert-danger'>Done Successfuly</p>";}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title>My profile</title>
</head>
<body>
	
<div class="container" style="margin-top: 100px">
	<div class="row justify-content-center">
		<div class="col-md-3">
			<img src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
		</div>

		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<td>ID</td>
						<td><?php echo $_SESSION['userData']['id'] ?></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><?php echo $_SESSION['userData']['first_name'] ?></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><?php echo $_SESSION['userData']['last_name'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $_SESSION['userData']['email'] ?></td>
						
					</tr>
					<tr>
						<td>Insert Password:</td>
						<form action="" method="POST">
						    <input type="password" name="password">
						    <input type="submit" name="submit" class="btn btn-success" value="submit">
						</form>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


</body>
</html>