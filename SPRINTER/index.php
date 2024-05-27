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
		<!-- CSS bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script>
        function updateJamOptions() {
            var reg = document.getElementById("reg").value;
            var jam = document.getElementById("jam");
			var hari = document.getElementById("hari")
			// Clear previous options
            jam.innerHTML = ""; 
			hari.innerHTML = "";

		// Achild's Code
			if (reg == "A" || reg == "B") {
				addOption(hari, "1", "Senin");
				addOption(hari, "2", "Selasa");
				addOption(hari, "3", "Rabu");
				addOption(hari, "4", "Kamis");
				addOption(hari, "5", "Jum'at");
				if (reg == "A") {
					addOption(jam, "1", "Jam ke-1 (07.10)");
					addOption(jam, "2", "Jam ke-2 (08.50)");
					addOption(jam, "3", "Jam ke-3 (10.30)");
					addOption(jam, "4", "Jam ke-4 (13.00)");
					addOption(jam, "5", "Jam ke-5 (14.40)");
				} else if (reg == "B") {
					addOption(jam, "1", "Jam ke-1 (18.20)");
					addOption(jam, "2", "Jam ke-2 (20.00)");
				}
			} else if (reg == "C") {
				addOption(jam, "1", "Jam ke-1 (07.40)");
				addOption(jam, "2", "Jam ke-2 (09.20)");
				addOption(jam, "3", "Jam ke-3 (11.00)");
				addOption(jam, "4", "Jam ke-4 (12.40)");
				addOption(jam, "5", "Jam ke-5 (14.20)");
				addOption(hari, "1", "Kamis K-1");
				addOption(hari, "2", "Kamis K-2");
				addOption(hari, "3", "Sabtu K-1");
				addOption(hari, "4", "Sabtu K-2");
			} 
		// end of Achild's Code

		// Lerry's Code
            // if (reg === "A") {
            //     addOption(jam, "1", "Jam ke-1 (07.10)");
            //     addOption(jam, "2", "Jam ke-2 (08.50)");
            //     addOption(jam, "3", "Jam ke-3 (10.30)");
            //     addOption(jam, "4", "Jam ke-4 (13.00)");
            //     addOption(jam, "5", "Jam ke-5 (14.40)");
            // } else if (reg === "B") {
            //     addOption(jam, "1", "Jam ke-1");
            //     addOption(jam, "2", "Jam ke-2");
            // } else if (reg === "C") {
            //     addOption(jam, "1", "Jam ke-1");
            //     addOption(jam, "2", "Jam ke-2");
            //     addOption(jam, "3", "Jam ke-3");
            // }
		// end of Lerry's Code
        }

        function addOption(selectbox, value, text) {
            var option = document.createElement("option");
            option.value = value;
            option.text = text;
            selectbox.appendChild(option);
        }
    </script>
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
					<li><a href="#PRODI">Master Prodi</a></li>
					<li><a href="#MKP">Master Mata Kuliah</a></li>
					<li><a href="#WAKTU">Master Waktu</a></li>
					<li><a href="#JADWAL">Input Jadwal</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
				
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="content">
					<p><br><br><br><br><br><br><br></p>
					<ul class="actions">
						<li><a href="#PRODI" class="btn btn-success btn-lg">PRODI</a></li>
						<li><a href="#MKP" class="btn btn-success btn-lg">MKP</a></li>
						<li><a href="#WAKTU" class="btn btn-success btn-lg">WAKTU</a></li>
						<li><a href="#JADWAL" class="btn btn-success btn-lg">JADWAL</a></li>
					</ul>
				</div>
			</section>

		<!-- PRODI -->
			<section id="PRODI" class="wrapper">
				<div class="inner">
					<p class="d-inline-flex gap-1">
						<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#tambahProdi" aria-expanded="false" aria-controls="collapseExample">
							TAMBAH PRODI
						</button>
					</p>
				<div class="collapse" id="tambahProdi">
					<div class="card card-body">
						<form method="post" action="Controller/Prodi.php">
							<div class="mb-3">
								<label for="kode_prodi" class="form-label">Kode Prodi</label>
								<input type="text" class="form-control" name="kode_prodi" id="kode_prodi" placeholder="Kode Prodi">
							</div>
							<div class="mb-3">
								<label for="nama_prodi" class="form-label">Nama Prodi</label>
								<input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Nama Prodi">
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
							</div>
							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
					</div>
				</div>
			</section>
		<!-- end of PRODI -->
		
		<!-- MKP -->
			<section id="MKP" class="wrapper">
					<div class="inner">
						<p class="d-inline-flex gap-1">
							<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#tambahMKP" aria-expanded="false" aria-controls="collapseExample">
								TAMBAH MKP
							</button>
						</p>
					<div class="collapse" id="tambahMKP">
						<div class="card card-body">
							<form method="post" action="Controller/Mkp.php">
								<div class="mb-3">
									<label for="kode_mkp" class="form-label">Kode MKP</label>
									<input type="text" class="form-control" id="kode_mkp" name="kode_mkp" placeholder="Kode MKP">
								</div>
								<div class="mb-3">
									<label for="kode_prodi" class="form-label">KODE PRODI</label>
									<select class="form-select" aria-label="Kode PRODI" name="kode_prodi1" require>
										<option value="">Pilih Kode Prodi</option>
									<?php include 'koneksi.php';
									$query = "SELECT * FROM prodi ORDER BY kode_prodi ASC";
									$field = $connect->prepare($query);
									$field->execute();
									$res1 = $field->get_result();
									while ($row = $res1->fetch_assoc()) {
										echo "<option value='" . $row['kode_prodi'] . "'>" . $row['kode_prodi'] . "</option>";
										} ?>
									</select>
								</div>
								<div class="mb-3">
									<label for="nama_mkp" class="form-label">Nama MKP</label>
									<input type="text" class="form-control" id="nama_mkp" name="nama_mkp"  placeholder="Nama MKP">
								</div>
								<div class="mb-3">
									<label for="sks" class="form-label">SKS</label>
									<input type="text" class="form-control" id="sks" name="sks" placeholder="SKS">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</section>
		<!-- end of MKP -->

		<!-- WAKTU -->
			<section id="WAKTU" class="wrapper">
					<div class="inner">
						<p class="d-inline-flex gap-1">
							<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#tambahWaktu" aria-expanded="false" aria-controls="collapseExample">
								TAMBAH WAKTU
							</button>
						</p>
					<div class="collapse" id="tambahWaktu">
						<div class="card card-body">
							<form method="post" action="Controller/Waktu.php">
								<div class="mb-3">
									<label for="kode_waktu" class="form-label">Kode Waktu</label>
									<input type="text" class="form-control" id="kode_waktu" placeholder="Kode Waktu">
								</div>
								<div class="mb-3">
									<label for="reg" class="form-label">Reguler</label>
									<select id="reg" name="reg" class="form-select" aria-label="Kode REGULER"  onchange="updateJamOptions()">
										<option selected>Pilih Reguler</option>
										<option value="A">Reguler A</option>
										<option value="B">Reguler B</option>
										<option value="C">Reguler C</option>
									</select>
								</div>
								<div class="mb-3">
									<label for="hari" class="form-label">Hari</label>
									<select id="hari" name="hari" class="form-select" aria-label="Kode HARI">
										<option selected>Pilih Hari</option>
										
									</select>
								</div>
								<div class="mb-3">
									<label for="jam" class="form-label">Jam Mulai</label>
									<select id="jam" name="jam" class="form-select" aria-label="Jam MULAI">
										<option selected>Pilih Jam</option>
										<!-- <option value=""></option> -->
									</select>
								</div>
								<div class="mb-3">
									<label for="jam_selesai" class="form-label">Jam Selesai</label>
									<input type="text" value="Otomatis +100menit" aria-label="Disabled input" disabled readonly>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</section>
		<!-- end of WAKTU -->

		<!-- JADWAL -->
			<section id="JADWAL" class="wrapper">
					<div class="inner">
						<p class="d-inline-flex gap-1">
							<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#tambahJadwal" aria-expanded="false" aria-controls="collapseExample">
								TAMBAH JADWAL
							</button>
						</p>
					<div class="collapse" id="tambahJadwal">
						<div class="card card-body">
							<form method="post" action="Controller/Jadwal.php">
								<div class="md-3">
									<div class="row">
										<div class="col">
											<label for="kode_prodi" class="form-label">Kode ...</label>
											<select class="form-select" aria-label="Kode PRODI">
												<option selected>Pilih ...</option>
												<option value="1">Querry ke table ...</option>
												<option value="2">Querry ke table ...</option>
												<option value="3">Querry ke table ...</option>
											</select>
										</div>
										<div class="col">
											<label for="jam" class="form-label">Jam Mulai</label>
											<select class="form-select" aria-label="Jam MULAI">
												<option selected>Pilih Jam</option>
												<option value="1">Pagi jam ke-1</option>
												<option value="2">Pagi jam ke-2</option>
												<option value="3">Pagi jam ke-3</option>
												<option value="4">Pagi jam ke-4</option>
												<option value="5">Pagi jam ke-5</option>
												<option value="6">Malem jam ke-1</option>
												<option value="7">Malem jam ke-2</option>
											</select>
										</div>
									</div>
								</div>
								<div class="md-3">
									<div class="row">
										<div class="col">
											<label for="kode_prodi" class="form-label">KODE PRODI</label>
											<select class="form-select" aria-label="Kode PRODI">
												<option selected>Pilih Prodi</option>
												<option value="1">Querry ke table prodi</option>
												<option value="2">Querry ke table prodi</option>
												<option value="3">Querry ke table prodi</option>
											</select>
										</div>
										<div class="col">
											<label for="kelas" class="form-label">Kelas</label>
											<select class="form-select" aria-label="Kode KELAS">
												<option selected>Pilih Kelas</option>
												<option value="1">Querry ke table ...</option>
												<option value="2">Querry ke table ...</option>
												<option value="3">Querry ke table ...</option>
											</select>
										</div>
									</div>
								</div>
								<div class="md-3">
									<div class="row">
										<div class="col">
											<label for="kode_mkp" class="form-label">Mata Kuliah Praktikum</label>
											<select class="form-select" aria-label="Kode MKP">
												<option selected>Pilih Mata Kuliah Praktikum</option>
												<option value="1">Querry ke table MKP</option>
												<option value="2">Querry ke table MKP</option>
												<option value="3">Querry ke table MKP</option>
											</select>
										</div>
									</div>
								</div>
								<div class="md-3">
									<div class="row">
										<div class="col">
											<label for="pekan" class="form-label">Pekan</label>
											<select class="form-select" aria-label="Kode PRODI">
												<option selected>Pilih Pekan</option>
												<option value="1">Pekan ke-1</option>
												<option value="2">Pekan ke-2</option>
												<option value="3">Pekan ke-3</option>
												<option value="4">Pekan ke-4</option>
												<option value="5">Pekan ke-4</option>
												<option value="6">Pekan ke-5</option>
												<option value="7">Pekan ke-6</option>
												<option value="8">Pekan ke-7</option>
												<option value="9">Pekan ke-8</option>
												<option value="10">Pekan ke-10</option>
												<option value="11">Pekan ke-11</option>
												<option value="12">Pekan ke-12</option>
												<option value="13">Pekan ke-13</option>
												<option value="14">Pekan ke-14</option>
											</select>
										</div>
									</div>
								</div>
								<div class="md-3">
									<div class="row">
										<div class="col">
											<label for="" class="form-label"></label>
											<div class="d-grid gap-2">
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</section>
		<!-- end of JADWAL -->

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
			<!-- Scripts boostrap -->
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

	</body>
</html>
<?php
	}
?>