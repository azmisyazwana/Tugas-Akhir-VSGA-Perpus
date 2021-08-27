<?php

include("config.php");

if( isset($_GET['no_transaksi']) ){
	
	// ambil id dari query string
	$no_transaksi = $_GET['no_transaksi'];
	
	// buat query hapus
	$sql = "DELETE FROM berobat WHERE No_Transaksi='$no_transaksi'";
	$query = mysqli_query($db, $sql);
	
	// apakah query hapus berhasil?
	if( $query ){
		header('Location: list-berobat.php');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>
