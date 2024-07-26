<?php

    include '../koneksi.php';


    $kd = $_POST['kd'];
    $msg = $_POST['msg'];
    $erorMsg = "";


    $sql = "UPDATE ajuan set status_ajuan ='Reject : $msg' where kode_ajuan ='$kd'";
    try {
        $simpan = mysqli_query($connect,$sql) or die ("Gagal Tambah : ".mysqli_error($connect));
        header("location: ../admin-lihat-ajuan.php");
    } catch (Exception $e) {
        $erorMsg = "msg :" . $e->getMessage();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>EROR!</title>
        </head>
        <body back>
            <input type="hidden" id="msg" value="<?php echo $msg; ?>">
                <script>
                    const msgOut = document.getElementById("msg").value;
                    alert('Error Menambahkan Data ,' + msgOut);
                    window.location = 'javascript:history.go(-1)';
                </script>
            </body>
        </html>
        <?php
    }
    $connect->close();

?>