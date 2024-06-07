<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Jadwal Praktikum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <center><h2>Jadwal Praktikum Pekan ke <?php echo ($_GET['p']) ?></h2></center>
        <br>
        <div class="float-right">
            <a href="jadwalPdf.php?p=<?php echo ($_GET['pekan']) ?>" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp PRINT</a>
            <br>
            <br>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">Hari</th>
                    <th style="text-align: center;">jam_mulai</th>
                    <th style="text-align: center;">jam_selesai</th>
                    <th style="text-align: center;">prodi</th>
                    <th style="text-align: center;">Mata Kuliah Praktikum</th>
                    <th style="text-align: center;">kelas</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'koneksi.php';
                // Ambil nilai pekan dari query string
                    $pekan = $_GET['p'];

                // Buat query SQL dengan filter pekan
                    $query = "
                        SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp, kelas
                        FROM jadwal j
                        JOIN waktu w ON j.kode_waktu = w.kode_waktu
                        JOIN mkp m ON j.kode_mkp = m.kode_mkp
                        JOIN prodi p ON m.kode_prodi = p.kode_prodi
                    ";

                // Tambahkan kondisi WHERE jika pekan dipilih
                    if ($pekan !== '') {
                        $query .= " WHERE j.pekan = ?";
                    }

                    $query .= " ORDER BY w.hari, w.jam_mulai";

                // Prepare dan execute query
                    $stmt = $connect->prepare($query);

                // Bind parameter jika pekan dipilih
                    if ($pekan !== '') {
                        $stmt->bind_param("i", $pekan);
                    }

                    $stmt->execute();
                    $result = $stmt->get_result();

                // Tampilkan hasil query
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['hari'] . "</td>";
                            echo "<td>" . $row['jam_mulai'] . "</td>";
                            echo "<td>" . $row['jam_selesai'] . "</td>";
                            echo "<td>" . $row['nama_prodi'] . "</td>";
                            echo "<td>" . $row['nama_mkp'] . "</td>";
                            echo "<td>" . $row['kelas'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada jadwal tersedia</td></tr>";
                    }

                    $stmt->close();
                    $connect->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>