<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>admin</title>

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
	<h1>Admin myHotel</h1>

	<div id="body">
		<a href="<?php echo site_url('Welcome/form_input')?>">Tambah Data</a> 

		<br><br>
		<table border="1">
			<tr>
				<td>No</td>
				<td>id_hotel</td>
				<td>id_pemilik</td>
				<td>nama_hotel</td>
				<td>alamat</td>
				<td>kota</td>
				<td>rating</td>
				<td>Fasilitas</td>
				<td>Aksi</td>

			</tr>
			<?php 
			$no = 1;
			foreach($hasil as $r){ ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $r['id_hotel']?></td>
				<td><?php echo $r['id_pemilik']?></td>
				<td><?php echo $r['nama_hotel']?></td>
				<td><?php echo $r['alamat']?></td>
				<td><?php echo $r['kota']?></td>
				<td><?php echo $r['rating']?></td>
				<td><?php echo $r['fasilitas']?></td>
				<td>

					<a href="<?php echo site_url('Welcome/form_edit/' .$r['id_hotel'])?>">Edit</a> |
					<a href="<?php echo site_url('Welcome/delete/' .$r['id_hotel'])?>" onclick="return confirm('Yakin Ingin Menghapus Data')">Hapus</a>
					
				</td>
			</tr>
		<?php } ?>
		</table>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>