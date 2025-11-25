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
        if (isset($_GET['id_puskesmas'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_puskesmas']) . ")</h4>";
        } else {
            echo "<h4>No ID PUSKESMAS Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';


    if (isset($_GET['id_puskesmas'])) {
        $idsurat = $_GET['id_puskesmas'];

        $query = "SELECT * FROM puskesmas WHERE id_puskesmas = '$idsurat'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

            $data = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Puskesmas:</span> <span class="value"><?php echo htmlspecialchars($data['id_puskesmas'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Nama PUSKESMAS:</span> <span class="value"><?php echo htmlspecialchars($data['nama_puskesmas'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Alamat PUSKESMAS:</span> <span class="value"><?php echo htmlspecialchars($data['alamat'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Nomor Telepon:</span> <span class="value"><?php echo htmlspecialchars($data['no_telepon'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="update.php?id_puskesmas=<?php echo $data['id_puskesmas']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_puskesmas=<?php echo $data['id_puskesmas']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')">Delete</a>
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