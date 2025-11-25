<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Berita dan Pers</title>
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
    <h2>Data Pers</h2>
    <?php
        if (isset($_GET['id_pers'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_pers']) . ")</h4>";
        } else {
            echo "<h4>No ID Pers Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';

    // Get id_surat from the URL
    if (isset($_GET['id_pers'])) {
        $idberita = $_GET['id_pers'];

        // Query to fetch data based on id_surat
        $query = "SELECT * FROM pers WHERE id_pers = '$idberita'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the record
            $data = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Pers:</span> <span class="value"><?php echo htmlspecialchars($data['id_pers'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Nama Pers:</span> <span class="value"><?php echo htmlspecialchars($data['nama_pers'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Alamat Pers:</span> <span class="value"><?php echo htmlspecialchars($data['alamat_pers'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Kontak Pers:</span> <span class="value"><?php echo htmlspecialchars($data['kontak_pers'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Jenis Pers:</span> <span class="value"><?php echo htmlspecialchars($data['jenis_pers'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="update.php?id_pers=<?php echo $data['id_pers']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_pers=<?php echo $data['id_pers']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </div>
            <?php
        } else {
            echo "<p>Data not found.</p>";
        }
    } else {
        echo "<p>No ID Pers provided.</p>";
    }
    ?>
</div>

</body>
</html>