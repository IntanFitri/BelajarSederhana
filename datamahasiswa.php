<?php 
	include 'database/koneksi.php';
	session_start();

	if(is_null($_SESSION['admin'])){
		header('location:login.php');
	}
	
	if(isset($_POST['simpan'])){
		$nama 		= $_POST['nama'];
		$alamat 	= $_POST['alamat'];
		$telephone  = $_POST['telephone'];
		$keterangan = $_POST['keterangan'];

		$qSimpanTblMhs = "INSERT INTO mahasiswa (nama, alamat, telephone, keterangan) 
					  VALUES ('$nama', '$alamat', '$telephone', '$keterangan')";

	    $simpanMahasiswa = mysqli_query($koneksi, $qSimpanTblMhs);
	}
	
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];

		$qDeleteMhs = "DELETE FROM mahasiswa WHERE id = '$id' ";
		$deleteMhs = mysqli_query($koneksi, $qDeleteMhs);
	} 

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Data Mahasiswa</title>
 	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 </head>
 <body>
 	<div class="container">
 		<div class ="row">
 			<div class= "col-md-12">
 				<h1> Tambah Data Mahasiswa</h1>
 				<form method="POST" action="datamahasiswa.php">
 					<label> Nama Mahasiswa </label>
 					<input type="text" name="nama" class="form-control">

 					<label> Alamat </label>
 					<input type="text" name="alamat" class="form-control">

 					<label> Nomor Telephone </label>
 					<input type="text" name="telephone" class="form-control">

 					<label> Keterangan </label>
 					<input type="text" name="keterangan" class="form-control">
 					
 					<input type="submit" name="simpan" value="simpan" class="btn btn-success">
 				</form>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-md-12">

 				<br>
 				<form class="form-inline" method="POST" action="datamahasiswa.php">
				  <div class="input-group mb-2 mr-sm-2">
				    <div class="input-group-prepend">
				      <div class="input-group-text">Nama Mahasiswa</div>
				    </div>
				    <input type="text" class="form-control" name="tnama">
				    <input type="submit" name="cari" value="cari" class="btn btn-success mb-2">
				  </div>
				</form>

 				<table class= "table table-bordered">
				<tr>
					<td>id</td>
					<td>Nama Mahasiswa</td>
					<td>Alamat</td>
					<td>Nomor Telephone</td>
					<td>Keterangan</td>
					<td> Aksi </td>
				</tr> 	
				<?php

					if (isset($_POST['cari'])) {
						$tnama = $_POST['tnama'];
						//echo $tnama;
						$qBukaTblMhs = "SELECT * FROM mahasiswa WHERE nama = '$tnama'";
					}else {
						//echo "Jalankan";
						$qBukaTblMhs = "SELECT * FROM mahasiswa";
					}
					
					$bukaMahasiswa = mysqli_query($koneksi, $qBukaTblMhs);

					while ($row = mysqli_fetch_assoc($bukaMahasiswa)) {
					 	
					 
				 ?>
					 <tr>
					 	<td><?php echo $row['id']; ?></td>
					 	<td><?php echo $row['nama']; ?></td>
					 	<td><?php echo $row['alamat']; ?></td>
					 	<td><?php echo $row['telephone']; ?></td>
					 	<td><?php echo $row['keterangan']; ?></td>
					 	<td>
					 		<a class = "btn btn-danger" href="?delete= <?php echo $row ['id']; ?>"> DELETE </a>
					 		<a class = "btn btn-warning "href="editmahasiswa.php?edit=<?php echo $row ['id'] ?>">EDIT</a>
					 	</td>
					 </tr>	
				 <?php 
					}	  
				 ?>			
 				</table>
 				 <input type="submit" name="logout" value="logout" class="btn btn-danger">
 			</div>
 		</div>
 	</div>
 			
				
 </body>
 </html>