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



$sql = "INSERT INTO mkp (kode_mkp, kode_prodi, nama_mkp, sks) VALUES ('$kode_mkp','$kode_prodi','$nama_mkp','$sks')";
$simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
header("location: ../admin-master-mkp.php")
?>