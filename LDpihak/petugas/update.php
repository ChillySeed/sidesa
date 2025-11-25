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
    <center><h2>Edit Data Pihak Wewenang</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idwewenang = $_GET['id_wewenang'] ?? $_POST['id_wewenang'] ?? null;

            if ($idwewenang) {
                $idwewenang = mysqli_real_escape_string($conn, $idwewenang);
                $hasil = mysqli_query($conn, "SELECT * FROM pihak_wewenang WHERE id_wewenang='$idwewenang'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idwewenang = $data['id_wewenang'];
                    $nama_wewenang = $data['nama_wewenang'];
                    $jlayanan = $data['jenis_layanan'];
                    $kontakdarurat = $data['kontak_darurat'];
                    $alamatkantor = $data['alamat_kantor'];
                } else {
                    echo "<p class='text-danger'>Error: Data not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Wewenang not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_wewenang" value="<?php echo $idwewenang; ?>">
                <div class="form-group">
                    <label for="id_wewenang">ID Wewenang</label>
                    <input type="text" class="form-control" name="id_wewenang" value="<?php echo $idwewenang; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_wewenang">nama_wewenang</label>
                    <input type="text" class="form-control" name="nama_wewenang" value="<?php echo $nama_wewenang; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="jenis_layanan">Jenis Layanan</label>
                    <input type="text" class="form-control" name="jenis_layanan" value="<?php echo $jlayanan; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="kontak_darurat">Kontak Darurat</label>
                    <input type="text" class="form-control" name="kontak_darurat" value="<?php echo $kontakdarurat; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="alamat_kantor">alamat</label>
                    <input type="text" class="form-control" name="alamat_kantor" value="<?php echo $alamatkantor; ?>" readonly>
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
    $jlayanan = mysqli_real_escape_string($conn, $_POST['jenis_layanan']);
    $kontakdarurat = mysqli_real_escape_string($conn, $_POST['kontak_darurat']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $nama_wewenang = mysqli_real_escape_string($conn, $_POST['nama_wewenang']);

    $query = "UPDATE pihak_wewenang 
              SET jenis_layanan='$jlayanan', kontak_darurat='$kontakdarurat', 
                  alamat='$alamat', nama_wewenang='$nama_wewenang' 
              WHERE id_wewenang='$idwewenang'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>