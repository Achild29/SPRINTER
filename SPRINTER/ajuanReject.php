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
        <title>Form Reject Ajuan</title>
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
        <a href="index.php" class="logo">SPRINTER</a>
        <div class="header-right">
        </div>
    </div>
    <!-- Navigation sidebar -->
    
<!-- Navigation sidebar -->
    <!-- <div class="sidebar">
         <a href="index.php">Home</a>
         <a class="active" href="ajuan.php">Ajuan</a>
         <a href="logout.php">Logout</a>
    </div> -->
<!-- end of Navigation sidebar -->

<!-- input ajuan -->
<div class="content">
            <div id="inputAjuan" class="card">
                <h5 class="card-header">form pengajuan baru</h5>
                <div class="card-body">
                    <form action="Controller/AjuanReject.php" method="post">
                        <div class="mb-3">
                            <label for="kodeAjuan" class="form-label">Kode Ajuan</label>
                            <?php
                                $ajuan = isset($_GET['k']) ? $_GET['k'] :'';
                            ?>
                            <input type="text" class="form-control" placeholder="<?php echo $ajuan; ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="Keterangan" class="form-label">Keterangan Reject Ajuan</label>
                            <textarea type="text" class="form-control" name="msg"></textarea>
                            <input type="hidden" name="kode-ajuan"
                                <?php 
                                    echo "value='".$ajuan."'";
                                ?>
                            >
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
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
