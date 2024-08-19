<!-- ====== Pengecekan untuk Session ====== -->
<?php
error_reporting(0);
session_start();
if (empty($_SESSION['id']) and empty($_SESSION['nama']) and empty($_SESSION['level'])) {
    header('location:login.php');
} else if ($_SESSION['level'] != 'Admin') {
    header('location:login.php');
} else if ($_SESSION['level'] == 'Admin') {
    include 'koneksi.php';
    $user = $_SESSION['bagian'];
    $sql = "SELECT nama_lab FROM laboratorium WHERE username='$user'";
    $rs = mysqli_query($connect, $sql);
    // var_dump($nama);
    // die;
    $namaLab = "";
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $namaLab .= $row['nama_lab'];
        }
    } else {
        $namaLab .= "Super User";
    }
    // var_dump($namaLab);
    // die;
    $nama = $namaLab;
?>
    <!-- ====== End Pengecekan untuk Session ====== -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrator Settings - SPRINTER UNPAM</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- ====== Favicons ====== -->
        <link href="assets/img/icon-unpam-website.png" rel="icon">
        <link href="assets/img/icon-unpam-apple-touch.png" rel="apple-touch-icon">

        <!-- ====== Google Fonts ====== -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- ====== Vendor CSS Files ====== -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- ====== Main CSS File ====== -->
        <link href="assets/css/admin.css" rel="stylesheet">
    </head>

    <body>
        <!-- ====== Header ====== -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div>
            <!-- End Icon Sidebar -->

            <div class="d-flex align-items-center justify-content-between">
                <a href="beranda.php" class="logo d-flex align-items-center">
                    <span class="d-none d-lg-block">SPRINTER UNIVERSITAS PAMULANG</span>
                </a>
            </div>
            <!-- End Logo -->

            <!-- ====== Icons Navigation ====== -->
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <!-- Search Bar -->
                    <div class="search-bar">
                        <form class="search-form d-flex align-items-center" method="POST" action="#">
                            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    <!-- End Search Bar -->

                    <!-- Search Icon -->
                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <!-- End Search Icon-->

                    <!-- ======= Messages Nav ======= -->
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-chat-left-text"></i>
                               <span class="badge bg-success badge-number">0</span>
                        </a>

                        <!-- Messages Dropdown Items -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                            <li class="dropdown-header">
                                Tidak Memiliki Pesan Baru
                                <!-- 
