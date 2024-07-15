<!-- ====== Pengecekan Session ====== -->
<?php
    error_reporting(0);
    session_start();
    if (empty($_SESSION['id']) AND empty($_SESSION['nama']) AND empty($_SESSION['level'])) {
      header('location:login.php');
    } else if ($_SESSION['level'] != 'Prodi') {
      header('location:login.php');
    } else if ($_SESSION['level']=='Prodi') {
      $prodi = $_SESSION['prodi'];
?><!-- ====== End Pengecekan Session ====== -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Form Ajuan Baru - SPRINTER UNPAM</title>
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
  <link href="assets/css/prodi.css" rel="stylesheet">
</head>

<body>

  <!-- ====== Header ====== -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Icon Sidebar -->

    <div class="d-flex align-items-center justify-content-between">
      <a href="beranda.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">SPRINTER UNIVERSITAS PAMULANG</span>
      </a>
    </div><!-- End Logo -->

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

        <!-- Search Icon -->
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
              You have new messages
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
              <h6>Name Dosen, M.Kom.</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="prodi-account-settings.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
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

      <!-- ======= Sidebar Logo ======= -->
      <li class="nav-logo">
        <a class="nav-logo " href="beranda.php">
          <img src="assets/img/Logo Unpam.png">
        </a>
      </li><!-- End Sidebar Logo -->

      <!-- ======= Sidebar Name Information ======= -->
      <li class="nav-name">
        <a class="nav-name">
          <h1>LAB. SISTEM INFORMASI</h1>
        </a>
      </li><!-- End Sidebar Name Information -->
      
      <!-- ======= Sidebar Beranda ======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="beranda.php">
          <i class="bi bi-columns-gap"></i>
          <span>Beranda</span>
        </a>
      </li><!-- End Sidebar Beranda -->

      <!-- ======= Sidebar Ajuan ======= -->
      <li class="nav-item">
        <a class="nav-link " href="prodi-ajuan.php">
          <i class="bi bi-calendar2-plus"></i>
          <span>Ajuan</span>
        </a>
      </li><!-- EndSidebar Ajuan -->

      <!-- ======= Sidebar Jadwal ======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="prodi-jadwal.php">
          <i class="bi bi-calendar4-event"></i>
          <span>Jadwal</span>
        </a>
      </li><!-- End Sidebar Jadwal -->
      
    </ul>
  </aside><!-- ======= End Sidebar ======= -->

  <!-- ======= #main ======= -->
  <main id="main" class="main">

    <!-- ======= Page Title ======= -->
    <div class="pagetitle">
      <div class="full-bg">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <h1>AJUAN</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">Halaman Form Pengajuan Praktikum Baru</li>
            </ol>
          </nav>
        </div>
      </div>
    </div><!-- End Page Title -->
    
    <!-- ======= Section Ajuan Baru ======= -->
    <section id="ajuan-baru" class="ajuan-baru">
      <div id="ajuan-baru" class="card-body">
        
        <form action="" method="GET">
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="mkp" class="form-label">Mata Kuliah Praktikum</label>
                <select class="form-select" aria-label="Kode PRODI" name="kode_mkp" required onchange="this.form.submit()">
                  <option>Pilih Mata Kuliah Praktikum</option>
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
                <label for="sks" class="form-label">SKS</label>
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
                <label for="kelas" class="form-label">Kelas</label>
                <select name="kelas" id="kode_kelas" class="form-select">
                  <option value="">Pilih Kelas</option>
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
                <label for="dosen" class="form-label">Dosen Pengampu</label>
                <input type="text" class="form-control" name="dosen"></input>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="kode_lab" class="form-label">Labrotarium</label>
                <Select name="kode_lab" id="kode PRODI" class="form-select">
                  <option value="">Pilih Labrotarium</option>
                    <?php
                        $query = "SELECT * FROM laboratorium";
                        $field = $connect->prepare($query);
                        $field->execute();
                        $res2 = $field->get_result(); 
                        while ($row = $res2->fetch_assoc()) { 
                          echo "<option value='" . $row['kode_lab'] . "'>" . $row['nama_lab'] . "</option>";
                        }
                    ?>
                </Select>
              </div>
              <div class="col">
                <label for="rps" class="form-label">Upload RPS</label>
                <input class="form-control" type="file" id="rps" name="rps">
                <input type="hidden" name="mkp"
                  <?php
                      $kode_mkp = $_GET['kode_mkp'];
                      echo "value='".$kode_mkp."'";
                  ?>
                >
                <input type="hidden" name="prodi"
                  <?php
                      // $prodi = $_GET['kode_mkp'];
                      echo "value='".$prodi."'";
                  ?>
                >
              </div>
              <div class="mb-3-3">
                <input type="submit" value="Submit" class="btn btn-primary" Submit>
              </div>
            </div>
          </div>
        </form>
      
      </div>
    </section><!-- ======= End Section Ajuan Baru ======= -->
    
  </main><!-- ======= End #main ======= -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>2024</span></strong>
    </div>
    <div class="credits">
      Designed by <a href="https://instagram.com/creatix.an" target="_blank">Anak Sistem Informasi</a>
    </div>
  </footer><!-- ======= End Footer ======= -->

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

<?php
    }
?>