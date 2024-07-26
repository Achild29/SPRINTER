<?php

    include '../koneksi.php';

    $kode_prodi = $_POST['kode_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $pass = $_POST['pass'];
    $msg ="";

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
        // header("location: ../admin-master-prodi.php");
        try {
            $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
            if ($simpan) {
                $msg .= "BERHASIL TAMBAH DATA";
                suksesOutput($msg);
            }
        } catch (Exception $e) {
            $msg .= "error: " . $e->getMessage();
            erorOutput($msg);
        }
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
                window.location = '../admin-master-prodi.php';
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