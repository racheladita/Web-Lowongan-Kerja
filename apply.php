<?php require_once "head.php"; ?>

<html lang="en">
<head>
    <title>Curriculum Vitae</title>
</head>
<body>
<div class="container">
	<br><br>
<center>
	<table summary="Summary Here" cellpadding="0" cellspacing="0" border= 1px solid width=750px>
		<tr>
			<th>NO</th>
			<th>Nama Loker</th>
			<th>Tanggal Apply</th>
			<th>Status</th>
		</tr>
		<?php $data->tampil_apply('$idpencaker') ?>
	</table>
</center>
<br><br>
<center><a href="cv.php">Kembali</a></center>
</div>
</body>
</html>