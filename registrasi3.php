<?php
require_once 'head.php';

$myConnection= mysqli_connect("localhost","root","","test") or die ("could not connect to mysql");


//menyimpan data kedalam variabel
if(isset($_POST['register'])){
$idpencaker         = $_POST['idpencaker'];
$nama          		= $_POST['nama'];
$password			= $_POST['password'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$tempat_lahir		= $_POST['tempat_lahir'];
$tanggal_lahir	    = $_POST['tanggal_lahir'];
$alamat          	= $_POST['alamat'];
$kota		        = $_POST['kota'];
$email		        = $_POST['email'];
$no_telp			= $_POST['no_telp'];
$bidang_pekerjaan   = $_POST['bidang_pekerjaan'];
$tgl_daftar			= $_POST['tgl_daftar'];

//$namafolder="uploads/";

if(!empty($_FILES["foto"]["tmp_name"]))

{
    $jenis_gambar=$_FILES['foto']['type'];
    if($jenis_gambar == "image/jpeg"||$jenis_gambar=="image/jpg"||$jenis_gambar=="image/gif"||$jenis_gambar=="image/png")
    {
        $lampiran =($_FILES['foto']['name']);

        if (move_uploaded_file($_FILES['foto']['tmp_name'],"uploads/".$lampiran)){
            $query_insert= "INSERT INTO pencaker (idpencaker, nama, password, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, kota, email, no_telp, foto, bidang_pekerjaan, tgl_daftar) VALUES ('$idpencaker', '$nama', '$password', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$kota', '$email', '$no_telp', '$lampiran', '$bidang_pekerjaan', '$tgl_daftar')";

            mysqli_query($myConnection, $query_insert);
        }
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Akun</title>

    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link href="style/regis-style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>



<body >

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <h2><b>REGISTRASI</h2><br />

        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

        <form id="formRegistration"  action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="idpencaker">Username</label>
                <input class="form-control" type="text" name="idpencaker" size="45" placeholder="Username" required />
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" size="45" placeholder="Nama" required />
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required/>
            </div>


            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label><br />
                &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="jenis_kelamin" value="L"> Pria <br />
            	&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="jenis_kelamin" value="P"> Wanita
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input class="form-control" type="text" name="tempat_lahir" size="20" placeholder="Tempat Lahir" required/>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required/>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control" type="text" name="alamat" size="100" placeholder="Alamat" required/>
            </div>

            <div class="form-group">
                <label for="kota">Kota</label>
                <input class="form-control" type="text" name="kota" placeholder="Kota" required/>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email" required/>
            </div>

            <div class="form-group">
                <label for="no_telp">Nomor Telepon</label>
                <input class="form-control" type="text" name="no_telp" size="12" placeholder="Nomor Telepon" required/>
            </div>

            

            <div class="form-group">
                <label for="foto">Foto Profil</label>
                <input class="form-control" type="file" name="foto" id="foto" />
            </div>

            <div class="form-group">
                <label for="bidang_pekerjaan">Bidang Kerja</label>
                
                <select name="bidang_pekerjaan" class="form-control">

                <?php
                $con=mysqli_connect("localhost","root","","test");
                $result = "SELECT * FROM bidang_pekerjaan ORDER BY idbidang";
                $resultSet = mysqli_query($con, $result);
                 echo "<option value='belum milih' selected>- Pilih bidang -</option>";
                ?>
                <?php
                    if(mysqli_num_rows($resultSet)){ ?>
                    <?php while($row_bidang_pekerjaan = mysqli_fetch_array($resultSet)){?>
                        <option value="<?php echo $row_bidang_pekerjaan['idbidang']?>">
                        <?php echo $row_bidang_pekerjaan['namab']?></option>
                    <?php } ?>
                <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="tgl_daftar">Tanggal Daftar</label>
                <input class="form-control" type="date" name="tgl_daftar"/>
            </div>
                
            <pre>
            <input  type="submit" class="btn btn-success btn-block" name="register" id="register" value="Daftar" />

        </form>

<script>
    var result;

    function validateForm() {
    if(document.forms["formRegistration"]["nama"].value == ""){
        alert("Please fill your name.");
        document.forms["formRegistration"]["nama"].focus();
        return false;
    }else if (! document.forms["formRegistration"]["nama"].value.match(/^[a-zA\s]{3,50}$/)) {
            alert("Please match the requested format of name.");
            document.forms["formRegistration"]["nama"].focus();
            return false;
        }

    if(document.forms["formRegistration"]["jenis_kelamin"].value == ""){
        alert("Please select your gender.");
        return false;
    }

        if (document.forms["formRegistration"]["jenis_kelamin"].value == "") {
            alert("Please select your gender.");
            return false;
        }

    if (document.forms["formRegistration"]["alamat"].value == "") {
            alert("Please fill your address.");
            document.forms["formRegistration"]["alamat"].focus();
            return false;
        } else if (! document.forms["formRegistration"]["alamat"].value.match(/^[a-zA-Z0-9\s,._:-]{3,100}$/)) {
            alert("Please match the requested format of address.");
            document.forms["formRegistration"]["alamat"].focus();
            return false;
        }

    if (document.forms["formRegistration"]["email"].value == "") {
            alert("Please fill your email.");
            document.forms["formRegistration"]["email"].focus();
            return false;
        } else if (! document.forms["formRegistration"]["email"].value.match(/^[^@\s]+@[^@\s]+\.[^@\s]+$/)) {
            alert("Please match the requested format of email.");
            document.forms["formRegistration"]["email"].focus();
            return false;
        }
        return true;
    }
    
    function removeSpaces(string) {
        return string.split(" ").join("");
    }

    $(document).ready(function(){
        $('#register').click(function(){
            var image_name = $('#foto').val();
            if(image_name == '')
            {
                alert("Please Select image");
                return false;
            }
            else
            {
                var extension = $('#foto').val().split('.').pop().tolowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg'])== -1)
                {
                    alert('Invalid Image File');
                    $('#foto').val('');
                    return false;
                }
            }
        ))
</script>
            
        </div>

    </div>
</div>

</body>
</html>