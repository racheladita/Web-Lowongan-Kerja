<?php 
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Akun</title>

    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <style>
		body pre{
			font-size:48px;
			font-family: "Bookman Old Style", serif;
			text-align:center;
			
		}
		body {
			background-image : url('blue_watercolor.jpg');
			background-size : cover;
			
		}
		.data_pribadi pre{
			font-size:32px;
			font-family: "Bookman Old Style", serif;
			color: #2F4F4F;
			font-weight:bold;

		}
		.data_pribadi{
			font-size:16px;
			font-family: "MS Sans Serif", Geneva, sans-serif;
			color: #000;
			margin-left: 60px;

		}
		.pendidikan pre{
			font-size:32px;
			font-family: "Bookman Old Style", serif;
			color: #2F4F4F;
			font-weight:bold;
		}
		.pendidikan{
			font-size:16px;
			font-family: "MS Sans Serif", Geneva, sans-serif;
			color: #000;
			margin-left: 60px;

		}
		.pengalaman_kerja pre{
			font-size:32px;
			font-family: "Bookman Old Style", serif;
			color: #2F4F4F;
			font-weight:bold;
		}
		.pengalaman_kerja{
			font-size:16px;
			font-family: "MS Sans Serif", Geneva, sans-serif;
			color: #000;
			margin-left: 60px;

		}
		
			
		#heading{
			float: left;
			width: 640px;
		}
		#heading a {
			line-height: 65px;
			text-decoration: none;
			padding-left: 60px;
			color:#FFF;
			font-family: aardvark cafe;
			font-size: 40px;
		}
		#menu {
			background:#26C4C2;
			width: 100%;
			height: 65px;
			margin: 0px;
			padding: 0px;
			font-size: 15px;
			
		}
		#menu ul {
			list-style: none;
		
		}
		#menu ul li {
			float: left;
			line-height: 65px
		}
		#menu ul li a {
			float:left; 
			width:167px; 
			display:block; 
			text-align:center; 
			color:#FFF; 
			text-decoration:none; 
		}
		#menu ul ul {
			display:none; 
			list-style:none; 
			position:absolute; 
			background-color:#26C4C2;
			float: none;
			top:65px; 
			width:190px;
		}
		#menu ul li a:hover {
			background-color:#2E9EA2; 
			display:block;
		}
		#menu ul li:hover ul {
			display:block;
		}
		#menu ul ul li a {
			display:block;
			padding-left:30px; 
			text-align:left; 
			width:160px;
			height: 60px;
			line-height: 60px;
		}
		#menu ul ul li a:hover {
			color:#fff;
		}
		
	</style>
</head>
<body class="bg-light">
<nav id="menu">
     <ul>
        <div id="heading">
            <a href="#">Gawean</a></li>
        </div>
        <li><a href="index.html">Home</a></li>
        <li><a href="artikel.html">Cari Lowongan</a></li>
        <li><a href="gambar.html">Curiculum Vitae</a></li>   
        <li><a href="table.html">Contact Us</a></li>
       
    </ul>
</nav><br/>
<div id="cv">
<p><pre>Curriculum Vitae</pre></p>

<div class="data_pribadi">
	<div class="row">
		<form id="cv" action="" >
		<p><pre>Data Pribadi</pre></p>
	</div>
	<table>
	<tr>
		<td>Name</td>
		<td>:</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		</td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
	</tr>
	<tr>
		<td>Kota</td>
		<td>:</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
	</tr>
	<tr>
		<td>No Telp</td>
		<td>:</td>
	</tr>
</table>
</div>

