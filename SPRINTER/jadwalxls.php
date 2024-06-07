<!-- end of pengecekaan session -->
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lihat Jadwal</title>
    </head>
    <body>
    

    <?php

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=jadwal praktikum.xls");
    ?>
    <!-- Jadwal yang disimpan ke .xls -->
        
                <h5 class="card-header">Jadwal Praktikum Pekan ke <?php echo ($_GET['p'])?></h5>
                    
                    <div class="mb-3">
                        <table class="table table-striped">
                                <tr>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Prodi</th>
                                    <th>Mata Kuliah</th>
                                    <th>Kelas</th>
                                </tr>
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
                        </table>
                    </div>
                
    <!-- end of lihat Jadwal -->
    </body>
</html>
