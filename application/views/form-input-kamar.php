<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Input Kamar</title>

	
</head>
<body>

<div id="container">
	<h1>Form Input Kamar</h1>

	<div id="body">
		<a href="<?php echo site_url('Welcome/dataKamar')?>">Kembali</a> 

		<br><br>
			<form action="<?echo site_url('Welcome/insertKamar') ?>" method="POST">
				Nama_Hotel <br>
				<select id="nama_hotel" name="nama_hotel" />
				<?php foreach ($hotel as $h) {
				?>
					<option value="<?php echo $h->id_hotel ?>"><?php echo $h->nama_hotel ?></option>
				<?php } ?>
				</select><br>
				No Kamar <br>
				<input type="text" name="no_kamar" /><br>
				Kelas Kamar <br>
				<input type="text" name="kelas_kamar" /><br>
				Harga Kamar <br>
				<input type="text" name="harga_kamar" /><br>
			
				<br>
				<input type="submit" name="simpan" value="Simpan" />

			</form>
				
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>


</body>

</html>