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
    <center><h2>Edit Data Dokter</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $iddokter = $_GET['id_dokter'] ?? $_POST['id_dokter'] ?? null;

            if ($iddokter) {
                $iddokter = mysqli_real_escape_string($conn, $iddokter);
                $hasil = mysqli_query($conn, "SELECT * FROM dokter WHERE id_dokter='$iddokter'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $iddokter = $data['id_dokter'];
                    $idpuskes = $data['id_puskesmas'];
                    $nama = $data['nama_dokter'];
                    $spek = $data['spesialisasi'];
                    $jadwal = $data['jadwal_praktik'];
                } else {
                    echo "<p class='text-danger'>Error: Dokter not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Dokter not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_dokter" value="<?php echo $iddokter; ?>">
                <div class="form-group">
                    <label for="id_dokter">ID Dokter</label>
                    <input type="text" class="form-control" name="id_dokter" value="<?php echo $iddokter; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="id_puskesmas">ID Puskesmas</label>
                    <input type="text" class="form-control" name="id_puskesmas" value="<?php echo $idpuskes; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_dokter">Nama</label>
                    <input type="text" class="form-control" name="nama_dokter" value="<?php echo $nama; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="spesialisasi">Spesialisasi</label>
                    <input type="text" class="form-control" name="spesialisasi" value="<?php echo $spek; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="jadwal_praktik">Jadwal Praktik</label>
                    <input type="text" class="form-control" name="jadwal_praktik" value="<?php echo $jadwal; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $jadwal = mysqli_real_escape_string($conn, $_POST['jadwal_praktik']);

    $query = "UPDATE dokter 
              SET jadwal_praktik='$jadwal' 
              WHERE id_dokter='$iddokter'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>