<!DOCTYPE html>
<html>
<head>
    <title>Info Permintaan</title>
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
    <h2>Info Permintaan</h2>
    <?php
        if (isset($_GET['id_administrasi'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_administrasi']) . ")</h4>";
        } else {
            echo "<h4>No ID Administrasi Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';

    // Get id_surat from the URL
    if (isset($_GET['id_administrasi'])) {
        $id = $_GET['id_administrasi'];

        // Query to fetch data based on id_surat
        $query = "SELECT * FROM administrasi_desa WHERE id_administrasi = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the record
            $data = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Administrasi:</span> <span class="value"><?php echo htmlspecialchars($data['id_administrasi'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Tanggal Pengajuan:</span> <span class="value"><?php echo htmlspecialchars($data['tanggal_pengajuan'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">NIK:</span> <span class="value"><?php echo htmlspecialchars($data['NIK'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Petugas:</span> <span class="value"><?php echo htmlspecialchars($data['id_sekretaris'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Status:</span> <span class="value"><?php echo htmlspecialchars($data['status_pengajuan'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span class="label">Jenis Dokumen:</span> <span class="value"><?php echo htmlspecialchars($dokumen['jenis_dokumen'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="edit.php?id_administrasi=<?php echo $data['id_administrasi']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_administrasi=<?php echo $data['id_administrasi']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </div>
            <?php
        } else {
            echo "<p>Data not found.</p>";
        }
    } else {
        echo "<p>No ID Administrasi provided.</p>";
    }
    ?>
</div>

</body>
</html>