<?php 
	include 'database/koneksi.php';

	if (isset($_POST['simpan'])) {
		echo "Klik Simpan";

		$id 		= $_POST['id'];
		$nama 		= $_POST['nama'];
		$alamat 	= $_POST['alamat'];
		$telephone  = $_POST['telephone'];
		$keterangan = $_POST['keterangan'];

		$qUbahTblMhs = "UPDATE mahasiswa SET nama = '$nama', alamat = '$alamat', telephone = '$telephone', keterangan = '$keterangan'
						WHERE id = '$id' ";
		$ubahTabelMhs= mysqli_query($koneksi, $qUbahTblMhs);

		header('location:datamahasiswa.php');
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 </head>
 <body>
 	<?php 
 		if (isset($_GET['edit'])) {
 			$id=$_GET['edit'];

 			$qBukaTblMhs = "SELECT * FROM mahasiswa WHERE id = '$id' ";
					$bukaMahasiswa = mysqli_query($koneksi, $qBukaTblMhs);

					while ($row = mysqli_fetch_assoc($bukaMahasiswa)) {
 	 ?>
 	 <form method="POST" action="editmahasiswa.php">
 	 	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
 		<label> Nama Mahasiswa </label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $row['nama'] ?>">

 		<label> Alamat </label>
 		<input type="text" name="alamat" class="form-control"  value="<?php echo $row['alamat'] ?>">

 		<label> Nomor Telephone </label>
 		<input type="text" name="telephone" class="form-control" value="<?php echo $row['telephone'] ?>">

 		<label> Keterangan </label>
 		<input type="text" name="keterangan" class="form-control"  value="<?php echo $row['keterangan'] ?>">
 					
 		<input type="submit" name="simpan" value="simpan" class="btn btn-success" ?>
 	</form>
 	<?php 
 		}
 	  }
 	 ?>
 </body>
 </html>