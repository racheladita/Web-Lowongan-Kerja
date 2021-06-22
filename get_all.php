<?php
  header('Content-Type: application/json');
  require('koneksi.php');

  $con=new mysqli("localhost", "root", "", "test");
  $query = "SELECT * FROM perusahaan INNER JOIN loker ON loker.idperusahaan=perusahaan.idperusahaan ORDER BY loker.idloker DESC";

  $result = $con->query($query);

  $data = [];

  while($row = mysqli_fetch_assoc($result)){
  	$data[] = $row;
  }

  $output['loker'] = $data;

	echo json_encode($output);
?>