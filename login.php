<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>
 	<link href="style/style.css" rel="stylesheet" type="text/css" media="screen">
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

 	<form action="hand.php?act=login" method="post" name="form1">
  	<table>
		<tr id="header">
		    <td colspan="2">
		    <h2>Login</h2>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		    <td>Username</td>
		    <td><input type="text" name="username" id="username" placeholder="username"></td>
		</tr>
		<tr>
		    <td>Password</td>
		    <td><input type="password" name="password" id="password" placeholder="password"></td>
		</tr>
		<tr>
		    <td> </td>
		    <td><input type="submit" name="Login" value="Login">
		     	<input type="reset" name="reset" value="Reset"></td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="button" name="regis" value="Registrasi Akun Sekarang?" onclick="window.location='registrasi2.php';">
			</td>
		</tr>
	</table>
	</form>
</body>
</html>
