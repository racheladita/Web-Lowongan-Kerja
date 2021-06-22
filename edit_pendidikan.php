<?php require_once "head.php";
$con=mysqli_connect("localhost","root","","test") or die ("could not connect to mysql"); 
$idpencaker=$_SESSION['idpencaker']; 
$edit = mysqli_query($con, "SELECT * FROM riwayat_pendidikan where idpencaker='$idpencaker'");
$r = mysqli_fetch_array($edit)
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Riwayat Pendidikan</title>

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

        <form id="formPendidikan" action="prosesedit.php" method="POST">
			<input type="hidden" name="idriwayat_pendidikan" value="<?php echo $riwayat_pendidikan['idriwayat_pendidikan'] ?>" />
            
             <div class="form-group">
                <label for="idtingkat_pendidikan">Tingkat Pendidikan Terakhir</label>
                <select name="idtingkat_pendidikan" class="form-control">
				<?php $idtingkat_pendidikan = $_GET['idtingkat_pendidikan']; ?>
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
				<?php $jurusan = $r['jurusan']; ?>
                <select name="jurusan" class="form-control">
                <option <?php if (!isset($jurusan)) echo 'selected=""';?>>- Pilih Jurusan Pendidikan -</option>
                <option <?php if (!isset($jurusan) && $jurusan=="Akuntansi") echo 'selected="true"';?>>Akuntansi</option>
				<option <?php if (!isset($jurusan) && $jurusan=="Manajemen") echo 'selected="true"';?>>Manajemen</option>
				<option <?php if (!isset($jurusan) && $jurusan=="Perpajakan") echo 'selected="true"';?>>Perpajakan</option>
                <option <?php if (!isset($jurusan) && $jurusan=="Teknik Arsitektur") echo 'selected="true"';?>>Teknik Arsitektur</option>
                <option <?php if (!isset($jurusan) && $jurusan=="Informatika") echo 'selected="true"';?>>Informatika</option>
				<option <?php if (!isset($jurusan) && $jurusan=="Statistika") echo 'selected="true"';?>>Statistika</option>
                <option <?php if (!isset($jurusan) && $jurusan=="Ilmu Komunikasi") echo 'selected="true"';?>>Ilmu Komunikasi</option>
                <option <?php if (!isset($jurusan) && $jurusan=="Farmasi") echo 'selected="true"';?>>Farmasi</option>
                <option <?php if (!isset($jurusan) && $jurusan=="Teknologi Pangan") echo 'selected="true"';?>>Teknologi Pangan</option>
                <option <?php if (!isset($jurusan) && $jurusan=="Agroekoteknologi") echo 'selected="true"';?>>Agroekoteknologi</option>
                <option <?php if (!isset($jurusan) && $jurusan=="Agribisnis") echo 'selected="true"';?>>Agribisnis</option>
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