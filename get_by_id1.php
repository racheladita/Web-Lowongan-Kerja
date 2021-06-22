<?php
  header('Content-Type: application/json');
  $con=mysqli_connect("localhost","root","","test");

  $query = "SELECT * FROM perusahaan, loker, bidang_pekerjaan, tingkat_pendidikan where loker.idbidang=bidang_pekerjaan.idbidang and loker.idtingkat_pendidikan=tingkat_pendidikan.idtingkat_pendidikan and loker.idperusahaan=perusahaan.idperusahaan and loker.idloker = ".$_GET['id'];

  $result = mysqli_fetch_assoc($con->query($query));

  // $data = [];

  // while($row = mysqli_fetch_assoc($result)){
  // 	$data[] = $row;
  // }

  // print_r($data);

	echo json_encode($result);
?>