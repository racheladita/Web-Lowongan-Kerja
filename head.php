<?php include "root.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/layout.css">
</head>
<body>
<nav id="menu">
     <ul>
        <div id="heading">
            <a href="#">Gawean</a></li>
        </div>
        <li><a href="home.php">Home</a></li>
        <li><a href="lowongan.php">Cari Lowongan</a></li>
        <li><a href="cv.php">Curriculum Vitae</a></li>   
    	<?php
			session_start();
			if (isset($_SESSION['idpencaker'])) 
			{
		?>
				<li><a href="hand.php?act=logout">Log Out</a></li>
		<?php
			}
			else
			{ 
		?>
				<li><a href="login.php">Login</a></li>
		<?php 
			} 
		?>
    </ul>
</nav>

