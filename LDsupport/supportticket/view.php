<!DOCTYPE html>
<html>
<head>
    <title>Info Aduan</title>
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
    <h2>Info Aduan</h2>
    <?php
        if (isset($_GET['id_user_support'])) {
            echo "<h4>(ID: " . htmlspecialchars($_GET['id_user_support']) . ")</h4>";
        } else {
            echo "<h4>No ID Ticket Provided</h4>";
        }
    ?>
</div>

<div class="content">
    <?php
    require 'koneksi.php';

    // Sanitize the id_user_support from the URL
    if (isset($_GET['id_user_support'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id_user_support']); // Protect against SQL injection

        // Query to fetch data based on id_user_support
        $query = "
            SELECT st.*, cs.nama_agen, m.nama_penduduk AS nama_customer
            FROM support_ticket st
            JOIN customer_support cs ON st.id_cs = cs.id_cs
            JOIN masyarakat m ON st.NIK = m.NIK
            WHERE st.id_user_support = '$id'
        ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the record
            $data = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-6">
                    <span class="label">ID Ticket:</span> <span class="value"><?php echo htmlspecialchars($data['id_user_support'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">ID Petugas:</span> <span class="value"><?php echo htmlspecialchars($data['id_cs'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">Nama Customer:</span> <span class="value"><?php echo htmlspecialchars($data['nama_customer'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Nama Agen:</span> <span class="value"><?php echo htmlspecialchars($data['nama_agen'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="label">NIK:</span> <span class="value"><?php echo htmlspecialchars($data['NIK'] ?? 'N/A'); ?></span>
                </div>
                <div class="col-6">
                    <span class="label">Tanggal Layanan:</span> <span class="value"><?php echo htmlspecialchars($data['tanggal_layanan'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span class="label">Catatan:</span> <span class="value"><?php echo htmlspecialchars($data['catatan'] ?? 'N/A'); ?></span>
                </div>
            </div>
            <div class="actions">
                <a href="index.php" class="btn btn-secondary">Back to List</a>
                <a href="edit.php?id_user_support=<?php echo $data['id_user_support']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id_user_support=<?php echo $data['id_user_support']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </div>
            <?php
        } else {
            echo "<p>Data not found.</p>";
        }
    } else {
        echo "<p>No ID Ticket provided.</p>";
    }
    ?>
</div>

</body>
</html>
