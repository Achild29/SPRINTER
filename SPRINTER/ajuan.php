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
        <title>ajuan</title>
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
    <!-- ajuan -->
        <div class="content">
            <div class="container-new">
            <!--<div class="card">-->
                
                <div class="card-body">
                    <div class="mb-3">
                        <div class="col-md-3">
                            <a href="ajuanBaru.php" class="btn btn-success">Buat pengajuan Baru</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>kode ajuan</th>
                                    <th>kode kelas</th>
                                    <th>Mata Kuliah Praktikum</th>
                                    <th>dosen Pengampu</th>
                                    <th>status Ajuan</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                <!-- </div>-->
            <!-- </div>-->
            </div>
        </div>
    <!-- end of ajuan -->

    

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