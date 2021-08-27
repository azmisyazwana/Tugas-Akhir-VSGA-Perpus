<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Klinik</title>
</head>

<body>
	<header>
		<h3>Data Pasien Berobat</h3>
	</header>
	
	<nav>
		<a href="form-inputberobat.php">Add New</a>
	</nav>
	
	<br>
	
	<table border="1">
	<thead>
		<tr>
			<th>No Transaksi</th>
			<th>Tanggal</th>
			<th>Nama Pasien</th>
			<th>Usia</th>
			<th>Jenis Kelamin</th>
			<th>Keluhan</th>
			<th>Nama Poli</th>
			<th>Dokter</th>
			<th>Biaya Administrasi</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
		$sql = "SELECT
		berobat.No_Transaksi,
		berobat.Tanggal_Berobat,
		pasien.Nama_Pasien,
		YEAR ( curdate( ) ) - YEAR ( Tanggal_Lahir ) AS usia,
		pasien.Jenis_Kelamin,
		berobat.Keluhan,
		poli.Nama_Poli,
		dokter.Nama_Dokter,
		berobat.Biaya_Adm 
	FROM
		berobat
		INNER JOIN pasien ON berobat.Pasien_ID = pasien.Pasien_ID
		INNER JOIN dokter ON berobat.Dokter_ID = dokter.Dokter_ID
		INNER JOIN poli ON dokter.Poli_ID = poli.Poli_ID";
		$query = mysqli_query($db, $sql);
		
		while($berobat = mysqli_fetch_array($query)){
			echo "<tr>";
			
			echo "<td>".$berobat['No_Transaksi']."</td>";
			echo "<td>".$berobat['Tanggal_Berobat']."</td>";
			echo "<td>".$berobat['Nama_Pasien']."</td>";
			echo "<td>".$berobat['usia']."</td>";
			echo "<td>".$berobat['Jenis_Kelamin']."</td>";
			echo "<td>".$berobat['Keluhan']."</td>";
			echo "<td>".$berobat['Nama_Poli']."</td>";
			echo "<td>".$berobat['Nama_Dokter']."</td>";
			echo "<td>".$berobat['Biaya_Adm']."</td>";
			echo "<td>";
			echo "<a href='form-edit.php?no_transaksi=".$berobat['No_Transaksi']."'>Edit</a> | ";
			echo "<a href='hapus.php?no_transaksi=".$berobat['No_Transaksi']."'>Hapus</a>";
			echo "</td>";
			
			echo "</tr>";
		}		
		?>
		
	</tbody>
	</table>
	
	<p>Total: <?php echo mysqli_num_rows($query) ?></p>
	
	</body>
</html>
