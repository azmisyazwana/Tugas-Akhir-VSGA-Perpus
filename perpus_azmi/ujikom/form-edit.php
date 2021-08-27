<?php 

include("config.php");

if( !isset($_GET['no_transaksi']) ){
	// kalau tidak ada id di query string
	header('Location: list-berobat.php');
}

//ambil id dari query string
$no_transaksi = $_GET['no_transaksi'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM berobat WHERE No_Transaksi='$no_transaksi'";
$query = mysqli_query($db, $sql);
$berobat = mysqli_fetch_array($query);

//pisahkan tanggal menggunakan explode
$pecahTanggal = explode("-", $berobat['Tanggal_Berobat']);
$tanggal = $pecahTanggal[2];
$bulan   = $pecahTanggal[1];
$tahun   = $pecahTanggal[0];

//pisahkan tanggal menggunakan substr
//$pecahTanggal = $berobat['Tanggal_Berobat'];
//$tanggal = substr($pecahTanggal,8,2);
//$bulan = substr($pecahTanggal,5,2);
//$tahun = substr($pecahTanggal,0,4);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Siswa | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Formulir Edit Siswa</h3>
	</header>
	
	<form action="proses-edit.php" method="POST">
		
		<fieldset>
			
			<p>
				<label for="notransaksi">No Transaksi </label>
				<input type="text" name="notransaksi" placeholder="input no transaksi" value="<?php echo $berobat['No_Transaksi'] ?>"/>
			</p>
			<p>
				<label for="pasien">Nama Pasien </label>
				<select name="pasien">
					<option>-- Pilih Pasien --</option>
					<?php
					$ambildata = mysqli_query($db, "SELECT * FROM pasien");  //ambil data dari tabel kategori
					while($a=mysqli_fetch_array($ambildata)){   //buat perulangan
						if($a['Pasien_ID'] == $berobat['Pasien_ID']){  //jika id kategori sama dengan id kategori dari variabel $b, maka option selected
						?>
						<option value="<?php echo $a['Pasien_ID'];?>" selected>
						<?php echo $a['Nama_Pasien'];?></option>
					<?php
					}else{   //jika tidak sama maka option tidak selected
						?>
						<option value="<?php echo $a['Pasien_ID'];?>">
						<?php echo $a['Nama_Pasien'];?></option>
					<?php
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="tanggal">Tanggal Berobat </label>
				<select name="tanggal">
					<option value="<?=$tanggal;?>"><?=$tanggal;?></option>
					<?php
						for($tgl=1; $tgl<=31; $tgl++){
							//$tgl_leng=strlen($tgl);
								if ($tgl == $tanggal)
									echo "<option value=$tgl selected>$tgl</option>";
								else
									$i=$tgl;	
									echo "<option value=$tgl>$tgl</option>";
						}
					?>    
                </select>
				<label for="bulan">Bulan </label>
				<select name="bulan">
					<?php
						$mm=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						for($c=1; $c<=12; $c++){
							if ($c == $bulan)
							echo"<option value=$c selected> $mm[$c] </option>";
							else
							echo"<option value=$c> $mm[$c] </option>";
						}
					?>
				</select>
				<label for="tahun">Tahun </label>
				<input type="text" name="tahun" placeholder="input tahun" value="<?php echo substr($berobat['Tanggal_Berobat'],0,4); ?>"/>
			</p>
			<p>
				<label for="dokter">Nama Dokter </label>
				<select name="dokter">
				<option>-- Pilih Dokter --</option>
					<?php
					$ambildatadokter = mysqli_query($db, "SELECT * FROM dokter");  //ambil data dari tabel dokter
					while($a=mysqli_fetch_array($ambildatadokter)){   //buat perulangan
						if($a['Dokter_ID'] == $berobat['Dokter_ID']){  //jika Dokter id sama dengan Dokter id dari variabel $b, maka option selected
						?>
						<option value="<?php echo $a['Dokter_ID'];?>" selected>
						<?php echo $a['Nama_Dokter'];?></option>
					<?php
					}else{   //jika tidak sama maka option tidak selected
						?>
						<option value="<?php echo $a['Dokter_ID'];?>">
						<?php echo $a['Nama_Dokter'];?></option>
					<?php
						}
					}
					?>
				</select>		
			</p>
			<p>
				<label for="keluhan">Keluhan </label>
				<input type="text" name="keluhan" placeholder="input data keluhan" value="<?php echo $berobat['Keluhan'] ?>"/>
			</p>
			<p>
				<label for="biaya">Biaya Administrasi </label>
				<input type="text" name="biaya" placeholder="input biaya" value="<?php echo $berobat['Biaya_Adm'] ?>"/>
			</p>
			<p>
				<input type="submit" value="Submit" name="submit" />
				<input type="reset" value="Clear" name="clear" />
			</p>
		
		</fieldset>	
	
	</form>
	
	</body>
</html>
