<?php
  
  ob_start();
  session_start();
  if(!isset($_SESSION['akun_username'])) header("location: home.php");
  include "koneksi.php";

?>

<html>
<head>
  <title>Hasil Login</title>
  <link rel="stylesheet" type="text/css" href="style/style.css"> 
</head>
<body>
    <form action="proseslogin.php" method="post" name="form1">
    <table>
    <tr>
        <td>
          <?php
            include "koneksi.php";

            
            if(isset($_POST['login'])){
              $name = $_POST['name'];
              $password = $_POST['password'];

              $user=mysqli_query($koneksi, "SELECT * FROM pencaker WHERE name='$name' AND password='$password'");
            
         //    $match=mysqli_num_rows($user);
     
            // if($match == 1)
            // {
            //    echo "<h2>Hallo $name</h2>";
            // } 
            // else
            // {
            //    echo "<h2>Login Gagal</h2>";
            // }

              if(mysqli_num_rows($user)>0){
                $row_akun = mysqli_fetch_array($user);
                $_SESSION['akun_id'] = $row_akun['idpencaker'];
                $_SESSION['akun_username']= $row_akun['name'];
                $_SESSION["akun_password"] = $row_akun["password"];
                $_SESSION["akun_jenis_kelamin"] = $row_akun["jenis_kelamin"];
                $_SESSION["akun_tempat_lahir"] = $row_akun["tempat_lahir"];
                $_SESSION["akun_tanggal_lahir"] = $row_akun["tanggal_lahir"];
                $_SESSION["akun_alamat"] = $row_akun["alamat"];
                $_SESSION["akun_kota"] = $row_akun["kota"];
                $_SESSION["akun_email"] = $row_akun["email"];
                $_SESSION["akun_no_telp"] = $row_akun["no_telp"];
                $_SESSION["akun_foto"] = $row_akun["foto"];
                $_SESSION["akun_kota"] = $row_akun["kota"];
                $_SESSION["akun_bdg_pekerjaan"] = $row_akun["bidang_pekerjaan"];
                $_SESSION["akun_tgl_daftar"] = $row_akun["tgl_daftar"];
              }else {
                header ("location: login.php?login-gagal");
              }
            }

          ?>
        </td>
      </tr>
  </table>
  </form>
</body>
</html>

<?php
    
    mysqli_close($koneksi);
    ob_end_flush();

?>