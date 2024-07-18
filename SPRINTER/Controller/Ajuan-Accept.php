<?php
    // var_dump($_POST);
    // die;
    include '../koneksi.php';
    $kode_waktu = $_POST['kode_waktu'];
    $pekan = $_POST['pekan'];
    $kelas = $_POST['kelas'];
    // $dosen = $_POST['dosen'];
    
    $kda = $_POST['kda'];
    $kode_prodi = "";
    $kode_mkp= "";
    $kode_lab = "";
    
    $ql ="SELECT kode_prodi, kode_mkp, kode_lab FROM ajuan WHERE kode_ajuan ='$kda'";
    $stmt = $connect->prepare($ql);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kode_prodi .= $row['kode_prodi'];
            $kode_mkp .= $row['kode_mkp'];
            $kode_lab .= $row['kode_lab'];
        }
    }
    $kode_jadwal = substr($kode_waktu,0,6).substr($kode_prodi,3,2).substr($kode_mkp,5).substr($kelas,7,2).$pekan;
    // var_dump($kode_prodi);
    // var_dump($kode_mkp);
    // var_dump($kode_lab);
    // var_dump($kode_jadwal);
    $cekAjuan = "SELECT COUNT(j.kode_ajuan) FROM jadwal j WHERE j.kode_ajuan='$kda'";
    // $stmtCount = $connect->prepare($cekAjuan);
    // $stmtCount->execute();
    // $cekCount = $stmtCount->get_result();
    // var_dump($cekCount);
    // var_dump($cekCount->num_rows);
    $count = "";
    $cekCount = mysqli_query($connect,$cekAjuan);
    while ($a=mysqli_fetch_array($cekCount)) {
        $count .= $a['COUNT(j.kode_ajuan)'];
        // var_dump($a);
    }
    // var_dump($count);
    // var_dump($count);
    // var_dump($count < 2);
    // var_dump($_POST);   
    // die;
    if ($count < 6) { //kode ini tolong jangan ubah
        $sqlJadwal = "INSERT INTO jadwal (kode_jadwal, kode_ajuan, kode_waktu, pekan) VALUES ('$kode_jadwal', '$kda', '$kode_waktu', '$pekan')";
        $simpanJadwal = mysqli_query($connect,$sqlJadwal) or die ("Gagal Tambah : ".mysqli_error($connect));
        header("location: ../admin-input-jadwal.php?kda=$kda#Ajuan-Accept");
    } else {
        $sqlJadwal = "INSERT INTO jadwal (kode_jadwal, kode_ajuan, kode_waktu, pekan) VALUES ('$kode_jadwal', '$kda', '$kode_waktu', '$pekan')";
        $sqlUpdate = "UPDATE ajuan set status_ajuan ='Accept' where kode_ajuan ='$kda'";
        $simpanJadwal = mysqli_query($connect,$sqlJadwal) or die ("Gagal Tambah : ".mysqli_error($connect));
        $simpanUpdate = mysqli_query($connect,$sqlUpdate) or die ("Gagal Tambah : ".mysqli_error($connect));
        header("location: ../admin-jadwal.php");
    }

    // var_dump($simpanJadwal);
    // var_dump($simpanUpdate);
?>