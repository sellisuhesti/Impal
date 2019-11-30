<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>edit hotel</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Form Edit Hotel</h1>

	<div id="body">
		<a href="<?php echo site_url('Welcome/index')?>">Kembali</a> 
		<?php if($dataEdit){
			$id = $dataEdit->id_hotel;
			$id_hotel = $dataEdit->id_hotel;
			$id_pemilik = $dataEdit->id_pemilik;
			$nama_hotel = $dataEdit->nama_hotel;
			$alamat = $dataEdit->alamat;
			$kota = $dataEdit->kota;
			$rating = $dataEdit->rating;
			}else{
			$id_hotel = "";
			$id_pemilik = "";
			$nama_hotel = "";
			$alamat = "";
			$kota = "";
			$rating = "";

		   } ?>

		<br><br>
			<form action="<?echo site_url('Welcome/update/' .$id) ?>" method="POST">
				ID_Hotel <br>
				<input type="text" name="id_hotel" value="<?php echo $id_hotel ?>" /><br>
				ID_Pemilik <br>
				<input type="text" name="id_pemilik" value="<?php echo $id_pemilik ?>"/><br>
				Nama Hotel <br>
				<input type="text" name="nama_hotel" value="<?php echo $nama_hotel ?>" /><br>
				Alamat <br>
				<input type="text" name="alamat" value="<?php echo $alamat ?>"/><br>
				Kota <br>
				<input type="text" name="kota" value="<?php echo $kota ?>"/><br>
				Rating <br>
				<input type="text" name="rating" value="<?php echo $rating ?>"/><br>
				<br>
				<input type="submit" name="simpan" value="Simpan" />
				
			</form>
				
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>