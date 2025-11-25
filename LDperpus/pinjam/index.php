<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Perpustakaan</title>
    <!-- Memuat file CSS Bootstrap secara luring -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Memuat file Bootstrap Icons secara daring -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../images/surat.jpg');
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
        <h2>Data Peminjaman Buku Perpustakaan</h2>
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
            Tambah Peminjaman
        </button>

        <?php
            require 'koneksi.php';

            // Sorting default pas login
            $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'id_peminjaman';
            $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

            // Toggle ascending or descending
            $new_sort_order = ($sort_order == 'ASC') ? 'DESC' : 'ASC';

            // Query for the table with JOIN to get the descriptive book title and user name
            $query = "
                SELECT pb.*, b.judul_buku, u.nama_penduduk AS nama_peminjam 
                FROM peminjaman_buku pb
                JOIN buku_perpus b ON pb.id_buku = b.id_buku
                JOIN masyarakat u ON pb.NIK = u.NIK
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
                        <a href="?sort_column=id_peminjaman&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">ID Peminjaman</a>
                    </th>
                    <th scope="col">
                        <a href="?sort_column=id_buku&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Judul Buku</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=NIK&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Nama Peminjam</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=tanggal_pinjam&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Tanggal Peminjaman</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=tanggal_kembali&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Tanggal Kembali</a>
                    </th>
                    <th scope="col" style="text-align: center;">
                        <a href="?sort_column=status_peminjaman&sort_order=<?php echo $new_sort_order; ?>" class="sort-link">Status Buku</a>
                    </th>
                    <th scope="col" style="text-align: center; color: white;">
                        <a class="judultabel">Isi Peminjaman</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $status = $data['status_peminjaman'] == "Kembali" ? "Kembali" : ($data['status_peminjaman'] == "Dipinjam" ? "Dipinjam" : "Terlambat");
                        echo "<tr>";
                        echo "<td>" . $no . ".</td>";
                        echo "<td>" . $data['id_peminjaman'] . "</td>";
                        echo "<td>" . htmlspecialchars($data['judul_buku']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['nama_peminjam']) . "</td>"; 
                        echo "<td style='text-align: center;'>" . $data['tanggal_pinjam'] . "</td>";
                        echo "<td style='text-align: center;'>" . $data['tanggal_kembali'] . "</td>";
                        echo "<td style='text-align: center;'>" . $status . "</td>";
                        echo "<td style='text-align: center;'>
                                <a href='view.php?id_peminjaman=" . $data['id_peminjaman'] . "' class='btn btn-info btn-sm' title='view'>
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
