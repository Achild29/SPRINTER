<?php

include '../koneksi.php';

$kode_prodi = $_POST['kode_prodi'];
$nama_mkp = $_POST['nama_mkp'];
$sks = $_POST['sks'];
$mk = explode(' ',$nama_mkp);
if(count($mk)>1){
    $kode_mkp = "".$kode_prodi.substr($mk[0],0,3).substr($mk[count($mk)-1],0,2).$sks;
}
else $kode_mkp = "".substr($kode_prodi,5).$nama_mkp.$sks;

if ($kode_prodi === "Pilih Prodi") {
    echo "<script language='javascript'> alert('Harap Pilih Prodi yang telah tersedia terlebih dahulu!');
	window.location = 'javascript:history.go(-1)'</script>";
} elseif (empty($_POST['nama_mkp'])) {
    echo "<script language='javascript'> alert('Nama MKP tidak Boleh Kosong!');
	window.location = 'javascript:history.go(-1)'</script>";
} elseif (empty($_POST['sks'])) {
    echo "<script language='javascript'> alert('SKS tidak Boleh Kosong!');
	window.location = 'javascript:history.go(-1)'</script>";
} elseif (!is_numeric($sks)) {
    echo "<script language='javascript'> alert('SKS Harus berupa angka!');
	window.location = 'javascript:history.go(-1)'</script>";
} else {
    $sql = "INSERT INTO mkp (kode_mkp, kode_prodi, nama_mkp, sks) VALUES ('$kode_mkp','$kode_prodi','$nama_mkp','$sks')";
    $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
    header("location: ../admin-master-mkp.php");
}
?>