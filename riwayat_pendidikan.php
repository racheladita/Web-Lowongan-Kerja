<?php require_once "head.php";
// menyimpan data kedalam variabel

$con=mysqli_connect("localhost","root","","test") or die ("could not connect to mysql");

if(isset($_POST['riwayat_pendidikan'])){
$idtingkat_pendidikan = $_POST['idtingkat_pendidikan'];
$idpencaker           = $_POST['idpencaker'];
$jurusan			  = $_POST['jurusan'];
$bln_masuk			  = $_POST['bln_masuk'];
$thn_masuk			  = $_POST['thn_masuk'];
$bln_lulus			  = $_POST['bln_lulus'];
$thn_lulus			  = $_POST['thn_lulus'];
$grade				  = $_POST['grade'];
// query SQL untuk insert data 
$query="INSERT INTO riwayat_pendidikan SET idtingkat_pendidikan='$idtingkat_pendidikan',idpencaker='$idpencaker',jurusan='$jurusan',bln_masuk='$bln_masuk',thn_masuk='$thn_masuk', bln_lulus='$bln_lulus',thn_lulus='$thn_lulus',grade='$grade'";

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
    <title>Riwayat Pendidikan</title>

    <link href="style/layout.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style/bootstrap.min.css" />
	<style>
		body {
			background-image : url(images/watercolor.jpg);
			background-size : cover;
		}
		body h1{
			font-family: "arial black";
			font-size: 48px;
		}
	</style>
</head>
<body class="bg-light">
<br />
<pre><h1>        Riwayat Pendidikan</h1></pre>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <form id="formPendidikan" action="" method="post">
			
			<!--<div class="form-group">
                <label for="idpencaker">Nama</label><br/>
				$con= mysqli_connect("$db_host","$db_username","$db_password", "$db_database") or die ("could not connect to mysql");
				$result = mysqli_query($con,"SELECT idpencaker FROM pencaker ");
				while($data = mysqli_fetch_array($result)){
					echo $data['idpencaker'];
				}
            </div> -->
			<input type="hidden" name="idriwayat_pendidikan" value="<?php echo $riwayat_pendidikan['idriwayat_pendidikan'] ?>" />
           <input type="hidden" name="idpencaker" value="<?= $_SESSION['idpencaker'] ?>">
             <div class="form-group">
                <label for="idtingkat_pendidikan">Tingkat Pendidikan Terakhir</label>
                <select name="idtingkat_pendidikan" class="form-control">
				<?php
				$result = mysqli_query($con,"SELECT * FROM tingkat_pendidikan ORDER BY idtingkat_pendidikan");
				echo "<option value='belum milih' selected>- Pilih Pendidikan Terakhir -</option>";
				?>
				<?php
				if(mysqli_num_rows($result)){ ?>
					<?php while($row_tingkat_pendidikan = mysqli_fetch_array($result)){?>
						<option value="<?php echo $row_tingkat_pendidikan['idtingkat_pendidikan']?>">
						<?php echo $row_tingkat_pendidikan['keterangan']?></option>
					<?php } ?>
					<?php } ?>
				
            </select>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select name="jurusan" class="form-control">
                <option value="">- Pilih Jurusan Pendidikan -</option>
                <option value="Akuntansi">Akuntansi</option>
				<option value="Manajemen">Manajemen</option>
				<option value="Perpajakakan">Perpajakan</option>
                <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                <option value="Informatika">Informatika</option>
				<option value="Statistika">Statistika</option>
                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                <option value="Farmasi">Farmasi</option>
                <option value="Teknologi Pangan">Teknologi Pangan</option>
                <option value="Agroekoteknologi">Agroekoteknologi</option>
                <option value="Agribisnis">Agribisnis</option>
            </select>
            </div>

            <div class="form-group">
                <label for="bln_masuk">Bulan Masuk</label>
                <select name="bln_masuk" class="form-control">
                <option value="">Bulan Masuk</option>
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
                <option value="">Tahun Masuk</option>
                <?php for($i=date('Y'); $i>=date('Y')-50; $i-=1)
				{
					echo "<option value='$i'>$i</option>";
				}
				?>
            </select>
            </div>
			
            <div class="form-group">
                <label for="bln_lulus">Bulan Lulus</label>
                <select name="bln_lulus" class="form-control">
                <option value="">Bulan Lulus</option>
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
                <label for="thn_lulus">Tahun Lulus</label>
                <select name="thn_lulus" class="form-control">
                <option value="">Tahun Lulus</option>
                <?php for($i=date('Y'); $i>=date('Y')-50; $i-=1)
				{
					echo "<option value='$i'>$i</option>";
				}
				?>
            </select>
            </div>

            <div class="form-group">
                <label for="grade">Grade</label><br />
                &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="grade" value="A"> A <br />
            	&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="grade" value="B"> B <br />
				&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="grade" value="C"> C <br />
            </div>
			
            <div>
            <input type="submit" class="btn btn-success btn-block" name="riwayat_pendidikan" value="Submit" />
            <input type="button" class="btn btn-success btn-block" name="riwayat_pendidikan" value="Batal" onclick="location.href='cv.php';"/><br />
			</div>
			
        </form>
            
        </div>

    </div>
</div>

</body>
</html>