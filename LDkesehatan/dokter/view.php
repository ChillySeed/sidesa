<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Kesehatan</title>
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
    <h2>Data Dokter</h2>
    <?php
        if (isset($_GET['id_dokter'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_dokter']) . ")</h4>";
        } else {
            echo "<h4>No ID Dokter Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';

    // Get id_surat from the URL
    if (isset($_GET['id_dokter'])) {
        $idsurat = $_GET['id_dokter'];

        // Query to fetch data based on id_surat
        $query = "
                SELECT d.*, p.nama_puskesmas
                FROM dokter d
                JOIN puskesmas p ON d.id_puskesmas = p.id_puskesmas
                WHERE d.id_dokter = '$idsurat'
            ";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the record
            $data = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Dokter:</span> <span class="value"><?php echo htmlspecialchars($data['id_dokter'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">ID Puskesmas:</span> <span class="value"><?php echo htmlspecialchars($data['id_puskesmas'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Nama:</span> <span class="value"><?php echo htmlspecialchars($data['nama_dokter'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Nama Puskesmas:</span> <span class="value"><?php echo htmlspecialchars($data['nama_puskesmas'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Jadwal Praktik:</span> <span class="value"><?php echo htmlspecialchars($data['jadwal_praktik'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Spesialisasi:</span> <span class="value"><?php echo htmlspecialchars($data['spesialisasi'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="update.php?id_dokter=<?php echo $data['id_dokter']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_dokter=<?php echo $data['id_dokter']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </div>
            <?php
        } else {
            echo "<p>Data not found.</p>";
        }
    } else {
        echo "<p>No ID Dokter provided.</p>";
    }
    ?>
</div>

</body>
</html>