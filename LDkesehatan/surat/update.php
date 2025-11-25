<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Kesehatan</title>
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
    <center><h2>Edit Surat Dokter</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idsurat = $_GET['id_surat'] ?? $_POST['id_surat'] ?? null;

            if ($idsurat) {
                $idsurat = mysqli_real_escape_string($conn, $idsurat);
                $hasil = mysqli_query($conn, "SELECT * FROM surat_dokter WHERE id_surat='$idsurat'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $iddokter = $data['id_dokter'];
                    $NIK = $data['NIK'];
                    $tpengajuan = $data['tanggal_pengajuan'];
                    $tterbit = $data['tanggal_terbit'];
                    $status = $data['status_surat'];
                    $alasan = $data['alasan_pengajuan'];
                } else {
                    echo "<p class='text-danger'>Error: Surat not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Surat not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_surat" value="<?php echo $idsurat; ?>">
                <div class="form-group">
                    <label for="id_surat">ID Surat</label>
                    <input type="text" class="form-control" name="id_surat" value="<?php echo $idsurat; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="id_dokter">ID Dokter</label>
                    <input type="text" class="form-control" name="id_dokter" value="<?php echo $iddokter; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" name="NIK" value="<?php echo $NIK; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                    <input type="date" class="form-control" name="tanggal_pengajuan" value="<?php echo $tpengajuan; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_terbit">Tanggal Terbit</label>
                    <input type="date" class="form-control" name="tanggal_terbit" value="<?php echo $tterbit; ?>">
                </div>
                <div class="form-group">
                    <label>Status Surat</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_surat" value="Ditolak" <?php if ($status == "Ditolak") echo "checked"; ?>>
                        <label class="form-check-label">Ditolak</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_surat" value="Diproses" <?php if ($status == "Diproses") echo "checked"; ?>>
                        <label class="form-check-label">Diproses</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_surat" value="Disetujui" <?php if ($status == "Disetujui") echo "checked"; ?>>
                        <label class="form-check-label">Disetujui</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alasan_pengajuan">Alasan Pengajuan</label>
                    <textarea class="form-control" name="alasan_pengajuan" rows="4"><?php echo htmlspecialchars($alasan); ?></textarea>
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $tterbit = mysqli_real_escape_string($conn, $_POST['tanggal_terbit']);
    $status = mysqli_real_escape_string($conn, $_POST['status_surat']);
    $alasan = mysqli_real_escape_string($conn, $_POST['alasan_pengajuan']);

    $query = "UPDATE surat_dokter 
              SET tanggal_terbit='$tterbit', status_surat='$status', alasan_pengajuan='$alasan' 
              WHERE id_surat='$idsurat'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>