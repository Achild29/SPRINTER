<?php

include '../koneksi.php';

$kode_prodi = $_POST['kode_prodi'];
$nama_prodi = $_POST['nama_prodi'];
$pass = $_POST['pass'];

if (empty($_POST['kode_prodi'])) {
    echo "<script language='javascript'> alert('Kode Prodi tidak Boleh Kosong!');
	window.location = 'javascript:history.go(-1)'</script>";
} elseif (empty($_POST['nama_prodi'])) {
    echo "<script language='javascript'> alert('Nama Prodi tidak boleh kosong!');
	window.location = 'javascript:history.go(-1)'</script>";
} elseif (empty($_POST['pass'])) {
    echo "<script language='javascript'> alert('Username dan Password tidak boleh kosong!');
	window.location = 'javascript:history.go(-1)'</script>";
} else {
    $sql = "INSERT INTO prodi VALUES ('$kode_prodi','$nama_prodi','$pass')";
    $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
    header("location: ../admin-master-prodi.php");
}

?>