<!-- pengecekaan session -->
<?php
        error_reporting(0);
        session_start();
        $prodi = $_SESSION['prodi'];
        if (empty($_SESSION['id']) AND empty($_SESSION['nama']) AND empty($_SESSION['level'])) {
            header('location:login.php');
        } else if ($_SESSION['level'] != 'Prodi') {
            header('location:login.php');
        } else if ($_SESSION['level']=='Prodi'){
    ?>
<!-- end of pengecekaan session -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Pengajuan Baru</title>
<!-- CSS -->
    <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- end of bootstrap -->
    <!-- native css -->
        <!-- <link rel="stylesheet" href="assets/css/main.css" /> -->
    <!-- end of native css -->
<!-- end of CSS -->
    </head>
    <body>
    <!-- navbar -->
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="btn btn-dark btn-lg mx-auto" href="lihatJadwal.php#lihatJadwal" role="button">SPRINTER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">SPRINTER INFO</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="lihatJadwal.php#lihatJadwal">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ajuan.php">ajuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">logout</a>
                            </li>
                        </ul>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="continer-fluid text-center">
            <div class="card text-bg-dark">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                    <h4 class="card-title"> </h4>
                    <p class="card-text"> </p>
                    <p class="card-text"> </p>
                    <p class="card-text p-3">Sistem Penjadwalan Praktikum Lab Komputer</p>
                </div>
            </div>
        </div> 
    <!-- end of navbar  -->

    <!-- Banner -->
        <div id="carouselExampleIndicators" class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/labkom1.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    <!-- end of Banner -->

    <!-- input ajuan -->
        <div class="container-fluid w-75 p-5">
            <div id="inputAjuan" class="card">
                <h5 class="card-header">form pengajuan baru</h5>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="mkp" class="form-label">Mata kuliah Praktikum</label>
                                    <select class="form-select" aria-label="Kode PRODI" name="kode_mkp" required onchange="this.form.submit()">
                                        <option selected>Pilih Mata kuliah praktikum</option>
                                        <?php
                                            include 'koneksi.php';
                                            $query = "SELECT * FROM mkp WHERE kode_prodi = '$prodi'";
                                            $field = $connect->prepare($query);
                                            $field->execute();
                                            $res2 = $field->get_result();
                                            while ($row = $res2->fetch_assoc()) {
                                                echo "<option value='" . $row['kode_mkp'] . "'>" . $row['nama_mkp'] . "</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="sks" class="form-label">sks</label>
                                    <select id="sks" class="form-select" required disabled>
                                        <?php
                                        if (isset($_GET['kode_mkp'])) {
                                            $kode_mkp = $_GET['kode_mkp'];
                                            $query = "SELECT * FROM mkp WHERE kode_mkp = ?";
                                            $field = $connect->prepare($query);
                                            $field->bind_param("s", $kode_mkp);
                                            $field->execute();
                                            $res2 = $field->get_result();
                                            while ($row = $res2->fetch_assoc()) {
                                                echo "<option>" . $row['sks'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="Controller/Pengajuan.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="kelas" class="form-label">kelas</label>
                                    <select name="kelas" id="kode_kelas" class="form-select">
                                        <?php
                                            $query = "SELECT * FROM kelas WHERE kode_prodi = '$prodi'";
                                            $field = $connect->prepare($query);
                                            $field->execute();
                                            $res2 = $field->get_result();
                                            while ($row = $res2->fetch_assoc()) {
                                                echo "<option value='" . $row['kode_kelas'] . "'>" . $row['kode_kelas'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="dosen" class="form-label">Dosen pengampu</label>
                                    <input type="text" class="form-control" name="dosen"></input>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col">
                                <label for="rps" class="form-label">upload rps</label>
                                <input class="form-control" type="file" id="rps" name="rps">
                            </div>
                            <div class="col">
                                <input type="hidden" name="mkp"<?php
                                    $kode_mkp = $_GET['kode_mkp'];
                                    echo "value='".$kode_mkp."'";
                                ?>
                                >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    <!-- end of input ajuan -->

    <!-- Footer -->
        <div class="card text-bg-secondary text-center ">
            <div class="card-header">
                SPRINTER | Sistem Penjadwalan Praktikum Lab Komputer
            </div>
            <div class="card-body">
                <h5 class="card-title">&copy; 2024. Designed by Anak SI</h5>
                <p class="card-text">Thanks to Bootstrap, AdminLTE | code with php</p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>
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