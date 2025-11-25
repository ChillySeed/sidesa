<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Customer Support</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Load Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/support.jpg');
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
    td, th {
        white-space: nowrap; 
        text-overflow: ellipsis; 
        overflow: hidden; 
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
        <h2>Customer Support</h2>
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
            Tambah Permintaan
        </button>

        <?php
        require 'koneksi.php';

        // Sorting default pas login
        $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'id_user_support';
        $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

        // Toggle ascending or descending
        $new_sort_order = ($sort_order == 'ASC') ? 'DESC' : 'ASC';

        // Query with JOIN to get the names of the customer support officer and customer
        $query = "
            SELECT st.*, cs.nama_agen, m.nama_penduduk AS nama_customer
            FROM support_ticket st
            JOIN customer_support cs ON st.id_cs = cs.id_cs
            JOIN masyarakat m ON st.NIK = m.NIK
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
                        <a href="?sort_column=id_user_support&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">ID Ticket</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=id_customer_support&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Nama Petugas</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=NIK&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Nama Customer</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=tanggal_layanan&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Tanggal Layanan</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=catatan&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Catatan</a>
                    </th>
                    <th scope="col" style="text-align: center; color: white;">
                        <a class="judultabel">Info Permintaan</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($hasil)) {
                    echo "<tr>";
                    echo "<td style='text-align: center;'>" . $no . ".</td>";
                    echo "<td style='text-align: center;'>" . $data['id_user_support'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['nama_agen'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['nama_customer'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['tanggal_layanan'] . "</td>";
                    echo "<td style='text-align: center;'>" . $data['catatan'] . "</td>";
                    echo "<td style='text-align: center;'>
                            <a href='view.php?id_user_support=" . $data['id_user_support'] . "' class='btn btn-info btn-sm' title='view'>
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
