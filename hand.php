<?php 
include "root.php";
if (isset($_GET["act"])) {
	if ($_GET["act"]=="login") {
		$data->login($_POST['username'],$_POST['password']);
	}
	if ($_GET["act"]=="daftar") {
		$data->daftar($_POST['idpencaker'],$_POST['nama'],$_POST['password'],$_POST['jenis_kelamin'],$_POST['tempat_lahir'],$_POST['tanggal_lahir'],$_POST['alamat'],$_POST['kota'],$_POST['email'],$_POST['no_telp'],$_POST['bidang_pekerjaan'],$_POST['tgl_daftar']);
	}
	if ($_GET["act"]=="logout") {
		session_start();
		unset($_SESSION['idpencaker'],$_SESSION['nama_pencaker'],$_SESSION['email_pencaker'],$_SESSION['foto_pencaker']);
		header("location:home.php");
	}
	if ($_GET["act"]=="apply") {
		$data->apply($_POST['idloker'],$_POST['idpencaker']);		
	}
}
 ?>