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
<script>
            function updateJamOptions() {
                var reg = document.getElementById("reg").value;
                var jam = document.getElementById("jam");
                var hari = document.getElementById("hari")
                // Clear previous options
                jam.innerHTML = ""; 
                hari.innerHTML = "";
                if (reg == "A" || reg == "B") {
                    addOption(hari, "1", "Senin");
                    addOption(hari, "2", "Selasa");
                    addOption(hari, "3", "Rabu");
                    addOption(hari, "4", "Kamis");
                    addOption(hari, "5", "Jum'at");
                    if (reg == "A") {
                        addOption(jam, "07:10:00", "Jam ke-1 (07.10)");
                        addOption(jam, "08:50:00", "Jam ke-2 (08.50)");
                        addOption(jam, "10:30:00", "Jam ke-3 (10.30)");
                        addOption(jam, "13:00:00", "Jam ke-4 (13.00)");
                        addOption(jam, "14:40:00", "Jam ke-5 (14.40)");
                    } else if (reg == "B") {
                        addOption(jam, "18:20:00", "Jam ke-1 (18.20)");
                        addOption(jam, "20:00:00", "Jam ke-2 (20.00)");
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
                                    <label for="kode_prodi" class="form-label">Prodi</label>
                                    <select class="form-select" aria-label="Kode PRODI" name="kode_prodi" require>
                                    <option selected>Pilih Prodi</option>
                                    <?php include 'koneksi.php';
                                        $query = "SELECT * FROM prodi ORDER BY kode_prodi ASC";
                                        $field = $connect->prepare($query);
                                        $field->execute();
                                        $res1 = $field->get_result();
                                        while ($row = $res1->fetch_assoc()) {
                                            echo "<option value='" . $row['kode_prodi'] . "'>" . $row['nama_prodi'] . "</option>";
                                        }
                                    ?>
                            </select>
                                </div>
                                <div class="col">
                                <label for="kode_mkp" class="form-label">Mata Kuliah Praktikum</label>
                                    <select class="form-select" name="kode_mkp" aria-label="Kode MKP">
                                        <option selected>Pilih Mata Kuliah Praktikum</option>
                                        <?php include 'koneksi.php';
                                        $query = "SELECT * FROM mkp ORDER BY nama_mkp ASC";
                                        $field = $connect->prepare($query);
                                        $field->execute();
                                        $res1 = $field->get_result();
                                        while ($row = $res1->fetch_assoc()) {
                                            echo "<option value='" . $row['kode_mkp'] . "'>" . $row['nama_mkp'] . "</option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md-3">
                            <div class="row">
                                <label for="waktu" class="form-label">Waktu</label>
                                    <select id="kode_waktu" name="kode_waktu" class="form-select" aria-label="Kode Waktu">
                                        <option selected>Pilih Waktu</option>
                                        <?php include 'koneksi.php';
                                        $query = "SELECT * FROM waktu ORDER BY reguler ASC";
                                        $field = $connect->prepare($query);
                                        $field->execute();
                                        $res1 = $field->get_result();
                                        while ($row = $res1->fetch_assoc()) {
                                            echo "<option value='" . $row['kode_waktu'] . "'> reg " . $row['reguler'] . " ".$row['hari']. " ".$row['jam_mulai']."</option>";
                                        }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        
                        <div class="md-3">
                            <div class="row">
                                <div class="col">
                                <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" id="kelas" name="kelas" class="form-control" aria-label="Kelas">
                                
                            </input>
                                </div>
                                <div class="col">
                                    <label for="pekan" class="form-label">Pekan</label>
                                    <select id="pekan" name="pekan" class="form-select" aria-label="Kode PRODI">
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