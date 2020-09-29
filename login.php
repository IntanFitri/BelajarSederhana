<?php 
	include 'database/koneksi.php';

	if (isset($_POST['login'])) {
		echo "login";

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$qBukaTblLogin = "SELECT * FROM login WHERE (username = '$username' AND password= '$password')";

		$bukaLogin = mysqli_query($koneksi, $qBukaTblLogin);

		$jmlbaris = mysqli_num_rows($bukaLogin);

		if ($jmlbaris>0) {
			session_start();
			$_SESSION['admin'] = $username;
			header('location:datamahasiswa.php');
			//echo "berhasil";
		}else{
			echo 'gagal';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class = "container">
 		<div class = "row">
 			<div class = "col-md-12">
 				<h1>Login</h1>
 				<form method="POST" action="login.php">
 					<label> Username </label>
 					<input type="text" name="username" class="form-control">

 					<label> Password </label>
 					<input type="password" name="password" class="form-control">

 					<input type="submit" name="login" value="login" class="btn btn-success"> 
 				</form>
 			</div>
 		</div>
 	</div>
</body>
</html>