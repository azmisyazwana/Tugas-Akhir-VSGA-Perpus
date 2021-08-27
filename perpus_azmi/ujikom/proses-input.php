<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){
	
	// ambil data dari formulir
	$notransaksi = $_POST['notransaksi'];
	$pasien = $_POST['pasien'];
	//$ambiltgl= $_POST['tahun']."/".$_POST['bulan']."/".$_POST['tanggal'];
	$ambiltgl = $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
	$dokter = $_POST['dokter'];
	$keluhan = $_POST['keluhan'];
	$biaya = $_POST['biaya'];
	
	// buat query
	$sql = "INSERT INTO berobat (No_Transaksi, Pasien_ID, Tanggal_Berobat, Dokter_ID, Keluhan, Biaya_Adm) VALUE ('$notransaksi', '$pasien', '$ambiltgl', '$dokter', '$keluhan', '$biaya')";
	$query = mysqli_query($db, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: list-berobat.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: list-berobat.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
