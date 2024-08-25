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

    <title>Jadwal - SPRINTER UNPAM</title>
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
    <link href="assets/css/page-admin.css" rel="stylesheet">
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
            <h1> <?php echo $nama ?></h1>
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
              <a href="admin-jadwal.php" class="active">
                <i class="bi bi-circle"></i><span>Lihat Jadwal</span>
              </a>
            </li>
            <li>
              <a href="admin-input-jadwal.php">
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
            <h1>JADWAL</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Halaman Jadwal Praktikum</li>
              </ol>
            </nav>
          </div>
        </div>
      </div><!-- End Page Title -->

      <!-- ======= Section Jadwal ======= -->
      <section id="jadwal" class="jadwal">
        <div id="jadwal" class="card-body">

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
                          if ($row['kode_lab'] == $_GET['kode_lab']) {
                            $showOptions .= "selected ";
                          }
                        }
                        $showOptions .= "value='" . $row['kode_lab'] . "'>" . $row['nama_lab'] . "</option>";
                        echo ($showOptions);
                      }
                      ?>
                    </select>
                  </div>
                <?php } ?>
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
                        if ($row['pekan'] == $_GET['pekan']) {
                          $showOptions .= "selected ";
                        }
                      }
                      $showOptions .= "value='" . $row['pekan'] . "'>" . "pekan ke-" . $row['pekan'] . "</option>";
                      echo ($showOptions);
                    }
                    ?>
                  </select>
                </div>
            </form>

            <div class="col-md-4 ms-auto">
              <div class="row">
                <div class="col">
                  <?php if ($user == "darksystem") { ?>
                    <a href="jadwalxls.php?p=<?php echo ($_GET['pekan']) ?>&l=<?php echo ($_GET['kode_lab']) ?>" class="btn btn-success">Export to XLS</a>
                  <?php } else { ?>
                    <a href="jadwalxls.php?p=<?php echo ($_GET['pekan']) ?>&l=<?php echo ($_GET['kode_lab']) ?>" class="btn btn-success">Export to Excel</a>
                  <?php
                  }
                  ?>
                  <?php if ($user == "darksystem") { ?>
                    <a href="jadwalPdf.php?p=<?php echo ($_GET['pekan']) ?>&l=<?php echo ($_GET['kode_lab']) ?>" class="btn btn-danger">Export to PDF</a>
                  <?php } else {
                    $kd_lab = "SELECT kode_lab FROM laboratorium WHERE username='" . $user . "'";
                    $kdLab = "";
                    $field = $connect->prepare($kd_lab);
                    $field->execute();
                    $res1 = $field->get_result();
                    if ($res1->num_rows > 0) {
                      while ($row = $res1->fetch_assoc()) {
                        $kdLab .= $row['kode_lab'];
                      }
                    }
                  ?>
                    <a href="jadwalPdf.php?p=<?php echo ($_GET['pekan']) ?>&l=<?php echo ($kdLab) ?>" class="btn btn-danger">Export to PDF</a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
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
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($namaLab == "Super User") {
                // Ambil nilai pekan dan kode_lab dari query string
                $lab = isset($_GET['kode_lab']) ? $_GET['kode_lab'] : '';
                $pekan = isset($_GET['pekan']) ? $_GET['pekan'] : '';

                // Buat query SQL dengan filter pekan
                $query = "
                SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp, a.kode_kelas, a.dosen, l.nama_lab, j.pekan, j.kode_jadwal
                FROM jadwal j
                JOIN ajuan a ON j.kode_ajuan = a.kode_ajuan
                JOIN waktu w ON a.kode_waktu = w.kode_waktu
                JOIN prodi p ON a.kode_prodi = p.kode_prodi
                JOIN mkp m ON a.kode_mkp = m.kode_mkp
                JOIN laboratorium l ON a.kode_lab = l.kode_lab
                ";

                $where = [];
                $params = [];
                $types = '';

                if ($lab !== '') {
                  $where[] = 'a.kode_lab = ?';
                  $params[] = $lab;
                  $types .= 's';
                }

                if ($pekan !== '') {
                  $where[] = 'j.pekan = ?';
                  $params[] = $pekan;
                  $types .= 'i';
                }

                if (count($where) > 0) {
                  $query .= ' WHERE ' . implode(' AND ', $where);
                }

                $query .= " ORDER BY j.pekan, w.reguler, w.kode_waktu";
                // Prepare dan execute query
                $stmt = $connect->prepare($query);

                if (count($params) > 0) {
                  $stmt->bind_param($types, ...$params);
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
                    echo "<td>" . $row['pekan'] . "</td>"; ?>
                    <td>
                      <div class="row">
                        <center>
                          <button type="button" class="btn btn-danger btn-hapus" data-id="<?= $row['kode_jadwal'] ?>">Hapus</button>
                        </center>
                      </div>
                    </td>
                  <?php
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='8'>Tidak ada jadwal tersedia</td></tr>";
                }

                $stmt->close();
                $connect->close();
              } else {
                $pekan = isset($_GET['pekan']) ? $_GET['pekan'] : '';
                $sql = "
                SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp, a.kode_kelas, a.dosen, l.nama_lab, j.pekan, j.kode_jadwal
                FROM jadwal j
                JOIN ajuan a ON j.kode_ajuan = a.kode_ajuan
                JOIN waktu w ON a.kode_waktu = w.kode_waktu
                JOIN prodi p ON a.kode_prodi = p.kode_prodi
                JOIN mkp m ON a.kode_mkp = m.kode_mkp
                JOIN laboratorium l ON a.kode_lab = l.kode_lab
                ";
                $sql .= " WHERE l.username ='" . $user . "'";
                if ($pekan !== '') {
                  $sql .= " AND j.pekan = ?";
                }
                $sql .= " ORDER BY j.pekan, w.reguler, w.kode_waktu";
                $stmt = $connect->prepare($sql);
                if ($pekan !== '') {
                  $stmt->bind_param("i", $pekan);
                }
                $stmt->execute();
                $result = $stmt->get_result();
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
                    echo "<td>" . $row['pekan'] . "</td>"; ?>
                    <td>
                      <div class="row">
                        <center>
                          <button type="button" class="btn btn-danger btn-hapus" data-id="<?= $row['kode_jadwal'] ?>">Hapus</button>
                        </center>
                      </div>
                    </td>
              <?php
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

    </main><!-- ======= End #main ======= -->

    <!-- Modal -->
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color: red;">Konfirmasi Penghapusan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="color: black;">
            Apakah Anda yakin ingin menghapus data?
            <!-- <span id="namaData"></span>? -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger btn-konfirmasi-hapus">Hapus</button>
          </div>
        </div>
      </div>
    </div>


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

    <!-- ======= Vendor JS Files ======= -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- ======= Main JS File ======= -->
    <script src="assets/js/main.js"></script>

    <script>
      $(document).ready(function() {
        var data1;
        $('.btn-hapus').click(function() {
          data1 = $(this).data('id');

          // console.log(data1);

          $('#modalHapus').modal('show');
        });

        $('.btn-konfirmasi-hapus').click(function() {
          var data2 = data1
          // console.log(data2);

          $.ajax({
            url: 'Controller/HapusJadwal.php',
            method: 'POST',
            data: {
              id: data2
            },
            success: function(response) {
              $('#modalHapus').modal('hide');
              window.location = 'Controller/HapusJadwal.php';
            }
          });
        });
      });
    </script>

  </body>

  </html>

<?php
}
?>