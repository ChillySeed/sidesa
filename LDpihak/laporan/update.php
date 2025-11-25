<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Keamanan</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
    <center><h2>Edit Laporan Keamanan</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idinteraksi = $_GET['id_interaksi'] ?? $_POST['id_interaksi'] ?? null;

            if ($idinteraksi) {
                $idinteraksi = mysqli_real_escape_string($conn, $idinteraksi);
                $hasil = mysqli_query($conn, "SELECT * FROM pelaporan_pihak_wewenang WHERE id_interaksi='$idinteraksi'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idinteraksi = $data['id_interaksi'];
                    $NIK = $data['NIK'];
                    $idwewenang = $data['id_wewenang'];
                    $tinteraksi = $data['tanggal_interaksi'];
                    $dinteraksi = $data['deskripsi_interaksi'];
                    $sinteraksi = $data['status_interaksi'];
                    $cinteraksi = $data['catatan_interaksi'];
                } else {
                    echo "<p class='text-danger'>Error: Laporan not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Interaksi not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_interaksi" value="<?php echo $idinteraksi; ?>">
                <div class="form-group">
                    <label for="id_interaksi">ID Interaksi</label>
                    <input type="text" class="form-control" name="id_interaksi" value="<?php echo $idinteraksi; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" name="NIK" value="<?php echo $NIK; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="id_wewenang">ID Wewenang</label>
                    <input type="text" class="form-control" name="id_wewenang" value="<?php echo $idwewenang; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_interaksi">Tanggal Interaksi</label>
                    <input type="date" class="form-control" name="tanggal_interaksi" value="<?php echo $tinteraksi; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="deskripsi_interaksi">Deskripsi Interaksi</label>
                    <textarea class="form-control" name="deskripsi_interaksi" rows="4"><?php echo htmlspecialchars($dinteraksi); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Status Interaksi</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_interaksi" value="Ditolak" <?php if ($sinteraksi == "Ditolak") echo "checked"; ?>>
                    <label class="form-check-label">Ditolak</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_interaksi" value="Diproses" <?php if ($sinteraksi == "Diproses") echo "checked"; ?>>
                    <label class="form-check-label">Diproses</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_interaksi" value="Disetujui" <?php if ($sinteraksi == "Disetujui") echo "checked"; ?>>
                    <label class="form-check-label">Disetujui</label>
                </div>
                </div>
                <div class="form-group">
                    <label for="catatan_interaksi">Catatan Interaksi</label>
                    <textarea class="form-control" name="catatan_interaksi" rows="4"><?php echo htmlspecialchars($cinteraksi); ?></textarea>
                </div>
                <div class="form-group">
                    <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                    <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $tinteraksi = mysqli_real_escape_string($conn, $_POST['tanggal_interaksi']);
    $dinteraksi = mysqli_real_escape_string($conn, $_POST['deskripsi_interaksi']);
    $sinteraksi = mysqli_real_escape_string($conn, $_POST['status_interaksi']);
    $cinteraksi = mysqli_real_escape_string($conn, $_POST['catatan_interaksi']);

    $query = "UPDATE pelaporan_pihak_wewenang 
              SET tanggal_interaksi='$tinteraksi', deskripsi_interaksi='$dinteraksi', 
                  status_interaksi='$sinteraksi', catatan_interaksi='$cinteraksi' 
              WHERE id_interaksi='$idinteraksi'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>