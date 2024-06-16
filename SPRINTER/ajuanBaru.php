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
         <a href="lihatJadwal.php">Home</a>
         <a class="active" href="ajuan.php">Ajuan</a>
         <a href="logout.php">Logout</a>
    </div>

    <!-- input ajuan -->
        <div class="content">
            <div id="inputAjuan" class="card">
                <h5 class="card-header">form pengajuan baru</h5>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="mkp" class="form-label">Mata kuliah Praktikum</label>
                                    <select class="form-select" aria-label="Kode PRODI" name="kode_mkp" required onchange="this.form.submit()">
                                        <option>Pilih Mata kuliah praktikum</option>
                                        <?php
                                            include 'koneksi.php';
                                            $query = "SELECT * FROM mkp WHERE kode_prodi = '$prodi'";
                                            $field = $connect->prepare($query);
                                            $field->execute();
                                            $res2 = $field->get_result();
                                            while ($row = $res2->fetch_assoc()) {
                                                $showOptions="<option ";
                                                if(isset($_GET['kode_mkp'])){
                                                    if($row['kode_mkp']== $_GET['kode_mkp']){
                                                        $showOptions.="selected ";
                                                    }
                                                }
                                                $showOptions.="value='" . $row['kode_mkp'] . "'>" . $row['nama_mkp'] . "</option>";
                                                echo ($showOptions);
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