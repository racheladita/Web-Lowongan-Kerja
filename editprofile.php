<?php require_once "head.php"?>


<?php
	$idpencaker=$_SESSION['idpencaker'];
    $con=mysqli_connect("localhost","root","","test");
	$edit = mysqli_query($con, "SELECT * FROM pencaker WHERE idpencaker='$idpencaker'");
	$row_edit = mysqli_fetch_array($edit);
	$bdg_pekerjaan = mysqli_query($con, "SELECT * FROM bidang_pekerjaan ORDER BY namab ");

	if(isset($_POST['edit'])){
		//$id_akun			= $_POST['id_akun'];
		$name          		= $_POST['nama'];
		$password			= $_POST['password'];
		//$jenis_kelamin      = $_POST['jenis_kelamin'];
		//$tempat_lahir		= $_POST['tempat_lahir'];
		//$tanggal_lahir	    = $_POST['tanggal_lahir'];
		$alamat          	= $_POST['alamat'];
		$kota		        = $_POST['kota'];
		$email		        = $_POST['email'];
		$no_telp			= $_POST['no_telp'];
		//$bidang_pekerjaan   = $_POST['bidang_pekerjaan'];
		//$tgl_daftar			= $_POST['tgl_daftar'];
		$file_name 			= $_FILES['foto']['name'];
		$tmp_name 			= $_FILES['foto']['tmp_name'];
		if ($file_name== "" || empty($file_name)){
		mysqli_query($con, "UPDATE pencaker SET nama = '$name', password = '$password', alamat = '$alamat', kota = '$kota', email = '$email', no_telp = '$no_telp' WHERE idpencaker = '$idpencaker'");
		}else {
			move_uploaded_file($tmp_name, "uploads/".$file_name);
			mysqli_query($con, "UPDATE pencaker SET nama = '$name', password = '$password', alamat = '$alamat', kota = '$kota', email = '$email', no_telp = '$no_telp', foto = '$file_name' WHERE idpencaker = '$idpencaker'");
		}
		header("location:cv.php");
	}
?>

<!-- 	<?php //if($row_edit['foto']==""){
		//echo "<img src='uploads/biru.jpg'>";
		//}else {?> <img src="uploads/<?php //echo $row_edit["foto"?>">
		<?php //} ?>

	} -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profil Pencari Kerja</title>

    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link href="style/regis-style.css" rel="stylesheet" type="text/css" media="screen"/>

    <style>
        body {
            background-image : url(images/1.jpg);
            background-size : cover;
        }
    </style>
</head>



<body >
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <h2><b>EDIT PROFILE</h2><br />

        <form id="formRegistration"  action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" size="45" placeholder="Nama" value="<?php echo $row_edit['nama']?>" />
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Buat Password Baru" value="<?php echo $row_edit['password']?>"/>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control" type="text" name="alamat" size="100" placeholder="Alamat" value="<?php echo $row_edit['alamat']?>"/>
            </div>

            <div class="form-group">
                <label for="kota">Kota</label>
                <input class="form-control" type="text" name="kota" placeholder="Kota" value="<?php echo $row_edit['kota']?>"/>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email" value="<?php echo $row_edit['email']?>"/>
            </div>

            <div class="form-group">
                <label for="no_telp">Nomor Telepon</label>
                <input class="form-control" type="text" name="no_telp" size="12" placeholder="Nomor Telepon" value="<?php echo $row_edit['no_telp']?>"/>
            </div>

            
              <div class="form-group">
                <label for="foto">Pilih Foto Profil</label>
                <input class="form-control" type="file" name="foto" id="foto" />
            </div> 

        <!--     <div class="form-group">
                <label for="bidang_pekerjaan">Bidang Kerja</label>
            
                <select name="bidang_pekerjaan" class="form-control">
                <option value="">Pilih Bidang</option>
                <?php //if(mysqli_num_rows($bdg_pekerjaan)) {?>
                <?php //while($row_bdg = mysqli_fetch_array($bdg_pekerjaan)) {?>

                <option <?php //echo $row_edit['bidang_pekerjaan']== $row_bdg['idbidang'] ? "selected='selected'" : "" ?> value="<?php //echo $row_bdg['idbidang'] ?>"><?php //echo $row_bdg['nama']?></option>
                <?php// } ?>
                <?php //} ?>
                </select>
            </div>
             -->
                
            <pre>
            <input  type="submit" class="btn btn-success btn-block" name="edit" id="edit" value="Simpan" />
            <input  type="button" class="btn btn-success btn-block" name="batal" id="batal" onclick="window.location='cv.php'" value="Batal" />

        </form>
</body>
</html>