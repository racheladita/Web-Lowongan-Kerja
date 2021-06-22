<?php require_once "head.php";
// menyimpan data kedalam variabel

$con=mysqli_connect("localhost","root","","test") or die ("could not connect to mysql");

if(isset($_POST['riwayat_pekerjaan'])){
$idbidang	= $_POST['idbidang'];
$idriwayat_pekerjaan = $_POST['idriwayat_pekerjaan'];
$idpencaker = $_POST['idpencaker'];
$perusahaan	= $_POST['perusahaan'];
$kota	    = $_POST['kota'];
$bln_masuk	= $_POST['bln_masuk'];
$thn_masuk	= $_POST['thn_masuk'];
$bln_lulus  = $_POST['bln_lulus'];
$thn_lulus  = $_POST['thn_lulus'];
$deskripsi_pekerjaan	= $_POST['deskripsi_pekerjaan'];
// query SQL untuk insert data 
$query="INSERT INTO riwayat_pekerjaan SET idriwayat_pekerjaan='$idriwayat_pekerjaan', idpencaker='$idpencaker', idbidang='$idbidang', perusahaan='$perusahaan',kota='$kota',bln_masuk='$bln_masuk',thn_masuk='$thn_masuk', bln_lulus='$bln_lulus',thn_lulus='$thn_lulus',deskripsi_pekerjaan='$deskripsi_pekerjaan'";

mysqli_query($con, $query);
header("location:cv.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menambah Riwayat Pekerjaan</title>

    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <style>
		p{
			font-size:36px;
		}
		body {
			background-image:url(images/p.png);
			background-size:cover;
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
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <p>Riwayat Pekerjaan</p>
        <form id="formRegistration" action="" method="POST">      
            <input type="hidden" name="idriwayat_pekerjaan" value="<?php echo $riwayat_pekerjaan['idriwayat_pekerjaan'] ?>" />
           <input type="hidden" name="idpencaker" value="<?= $_SESSION['idpencaker'] ?>">

             <div class="form-group">
                <label for="idbidang">Bidang Kerja</label>
                <select name="idbidang" class="form-control">
				<?php
				$result = mysqli_query($con,"SELECT * FROM bidang_pekerjaan ORDER BY idbidang");
				echo "<option value='belum milih' selected>- Pilih bidang -</option>";
				?>
				<?php
				if(mysqli_num_rows($result)){ ?>
					<?php while($row_bidang_pekerjaan = mysqli_fetch_array($result)){?>
						<option value="<?php echo $row_bidang_pekerjaan['idbidang']?>">
						<?php echo $row_bidang_pekerjaan['namab']?></option>
					<?php } ?>
					<?php } ?>
				
            </select>
            </div>

			<div class="form-group">
                <label for="perusahaan">Perusahaan</label>
                <input class="form-control" type="text" name="perusahaan" placeholder="Perusahaan" />
            </div>
            
            <div class="form-group">
                <label for="kota">Kota</label>
                <input class="form-control" type="text" name="kota" placeholder="Kota" />
            </div>
            
             <div class="form-group">
                <label for="bln_masuk">Bulan Masuk</label>
                <select name="bln_masuk" class="form-control">
                <option value="">- Bulan Masuk -</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
            </div>
            <div class="form-group">
                <label for="thn_masuk">Tahun Masuk</label>
                <select name="thn_masuk" class="form-control">
                <option value="">- Tahun Masuk -</option>
                <?php for($i=date('Y'); $i>=date('Y')-50; $i-=1)
                {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="bln_lulus">Bulan Keluar</label>
                <select name="bln_lulus" class="form-control">
                <option value="">- Bulan Keluar -</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
            </div>
			
            <div class="form-group">
                <label for="thn_lulus">Tahun Keluar</label>
                <select name="thn_lulus" class="form-control">
                <option value="">- Tahun Keluar -</option>
                <?php for($i=date('Y'); $i>=date('Y')-50; $i-=1)
                {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label><br />
                <textarea name="deskripsi_pekerjaan" rows="5" cols="58" placeholder="Tuliskan deskripsi pekerjaan Anda sebelumnya secara singkat"></textarea>
            </div><br />


            <input type="submit" class="btn btn-success btn-block" name="riwayat_pekerjaan" value="Submit" />
            <input type="button" class="btn btn-success btn-block" name="riwayat_pekerjaan" value="Batal" onclick="location.href='cv.php';"/><br />

        </form>
            
        </div>

    </div>
</div>

</body>
</html>