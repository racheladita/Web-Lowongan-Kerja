<?php require_once "head.php";
$con=mysqli_connect("localhost","root","","test") or die ("could not connect to mysql");
$query="UPDATE riwayat_pekerjaan SET idriwayat_pekerjaan='$_POST[idriwayat_pekerjaan]', idpencaker='$_POST[idpencaker]', idbidang = '$_POST[idbidang]', perusahaan = '$_POST[perusahaan]', kota = '$_POST[kota]',bln_masuk = '$_POST[bln_masuk]', thn_masuk = '$_POST[thn_masuk]',bln_lulus = '$_POST[bln_lulus]', thn_lulus = '$_POST[thn_lulus]', deskripsi_pekerjaan = '$_POST[deskripsi_pekerjaan]'";
mysqli_query($con, $query);

header("location:cv.php");
?>