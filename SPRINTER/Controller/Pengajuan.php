<?php
    include '../koneksi.php';

    // var_dump($_POST);
    // var_dump($_FILES);
    // die;
    
    $kode_kelas = $_POST['kelas'];
    $kode_prodi = $_POST['prodi'];
    $kode_mkp = $_POST['mkp'];
    $dosen = $_POST['dosen'];
    $kode_lab = $_POST['kode_lab'];
    $rps = upload();
    $msg="";
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

    $sql = "INSERT INTO ajuan (kode_ajuan, kode_prodi, kode_kelas, kode_mkp, dosen, kode_lab, url_rps, status_ajuan) VALUES ('$kode_ajuan','$kode_prodi','$kode_kelas','$kode_mkp','$dosen','$kode_lab', '$rps','$status_ajuan')";
    // header("location: ../prodi-ajuan.php");
    try {
        $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
        if ($simpan) {
            $msg .= "BERHASIL";
            suksesOutput($msg);
        }
    } catch (Exception $e) {
        $msg .= "error: " . $e->getMessage();
        erorOutput($msg);
    }

    $connect->close();

    function suksesOutput($msg) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>BERHASIL</title>
        </head>
        <body back>
            <input type="hidden" id="msg" value="<?php echo $msg; ?>">
            <script>
                const msgOut = document.getElementById("msg").value;
                alert('SUKSES ,' + msgOut);
                window.location = '../prodi-ajuan.php';
            </script>
        </body>
        </html>
        <?php
    }

    function erorOutput($msg) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>EROR</title>
        </head>
        <body back>
            <input type="hidden" id="msg" value="<?php echo $msg; ?>">
            <script>
                const msgOut = document.getElementById("msg").value;
                alert('EROR ,' + msgOut);
                window.location = 'javascript:history.go(-1)';
            </script>
        </body>
        </html>
        <?php
    }
