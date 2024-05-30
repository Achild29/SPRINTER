<!-- pengecekaan untuk session -->
    <?php
        error_reporting(0);
        session_start();
        if (empty($_SESSION['id']) AND empty($_SESSION['nama']) AND empty($_SESSION['level'])){
            header('location:login.php');
        }else if ($_SESSION['level'] != 'Admin'){
            header('location:login.php');	
        }else if ($_SESSION['level'] == 'Admin'){
            
    ?>
<!-- end of pengecekaan untuk session -->

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Master MKP | Sistem Penjadwalan Praktikum Lab Komputer</title>
<!-- CSS -->
    <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- end of bootstrap -->
    <!-- native css -->
        <link rel="stylesheet" href="assets/css/main.css" />
    <!-- end of native css -->
<!-- end of CSS -->
    </head>
    <body>
    <!-- Header -->
        <header id="header">
            <nav class="left">
                <a href="#menu"><span>Menu</span></a>
            </nav>
            <a href="index.php" class="logo"><font color="white">Sistem Penjadwalan Praktikum Lab Komputer</font></a>
        </header>
    <!-- end of Header -->

    <!-- Menu -->
        <nav id="menu">
            <ul class="links">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Master Prodi</a></li>
                <li><a href="mkp.php">Master Mata Kuliah</a></li>
                <li><a href="waktu.php">Master Waktu</a></li>
                <li><a href="index.php">Input Jadwal</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    <!-- end of Menu -->

    <!-- Banner -->
        <section id="banner">
            <div class="content">
                <p><br><br><br><br><br><br><br></p>
                <ul class="actions">
                    <li><a href="prodi.php#PRODI" class="btn btn-success btn-lg">PRODI</a></li>
                    <li><a href="mkp.php#MKP" class="btn btn-success btn-lg">MKP</a></li>
                    <li><a href="waktu.php#WAKTU" class="btn btn-success btn-lg">WAKTU</a></li>
                    <li><a href="index.php" class="btn btn-success btn-lg">JADWAL</a></li>
                </ul>
            </div>
        </section>
    <!-- end of Banner -->

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
                                    <option selected>Pilih Kode Prodi</option>
                                        <?php include 'koneksi.php';
                                            $query = "SELECT * FROM prodi ORDER BY kode_prodi ASC";
                                            $field = $connect->prepare($query);
                                            $field->execute();
                                            $res1 = $field->get_result();
                                            while ($row = $res1->fetch_assoc()) {
                                                echo "<option value='" . $row['kode_prodi'] . "'>" . $row['kode_prodi'] . "</option>";
                                            }
                                        ?>
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
            </div>
        </section>
		<!-- end of MKP -->

    <!-- Footer -->
        <footer id="footer">
            <div class="copyright">
                &copy; 2024. Designed by Anak SI</a>.
            </div>
        </footer>
    <!-- end of Footer -->

    <!-- Scripts -->
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
        <!-- Scripts boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- end of Scripts -->

    </body>
</html>
<?php
    }
?>