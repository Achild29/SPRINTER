<?php
    include '../koneksi.php';

    // var_dump($_POST);
    // var_dump($_FILES);
    // die;

    $kode_kelas = $_POST['kelas'];
    $kode_mkp = $_POST['mkp'];
    $dosen = $_POST['dosen'];
    $rps = upload();
    if (!$rps) {
        return false;
    }
    function upload() {
        $namaFile = $_FILES['rps']['name'];
        $ukuranFile = $_FILES['rps']['size'];
        $error = $_FILES['rps']['error'];
        $tmpName = $_FILES['rps']['tmp_name'];
        $namafile = $_POST['mkp'];

        if ($error === 4) {
            echo "<script>
                alert('pilih file rps.pdf');
                window.location = 'javascript:history.go(-1)'</script>";
            return false;
        }

        $ekstensiValid = ['pdf'];
        $ekstensiFile = explode('.', $namaFile);
        $ekstensiFile = strtolower(end($ekstensiFile));
        if (!in_array($ekstensiFile, $ekstensiValid)) {
            echo "<script>
                alert('file yang anda upload bukan berupa pdf');
                window.location = 'javascript:history.go(-1)'</script>";
            return false;
        }

        $namaFileBaru = $namafile;
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiFile;

        move_uploaded_file($tmpName, '../files/'.$namaFileBaru);
        return $namaFileBaru;
    }
    $kode_ajuan = $kode_kelas . "/" . $kode_mkp;
    $status_ajuan = "On Process";

    $sql = "INSERT INTO ajuan (kode_ajuan, kode_kelas, kode_mkp, dosen, url_rps, status_ajuan) VALUES ('$kode_ajuan','$kode_kelas','$kode_mkp','$dosen','$rps','$status_ajuan')";
    $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
    header("location: ../ajuanBaru.php#inputAjuan")

?>