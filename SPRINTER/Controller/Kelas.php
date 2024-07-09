<?php
    include '../koneksi.php';

    $kode_kelas = $_POST['kode_kelas'];
    $kode_prodi = $_POST['kode_prodi'];
    $semester = $_POST['semester'];
    $reg = $_POST['reg'];
    $smt = is_numeric($semester);
    if ($smt) {
        $sql = "INSERT INTO kelas (kode_kelas, kode_prodi, semester, Reguler) VALUES ('$kode_kelas','$kode_prodi','$semester','$reg')";
        $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
        header("location: ../admin-master-kelas.php");
    } else {
        echo "<script language='javascript'> alert('Semester harus berupa angka jangan huruf');
	window.location = 'javascript:history.go(-1)'</script>";
    }
?>
