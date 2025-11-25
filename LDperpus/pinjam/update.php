<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Perpustakaan Desa</title>
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
    <center><h2>Edit Data Peminjaman Buku</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idpinjam = $_GET['id_peminjaman'] ?? $_POST['id_peminjaman'] ?? null;

            if ($idpinjam) {
                $idpinjam = mysqli_real_escape_string($conn, $idpinjam);
                $hasil = mysqli_query($conn, "SELECT * FROM peminjaman_buku WHERE id_peminjaman='$idpinjam'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idbuku = $data['id_buku'];
                    $NIK = $data['NIK'];
                    $tpinjam = $data['tanggal_pinjam'];
                    $tkembali = $data['tanggal_kembali'];
                    $status = $data['status_peminjaman'];
                    
                } else {
                    echo "<p class='text-danger'>Error: Peminjaman not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Peminjaman not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_peminjaman" value="<?php echo $idpinjam; ?>">
                <div class="form-group">
                    <label for="id_peminjaman">ID Surat</label>
                    <input type="text" class="form-control" name="id_peminjaman" value="<?php echo $idpinjam; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="id_buku">ID Dokter</label>
                    <input type="text" class="form-control" name="id_buku" value="<?php echo $idbuku; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" name="NIK" value="<?php echo $NIK; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" name="tanggal_pinjam" value="<?php echo $tpinjam; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" name="tanggal_kembali" value="<?php echo $tkembali; ?>">
                </div>
                <div class="form-group">
                    <label>Status Surat</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_peminjaman" value="Kembali" <?php if ($status == "Kembali") echo "checked"; ?>>
                        <label class="form-check-label">Kembali</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_peminjaman" value="Dipinjam" <?php if ($status == "Dipinjam") echo "checked"; ?>>
                        <label class="form-check-label">Dipinjam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_peminjaman" value="Terlambat" <?php if ($status == "Terlambat") echo "checked"; ?>>
                        <label class="form-check-label">Terlambat</label>
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
    $tkembali = mysqli_real_escape_string($conn, $_POST['tanggal_kembali']);
    $status = mysqli_real_escape_string($conn, $_POST['status_peminjaman']);

    $query = "UPDATE peminjaman_buku 
              SET tanggal_kembali='$tkembali', status_peminjaman='$status'
              WHERE id_peminjaman='$idpinjam'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>