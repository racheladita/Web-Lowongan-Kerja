<?php require_once "head.php";
$con=mysqli_connect("localhost","root","","test") or die ("could not connect to mysql");
if (mysqli_connect_errno()) {
    die("Could not connect to the database: <br />" . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $query = "DELETE FROM riwayat_pekerjaan";

    // Execute the query
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Could not query the database: <br />" . mysqli_connect_error());
    } else {
        ?><center><?php echo "Data has been deleted.<br /><br />";?></center>
        <center><?php
        echo "<a href=\"cv.php\">Back to curriculum vitae</a>";?></center><?php
        mysqli_close($con);
        exit;
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Delete Pendidikan</title>
<style>
.error {color: #FF0000;}
</style>
</head>

<body>
<center><h2>Delete Confirmation</h2></center>
<center><p>Are you sure you want to delete?</p></center>

<form method="POST" autocomplete="on"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ;?>">
<center><input type="submit" name="submit" value="Yes" />
<input type="button" value="No"
    onclick="history.back()" /></center>
</form>
</body>
</html>

<?php
mysqli_close($con);
?>
