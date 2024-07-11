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

  <!-- ====== Template Main CSS File ====== -->
  <link href="assets/css/admin-style.css" rel="stylesheet">

  <script>
            <?php
                include 'koneksi.php';

                $kode_prodi = isset($_POST['kode_prodi']) ? $_POST['kode_prodi'] : '';

                function getProdiOptions($conn, $selectedKodeProdi) {
                    $sql = "SELECT kode_prodi, nama_prodi FROM Prodi";
                    $result = $conn->query($sql);
                    $options = "<option value=''>Pilih Kode Prodi</option>";
                    while($row = $result->fetch_assoc()) {
                        $selected = ($row['kode_prodi'] == $selectedKodeProdi) ? 'selected' : '';
                        $options .= "<option value='{$row['kode_prodi']}' {$selected}>{$row['nama_prodi']}</option>";
                    }
                    return $options;
                }
                function getMKPOptions($conn, $kode_prodi) {
                    if ($kode_prodi) {
                        $sql = "SELECT kode_mkp, nama_mkp FROM MKP WHERE kode_prodi='$kode_prodi'";
                        $result = $conn->query($sql);
                        $options = "<option value=''>Pilih Mata Kuliah</option>";
                        while($row = $result->fetch_assoc()) {
                            $options .= "<option value='{$row['kode_mkp']}'>{$row['nama_mkp']}</option>";
                        }
                        return $options;
                    } else {
                        return "<option value=''>Pilih Mata Kuliah</option>";
                    }
                }
            ?>
            function updateJamOptions() {
                var reg = document.getElementById("reg").value;
                var jam = document.getElementById("jam");
                var hari = document.getElementById("hari")
                // Clear previous options
                jam.innerHTML = ""; 
                hari.innerHTML = "";
                if (reg == "A" || reg == "B") {
                    addOption(hari, "1", "Senin");
                    addOption(hari, "2", "Selasa");
                    addOption(hari, "3", "Rabu");
                    addOption(hari, "4", "Kamis");
                    addOption(hari, "5", "Jum'at");
                    if (reg == "A") {
                        addOption(jam, "07:10:00", "Jam ke-1 (07.10)");
                        addOption(jam, "08:50:00", "Jam ke-2 (08.50)");
                        addOption(jam, "10:30:00", "Jam ke-3 (10.30)");
                        addOption(jam, "13:00:00", "Jam ke-4 (13.00)");
                        addOption(jam, "14:40:00", "Jam ke-5 (14.40)");
                    } else if (reg == "B") {
                        addOption(jam, "18:20:00", "Jam ke-1 (18.20)");
                        addOption(jam, "20:00:00", "Jam ke-2 (20.00)");
                    }
                } else if (reg == "C") {
                    addOption(jam, "1", "Jam ke-1 (07.40)");
                    addOption(jam, "2", "Jam ke-2 (09.20)");
                    addOption(jam, "3", "Jam ke-3 (11.00)");
                    addOption(jam, "4", "Jam ke-4 (12.40)");
                    addOption(jam, "5", "Jam ke-5 (14.20)");
                    addOption(hari, "1", "Kamis K-1");
                    addOption(hari, "2", "Kamis K-2");
                    addOption(hari, "3", "Sabtu K-1");
                    addOption(hari, "4", "Sabtu K-2");
                } 
            }
            function addOption(selectbox, value, text) {
                var option = document.createElement("option");
                option.value = value;
                option.text = text;
                selectbox.appendChild(option);
            }
  </script>
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

      <!-- Sidebar Dashboard -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-columns-gap"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Sidebar Dashboard -->

      <!-- Sidebar Ajuan -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-ajuan.php">
          <i class="bi bi-calendar2-plus"></i>
          <span>Ajuan</span>
        </a>
      </li><!-- End Sidebar Ajuan -->

      <!-- ======= Sidebar Jadwal Dropdown ======= -->
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#jadwal-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar4-event"></i><span>Jadwal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="jadwal-nav" class="nav-content show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin-jadwal-new.php" class="active">
              <i class="bi bi-circle"></i><span>Lihat Jadwal</span>
            </a>
          </li>
          <li>
            <a href="admin-input-jadwal-new.php">
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
              <i class="bi bi-circle"></i><span>Master PRODI</span>
            </a>
          </li>
          <li>
            <a href="admin-master-mkp.php">
              <i class="bi bi-circle"></i><span>Master MKP</span>
            </a>
          </li>
          <li>
            <a href="admin-master-waktu.php">
              <i class="bi bi-circle"></i><span>Master WAKTU</span>
            </a>
          </li>
          <li>
            <a href="admin-master-kelas.php">
              <i class="bi bi-circle"></i><span>Master KELAS</span>
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
          <h1>LIHAT JADWAL</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">Halaman Jadwal Praktikum</li>
            </ol>
          </nav>
        </div>
      </div>
    </div><!-- End Page Title -->

    <section id="lihat-jadwal" class="lihat-jadwal">  
      <!-- ======= Lihat Jadwal ======= -->
      <div id="lihat-jadwal" class="card-body">
        <div class="mb-3">
          <form action="" method="GET">
          <div class="row">
            <?php if ($user == "darksystem") { ?>
            <div class="col-md-3">
              <select class="form-select" id="pekan" name="kode_lab" required onchange="this.form.submit()">
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
            </div> <?php } ?>
            <div class="col-md-3">
              <select class="form-select" id="pekan" name="pekan" required onchange="this.form.submit()">
                <option value="">semua pekan</option>
                <?php
                  $query = "SELECT DISTINCT pekan FROM jadwal ORDER BY pekan ASC";
                  $field = $connect->prepare($query);
                  $field->execute();
                  $res1 = $field->get_result();
                  while ($row = $res1->fetch_assoc()) {
                    $showOptions = "<option ";
                    if (isset($_GET['pekan'])) {
                        if ($row['pekan']==$_GET['pekan']) {
                        $showOptions .= "selected ";
                        }
                    }
                    $showOptions .= "value='" . $row['pekan'] . "'>" ."pekan ke-". $row['pekan'] . "</option>";
                    echo ($showOptions);
                  }
                ?>
              </select>
            </div>
            </form>
          </div>
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
                <th>laboratorium</th>
                <th>Pekan</th>
              </tr>
            </thead>
            <tbody>
            <?php
              if ($user == "darksystem") {
                $lab = isset($_GET['kode_lab']) ? $_GET['lab'] : '';
                $pekan = isset($_GET['pekan']) ? $_GET['pekan'] : '';
                $sql = "
                  SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp, j.kode_kelas, j.dosen, l.nama_lab, j.pekan
                  FROM jadwal j
                  INNER JOIN waktu w ON j.kode_waktu = w.kode_waktu
                  INNER JOIN mkp m ON j.kode_mkp = m.kode_mkp
                  INNER JOIN prodi p ON m.kode_prodi = p.kode_prodi
                  INNER JOIN laboratorium l ON j.kode_lab = l.kode_lab
                ";
                if ($lab !== '' && $pekan !== '') {
                  $sql .= " WHERE l.kode_lab = ?";
                  $sql .= " AND j.pekan = ?";
                } 
                if ($lab !== '') {
                  $sql .= " WHERE l.kode_lab = ?";
                } 
                if ($pekan !== '') {
                  $sql .= " WHERE j.pekan = ?";
                }
                $sql .= " ORDER BY w.hari, w.jam_mulai";
                $stmt = $connect->prepare($sql);
                
                if ($lab !== '') {                      
                  $stmt->bind_param("i", $lab);
                }
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
                      echo "<td>" . $row['nama_lab'] . "</td>";
                      echo "<td>" . $row['pekan'] . "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='5'>Tidak ada jadwal tersedia</td></tr>";
                  }

                  $stmt->close();
                  $connect->close();
              }
            ?>
            </tbody>
          </table>
        </div>
      </div><!-- End Lihat Jadwal -->

    </section>


  </main>
    
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  </body>

</html>

<?php
    }
?>