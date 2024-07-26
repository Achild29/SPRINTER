<?php

    include '../koneksi.php';

    $kode_prodi = $_POST['kode_prodi'];
    $nama_mkp = $_POST['nama_mkp'];
    $sks = $_POST['sks'];
    $mk = explode(' ',$nama_mkp);
    $msg = "";
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