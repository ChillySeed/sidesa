<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Kesehatan</title>
    <!-- Memuat file CSS Bootstrap secara luring -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Memuat file Bootstrap Icons secara daring -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../images/dokter.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
    }
    
    .header-gradient {
        background: linear-gradient(90deg, #ff007b, #ff80ff); 
        color: white;
        padding: 20px;
        margin-bottom: 20px; 
        border-radius: 5px;
        text-align: center;
    }

    table {
        background-color: #ECE2D0; 
        border-collapse: collapse;
        border-radius: 10px; 
        overflow: hidden; 
    }
    
    .judultabel {
        color: white;
        background-color: #2ecc71; 
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none; 
        display: inline-block;
        text-align: center;
    }

    .sort-link {
        color: white;
        background-color: #2ecc71;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none; 
        display: inline-block;
        text-align: center;
    }

    .sort-link:hover {
        background-color: #27ae60;
    }
</style>

<body>
    <div class="header-gradient">
        <h2>Data Dokter Desa</h2>
    </div>

    <div class="container">
        <div class="back-btn">
                    <a href="../dashboard.php" class="btn btn-primary">Back to Dashboard</a>
                </div>
        <button 
            type="button" 
            class="btn btn-success float-right" 
            style="margin: 20px" 
            onclick="location.href='create.php'"
        >
            Tambah Data Dokter
        </button>

        <?php
        require 'koneksi.php';

        // Sorting default pas login
        $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'id_dokter';
        $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

        // Toggle ascending or descending
        $new_sort_order = ($sort_order == 'ASC') ? 'DESC' : 'ASC';

        // Query for the table
        $query = "
                SELECT d.*, p.nama_puskesmas
                FROM dokter d
                JOIN puskesmas p ON d.id_puskesmas = p.id_puskesmas
                ORDER BY $sort_column $sort_order
            ";

        $hasil = mysqli_query($conn, $query);
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="color: white;">
                        <a class="judultabel">No.</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=id_dokter&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">ID Dokter</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=id_puskesmas&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">ID Puskesmas</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=nama_dokter&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Nama</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=spesialisasi&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Spesialisasi</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=jadwal_praktik&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Jadwal Praktik</a>
                    </th>
                    <th scope="col" style="text-align: center; color: white;">
                        <a class="judultabel">Data Dokter</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($hasil)) {
                    echo "<tr>";
                    echo "<td>" . $no . ".</td>";
                    echo "<td>" . $data['id_dokter'] . "</td>";
                    echo "<td>" . htmlspecialchars($data['nama_puskesmas']) . "</td>";
                    echo "<td>" . $data['nama_dokter'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['spesialisasi'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['jadwal_praktik'] . "</td>";
                    echo "<td style='text-align: center;'>
                            <a href='view.php?id_dokter=" . $data['id_dokter'] . "' class='btn btn-info btn-sm' title='view'>
                                <i class='bi bi-eye'></i> View
                            </a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>