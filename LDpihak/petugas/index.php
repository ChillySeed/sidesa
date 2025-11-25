<?php
require 'koneksi.php'; // Menghubungkan ke database

// Mengambil data dari tabel pihak_wewenang
$query = "SELECT * FROM pihak_wewenang";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pihak Wewenang</title>
    <!-- Memuat file CSS Bootstrap secara luring -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Memuat file Bootstrap Icons secara daring -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('/layanandesa/images/petugasbg.jpg');
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

        .btn {
            margin: 5px;
        }

        .text-center {
            text-align: center;
        }
        td, th {
        white-space: nowrap; 
        text-overflow: ellipsis; 
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
</head>
<body>
    <div class="header-gradient">
        <h2>Data Pihak Wewenang</h2>
    </div>
    <div class="container">
        <a href="../dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        <a href="create.php" class="btn btn-success float-right mb-3">Tambah Pihak Wewenang</a>
        
        <!-- Tabel untuk menampilkan data -->
        <?php
        require 'koneksi.php';

        // Sorting default pas login
        $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'id_wewenang';
        $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

        // Toggle ascending or descending
        $new_sort_order = ($sort_order == 'ASC') ? 'DESC' : 'ASC';

        // Query for the table
        $query = "SELECT * FROM pihak_wewenang ORDER BY $sort_column $sort_order";
        $hasil = mysqli_query($conn, $query);
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="color: white;">
                        <a class="judultabel">No.</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=id_wewenang&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">id_wewenang</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=nama_wewenang&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Nama Pihak</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=alamat_kantor&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Alamat Kantor</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=jenis_layanan&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Jenis Layanan</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=kontak_darurat&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Kontak Darurat</a>
                    </th>
                    <th scope="col" style="text-align: center; color: white;">
                        <a class="judultabel">Data Pihak</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($hasil)) {
                        echo "<tr>";
                        echo "<td>" . $no . ".</td>";
                        echo "<td>" . $data['id_wewenang'] . "</td>";
                        echo "<td>" . $data['nama_wewenang'] . "</td>";
                        echo "<td>" . $data['alamat_kantor'] . "</td>";
                        echo "<td>" . $data['jenis_layanan'] . "</td>";
                        echo "<td style='text-align: center;'>" . $data['kontak_darurat'] . "</td>";
                        echo "<td style='text-align: center;'>
                                <a href='view.php?id_wewenang=" . $data['id_wewenang'] . "' class='btn btn-info btn-sm' title='view'>
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