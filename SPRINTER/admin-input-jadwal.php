<!-- ====== Pengecekaan Untuk Session ====== -->
<?php
    error_reporting(0);
    session_start();
    if (empty($_SESSION['id']) AND empty($_SESSION['nama']) AND empty($_SESSION['level'])){
      header('location:login.php');
    }else if ($_SESSION['level'] != 'Admin'){
      header('location:login.php');	
    }else if ($_SESSION['level'] == 'Admin'){
      $user = $_SESSION['bagian'];
?>
<!-- ====== End Pengecekan untuk Session ====== -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Input Jadwal - SPRINTER UNPAM</title>
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
              <a class="dropdown-item d-flex align-items-center " href="admin-account-settings.php">
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

      <!-- ======= Sidebar Logo ======= -->
      <li class="nav-logo">
        <a class="nav-logo " href="index.php">
          <img src="assets/img/Logo Unpam.png">
        </a>
      </li><!-- End Sidebar Logo -->

      <!-- ======= Sidebar Name Information ======= -->
      <li class="nav-name">
        <a class="nav-name">
          <h1>LAB. SISTEM INFORMASI</h1>
        </a>
      </li><!-- End Sidebar Name Information -->

      <!-- ======= Sidebar Dashboard ======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-columns-gap"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Sidebar Dashboard -->

      <!-- ======= Sidebar Ajuan ======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-lihat-ajuan.php">
          <i class="bi bi-calendar2-plus"></i>
          <span>Ajuan</span>
        </a>
      </li><!-- End Sidebar Ajuan -->

      <!-- ======= Sidebar Jadwal | Dropdown ======= -->
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#jadwal-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar4-event"></i><span>Jadwal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="jadwal-nav" class="nav-content show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin-jadwal.php" >
              <i class="bi bi-circle"></i><span>Lihat Jadwal</span>
            </a>
          </li>
          <li>
            <a href="admin-input-jadwal.php" class="active">
              <i class="bi bi-circle"></i><span>Input Jadwal</span>
            </a>
          </li>
        </ul>
      </li><!-- End Sidebar Jadwal | Dropdown -->

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
      </li><!-- End Sidebar Master | Dropdown -->

    </ul>
  </aside><!-- ======= End Sidebar ======= -->

  <!-- ======= #main ======= -->
  <main id="main" class="main">

    <!-- ======= Page Title ======= -->
    <div class="pagetitle">
      <div class="full-bg">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <h1>INPUT JADWAL</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">Halaman Input Jadwal Praktikum</li>
            </ol>
          </nav>
        </div>
      </div>
    </div><!-- End Page Title -->

    <!-- ======= Section Input Jadwal ======= -->
    <section id="input-jadwal" class="input-jadwal">
      <div id="input-jadwal" class="card-body">
                            
        <form action="" method="get">
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="kode_prodi" class="form-label">Prodi</label>
                <select name="kode_prodi" id="kode_prodi" class="form-select" required onchange="this.form.submit()">
                  <option selected>Pilih Prodi</option>
                    <?php 
                        include 'koneksi.php';
                        $query = "SELECT * FROM prodi ORDER BY kode_prodi ASC";
                        $field = $connect->prepare($query);
                        $field->execute();
                        $res1 = $field->get_result();
                        while ($row = $res1->fetch_assoc()) {
                          $showOptions = "<option ";
                          if (isset($_GET['kode_prodi'])) {
                            if ($row['kode_prodi']==$_GET['kode_prodi']) {
                              $showOptions .= "selected ";
                            }
                          }
                          $showOptions .= "value='" . $row['kode_prodi'] . "'>" . $row['nama_prodi'] . "</option>";
                          echo ($showOptions);
                        }
                    ?>
                </select>
              </div>
              <div class="col">
                <label for="kode_mkp" class="form-label">Mata Kuliah Praktikum</label>
                <select name="kode_mkp" id="kode_mkp" class="form-select" required onchange="this.form.submit()">
                  <option selected>Pilih Mata Kuliah</option>
                    <?php
                        if (isset($_GET['kode_prodi'])) {
                          $kode_prodi = $_GET['kode_prodi'];
                          $query = "SELECT * FROM mkp WHERE kode_prodi = ? ORDER BY kode_mkp ASC";
                          $field = $connect->prepare($query);
                          $field->bind_param("s", $kode_prodi);
                          $field->execute();
                          $res2 = $field->get_result();
                          while ($row = $res2->fetch_assoc()) {
                            $showOptions = "<option ";
                            if (isset($_GET['kode_mkp'])) {
                              if ($row['kode_mkp']==$_GET['kode_mkp']) {
                                $showOptions .= "selected ";
                              }
                            }
                            $showOptions .= "value='" . $row['kode_mkp'] . "'>" . $row['nama_mkp'] . "</option>";
                            echo ($showOptions);
                            // echo "<option value='" . $row['kode_mkp'] . "'>" . $row['nama_mkp'] . "</option>";
                            }
                          }
                    ?>
                </select>
              </div>
            </div>
          </div>
        </form>
        
        <form action="Controller/Jadwal.php" method="post">
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="kode_waktu" class="form-label">Waktu</label>
                <select name="kode_waktu" id="kode_waktu" class="form-select" required>
                  <option selected>Pilih Waktu</option>
                    <?php 
                        include 'koneksi.php';
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
              <div class="col">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" aria-label="Kode MKP" name="kelas" required>
                  <option selected>Kelas</option>
                    <?php
                        if (isset($_GET['kode_prodi'])) {
                          $kode_prodi = $_GET['kode_prodi'];
                          $query = "SELECT * FROM kelas WHERE kode_prodi = ? ORDER BY kode_kelas ASC";
                          $field = $connect->prepare($query);
                          $field->bind_param("s", $kode_prodi);
                          $field->execute();
                          $res2 = $field->get_result();
                          while ($row = $res2->fetch_assoc()) {
                            echo "<option value='" . $row['kode_kelas'] . "'>" . $row['kode_kelas'] . "</option>";
                          }
                        }
                    ?>
                </select>
              </div>
            </div>
          </div>
          
          <?php
              if ($user == "darksystem") { ?>
              
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="laboratorium" class="form-label">laboratorium</label>
                <select name="kode_lab" id="kode_lab" class="form-select">
                  <option selected>Pilih laboratorium</option>
                    <?php
                        $query = "SELECT * FROM laboratorium ORDER BY nama_lab ASC";
                        $field = $connect->prepare($query);
                        $field->execute();
                        $res1 = $field->get_result();
                        while ($row = $res1->fetch_assoc()) {
                          echo "<option value='" . $row['kode_lab'] . "'>" . $row['nama_lab'] . "</option>";
                        }
                    ?>
                </select>
              </div>
              <div class="col">
                <label for="pekan" class="form-label">Pekan</label>
                <select name="pekan" id="pekan" class="form-select">
                  <option selected>Pilih Pekan</option>
                  <option value="1">Pekan ke-1</option>
                  <option value="2">Pekan ke-2</option>
                  <option value="3">Pekan ke-3</option>
                  <option value="4">Pekan ke-4</option>
                  <option value="5">Pekan ke-5</option>
                  <option value="6">Pekan ke-6</option>
                  <option value="7">Pekan ke-7</option>
                  <option value="8">Pekan ke-8 (UTS)</option>
                  <option value="9">Pekan ke-9</option>
                  <option value="10">Pekan ke-10</option>
                  <option value="11">Pekan ke-11</option>
                  <option value="12">Pekan ke-12</option>
                  <option value="13">Pekan ke-13</option>
                  <option value="14">Pekan ke-14</option>
                  <option value="15">Pekan ke-15</option>
                  <option value="16">Pekan ke-16 (UAS)</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="dosen" class="form-label">Dosen Pengampu</label>
                <input type="text" class="form-control" name="dosen"></input>
              </div>
            </div>
          </div>
          
          <?php 
              } else { ?>
          
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="pekan" class="form-label">Pekan</label>
                <select name="pekan" id="pekan" class="form-select">
                  <option selected>Pilih Pekan</option>
                  <option value="1">Pekan ke-1</option>
                  <option value="2">Pekan ke-2</option>
                  <option value="3">Pekan ke-3</option>
                  <option value="4">Pekan ke-4</option> 
                  <option value="5">Pekan ke-5</option>
                  <option value="6">Pekan ke-6</option>
                  <option value="7">Pekan ke-7</option>
                  <option value="8">Pekan ke-8 (UTS)</option> 
                  <option value="9">Pekan ke-9</option>
                  <option value="10">Pekan ke-10</option>
                  <option value="11">Pekan ke-11</option>
                  <option value="12">Pekan ke-12</option>
                  <option value="13">Pekan ke-13</option>
                  <option value="14">Pekan ke-14</option>
                  <option value="15">Pekan ke-15</option>
                  <option value="16">Pekan ke-16 (UAS)</option>
                </select>
              </div>
              <div class="col">
                <label for="dosen" class="form-label">Dosen Pengampu</label>
                <input type="text" class="form-control" name="dosen"></input>
                <input type="hidden" name="kode_lab"
                  <?php
                      $query = "SELECT kode_lab FROM laboratorium";
                      $query .= " WHERE username ='" . $user . "'";
                      $field = $connect->prepare($query);
                      $field->execute();
                      $res1 = $field->get_result();
                      while ($row = $res1->fetch_assoc()) {
                        echo "value='" . $row['kode_lab'] . "'";
                      }
                  ?>
                >
              </div>
            </div>
          </div>  
          
          <?php
              }
          ?>
          
          <div class="mb-3">
            <input type="hidden" name="mkp"
              <?php
                  $kode_mkp = $_GET['kode_mkp'];
                  echo " value='".$kode_mkp."'";
              ?>
            >
            <input type="hidden" name="prodi"
              <?php
                  $kode_prodi = $_GET['kode_prodi'];
                  echo " value='".$kode_prodi."'";
              ?>
            >
            <div class="mb-3-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      
      </div>
    </section><!-- ======= End Section Input Jadwal ======= -->
  
  </main><!-- ======= End #main ======= -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>2024</span></strong>
    </div>
    <div class="credits">
      Designed by <a href="https://youtu.be/id_a1VpIOJA?si=rkboW6XR-dYj_pgR" target="_blank">Anak Sistem Informasi</a>
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