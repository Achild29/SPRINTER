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
        <title>Input Jadwal | Sistem Penjadwalan Praktikum Lab Komputer</title>
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
                <a class="btn btn-dark btn-lg mx-auto" href="index.php" role="button">SPRINTER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">SPRINTER MENU</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="jadwal.php#JADWAL">Jadwal</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Master
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="prodi.php">Master PRODI</a></li>
                                    <li><a class="dropdown-item" href="mkp.php">Master MKP</a></li>
                                    <li><a class="dropdown-item" href="waktu.php">Master WAKTU</a></li>
                                </ul>
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
            <div class="carousel-indicators gap-5 p-5">
                <a href="prodi.php#PRODI" class="btn btn-success btn-lg">Master Prodi</a>
                <a href="mkp.php#MKP" class="btn btn-success btn-lg">Master MKP</a>
                <a href="waktu.php#WAKTU" class="btn btn-success btn-lg">Master Waktu</a>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/labkom1.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    <!-- end of Banner -->

    <!-- input Jadwal -->
        <div class="container-fluid w-75 p-5">
            <div id="JADWAL" class="card">
                <h5 class="card-header">Input Jadwal Praktikum</h5>
                <div class="card-body">
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
                    </form>
                </div>
            </div>
        </div>
    <!-- end of Jadwal -->

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