<div class="pendidikan">
	<div class="row">
		<form id="cv" action="" >
		<p><pre>Pendidikan</pre></p><br />
	</div>
	<div>
		<?php
			$con= mysqli_connect("$db_host","$db_username","$db_password", "$db_database") or die ("could not connect to mysql");
			$sql = "SELECT tp.keterangan, rp.jurusan, rp.bln_masuk, rp.thn_masuk, rp.bln_lulus, rp.thn_lulus, rp.grade FROM riwayat_pendidikan rp, tingkat_pendidikan tp WHERE rp.idtingkat_pendidikan=tp.idtingkat_pendidikan";
			$query = mysqli_query($con, $sql);
			if(!$query){
				die ('SQL Error: '.mysqli_error($con));
			}
			echo '<table border="collapse" cellpadding=10>
					<thead>
						<tr>
							<th align="center">Tingkat Pendidikan</th>
							<th align="center">Jurusan</th>
							<th align="center">Bulan Masuk</th>
							<th align="center">Tahun Masuk</th>
							<th align="center">Bulan Lulus</th>
							<th align="center">Tahun Lulus</th>
							<th align="center">Grade</th>
						</tr>
					</thead>
					<tbody>';
					
			while ($row = mysqli_fetch_array($query)){
				echo '<tr>
							<td align="center">'.$row['keterangan'].'</td>
							<td align="center">'.$row['jurusan'].'</td>
							<td align="center">'.$row['bln_masuk'].'</td>
							<td align="center">'.$row['thn_masuk'].'</td>
							<td align="center">'.$row['bln_lulus'].'</td>
							<td align="center">'.$row['thn_lulus'].'</td>
							<td align="center">'.$row['grade'].'</td>
						</tr>';
			}
			echo '
					</tbody>
				</table>';
				
			
		?>
	</div>
	<div>
		<br />
		<input type="button" name="pendidikan" value="Insert" onclick="location.href='riwayat_pendidikan.php';"/>
		<input type="button" name="pendidikan" value="Update" onclick="location.href='edit_pendidikan.php';"//>
        <input type="button" name="pendidikan" value="Delete" onclick="location.href='delete_pendidikan.php';"/><br />
	</div>
</div>

<div class="pengalaman_kerja">
	<div class="row">
		<form id="cv" action="" >
		<p><pre>Pengalaman Kerja</pre></p>
	</div>
	<div>
		<?php
			$con= mysqli_connect("$db_host","$db_username","$db_password", "$db_database") or die ("could not connect to mysql");
			$sql = "SELECT bp.bidang, rk.perusahaan, rk.kota, rk.bln_masuk, rk.thn_masuk, rk.bln_lulus, rk.thn_lulus, rk.deskripsi_pekerjaan FROM riwayat_pekerjaan rk, bidang_pekerjaan bp WHERE bp.id_bidang=rk.id_bidang";
			$query = mysqli_query($con, $sql);
			if(!$query){
				die ('SQL Error: '.mysqli_error($con));
			}
			echo '<table border="collapse" cellpadding=10>
					<thead>
						<tr>
							<th align="center">Bidang Pekerjaan</th>
							<th align="center">Perusahaan</th>
							<th align="center">Kota</th>
							<th align="center">Bulan Masuk</th>
							<th align="center">Tahun Masuk</th>
							<th align="center">Bulan Lulus</th>
							<th align="center">Tahun Lulus</th>
							<th align="center">Deskripsi Pekerjaan</th>
						</tr>
					</thead>
					<tbody>';
					
			while ($row = mysqli_fetch_array($query)){
				echo '<tr>
							<td align="center">'.$row['bidang'].'</td>
							<td align="center">'.$row['perusahaan'].'</td>
							<td align="center">'.$row['kota'].'</td>
							<td align="center">'.$row['bln_masuk'].'</td>
							<td align="center">'.$row['thn_masuk'].'</td>
							<td align="center">'.$row['bln_lulus'].'</td>
							<td align="center">'.$row['thn_lulus'].'</td>
							<td align="center">'.$row['deskripsi_pekerjaan'].'</td>
						</tr>';
			}
			echo '
					</tbody>
				</table>';
				
			
		?>
	</div>
	<div>
		<br >
		<input type="button" name="pekerjaan" value="Insert" onclick="location.href='a_riwayat_pekerjaan.php';"/>
		<input type="button" name="pekerjaan" value="Update" onclick="location.href='edit_pekerjaan.php';"/>
        <input type="button" name="pekerjaan" value="Delete" onclick="location.href='delete_pekerjaan.php';" /><br /><br /><br />
	</div>
</div>

</body>
</html>