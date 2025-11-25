<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Data Masyarakat</title>
    <!-- Memuat file CSS Bootstrap secara luring -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Memuat file Bootstrap Icons secara daring -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../images/masya.jpg');
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
        max-width: 2500px;
        overflow: hidden;
        width: 100%;
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

<body>
    <div class="header-gradient">
        <h2>Data Masyarakat Desa</h2>
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
            Tambah Data Warga
        </button>

        <?php
        require 'koneksi.php';

        // Sorting default pas login
        $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'NIK';
        $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

        // Toggle ascending or descending
        $new_sort_order = ($sort_order == 'ASC') ? 'DESC' : 'ASC';

        // Query for the table
        $query = "SELECT * FROM masyarakat ORDER BY $sort_column $sort_order";
        $hasil = mysqli_query($conn, $query);
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="color: white;">
                        <a class="judultabel">No.</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=NIK&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">NIK</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=nama_lengkap&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Nama Lengkap</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=alamat&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Alamat / Domisili</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=tanggal_lahir&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Tanggal Lahir</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=no_telepon&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">No Telepon</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=email&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Email</a>
                    </th>
                    <th scope="col" style="text-align: center; color: white;">
                        <a class="judultabel">Data Warga</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($hasil)) {
                    echo "<tr>";
                    echo "<td>" . $no . ".</td>";
                    echo "<td>" . $data['NIK'] . "</td>";
                    echo "<td>" . $data['nama_lengkap'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['tanggal_lahir'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['no_telepon'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['email'] . "</td>";
                    echo "<td style='text-align: center;'>
                            <a href='view.php?NIK=" . $data['NIK'] . "' class='btn btn-info btn-sm' title='view'>
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