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
    <title>Lihat Ajuan</title>
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

    <div class="containerfluid w-75 p5">
        <div class="card" id="lihatAjuan">
            <h5 class="card-header">List Ajuan</h5>
            <div class="card-body">
                <div class="mb-3">
                    <form action="" method="get">
                        <div class="col-md-3 d-flex align-items-end">
                            <label for="prodi" class="form-label"></label>
                            <select name="prodi" id="prodi" class="form-select">
                            <option selected>Pilih Prodi</option>
                            <?php
                                include 'koneksi.php';
                                // Query untuk menambil prodi
                                $sql = "SELECT * FROM prodi";
                                $field = $connect->prepare($sql);
                                $field->execute();
                                $res1 = $field->get_result();
                                while ($row = $res1->fetch_assoc()) {
                                    echo "<option value='" . $row['kode_prodi'] . "'>" . $row['nama_prodi'] . "</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary">Filer</button>
                        </div>
                    </form>
                </div>
                <div class="mb-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode Ajuan</th>
                                <th>Prodi</th>
                                <th>MKP</th>
                                <th>Kelas</th>
                                <th>URL PDF</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ambil nilai kode_prodi dari query string
                                $prodi = isset($_GET['kode_prodi']) ? $_GET['kode_prodi'] :'';

                                $sqlQuery ="
                                    SELECT a.kode_ajuan, p.nama_prodi, m.nama_mkp, a.kode_kelas, a.url_rps
                                    FROM ajuan a
                                    JOIN prodi p on a.kode_prodi = p.kode_prodi
                                    JOIN mkp m on a.kode_mkp = m.kode_mkp
                                ";

                                //Tambahkan kondisi WHERE jika prodi dipilih
                                if ($prodi !=='') {
                                    $sqlQuery .= " WHERE a.kode_prodi = ?";
                                }

                                $stmt = $connect->prepare($sqlQuery);

                                // Bind paramater jika prodi dipilih
                                if ($prodi !== '') {
                                    $stmt->bind_param("i", $prodi);
                                }

                                $stmt->execute();
                                $result = $stmt->get_result();
                                

                                // Tampilkan hasil query
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>". $row['kode_ajuan'] . "</td>";
                                        echo "<td>". $row['nama_prodi'] . "</td>";
                                        echo "<td>". $row['nama_mkp'] . "</td>";
                                        echo "<td>". $row['kode_kelas'] . "</td>";
                                        echo "<td>". $row['url_rps'] . "</td>";
                                        echo "<td>". "<a href='"."jadwal.php?".$row['kode_ajuan']."' class='btn btn-success m-3'>accept</a>"."<a href='' class='btn btn-danger m-3'>reject</a>". "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Tidak ada ajuan tersedia</td></tr>";
                                }
                                $stt->close();
                                $connect->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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