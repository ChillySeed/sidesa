<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Perpustakaan</title>
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
    <h2>Data Buku</h2>
    <?php
        if (isset($_GET['id_buku'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_buku']) . ")</h4>";
        } else {
            echo "<h4>No ID Buku Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';

    // Get id_surat from the URL
    if (isset($_GET['id_buku'])) {
        $idbuku = $_GET['id_buku'];

        // Query to fetch data based on id_surat
        $query = "SELECT * FROM buku_perpus WHERE id_buku = '$idbuku'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the record
            $data = mysqli_fetch_assoc($result);
            ?>
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
                    <span class="label">Penerbit Buku:</span> <span class="value"><?php echo htmlspecialchars($data['penerbit_buku'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Penulis Buku:</span> <span class="value"><?php echo htmlspecialchars($data['penulis_buku'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Tahun Terbit:</span> <span class="value"><?php echo htmlspecialchars($data['tahun_terbit'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="update.php?id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </div>
            <?php
        } else {
            echo "<p>Data not found.</p>";
        }
    } else {
        echo "<p>No ID Buku provided.</p>";
    }
    ?>
</div>

</body>
</html>