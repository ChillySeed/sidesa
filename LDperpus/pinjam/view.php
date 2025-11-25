<!DOCTYPE html>
<html>
<head>
    <title>View Data Peminjaman Buku</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <style>
        .header {
            background: linear-gradient(90deg, #ff00ff, #ff80ff);
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .content {
            margin: 20px auto;
            padding: 40px; 
            max-width: 900px; 
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .label {
            font-weight: bold;
            color: #666;
        }
        .value {
            font-weight: normal;
            color: #000;
        }
        .row div {
            margin-bottom: 10px;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body style="background-color: #3498db; color: white;">

<div class="header">
    <h2>Data Peminjaman Buku</h2>
    <?php
        if (isset($_GET['id_peminjaman'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_peminjaman']) . ")</h4>";
        } else {
            echo "<h4>No ID Peminjaman Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';

    // Get id_peminjaman from the URL
    if (isset($_GET['id_peminjaman'])) {
        $idsurat = $_GET['id_peminjaman'];

        // Query to fetch data based on id_peminjaman
        $query = "
            SELECT pb.*, b.judul_buku, u.nama_penduduk AS nama_peminjam
            FROM peminjaman_buku pb
            JOIN buku_perpus b ON pb.id_buku = b.id_buku
            JOIN masyarakat u ON pb.NIK = u.NIK
            WHERE pb.id_peminjaman = '$idsurat'
        ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the record
            $data = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Peminjaman:</span> <span class="value"><?php echo htmlspecialchars($data['id_peminjaman'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Tanggal Pinjam:</span> <span class="value"><?php echo htmlspecialchars($data['tanggal_pinjam'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Buku:</span> <span class="value"><?php echo htmlspecialchars($data['id_buku'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Judul Buku:</span> <span class="value"><?php echo htmlspecialchars($data['judul_buku'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">NIK:</span> <span class="value"><?php echo htmlspecialchars($data['NIK'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Nama Peminjam:</span> <span class="value"><?php echo htmlspecialchars($data['nama_peminjam'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Status Buku:</span> <span class="value"><?php echo htmlspecialchars($data['status_peminjaman'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Tanggal Dikembalikan:</span> <span class="value"><?php echo htmlspecialchars($data['tanggal_kembali'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="update.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </div>
            <?php
        } else {
            echo "<p>Data not found.</p>";
        }
    } else {
        echo "<p>No ID Surat provided.</p>";
    }
    ?>
</div>

</body>
</html>
