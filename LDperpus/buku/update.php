<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Perpustakaan</title>
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

            $idbuku = $_GET['id_buku'] ?? $_POST['id_buku'] ?? null;

            if ($idbuku) {
                $idbuku = mysqli_real_escape_string($conn, $idbuku);
                $hasil = mysqli_query($conn, "SELECT * FROM buku_perpus WHERE id_buku='$idbuku'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idbuku = $data['id_buku'];
                    $judul = $data['judul_buku'];
                    $penerbit = $data['penerbit_buku'];
                    $penulis = $data['penulis_buku'];
                    $tterbit = $data['tahun_terbit'];
                } else {
                    echo "<p class='text-danger'>Error: Buku not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Buku not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_buku" value="<?php echo $idbuku; ?>">
                <div class="form-group">
                    <label for="id_buku">ID Buku</label>
                    <input type="text" class="form-control" name="id_buku" value="<?php echo $idbuku; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" value="<?php echo $judul; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="penerbit_buku">Penerbit Buku</label>
                    <input type="text" class="form-control" name="penerbit_buku" value="<?php echo $penerbit; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="penulis_buku">Penulis Buku</label>
                    <input type="text" class="form-control" name="penulis_buku" value="<?php echo $penulis; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="text" class="form-control" name="tahun_terbit" value="<?php echo $tterbit; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $tterbit = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);

    $query = "UPDATE buku_perpus 
              SET tahun_terbit='$tterbit' 
              WHERE id_buku='$idbuku'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>