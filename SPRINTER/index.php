<!-- ====== Pengecekaan Untuk Session ====== -->
<?php
error_reporting(0);
session_start();
if (empty($_SESSION['id']) and empty($_SESSION['nama']) and empty($_SESSION['level'])) {
  header('location:login.php');
} else if ($_SESSION['level'] != 'Admin') {
  header('location:login.php');
} else if ($_SESSION['level'] == 'Admin') {
  $user = $_SESSION['bagian'];
  include 'koneksi.php';
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
  <!-- ====== End Pengecekaan Untuk Session ====== -->

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - SPRINTER UNPAM</title>
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
      </div><!-- End Icon Sidebar -->

      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <span class="d-none d-lg-block">SPRINTER UNIVERSITAS PAMULANG</span>
        </a>
      </div>

      <!-- ====== Icons Navigation ====== -->
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <!-- Search Bar -->
          <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
              <input type="text" name="query" placeholder="Search" title="Enter search keyword">
              <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
          </div><!-- End Search Bar -->

          <!-- Search Icon-->
          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->

          <!-- ======= Messages Nav ======= -->
          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-chat-left-text"></i>
              <span class="badge bg-success badge-number">2</span>
            </a>

            <!-- Messages Dropdown Items -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
              <li class="dropdown-header">
                You have new Messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <div>
                    <h4>Pengajuan Anda di ACC</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                  </div>
                </a>
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

            </ul><!-- End Messages Dropdown Items -->

          </li><!-- End Messages Nav -->

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
                  <a class="dropdown-item d-flex align-items-center" href="administrator-setting.php">
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

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- ======= End Profile Nav ======= -->

        </ul>
      </nav><!-- ====== End Icons Navigation ====== -->

    </header><!-- ====== End Header ====== -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Sidebar Logo -->
        <li class="nav-logo">
          <a class="nav-logo " href="index.php">
            <img src="assets/img/Logo Unpam.png">
          </a>
        </li><!-- End Sidebar Logo -->

        <!-- ======= Sidebar Name Information ======= -->
        <li class="nav-name">
          <a class="nav-name">
            <h1>Hello <?php echo $namaLab ?>!</h1>
          </a>
        </li><!-- End Sidebar Name Information -->

        <!-- Sidebar Dashboard -->
        <li class="nav-item">
          <a class="nav-link " href="index.php">
            <i class="bi bi-columns-gap"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Sidebar Dashboard -->

        <!-- Sidebar Ajuan -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="admin-lihat-ajuan.php">
            <i class="bi bi-calendar2-plus"></i>
            <span>Ajuan</span>
          </a>
        </li><!-- End Sidebar Ajuan -->

        <!-- ======= Sidebar Jadwal Dropdown ======= -->
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
        </li><!-- End Sidebar Jadwal Dropdown -->

        <!-- ======= Sidebar Master Dropdown ======= -->
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
        </li><!-- End Sidebar Master Dropdown -->

      </ul>
    </aside><!-- ======= End Sidebar ======= -->

    <!-- ======= #main ======= -->
    <main id="main" class="main">

      <div class="pagetitle">
        <div class="full-bg">
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <h1>DASHBOARD</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Halaman Utama</li>
              </ol>
            </nav>
          </div>
        </div>
      </div><!-- End Page Title -->

      <!-- Banner -->
      <div id="carouselExampleIndicators" class="carousel">
        <!-- <div class="carousel-indicators gap-5 p-5">
                <a href="prodi.php#PRODI" class="btn btn-success btn-lg">Master Prodi</a>
                <a href="mkp.php#MKP" class="btn btn-success btn-lg">Master MKP</a>
                <a href="waktu.php#WAKTU" class="btn btn-success btn-lg">Waktu</a>
            </div> -->
        <div class="carousel-inner">
          <div class="carousel-item active">

          </div>
        </div>
      </div>
      <!-- end of Banner -->

      <!-- Master Prodi -->
      <div class="container-fluid w-75 p-5">
        <div class="card">
          <h5 class="card-header">Main Home</h5>
          <div class="card-body text-center">
            <a class="btn btn-success m-3" href="admin-master-prodi.php">Master Prodi</a>
            <a class="btn btn-success m-3" href="admin-master-mkp.php">Master MKP</a>
            <a class="btn btn-success m-3" href="admin-master-waktu.php">Master Waktu</a>
            <a class="btn btn-success m-3" href="admin-master-kelas.php">Master Kelas</a>
            <a class="btn btn-primary m-3" href="admin-jadwal.php">Lihat Jadwal</a>
          </div>
        </div>
      </div>
      <!-- end of Master Prodi -->

    </main><!-- ======= End #main ======= -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>2024</span></strong>
      </div>
      <div class="credits">
        Designed by <a href="#" target="_blank">Anak Sistem Informasi</a>
      </div>
    </footer><!-- ======= End Footer ======= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!--=======  Vendor JS Files ======= -->
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

<?php
}
?>