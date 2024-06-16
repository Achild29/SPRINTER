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
    <link href="assets/css/newformat.css" rel="stylesheet" type="text/css">
    <!-- end of native css -->
<!-- end of CSS -->
    </head>
    <body>

    <!-- header -->
    <div class="header">
        <a href="#default" class="logo">SPRINTER</a>
        <div class="header-right">
        </div>
    </div>
    <!-- Navigation sidebar -->
    <div class="sidebar">
         <a class="active" href="lihatJadwal.php">Home</a>
         <a href="ajuan.php">Ajuan</a>
         <a href="logout.php">Logout</a>
    </div>

    <!-- lihat Jadwal -->
        <div class="content">
            <div class="container-new">
            <!--<div class="card">-->
                <h5>Jadwal Praktikum</h5>
                
                    <div class="mb-3">
                        <form method="GET" action="">
                            <div class="row mb-3">
                                <div class="col-md-3 d-flex align-items-end">
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
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                                <div class="col-md-3 ms-auto">
                                    <a href="jadwalxls.php?p=<?php echo ($_GET['pekan']) ?>" class="btn btn-success">export to Excel</a>
                                </div>
                                <div class="col-md-3 ms-auto">
                                    <a href="jadwalPdf.php?p=<?php echo ($_GET['pekan']) ?>" class="btn btn-danger">export to pdf</a>
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
                                    <th>Kelas</th>
                                    <th>Dosen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ambil nilai pekan dari query string
                                    $pekan = isset($_GET['pekan']) ? $_GET['pekan'] : '';

                                // Buat query SQL dengan filter pekan
                                    $query = "
                                        SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp, kode_kelas, dosen
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
                                            echo "<td>" . $row['kode_kelas'] . "</td>";
                                            echo "<td>" . $row['dosen'] . "</td>";
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
    <!-- end of lihat Jadwal -->

    <!-- Footer -->
       
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