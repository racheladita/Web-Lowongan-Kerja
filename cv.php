<?php require_once "head.php";
	if(!isset($_SESSION['idpencaker'])) header ("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	$idpencaker=$_SESSION['idpencaker'];
	$con=mysqli_connect("localhost","root","","test");
	$query=mysqli_query($con, "SELECT * FROM pencaker WHERE idpencaker='$idpencaker'");
	?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curriculum Vitae</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
		body pre{
			font-size:48px;
			font-family: "Bookman Old Style", serif;
			text-align:center;
			
		}
		body {
			background-image:url(images/birupink1.jpg);
			background-size:cover;
			text-align:center;
			
		}
		.data_pribadi pre{
			font-size:32px;
			font-family: "Bookman Old Style", serif;
			color: #2F4F4F;
			font-weight:bold;
			text-align: center;

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
<?php if(mysqli_num_rows($query)) {?>
			<?php while($row = mysqli_fetch_array($query)) {?>
<div id="cv" style="border: 1px solid #CCC; margin: 30px; padding: 20px; width: 1300px; height: auto; background-color: #FBFBEE; text-align: left;">
<p><pre>Curriculum Vitae</pre></p>

<div class="data_pribadi">
	 <img width="160" src="uploads/<?php echo $row['foto'] ?>"?> 
	<div class="row">
	<form id="cv" action="" enctype="multipart/form-data"> 
		<p><pre>Data Pribadi</pre></p>
	</div>
	<table>
		
	<tr>
		<td>Nama</td>
		<td>: <?php echo $row['nama']?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>: <?php echo $row['jenis_kelamin']?></td>
		</td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>: <?php echo $row['tanggal_lahir']?></td>
	</tr>
	<tr>
		<td>Kota</td>
		<td>: <?php echo $row['kota']?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>: <?php echo $row['alamat']?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: <?php echo $row['email']?></td>
	</tr>
	<tr>
		<td>No Telp</td>
		<td>: <?php echo $row['no_telp']?></td>
	</tr>	

 <?php } ?>
    <?php } ?> 

</table><br/>
</form>

	<td></td><input type="button" name="edit" value="Edit" onclick="window.location='editprofile.php'";/>&nbsp
	<!-- <input type="button" name="delete" value="Hapus" /> -->
	
</div>
<div class="pendidikan">
	<div class="row">
		<form id="cv" action="" >
		<p><pre>Pendidikan</pre></p><br />
	</div>
	<div>
		<?php
			$sql = "SELECT tp.keterangan, rp.jurusan, rp.bln_masuk, rp.thn_masuk, rp.bln_lulus, rp.thn_lulus, rp.grade FROM riwayat_pendidikan rp, tingkat_pendidikan tp WHERE rp.idtingkat_pendidikan=tp.idtingkat_pendidikan and rp.idpencaker='$idpencaker'";
			$query2 = mysqli_query($con, $sql);
			if(!$query2){
				die ('SQL Error: '.mysqli_error($con));
			}
			echo '<table border="collapse" cellpadding=10 width=1200px>
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
					
			while ($row = mysqli_fetch_array($query2)){
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
</form>
</div>

<div class="pengalaman_kerja">
	<div class="row">
		<form id="cv" action="" >
		<p><pre>Pengalaman Kerja</pre></p>
	</div>
	<div>
		<?php
			$sql = "SELECT bp.namab, rk.perusahaan, rk.kota, rk.bln_masuk, rk.thn_masuk, rk.bln_lulus, rk.thn_lulus, rk.deskripsi_pekerjaan FROM riwayat_pekerjaan rk, bidang_pekerjaan bp WHERE bp.idbidang=rk.idbidang and rk.idpencaker='$idpencaker'";
			$query1 = mysqli_query($con, $sql);
			if(!$query1){
				die ('SQL Error: '.mysqli_error($con));
			}
			echo '<table border="collapse" cellpadding=10 width=1200px>
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
					
			while ($row = mysqli_fetch_array($query1)){
				echo '<tr>
							<td align="center">'.$row['namab'].'</td>
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
		<input type="button" name="pekerjaan" value="Insert" onclick="location.href='riwayat_pekerjaan.php';"/>
		<input type="button" name="pekerjaan" value="Update" onclick="location.href='edit_pekerjaan.php';"/>
        <input type="button" name="pekerjaan" value="Delete" onclick="location.href='delete_pekerjaan.php';" /><br /><br /><br />
	</div>
</form>
</div>

<center><a href="apply.php">Lihat Riwayat Lamaran Kerja</a></center>

</body>
</html>