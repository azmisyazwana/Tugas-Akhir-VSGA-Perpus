<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Formulir Pendaftaran Siswa Baru</h3>
	</header>
	
	<form action="proses-berobat.php" method="POST">
		
		<fieldset>
		
			<p>
				<label for="notransaksi">No Transaksi </label>
				<input type="text" name="notransaksi" placeholder="input no transaksi" />
			</p>
			<p>
				<label for="pasien">Nama Pasien </label>
				<select name="pasien">
					<option>-- Pilih Pasien --</option>
					<?php
							$sql="select * from pasien";

							$hasil=mysqli_query($db,$sql);
							$no=0;
							while ($data = mysqli_fetch_array($hasil)) {
							$no++;
					?>
					<option value="<?php echo $data['Pasien_ID'];?>"><?php echo $data['Nama_Pasien'];?></option>				<?php 
						}
					?>
				</select>
			</p>
			<p>
				<label for="tanggal">Tanggal Berobat </label>
				<select name="tanggal">
					<option value="00">-- Pilih Tanggal --</option>
					<?php
						for($tgl=1; $tgl<=31; $tgl++){
							$tgl_leng=strlen($tgl);
							if ($tgl_leng==1)
								$i="0".$tgl;
							else
								$i=$tgl;
							echo "<option value=$i>$i</option>";
						}
					?>			
				</select>
				<label for="bulan">Bulan </label>
				<select name="bulan">
					<option value="00">-- Pilih Bulan --</option>
					<?php
					$bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
					for($bulan=1; $bulan<=12; $bulan++){
						echo "<option value=$bulan>$bln[$bulan]</option>";
					}
					?>			
				</select>
				<label for="tahun">Tahun </label>
				<input type="text" name="tahun" placeholder="input tahun" />
			</p>
			<p>
				<label for="dokter">Nama Dokter </label>
				<select name="dokter">
				<option>-- Pilih Dokter --</option>
					<?php
							$sql="select * from dokter";

							$hasil=mysqli_query($db,$sql);
							$no=0;
							while ($data = mysqli_fetch_array($hasil)) {
							$no++;
					?>
					<option value="<?php echo $data['Dokter_ID'];?>"><?php echo $data['Nama_Dokter'];?></option>				<?php 
						}
					?>
				</select>		
			</p>
			<p>
				<label for="keluhan">Keluhan </label>
				<input type="text" name="keluhan" placeholder="input data keluhan" />
			</p>
			<p>
				<label for="biaya">Biaya Administrasi </label>
				<input type="text" name="biaya" placeholder="input biaya" />
			</p>
			<p>
				<input type="submit" value="Submit" name="submit" />
				<input type="reset" value="Clear" name="clear" />
			</p>
		
		</fieldset>
	
	</form>
	
	</body>
</html>
