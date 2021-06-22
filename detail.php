<?php require_once "head.php"?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cari Lowongan</title>
	<link href="style/style_lowongan.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="style/layout.css" rel="stylesheet" type="text/css"/>
	<style>
		hr{
			background-color: black;
			width: 680px;
		}
	</style>
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                	<?php
						if (isset($_SESSION['idpencaker'])) 
						{
					?>
							<img class="img img-responsive rounded-circle mb-3" width="160" src="uploads/<?php echo $_SESSION['foto_pencaker'] ?>" />
							 <h3><?php echo $_SESSION['nama_pencaker'] ?></h3>
							<p><?php echo $_SESSION['email_pencaker'] ?></p>
							<p><a href="hand.php?act=logout">LOG OUT</a></p>
					<?php
						}
						else
						{ 
					?>
							 <p>Ingin Melamar Pekerjaan ?</p>
							 <h3><a href="login.php">LOGIN</a> </h3><br />
							 <h3><a href="registrasi2.php">REGISTRASI</a></h3>
					<?php } ?>
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
					<table summary="Summary Here" cellpadding="0" cellspacing="0">
						<?php $data->detail($_GET['idloker']) ?>
					</table>
				</div>
    		</div>
            
		</div>
    </div>
</div>

</body>
</html>