<a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
 -->
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                             
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <div>
                                        <h4>Pengajuan Anda di REJECT</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>6 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="dropdown-footer">
                                <a href="#">Show all messages</a>
                            </li>

                        </ul>
                        <!-- End Messages Dropdown Items -->

                    </li>
                    <!-- End Messages Nav -->

                    <!-- ======= Profile Nav ======= -->
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-gear" alt="Profile" class="rounded-circle"></i>
                        </a>

                        <!-- Profile Dropdown Items -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>Hello <?php echo $user ?>!</h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="admin-account-settings.php">
                                    <i class="bi bi-gear"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <?php if ($namaLab == "Super User") { ?>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center active" href="administrator-setting.php">
                                        <i class="bi bi-gear"></i>
                                        <span>Administrator Settings</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </a>
                            </li>

                        </ul>
                        <!-- End Profile Dropdown Items -->
                    </li>
                    <!-- ======= End Profile Nav ======= -->
                </ul>
            </nav>
            <!-- ====== End Icons Navigation ====== -->
        </header>
        <!-- ====== End Header ====== -->
        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <!-- ======= Sidebar Logo ======= -->
                <li class="nav-logo">
                    <a class="nav-logo " href="index.php">
                        <img src="assets/img/Logo Unpam.png">
                    </a>
                </li>
                <!-- End Sidebar Logo -->
                <!-- ======= Sidebar Name Information ======= -->
                <li class="nav-name">
                    <a class="nav-name">
                        <h1>Hello <?php echo $nama ?>!</h1>
                    </a>
                </li>
                <!-- End Sidebar Name Information -->
                <!-- ======= Sidebar Dashboard ======= -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="index.php">
                        <i class="bi bi-columns-gap"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Sidebar Dashboard -->
                <!-- ======= Sidebar Ajuan ======= -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="admin-lihat-ajuan.php">
                        <i class="bi bi-calendar2-plus"></i>
                        <span>Ajuan</span>
                    </a>
                </li>
                <!-- End Sidebar Ajuan -->
                <!-- ======= Sidebar Jadwal | Dropdown ======= -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#jadwal-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-calendar4-event"></i><span>Jadwal</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="jadwal-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="admin-jadwal.php">
                                <i class="bi bi-circle"></i><span>Lihat Jadwal</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin-input-jadwal.php">
                                <i class="bi bi-circle"></i><span>Input Jadwal</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Sidebar Jadwal | Dropdown -->
                <!-- ======= Sidebar Master | Dropdown ======= -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#master-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-database"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="master-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="admin-master-prodi.php">
                                <i class="bi bi-circle"></i><span>Master Prodi</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin-master-mkp.php">
                                <i class="bi bi-circle"></i><span>Master MKP</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin-master-waktu.php">
                                <i class="bi bi-circle"></i><span>Master Waktu</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin-master-kelas.php">
                                <i class="bi bi-circle"></i><span>Master Kelas</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Sidebar Master | Dropdown -->
            </ul>
        </aside>
        <!-- ======= End Sidebar ======= -->
        <!-- ======= #main ======= -->
        <main id="main" class="main">
            <!-- ======= Page Title ======= -->
            <div class="pagetitle">
                <div class="full-bg">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <h1>ACCOUNT SETTINGS</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Halaman Change Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <!-- ======= Section Account Settings ======= -->
            <section id="account-settings" class="account-settings">
                <div style="margin-bottom:50px;" class="card-body">
                    <div class="row">
                        <div class="col jadwal">
                            <center>
                                <h5 style="color: black;">Table Laboratorium</h5>
                            </center>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>kode lab</th>
                                        <th>nama Laboratorium</th>
                                        <th>username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM laboratorium";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['kode_lab'] . "</td>";
                                            echo "<td>" . $row['nama_lab'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='2'>Anda Belum Input Lab</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col jadwal">
                            <center>
                                <h5 style="color: black">Table Admin</h5>
                            </center>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM admin";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['password'] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='2'>Tidak ada user tersedia</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <center>
                            <p class="d-inline-flex gap-1">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#AddUserAdmin" aria-expanded="false" aria-controls="collapseExample">
                                    Add Admin User
                                </button>
                            </p>
                        </center>
                        <div class="collapse" id="AddUserAdmin">
                            <div class="card card-body">
                                <form action="Controller/AddAdminUser.php" method="post">
                                    <div class="mb-3">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Lab.</span>
                                            <input type="text" class="form-control" placeholder="Komputer" name="namaLab" aria-label="NamaLab" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="password-wrapper">
                                            <input type="password" class="form-control" id="pass" name="pass" required>
                                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col bg-light">
                        <div class="row mb-3 mt-3">
                            <center>
                                <h5 style="color: black;">Edit Admin User</h5>
                            </center>
                        </div>
                        <form action="" method="get">
                            <div class="col">
                                <label for="kode_lab" class="form-label">Laboratorium</label>
                                <select class="form-select" aria-label="" name="kode_lab" required onchange="this.form.submit()">
                                    <option>Pilih Lab</option>
                                    <?php
                                    $nmLab = "";
                                    $username = "";
                                    $query = "SELECT * FROM laboratorium";
                                    $field = $connect->prepare($query);
                                    $field->execute();
                                    $res2 = $field->get_result();
                                    while ($row = $res2->fetch_assoc()) {
                                        $showOptions = "<option ";
                                        if (isset($_GET['kode_lab'])) {
                                            if ($row['kode_lab'] == $_GET['kode_lab']) {
                                                $nmLab .= $row['nama_lab'];
                                                $username .= $row['username'];
                                                $showOptions .= "selected ";
                                            }
                                        }
                                        $showOptions .= "value='" . $row['kode_lab'] . "'>" . $row['nama_lab'] . "</option>";
                                        echo ($showOptions);
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                        <form action="Controller/addEditUser.php" method="post">
                            <?php
                            $password = "";
                            $sqlPas = "SELECT password FROM admin WHERE username='$username'";
                            $stmt = $connect->prepare($sqlPas);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $password .= $row['password'];
                                }
                            }
                            ?>
                            <div class="col">
                                <label for="" class="form-label mt-2">Nama Lab</label>
                                <input id="namaLab" class="form-control" name="nama_lab" type="text" value="<?php echo $nmLab ?>" placeholder="<?php echo $nmLab ?>" disabled>
                            </div>
                            <div class="col">
                                <input type="checkbox" class="form-check-input" id="cekNmLab" name="cekNmLab">
                                <label class="form-check-label" for="cekNmLab" style="color: black;">ceklis untuk bisa Edit</label>
                            </div>
                            <div class="col">
                                <label for="usernameTxt" class="form-label mt-2">Username</label>
                                <input class="form-control" id="usernameTxt" name="username" type="text" value="<?php echo $username ?>" placeholder="<?php echo $username ?>" readonly>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="" class="form-label mt-2">Password</label>
                                    <div class="password-wrapper">
                                        <input class="form-control" id="passwordTxt" name="password" type="password" value="<?php echo $password ?>" placeholder="<?php echo $password ?>" disabled>
                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" id="cekPassword" name="cekPassword">
                                        <label class="form-check-label" for="cekPassword" style="color: black;">ceklis untuk bisa Edit</label>
                                    </div>
                                </div>
                                <input type="hidden" name="kode_lab" value="<?php echo $_GET['kode_lab'] ?>">
                                <input type="submit" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                    </div>
                </div>

            </section><!-- ======= End Section Account Settings ======= -->

            <!-- ======= Animation Icon Hide & Show ======= -->
            <script>
                const nmLab = document.getElementById('namaLab');
                const ckNmLab = document.getElementById('cekNmLab');
                ckNmLab.addEventListener('change', () => {
                    nmLab.disabled = !ckNmLab.checked;
                });
                const passTxt = document.getElementById('passwordTxt');
                const cekPass = document.getElementById('cekPassword');
                cekPass.addEventListener('change', () => {
                    passTxt.disabled = !cekPass.checked;
                });

                document.querySelectorAll('.password-wrapper i').forEach(item => {
                    item.addEventListener('click', function() {
                        const input = this.previousElementSibling;
                        if (input.type === 'password') {
                            input.type = 'text';
                            this.classList.remove('bi-eye-slash');
                            this.classList.add('bi-eye');
                        } else {
                            input.type = 'password';
                            this.classList.remove('bi-eye');
                            this.classList.add('bi-eye-slash');
                        }
                    });
                });
                const usernameInput = document.getElementById('username');

                usernameInput.addEventListener('input', function() {
                    const username = this.value;
                    if (username.includes(' ')) {
                        alert('Username TIDAK BOLEH mengandung Karakter Spasi');
                    }
                });
            </script><!-- End Animation Icon Hide & Show -->

        </main>
        <!-- ======= End #main ======= -->
        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>2024</span></strong>
            </div>
            <div class="credits">
                Designed by <a href="#" target="_blank">Anak Sistem Informasi</a>
            </div>
        </footer>
        <!-- ======= End Footer ======= -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- ======= Vendor JS Files ======= -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.umd.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>
        <script src="assets/vendor/quill/quill.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- ======= Main JS File ======= -->
        <script src="assets/js/main.js"></script>

    </body>

    </html>
<?php }
