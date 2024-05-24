<?php
	error_reporting(0);
	session_start();
	if (empty($_SESSION['id']) AND empty($_SESSION['nama']) AND empty($_SESSION['level'])){
		header('location:login.php');
	}else if ($_SESSION['level'] != 'Admin'){
		header('location:login.php');	
	}else if ($_SESSION['level'] == 'Admin'){
		
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>SPRINTER</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<nav class="left">
					<a href="#menu"><span>Menu</span></a>
				</nav>
				<a href="index.php" class="logo"><font color= "white">Sistem Penjadwalan Praktikum Lab Komputer</font></a>
				
			</header>

		<!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="">Master Prodi</a></li>
					<li><a href="">Master Mata Kuliah</a></li>
					<li><a href="">Master Waktu</a></li>
					<li><a href="">Input Jadwal</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
				
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="content">
					<p><br><br><br><br><br><br><br></p>
					<ul class="actions">
						<li><a href="#one" class="button scrolly">Tambah Jadwal</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
			<div class="inner">
			<h1>TAMBAH DATA</h1>
			<!--form-->
			<!--
			<form method="post" action="insertData.php">
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="nik" id="nik" placeholder="Nomer Induk Kependudukan" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="text" name="nama" id="nama" placeholder="Nama Lengkap" />
											</div>
											<div class="6u 12u$(xsmall)">
												<div class="select-wrapper">
													<select name="gender" >
														<option value="">- Jenis Kelamin -</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
												</div>
											</div>
									
											<div class="6u$ 12u$(xsmall)">
												<input type="text" name="pob" id="pob" placeholder="Tempat Lahir" />
											</div>
											<div class="6u 12u$(xsmall)">
												<input type="text" name="dob" id="dob" placeholder="Tanggal Lahir (YYYYMMDD)" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="text" name="agama" id="agama" placeholder="Agama" />
											</div>
											<div class="6u 12u$(xsmall)">
												<input type="text" name="kk" id="kk" placeholder="No. KK (Kosongkan jika belum punya)" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="text" name="akte" id="akte" placeholder="No. Akte Lahir (Kosongkan jika belum punya)" />
											</div>
											<div class="6u 12u$(xsmall)">
												<div class="select-wrapper">
													<select name="pendidikan" >
														<option value="">- Pendidikan -</option>
														<option value="tidak bersekolah">Tidak Bersekolah</option>
														<option value="SD">SD (Sederajat)</option>
														<option value="SMP">SMP (Sederajat)</option>
														<option value="SMA">SMA/SMK (Sederajat)</option>
														<option value="S1">Strata 1 </option>
														<option value="S2">Strata 2 </option>
														<option value="S3">Strata 3 </option>
													</select>
												</div>
											</div>
											<div class="6u$ 12u$(xsmall)">
												<div class="select-wrapper">
													<select name="status" >
														<option value="">- Status Perkawinan -</option>
														<option value="Kawin Dengan Surat Nikah">Kawin Dengan Surat Nikah</option>
														<option value="Kawin Tanpa Surat Nikah">Kawin Tanpa Surat Nikah</option>
														<option value="Belum Kawin">Belum Kawin</option>
													</select>
												</div>
											</div>
											<div class="6u 12u$(xsmall)">
												<input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan saat ini" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<div class="select-wrapper">
													<select name="penghasilan" >
														<option value="">- Penghasilan per Bulan -</option>
														<option value="Di Bawah 3 Juta">Di Bawah 3 Juta</option>
														<option value="3 - 5 juta">3 - 5 juta</option>
														<option value="5 - 10 Juta">5 - 10 Juta</option>
														<option value="Di Atas 10 Juta">Di Atas 10 Juta</option>
													</select>
												</div>
											</div>
											
											<div class="6u 12u$(xsmall)">
												<input type="text" name="rt_rw" id="rt_rw" placeholder="RT/RW" />
											</div>

											
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Proses" name="proses" /></li>
													<li><input type="reset" value="Reset" class="alt" /></li>
												</ul>
											</div>
											</div>
										
									</form>

			eof-->

			</div>	
			</section>

		
		<!-- Footer -->
			<footer id="footer">
				
				<div class="copyright">
					&copy; 2024. Designed by Anak SI</a>.
				</div>
				</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
<?php
	}
?>