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
	
	// buat query update
	$sql = "UPDATE berobat SET Pasien_ID='$pasien', Tanggal_Berobat='$ambiltgl', Dokter_ID='$dokter', Keluhan='$keluhan', Biaya_Adm='$biaya' WHERE No_Transaksi='$notransaksi'";
	$query = mysqli_query($db, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: list-berobat.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
