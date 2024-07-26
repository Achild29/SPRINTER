<?php
    include '../koneksi.php';

    $kode_kelas = $_POST['kode_kelas'];
    $kode_prodi = $_POST['kode_prodi'];
    $semester = $_POST['semester'];
    $reg = $_POST['reg'];
    $smt = is_numeric($semester);

    $msg = "";
    
    if (empty($kode_kelas)) {
        echo "<script language='javascript'> alert('Kode Prodi tidak Boleh Kosong!');
        window.location = 'javascript:history.go(-1)'</script>";
    } elseif ($kode_prodi === "Pilih Prodi") {
        echo "<script language='javascript'> alert('Harap pilih prodi yang telah tersedia!');
        window.location = 'javascript:history.go(-1)'</script>";
    } elseif (empty($semester)) {
        echo "<script language='javascript'> alert('Semester tidak Boleh Kosong!');
        window.location = 'javascript:history.go(-1)'</script>";
    } elseif ($reg === "Pilih Reguler") {
        echo "<script language='javascript'> alert('Harap pilih reguler yang telah tersedia!');
        window.location = 'javascript:history.go(-1)'</script>";
    } elseif ($smt) {
        $sql = "INSERT INTO kelas (kode_kelas, kode_prodi, semester, Reguler) VALUES ('$kode_kelas','$kode_prodi','$semester','$reg')";
        try {
            $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
            // header("location: ../admin-master-kelas.php");
            if ($simpan) {
                $msg .= "BERHASIL TAMBAH DATA";
                sukesOutput($msg);
            }
        } catch (Exception $e) {
            $msg .= "error: " . $e->getMessage();
            erorOutput($msg);
        }
    } else {
        echo "<script language='javascript'> alert('Semester harus berupa angka jangan huruf');
	window.location = 'javascript:history.go(-1)'</script>";
    }
    $connect->close();

    function sukesOutput($msg) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>BERHASIL TAMBAH DATA</title>
        </head>
        <body back>
            <input type="hidden" id="msg" value="<?php echo $msg; ?>">
            <script>
                const msgOut = document.getElementById("msg").value;
                alert('SUKSES ,' + msgOut);
                window.location = 'javascript:history.go(-1)';
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
?>
