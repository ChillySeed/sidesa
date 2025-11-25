<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Pengaduan Infrastruktur</title>
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
    <center><h2>Edit Data Laporan</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idsurat = $_GET['id_surat'] ?? $_POST['id_surat'] ?? null;

            if ($idsurat) {
                $idsurat = mysqli_real_escape_string($conn, $idsurat);
                $hasil = mysqli_query($conn, "SELECT * FROM infrastruktur WHERE id_infrastruktur='$idsurat'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idsurat = $data['id_surat'];
                    $nik = $data['NIK'];
                    $idinfra = $data['id_infrastruktur'];
                    $jenis = $data['jenis_surat'];
                    $tanggal = $data['tanggal_pengajuan'];
                    $status = $data['status_pengajuan'];
                    $catatan = $data['catatan'];
                } else {
                    echo "<p class='text-danger'>Error: Surat Pelaporan not found.</p>";
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
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" name="NIK" value="<?php echo $nik; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="id_infrastruktur">ID Infrastruktur</label>
                    <input type="text" class="form-control" name="id_infrastruktur" value="<?php echo $idinfra; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="jenis_surat">Jenis Surat</label>
                    <input type="text" class="form-control" name="jenis_surat" value="<?php echo $jenis; ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                    <input type="text" class="form-control" name="tanggal_pengajuan" value="<?php echo $tanggal; ?>">
                </div>
                <div class="form-group">
                    <label for="status_pengajuan">Status Pengajuan</label>
                    <input type="text" class="form-control" name="status_pengajuan" value="<?php echo $jam; ?>">
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <input type="text" class="form-control" name="catatan" value="<?php echo $jam; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal_pengajuan']);

    $query = "UPDATE pengaduan_infrastruktur 
              SET tanggal_pengajuan='$tanggal' 
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