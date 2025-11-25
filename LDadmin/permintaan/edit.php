<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Administrasi</title>
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
    <center><h2>Edit Permintaan</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $id = $_GET['id_administrasi'] ?? $_POST['id_administrasi'] ?? null;

            if ($id) {
                $id = mysqli_real_escape_string($conn, $id);
                $hasil = mysqli_query($conn, "SELECT * FROM administrasi_desa WHERE id_administrasi='$id'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idsekretaris = $data['id_sekretaris'];
                    $NIK = $data['NIK'];
                    $tpengajuan = $data['tanggal_pengajuan'];
                    $dokumen = $data['jenis_dokumen'];
                    $status = $data['status_pengajuan'];
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
                <input type="hidden" name="id_permintaan" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="id_permintaan">ID Permintaan</label>
                    <input type="text" class="form-control" name="id_permintaan" value="<?php echo $id; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="id_sekretaris">ID Petugas</label>
                    <input type="text" class="form-control" name="id_sekretaris" value="<?php echo $idsekretaris; ?>" readonly>
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
                    <label for="jenis_dokumen">Jenis Dokumen</label>
                    <input type="text" class="form-control" name="jenis_dokemen" value="<?php echo $dokumen; ?>">
                </div>
                <div class="form-group">
                    <label>Status</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pengajuan" value="Ditolak" <?php if ($status == "Ditolak") echo "checked"; ?>>
                        <label class="form-check-label">Ditolak</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pengajuan" value="Diproses" <?php if ($status == "Diproses") echo "checked"; ?>>
                        <label class="form-check-label">Diproses</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pengajuan" value="Disetujui" <?php if ($status == "Disetujui") echo "checked"; ?>>
                        <label class="form-check-label">Disetujui</label>
                    </div>
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $dokemen = mysqli_real_escape_string($conn, $_POST['jenis_dokumen']);
    $status = mysqli_real_escape_string($conn, $_POST['status_pengajuan']);

    $query = "UPDATE administrasi_desa 
              SET status_surat='$status', jenis_dokumen='$dokumen' 
              WHERE id_administrasi='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>