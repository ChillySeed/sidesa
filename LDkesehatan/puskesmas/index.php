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
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../images/puskesmas.jpg');
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
        <h2>Data PUSKESMAS Desa</h2>
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
            Tambah Data PUSKESMAS
        </button>

        <?php

        require 'koneksi.php';

        // Sorting default pas login
        $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'id_puskesmas';
        $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

        // Toggle ascending atau descending
        $new_sort_order = ($sort_order == 'ASC') ? 'DESC' : 'ASC';


        $query = "SELECT * FROM puskesmas ORDER BY $sort_column $sort_order";
        $hasil = mysqli_query($conn, $query);
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="color: white;">
                        <a class="judultabel">No.</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=id_puskesmas&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">ID PUSKESMAS</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=nama_puskesmas&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Nama Puskesmas</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=alamat&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Alamat</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=no_telepon&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">No. Telepon</a>
                    </th>
                    <th scope="col" style="text-align: center; color: white;">
                        <a class="judultabel">Data PUSKESMAS</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($hasil)) {
                    echo "<tr>";
                    echo "<td>" . $no . ".</td>";
                    echo "<td>" . $data['id_puskesmas'] . "</td>";
                    echo "<td>" . $data['nama_puskesmas'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['no_telepon'] . "</td>";
                    echo "<td style='text-align: center;'>
                            <a href='view.php?id_puskesmas=" . $data['id_puskesmas'] . "' class='btn btn-info btn-sm' title='view'>
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