<?php

    include '../koneksi.php';

    $reguler = $_POST['reg'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam'];
    $jam_selesai_str= strtotime("+100 minutes",strtotime($jam_mulai));
    $jam_selesai = date ('H:i:s', $jam_selesai_str);
    $kode_waktu = substr($hari,0,3).$reguler.$jam_mulai;
    $msg = "";

    if ($reguler === "Pilih Reguler") {
        echo "<script language='javascript'> alert('Harap Pilih Reg yang telah tersedia terlebih dahulu!');
        window.location = 'javascript:history.go(-1)'</script>";
    } elseif ($hari === "Pilih Hari") {
        echo "<script language='javascript'> alert('Harap Pilih Hari yang telah tersedia terlebih dahulu!');
        window.location = 'javascript:history.go(-1)'</script>";
    } elseif (empty($jam_mulai)) {
        echo "<script language='javascript'> alert('Jam mulai tidak Boleh Kosong!');
        window.location = 'javascript:history.go(-1)'</script>";
    } else {
        $sql = "INSERT INTO waktu (kode_waktu, reguler, hari, jam_mulai, jam_selesai) VALUES ('$kode_waktu', '$reguler', '$hari', '$jam_mulai', '$jam_selesai')";
        try {
            $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
            if ($simpan) {
                $msg .= "BERHASIL TAMBAH DATA!";
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
                window.location = '../admin-master-waktu.php';
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
                window.location = '../admin-master-waktu.php';
            </script>
        </body>
        </html>
        <?php
    }