<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan Pihak Wewenang</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Load Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('/layanandesa/images/laporanbg.jpg');
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

        th {
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
        <h2>Data Laporan Pihak Wewenang</h2>
    </div>
    <div class="container">
        <a href="../dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        <a href="create.php" class="btn btn-success float-right mb-3">Tambah Laporan</a>
        
        <?php
            require 'koneksi.php'; // Connecting to the database

            // Sorting settings
            $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'id_interaksi';
            $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

            // Toggle sorting order (ascending or descending)
            $new_sort_order = ($sort_order == 'ASC') ? 'DESC' : 'ASC';

            // Query for the table with JOIN to get the names of the authorities and the reporter
            $query = "
                SELECT ppw.*, pw.nama_wewenang, u.nama_penduduk AS nama_pelapor
                FROM pelaporan_pihak_wewenang ppw
                JOIN pihak_wewenang pw ON ppw.id_wewenang = pw.id_wewenang
                JOIN masyarakat u ON ppw.NIK = u.NIK
                ORDER BY $sort_column $sort_order
            ";
            $hasil = mysqli_query($conn, $query);
        ?>

        <!-- Table to display data -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="color: white;">
                        <a class="judultabel">No.</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=id_interaksi&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">ID Interaksi</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=id_wewenang&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">ID Wewenang</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=NIK&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">NIK</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=deskripsi_interaksi&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Deskripsi Interaksi</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=status_interaksi&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Status</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=catatan_interaksi&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Catatan</a>
                    </th>
                    <th scope="col" style="text-align: center; color: white;">
                        <a class="judultabel">Data Interaksi</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($hasil)) {
                        echo "<tr>";
                        echo "<td>" . $no . ".</td>";
                        echo "<td>" . $data['id_interaksi'] . "</td>";
                        echo "<td>" . htmlspecialchars($data['nama_wewenang']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['nama_pelapor']) . "</td>"; 
                        echo "<td>" . $data['deskripsi_interaksi'] . "</td>";
                        echo "<td>" . $data['status_interaksi'] . "</td>";
                        echo "<td>" . $data['catatan_interaksi'] . "</td>";
                        echo "<td style='text-align: center;'>
                                <a href='view.php?id_interaksi=" . $data['id_interaksi'] . "' class='btn btn-info btn-sm' title='view'>
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
