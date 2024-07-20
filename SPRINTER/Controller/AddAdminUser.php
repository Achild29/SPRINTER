<?php
    include '../koneksi.php';
    $user=$_POST['username'];
    $pass=$_POST['pass'];
    
    $nmLab=$_POST['namaLab'];
    $kode_lab="Lab-".substr($nmLab,0,5);
    // var_dump($kode_lab);
    // die;
    try {
        $sql = "INSERT INTO admin (username, password) VALUES ('$user', '$pass')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->affected_rows;
        if ($result > 0) {
            $sqlLab = "INSERT INTO laboratorium (kode_lab, nama_lab, username) VALUES ('$kode_lab', 'Lab $nmLab', '$user')";
            $simpanLab = mysqli_query($connect, $sqlLab);
            header("location: ../administrator-setting.php");
        }
    } catch (Exception $e) {
        $msg = "msg :" . $e->getMessage();
        // echo $msg;
        // var_dump($result);
        // var_dump($stmt);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="assets/img/icon-unpam-website.png" rel="icon">
            <link href="assets/img/icon-unpam-apple-touch.png" rel="apple-touch-icon">
            <title>error</title>
            <link href="../assets/css/login.css" rel="stylesheet">
        </head>
        <body back>
        <input type="hidden" id="msg" value="<?php echo $msg; ?>">
            <script>
                const msgOut = document.getElementById("msg").value;
                alert('Error Menambahkan Data ,' + msgOut);
                window.location = 'javascript:history.go(-1)';
            </script>
        </body>
        </html><?php
    }
