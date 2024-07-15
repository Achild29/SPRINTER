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
        include 'koneksi.php';
        // $kode_ajuan = "";

?>
<!-- ====== End Pengecekaan Untuk Session ====== -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ajuan - SPRINTER UNPAM</title>
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
  <link href="assets/css/style-admin.css" rel="stylesheet">
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
          <h1>LAB. SISTEM INFORMASI</h1>
        </a>
      </li><!-- End Sidebar Name Information -->

      <!-- Sidebar Dashboard -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-columns-gap"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Sidebar Dashboard -->

      <!-- Sidebar Ajuan -->
      <li class="nav-item">
        <a class="nav-link " href="admin-lihat-ajuan.php">
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
    
    <!-- ======= Page Title ======= -->
    <div class="pagetitle">
      <div class="full-bg">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <h1>AJUAN</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">Halaman Pengajuan Praktikum</li>
            </ol>
          </nav>
        </div>
      </div>
    </div><!-- End Page Title -->
  
    <!-- ======= Section Ajuan ======= -->
    <section id="ajuan" class="ajuan">  
      <div id="ajuan" class="card-body">
        
      <?php if ($user == "darksystem") { ?>
        
        <div class="mb-3">
          <form action="" method="get">
            <div class="row">
              <div class="col-md-3">
                <select name="kode_lab" class="form-select" id="" required onchange="this.form.submit()">
                  <option value="">laboratorium</option>
                    <?php
                        $query = "SELECT * FROM laboratorium ORDER BY nama_lab ASC";
                        $field = $connect->prepare($query);
                        $field->execute();
                        $res1 = $field->get_result();
                        while ($row = $res1->fetch_assoc()) {
                          $showOptions = "<option ";
                          if (isset($_GET['kode_lab'])) {
                            if ($row['kode_lab']==$_GET['kode_lab']) {
                              $showOptions .= "selected ";
                            }
                          }
                          $showOptions .= "value='" . $row['kode_lab'] . "'>" . $row['nama_lab'] . "</option>";
                          echo ($showOptions);
                        }
                    ?>
                </select>
              </div>
              <div class="col-md-3">
                <select class="form-select" id="staus" name="status_ajuan" required onchange="this.form.submit()">
                  <option value="">Status Ajuan</option>
                    <?php
                        $queryStatus = "";
                        if (!empty($_GET['kode_lab'])) {
                          $queryStatus = "
                              SELECT a.status_ajuan
                              FROM ajuan a
                              JOIN laboratorium l on a.kode_lab = l.kode_lab
                              WHERE l.kode_lab ='". $_GET['kode_lab'] ."'
                          ";
                        } else {
                          $queryStatus .= "SELECT DISTINCT status_ajuan FROM ajuan";
                        }
                        $field = $connect->prepare($queryStatus);
                        $field->execute();
                        $res1 = $field->get_result();
                        while ($row = $res1->fetch_assoc()) {
                          $showOptions = "<option ";
                          if (isset($_GET['status_ajuan'])) {
                            if ($row['status_ajuan']==$_GET['status_ajuan']) {
                              $showOptions .= "selected ";
                            }
                                                    }
                                                    $showOptions .= "value='" . $row['status_ajuan'] . "'>" . $row['status_ajuan'] . "</option>";
                                                    echo ($showOptions);
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mb-3">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Kode Ajuan</th>
                                        <th>Status Ajuan</th>
                                        <th>Prodi</th>
                                        <th>MKP</th>
                                        <th>Kelas</th>
                                        <th>Dosen</th>
                                        <th>URL PDF</th>
                                        <th>nama Lab</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // // Ambil nilai pekan dan kode_lab dari query string
                                        // $lab = isset($_GET['kode_lab']) ? $_GET['kode_lab'] : '';
                                        // $status = isset($_GET['status_ajuan']) ? $_GET['status_ajuan'] : '';

                                        // Buat query SQL dengan filter pekan
                                        $query = "
                                        SELECT a.kode_ajuan, a.status_ajuan, p.nama_prodi, m.nama_mkp, a.kode_kelas, a.dosen, a.url_rps, l.nama_lab
                                        FROM ajuan a
                                        JOIN mkp m ON a.kode_mkp = m.kode_mkp
                                        JOIN prodi p ON a.kode_prodi = p.kode_prodi
                                        JOIN laboratorium l ON a.kode_lab = l.kode_lab
                                        ";

                                        if (!empty($_GET['kode_lab']) && !empty($_GET['status_ajuan'])) {
                                            $query .= " WHERE a.kode_lab ='" . $_GET['kode_lab'] . "' AND a.status_ajuan ='" . $_GET['status_ajuan'] . "'";
                                        } elseif (!empty($_GET['kode_lab'])) {
                                            $query .= " WHERE a.kode_lab ='" . $_GET['kode_lab'] . "'";
                                        } elseif (!empty($_GET['status_ajuan'])) {
                                            $query .= " WHERE a.status_ajuan ='" . $_GET['status_ajuan'] . "'";
                                        }

                                        $query .= " ORDER BY p.nama_prodi ASC";
                                        // Prepare dan execute query
                                        $stmt = $connect->prepare($query);

                                        // if (count($params) > 0) {
                                        // $stmt->bind_param($types, ...$params);
                                        // }

                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        // Tampilkan hasil query
                                        if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { 
                                            // $kode_ajuan .= $row['kode_ajuan'];
                                            ?>
                                                <tr>
                                                    <td><?php echo ($row['kode_ajuan']) ?></td>
                                                    <td><?php echo ($row['status_ajuan']) ?></td>
                                                    <td><?php echo ($row['nama_prodi']) ?></td>
                                                    <td><?php echo ($row['nama_mkp']) ?></td>
                                                    <td><?php echo ($row['kode_kelas']) ?></td>
                                                    <td><?php echo ($row['dosen']) ?></td>
                                                    <td>
                                                        <a href="/SPRINTER/SPRINTER/files/<?php echo ($row['url_rps']) ?>" style="color: red;">
                                                            <img src="assets/img/pdfIcon.svg" alt="download File Rps">
                                                            <?php echo ($row['url_rps']) ?>.pdf
                                                        </a>
                                                    </td>
                                                    <td><?php echo ($row['nama_lab']) ?></td>
                                                    <td>
                                                    <?php
                                                        if ($row['status_ajuan'] == "On Process") { ?>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="admin-ajuan.php?kda=<?php echo ($row['kode_ajuan'])?>" style="color: green;">accept
                                                                    </a>
                                                                </div>
                                                                <div class="col">
                                                                    <a href="" style="color: red;">reject</a>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        } else {
                                                            echo "no need action";
                                                        }
                                                    ?>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                        } else {
                                        echo "<tr><td colspan='8'>Tidak ada jadwal tersedia</td></tr>";
                                        }

                                        $stmt->close();
                                        $connect->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php 
                    } else { ?>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <form action="" method="GET">
                                        <select class="form-select" id="status" name="status_ajuan" required onchange="this.form.submit()">
                                            <option value="">Status Ajuan</option>
                                            <?php
                                            $queryStatus = "
                                            SELECT a.status_ajuan
                                            FROM ajuan a 
                                            JOIN laboratorium l ON a.kode_lab = l.kode_lab
                                            WHERE l.username = '". $user ."'
                                            ORDER BY status_ajuan ASC";
                                            // $queryStatus = "SELECT DISTINCT status_ajuan FROM ajuan ORDER BY status_ajuan ASC";
                                            $field = $connect->prepare($queryStatus);
                                            $field->execute();
                                            $res1 = $field->get_result();
                                            while ($row = $res1->fetch_assoc()) {
                                                $showOptions = "<option ";
                                                if (isset($_GET['status_ajuan'])) {
                                                    if ($row['status_ajuan']==$_GET['status_ajuan']) {
                                                    $showOptions .= "selected ";
                                                    }
                                                }
                                                $showOptions .= "value='" . $row['status_ajuan'] . "'>" . $row['status_ajuan'] . "</option>";
                                                echo ($showOptions);
                                            }
                                            ?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <table class="table table-striped" id="">
                                <thead>
                                    <tr>
                                        <th>Kode Ajuan</th>
                                        <th>Status Ajuan</th>
                                        <th>Prodi</th>
                                        <th>MKP</th>
                                        <th>Kelas</th>
                                        <th>Dosen</th>
                                        <th>URL PDF</th>
                                        <th>nama Lab</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    // $status = isset($_GET['status_ajuan'])?$_GET['status_ajuan']:'';
                                    $sql = "
                                    SELECT a.kode_ajuan, a.status_ajuan, p.nama_prodi, m.nama_mkp, a.kode_kelas, a.dosen, a.url_rps, l.nama_lab
                                    FROM ajuan a
                                    JOIN mkp m ON a.kode_mkp = m.kode_mkp
                                    JOIN prodi p ON a.kode_prodi = p.kode_prodi
                                    JOIN laboratorium l ON a.kode_lab = l.kode_lab
                                    ";
                                    $sql .= " WHERE l.username ='" . $user ."'";
                                    if (!empty($_GET['status_ajuan'])) {
                                        $sql .= " AND a.status_ajuan = '" . $_GET['status_ajuan'] . "'";
                                    }
                                    $sql .= " ORDER BY p.nama_prodi ASC";
                                    $stmt = $connect->prepare($sql);
                                    // if ($status !== '') {                      
                                    //     $stmt->bind_param("i", $status);
                                    // }
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { ?>
                                        <!-- isi dari table -->
                                            <tr>
                                                <td><?php echo ($row['kode_ajuan']) ?></td>
                                                <td><?php echo ($row['status_ajuan']) ?></td>
                                                <td><?php echo ($row['nama_prodi']) ?></td>
                                                <td><?php echo ($row['nama_mkp']) ?></td>
                                                <td><?php echo ($row['kode_kelas']) ?></td>
                                                <td><?php echo ($row['dosen']) ?></td>
                                                <td>
                                                    <a href="/SPRINTER/SPRINTER/files/<?php echo ($row['url_rps']) ?>" style="color: red;">
                                                        <img src="assets/img/pdfIcon.svg" alt="download File Rps">
                                                        <?php echo ($row['url_rps']) ?>.pdf
                                                    </a>
                                                </td>
                                                <td><?php echo ($row['nama_lab']) ?></td>
                                                <td>
                                                    <?php
                                                        if ($row['status_ajuan'] == "On Process") { ?>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="admin-ajuan.php?kda=<?php echo ($row['kode_ajuan'])?>" style="color: green;">accept
                                                                    </a>
                                                                </div>
                                                                <div class="col">
                                                                    <a href="" style="color: red;">reject</a>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        } else {
                                                            echo "no need action";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        <!-- end of isi dari table -->
                                        <?php
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
                    <?php } ?>
                    </div>
                </div>
                <!-- End Lihat Ajuan -->
            </section>

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