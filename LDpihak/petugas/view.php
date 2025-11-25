<!DOCTYPE html>
<html>
<head>
    <title>View Data Petugas</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
    <h2>Data Petugas - Pihak Wewenang</h2>
    <?php
        if (isset($_GET['id_wewenang'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_wewenang']) . ")</h4>";
        } else {
            echo "<h4>No ID Wewenang Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';

    // Get id_wewenang from the URL
    if (isset($_GET['id_wewenang'])) {
        $idwewenang = $_GET['id_wewenang'];

        // Query to fetch data based on id_wewenang
        $query = "SELECT * FROM pihak_wewenang WHERE id_wewenang = '$idwewenang'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the record
            $data = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Wewenang:</span> <span class="value"><?php echo htmlspecialchars($data['id_wewenang'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Nama Wewenang:</span> <span class="value"><?php echo htmlspecialchars($data['nama_wewenang'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Jenis Layanan:</span> <span class="value"><?php echo htmlspecialchars($data['jenis_layanan'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Kontak Darurat:</span> <span class="value"><?php echo htmlspecialchars($data['kontak_darurat'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span class="label">Alamat Kantor:</span>
                    <p class="value"><?php echo nl2br(htmlspecialchars($data['alamat_kantor'] ?? 'N/A')); ?></p>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="update.php?id_wewenang=<?php echo $data['id_wewenang']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_wewenang=<?php echo $data['id_wewenang']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </div>
            <?php
        } else {
            echo "<p>Data not found.</p>";
        }
    } else {
        echo "<p>No ID Wewenang provided.</p>";
    }
    ?>
</div>

</body>
</html>