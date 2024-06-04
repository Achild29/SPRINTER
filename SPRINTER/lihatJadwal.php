<!-- pengecekaan session -->
    <?php
        error_reporting(0);
        session_start();
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
        <title>Lihat Jadwal</title>
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

    <!-- lihat Jadwal -->
        <div class="container-fluid w-75 p-5">
            <div id="lihatJadwal"class="card">
                <h5 class="card-header">Jadwal Praktikum</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <form method="GET" action="">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="pekan" class="form-label"></label>
                                    <select class="form-select" id="pekan" name="pekan">
                                        <option value="">Semua Pekan</option>
                                        <?php
                                        include 'koneksi.php';
                                        
                                        // Query untuk mengambil daftar pekan dari tabel jadwal
                                        $queryPekan = "SELECT DISTINCT pekan FROM jadwal ORDER BY pekan";
                                        $resultPekan = $connect->query($queryPekan);
                                        
                                        if ($resultPekan->num_rows > 0) {
                                            while ($rowPekan = $resultPekan->fetch_assoc()) {
                                                $selected = isset($_GET['pekan']) && $_GET['pekan'] == $rowPekan['pekan'] ? 'selected' : '';
                                                echo "<option value='" . $rowPekan['pekan'] . "' $selected>Pekan " . $rowPekan['pekan'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                                <div class="col-md-3 ms-auto">
                                    <a href="" class="btn btn-success">export to Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Prodi</th>
                                    <th>Mata Kuliah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ambil nilai pekan dari query string
                                    $pekan = isset($_GET['pekan']) ? $_GET['pekan'] : '';

                                // Buat query SQL dengan filter pekan
                                    $query = "
                                        SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp
                                        FROM jadwal j
                                        JOIN waktu w ON j.kode_waktu = w.kode_waktu
                                        JOIN mkp m ON j.kode_mkp = m.kode_mkp
                                        JOIN prodi p ON m.kode_prodi = p.kode_prodi
                                    ";

                                // Tambahkan kondisi WHERE jika pekan dipilih
                                    if ($pekan !== '') {
                                        $query .= " WHERE j.pekan = ?";
                                    }

                                    $query .= " ORDER BY w.hari, w.jam_mulai";

                                // Prepare dan execute query
                                    $stmt = $connect->prepare($query);

                                // Bind parameter jika pekan dipilih
                                    if ($pekan !== '') {
                                        $stmt->bind_param("i", $pekan);
                                    }

                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                // Tampilkan hasil query
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['hari'] . "</td>";
                                            echo "<td>" . $row['jam_mulai'] . "</td>";
                                            echo "<td>" . $row['jam_selesai'] . "</td>";
                                            echo "<td>" . $row['nama_prodi'] . "</td>";
                                            echo "<td>" . $row['nama_mkp'] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>Tidak ada jadwal tersedia</td></tr>";
                                    }

                                    $stmt->close();
                                    $connect->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- end of lihat Jadwal -->

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