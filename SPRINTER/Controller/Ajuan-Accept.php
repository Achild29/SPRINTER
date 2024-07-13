<?php
    // var_dump($_POST);
    include '../koneksi.php';
    $kode_waktu = $_POST['kode_waktu'];
    $pekan = $_POST['pekan'];
    $kelas = $_POST['kelas'];
    $dosen = $_POST['dosen'];
    
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
    
    $sqlJadwal = "INSERT INTO jadwal (kode_jadwal, kode_waktu, kode_mkp, kode_kelas, kode_lab, pekan, dosen) VALUES ('$kode_jadwal','$kode_waktu', '$kode_mkp', '$kelas', '$kode_lab', '$pekan', '$dosen')";
    $sqlUpdate = "UPDATE ajuan set status_ajuan ='Accept' where kode_ajuan ='$kda'";
    $simpanJadwal = mysqli_query($connect,$sqlJadwal) or die ("Gagal Tambah : ".mysqli_error($connect));
    $simpanUpdate = mysqli_query($connect,$sqlUpdate) or die ("Gagal Tambah : ".mysqli_error($connect));
    header("location: ../admin-jadwal.php");
    // var_dump($simpanJadwal);
    // var_dump($simpanUpdate);
?>