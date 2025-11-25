<!DOCTYPE html>
<html>
<head>
    <title>View Interaksi</title>
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
    <h2>Data Interaksi</h2>
    <?php
        if (isset($_GET['id_interaksi']) && !empty($_GET['id_interaksi'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_interaksi']) . ")</h4>";
        } else {
            echo "<h4>No ID Interaksi Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';

    if (isset($_GET['id_interaksi'])) {
        $idinteraksi = $_GET['id_interaksi'];

        $query = "
                SELECT ppw.*, pw.nama_wewenang, u.nama_penduduk AS nama_pelapor
                FROM pelaporan_pihak_wewenang ppw
                JOIN pihak_wewenang pw ON ppw.id_wewenang = pw.id_wewenang
                JOIN masyarakat u ON ppw.NIK = u.NIK
                WHERE ppw.id_interaksi = '$idinteraksi'
            ";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Interaksi:</span> <span class="value"><?php echo htmlspecialchars($data['id_interaksi'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">NIK:</span> <span class="value"><?php echo htmlspecialchars($data['NIK'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Wewenang:</span> <span class="value"><?php echo htmlspecialchars($data['id_wewenang'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Tanggal Interaksi:</span> <span class="value"><?php echo htmlspecialchars($data['tanggal_interaksi'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Nama Pelapor:</span> <span class="value"><?php echo htmlspecialchars($data['nama_pelapor'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Nama Wewenang:</span> <span class="value"><?php echo htmlspecialchars($data['nama_wewenang'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Deskripsi Interaksi:</span> <span class="value"><?php echo nl2br(htmlspecialchars($data['deskripsi_interaksi'] ?? 'N/A')); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Status Interaksi:</span> <span class="value"><?php echo htmlspecialchars($data['status_interaksi'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span class="label">Catatan Interaksi:</span>
                    <p class="value"><?php echo nl2br(htmlspecialchars($data['catatan_interaksi'] ?? 'N/A')); ?></p>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="update.php?id_interaksi=<?php echo $data['id_interaksi']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_interaksi=<?php echo $data['id_interaksi']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </div>
            <?php
        } else {
            echo "<p>Data not found.</p>";
        }
    } else {
        echo "<p>No ID Interaksi provided.</p>";
    }
    ?>
</div>

</body>
</html>