<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Customer Support</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color: #3498db; color: white;">
<style>
    /* Gradient Header */
    .warnakesehatan {
        background: linear-gradient(90deg, #ff007b, #ff80ff); /* Pink gradient */
        color: white;
        padding: 20px;
        margin-bottom: 20px; /* Adds spacing below the header */
    }

    /* Center and format header text */
    .warnakesehatan h2 {
        font-size: 2rem;
        font-weight: bold;
        margin: 0;
    }
</style>

<div class="warnakesehatan">
    <center><h2>Edit Aduan</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $id = $_GET['id_user_support'] ?? $_POST['id_user_support'] ?? null;

            if ($id) {
                $id = mysqli_real_escape_string($conn, $id);
                $hasil = mysqli_query($conn, "SELECT * FROM support_ticket WHERE id_user_support='$id'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $id = $data['id_user_support'];
                    $idpetugas = $data['id_customer_support'];
                    $NIK = $data['NIK'];
                    $tanggal = $data['tanggal_layanan'];
                    $catatan = $data['catatan'];
                } else {
                    echo "<p class='text-danger'>Error: Permintaan not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Permintaan not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_user_support" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="id_user_support">ID Pengaduan</label>
                    <input type="text" class="form-control" name="id_user_support" value="<?php echo $id; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="id_customer_support">ID Petugas</label>
                    <input type="text" class="form-control" name="id_customer_support" value="<?php echo $idpetugas; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" name="NIK" value="<?php echo $NIK; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_layanan">Tanggal Layanan.</label>
                    <input type="date" class="form-control" name="tanggal_layanan" value="<?php echo $tanggal; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="catatan">catatan</label>
                    <input type="text" class="form-control" name="catatan" value="<?php echo $catatan; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $catatan = mysqli_real_escape_string($conn, $_POST['catatan']);

    $query = "UPDATE support_ticket 
              SET catatan='$catatan'
              WHERE id_user_support='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>