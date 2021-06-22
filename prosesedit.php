<?php require_once "head.php";
$con=mysqli_connect("localhost","root","","test") or die ("could not connect to mysql");
if(isset($_POST['riwayat_pendidikan'])){
$idtingkat_pendidikan = $_POST['idtingkat_pendidikan'];
$jurusan			  = $_POST['jurusan'];
$bln_masuk			  = $_POST['bln_masuk'];
$thn_masuk			  = $_POST['thn_masuk'];
$bln_lulus			  = $_POST['bln_lulus'];
$thn_lulus			  = $_POST['thn_lulus'];
$grade				  = $_POST['grade'];

$query="UPDATE riwayat_pendidikan SET idtingkat_pendidikan='$idtingkat_pendidikan',jurusan='$jurusan',bln_masuk='$bln_masuk',thn_masuk='$thn_masuk', bln_lulus='$bln_lulus',thn_lulus='$thn_lulus',grade='$grade'";
mysqli_query($con, $query);

header("location:cv.php");
}
?>