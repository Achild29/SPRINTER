<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Jadwal Kuliah</h2>
        
        <!-- Form Filter Pekan -->
        <form method="GET" action="">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="pekan" class="form-label"></label>
                    <select class="form-select" id="pekan" name="pekan">
                        <option value="">Semua Pekan</option>
                        <?php
                        include 'koneksi.php';
                        
                        // Query untuk mengambil daftar pekan dari tabel jadwal
                        $queryPekan = "SELECT DISTINCT pekan FROM jadwal ORDER BY pekan";
                        $resultPekan = $connect->query($queryPekan);
                        
                        if ($resultPekan->num_rows > 0) {
                            while ($rowPekan = $resultPekan->fetch_assoc()) {
                                $selected = isset($_GET['pekan']) && $_GET['pekan'] == $rowPekan['pekan'] ? 'selected' : '';
                                echo "<option value='" . $rowPekan['pekan'] . "' $selected>Pekan " . $rowPekan['pekan'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Prodi</th>
                    <th>Mata Kuliah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Ambil nilai pekan dari query string
                $pekan = isset($_GET['pekan']) ? $_GET['pekan'] : '';

                // Buat query SQL dengan filter pekan
                $query = "
                    SELECT w.hari, w.jam_mulai, w.jam_selesai, p.nama_prodi, m.nama_mkp
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
