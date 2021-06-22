<?php 
Class bigdata
{
	
	function __construct()
	{
		$con=new mysqli("localhost", "root", "", "test");
	}
	function login($username,$password){
		$con=mysqli_connect("localhost","root","","test");
		$query=mysqli_query($con,"select * from pencaker where idpencaker='$username' and password='$password'");
		$check=mysqli_num_rows($query);
		if ($check > 0) {
			$data=mysqli_fetch_array($query);
			session_start();
			$_SESSION['idpencaker']=$data['idpencaker'];
			$_SESSION['nama_pencaker']=$data['nama'];
			$_SESSION['email_pencaker']=$data['email'];
			$_SESSION['foto_pencaker']=$data['foto'];
                $_SESSION["password_pencaker"] = $data["password"];
                $_SESSION["jenis_kelamin_pencaker"] = $data["jenis_kelamin"];
                $_SESSION["tempat_lahir_pencaker"] = $data["tempat_lahir"];
                $_SESSION["tanggal_lahir_pencaker"] = $data["tanggal_lahir"];
                $_SESSION["alamat_pencaker"] = $data["alamat"];
                $_SESSION["kota_pencaker"] = $data["kota"];
                $_SESSION["no_telp_pencaker"] = $data["no_telp"];
                $_SESSION["kota_pencaker"] = $data["kota"];
                $_SESSION["bdg_pekerjaan_pencaker"] = $data["bidang_pekerjaan"];
                $_SESSION["tgl_daftar_pencaker"] = $data["tgl_daftar"];
			header("location:lowongan.php");
		}
		else{
			?>
			<script type="text/javascript">
				alert("Login gagal, username atau password salah");
				window.location.href="login.php";
			</script>
			<?php
		}
	}

	function apply($idloker,$idpencaker){
		$con=mysqli_connect("localhost","root","","test");
		$query=mysqli_query($con,"SELECT * FROM loker where idloker='$idloker'");
		$data=mysqli_fetch_array($query);
		$q=mysqli_query($con,"SELECT * FROM riwayat_pendidikan where idpencaker='$idpencaker'");
		$d=mysqli_fetch_array($q);
		$tgl="12-10-2018";
		$tgl=date('Y-m-d', strtotime($tgl));
		$status="Dalam Proses Seleksi";
		if($d['idtingkat_pendidikan']==$data['idtingkat_pendidikan'])
		{
			$lokerapply=mysqli_query($con, "INSERT INTO apply_loker SET idloker='$idloker',idpencaker='$idpencaker',tgl_apply='$tgl',status='$status'");
		?>
			<script type="text/javascript">
				alert("Berhasil Apply Lamaran Kerja");
				window.location.href="lowongan.php";
			</script>
		<?php
		}
		else
		{
			echo mysqli_errno($con);
		?>
			<script type="text/javascript">
				alert("Tingkat Pendidikan Tidak Memenuhi Syarat");
				window.location.href="lowongan.php";
			</script>	
		<?php
		}
	}
	
	function tampil_apply($idpencaker){
		$idpencaker=$_SESSION['idpencaker'];
		$con=mysqli_connect("localhost","root","","test");
		$query=mysqli_query($con, "SELECT * FROM loker INNER JOIN apply_loker ON loker.idloker=apply_loker.idloker where apply_loker.idpencaker='$idpencaker' ORDER BY apply_loker.idapply DESC");
		$i=1;
		while($data=mysqli_fetch_array($query)) 
		{
		?>
			<tr>
				<td><center><?php echo $i; ?></center></td>
				<td><?php echo $data['namal']?></td>
				<td><?php echo $data['tgl_apply']; ?></td>
				<td><?php echo $data['status']; ?></td>
			</tr>
		<?php
			$i++;
		}
	}
	
	function daftar($idpencaker,$nama,$password,$jenis_kelamin,$tempat_lahir,$tanggal_lahir,$alamat,$kota,$email,$no_telp,$bidang_pekerjaan,$tgl_daftar){
		$con=mysqli_connect("localhost","root","","test");
		$query=mysqli_query($con,"SELECT * from pencaker where idpencaker='$idpencaker'");
		$check=mysqli_num_rows($query);
		if(!empty($_FILES["foto"]["tmp_name"]))
		{
		    $jenis_gambar=$_FILES['foto']['type'];
		    if($jenis_gambar == "image/jpeg"||$jenis_gambar=="image/jpg"||$jenis_gambar=="image/gif"||$jenis_gambar=="image/png")
		    {
		        $lampiran =($_FILES['foto']['name']);

		        if (move_uploaded_file($_FILES['foto']['tmp_name'],"uploads/".$lampiran)){
		           if ($check == 0) 
		           {
					$q=mysqli_query($con, "INSERT INTO pencaker SET idpencaker='$idpencaker',nama='$nama', password='$password', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kota='$kota', email='$email', no_telp='$no_telp', foto='$lampiran', bidang_pekerjaan='$bidang_pekerjaan', tgl_daftar='$tgl_daftar'");
						if ($q) 
						{
						?>
							<script type="text/javascript">
								alert("Pendaftaran berhasil, silahkan login");
							window.location.href="login.php";
							</script>
						<?php
						}
						else
						{
						?>
							<script type="text/javascript">
								alert("Gagal Registrasi");
								window.location.href="registrasi2.php";
							</script>
						<?php
						}
					}
					else
					{
					?>
						<script type="text/javascript">
							alert("Username sudah digunakan, silahkan gunakan yang lainnya");
							window.location.href="registrasi2.php";
						</script>
					<?php
		} 
		        }
		    }
		}

		
	} 
	function tampil_loker(){
		$con=mysqli_connect("localhost","root","","test");
		$query=mysqli_query($con,"SELECT * FROM perusahaan INNER JOIN loker ON loker.idperusahaan=perusahaan.idperusahaan ORDER BY loker.idloker DESC");
		while ($data=mysqli_fetch_array($query)) {
		?>
			<tr class="light">
				<td><br /><strong><h3><?php echo $data['namal'];?></h3></strong><br />
						  <strong>Nama Perusahaan :</strong>&nbsp;<?php echo $data['namap'];?><br />
						  <strong>Informasi Lowongan :</strong>&nbsp;<?php echo $data['deskripsi_loker'];?><br />
						  <strong>Deadline :</strong>&nbsp;<?php echo $data['tgl_expired'];?><br />
						  <strong><a href="detail.php?idloker=<?= $data['idloker'] ;?>">Detail Lowongan ...</a></strong><br /><br /><hr>
				</td>
			</tr>
		<?php
		}
	} 
	function tampil_cari(){
		?>
		<form action="kategori.php" method="get" />
            <div class="form-group">
                <h1>CARI LOWONGAN</h1>
				<h3>Bidang Pekerjaan : </h3>
				<input type="text" name="cari" style="width:600px;" placeholder="Cari Bidang Pekerjaan">				
				<input type="submit" name="submit" value="Cari" style="width:125px;"></center>
            </div>
        </form>
	<?php 
	}

	function tampil_hasil_cari($cari){
		$con=mysqli_connect("localhost","root","","test");
		if(isset($_GET['cari']))
		{
			$cari = $_GET['cari'];
			$query=mysqli_query($con, "SELECT * FROM perusahaan INNER JOIN (bidang_pekerjaan INNER JOIN loker ON loker.idbidang=bidang_pekerjaan.idbidang) ON loker.idperusahaan=perusahaan.idperusahaan where bidang_pekerjaan.namab like '".$cari."%' ORDER BY loker.idloker DESC");
		}
		else
		{ 
			echo "Bidang Pekerjaan yang Anda Cari Tidak Dapat Ditemukan";
			$query=mysqli_query($con, "SELECT * FROM perusahaan INNER JOIN (bidang_pekerjaan INNER JOIN loker ON loker.idbidang=bidang_pekerjaan.idbidang) ON loker.idperusahaan=perusahaan.idperusahaan");	
		} 
		while ($data=mysqli_fetch_array($query)) 
		{
	?>
			<tr class="light">
				<td><br /><strong><h3><?php echo $data['namal'];?></h3></strong><br />
					  <strong>Nama Perusahaan :</strong>&nbsp;<?php echo $data['namap'];?><br />
					  <strong>Informasi Lowongan :</strong>&nbsp;<?php echo $data['deskripsi_loker'];?><br />
					  <strong>Deadline :</strong>&nbsp;<?php echo $data['tgl_expired'];?><br />
					  <strong><a href="detail.php?idloker=<?= $data['idloker'] ?>">Detail Lowongan ...</a></strong><br /><br /><hr>
				</td>
			</tr>
	<?php
		}
	}

	function detail($idloker){
		$con=mysqli_connect("localhost","root","","test");
		$query=mysqli_query($con, "SELECT * FROM perusahaan, loker, bidang_pekerjaan, tingkat_pendidikan where loker.idbidang=bidang_pekerjaan.idbidang and loker.idtingkat_pendidikan=tingkat_pendidikan.idtingkat_pendidikan and loker.idperusahaan=perusahaan.idperusahaan and loker.idloker='$idloker'");
			$data=mysqli_fetch_array($query);
					?>
				<div class="postsingle">
					<strong><h3><?= $data['namal'] ?></h3></strong>
					<span>Tanggal dibuat : <?= $data['tgl_insert'] ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Tanggal update : <?= $data['tgl_update'] ?></span><br><br><br>
<pre>
<span>Nama Perusahaan : <?= $data['namap'] ?></span><br>
<span>Bidang Pekerjaan : <?= $data['namab'] ?></span><br>
<span>Lulusan : <?= $data['keterangan'] ?></span><br>
<span>Tipe : <?= $data['tipe'] ?></span><br>
<span>Usia : minimal <?= $data['usia_min'] ?> tahun dan maksimal <?= $data['usia_max']?> tahun </span><br>
<span>Gaji : Rp <?= number_format($data['gaji_min'],0,',','.') ?> - Rp <?= number_format($data['gaji_max'],0,',','.')?></span><br>
<span>Contact Person : <?= $data['nama_cp'] ?><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $data['email_cp'] ?><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $data['no_telp_cp'] ?></span><br>
<span>Informasi Lowongan : <br><?= $data['deskripsi_loker'] ?></span><br>
<span>Deadline : <?= $data['tgl_expired'] ?></span><br />
</pre>
					
					<?php 
						if (isset($_SESSION['idpencaker'])) {
							?>
								<form action="hand.php?act=apply" method="post">
									<input type="hidden" name="idloker" value="<?= $data['idloker']; ?>"><br>
									<input type="hidden" name="idpencaker" value="<?= $_SESSION['idpencaker'] ?>">
									<center><button type="submit">Lamar Sekarang</button></center>
									<center><a href="lowongan.php">Kembali</a></center>
								</form>
							<?php		
						}else{
							?>
								<center><a href="lowongan.php">Kembali</a></center>
							<?php
						}
					?>
					<div class="both"></div>
				</div>
			<?php
		
	}

}
$data=new bigdata();
 ?>
