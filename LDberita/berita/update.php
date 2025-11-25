<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Berita dan berita</title>
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
    <center><h2>Edit Data berita</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idberita = $_GET['id_berita'] ?? $_POST['id_berita'] ?? null;

            if ($idberita) {
                $idberita = mysqli_real_escape_string($conn, $idberita);
                $hasil = mysqli_query($conn, "SELECT * FROM berita WHERE id_berita='$idberita'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idberita = $data['id_berita'];
                    $idpers = $data['id_pers'];
                    $judul = $data['judul_berita'];
                    $isi = $data['isi_berita'];
                    $tanggal = $data['tanggal_berita'];
                    $kategori = $data['kategori_berita'];

                } else {
                    echo "<p class='text-danger'>Error: Berita not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Berita not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_berita" value="<?php echo $idberita; ?>">
                <div class="form-group">
                    <label for="id_berita">ID Berita</label>
                    <input type="text" class="form-control" name="id_berita" value="<?php echo $idberita; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_berita">ID Pers</label>
                    <input type="text" class="form-control" name="nama_berita" value="<?php echo $idpers; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text" class="form-control" name="judul_berita" value="<?php echo $judul; ?>">
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi Berita</label>
                    <input type="text" class="form-control" name="isi_berita" value="<?php echo $isi; ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_berita">Tanggal Berita</label>
                    <input type="text" class="form-control" name="tanggal_berita" value="<?php echo $tanggal; ?>">
                </div>
                <div class="form-group">
                    <label for="kategori_berita">Kategori Berita</label>
                    <input type="text" class="form-control" name="kategori_berita" value="<?php echo $kategori; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $isi = mysqli_real_escape_string($conn, $_POST['isi_berita']);

    $query = "UPDATE berita 
              SET isi_berita='$isi' 
              WHERE id_berita='$idberita'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>