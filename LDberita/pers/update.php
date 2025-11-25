<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Berita dan Pers</title>
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
    <center><h2>Edit Data Pers</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idpers = $_GET['id_pers'] ?? $_POST['id_pers'] ?? null;

            if ($idpers) {
                $idpers = mysqli_real_escape_string($conn, $idpers);
                $hasil = mysqli_query($conn, "SELECT * FROM pers WHERE id_pers='$idpers'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idpers = $data['id_pers'];
                    $nama = $data['nama_pers'];
                    $alamat = $data['alamat_pers'];
                    $kontak = $data['kontak_pers'];
                    $jenis = $data['jenis_pers'];

                } else {
                    echo "<p class='text-danger'>Error: Pers not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Pers not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_pers" value="<?php echo $idpers; ?>">
                <div class="form-group">
                    <label for="id_pers">ID Pers</label>
                    <input type="text" class="form-control" name="id_pers" value="<?php echo $idpers; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_pers">Nama Pers</label>
                    <input type="text" class="form-control" name="nama_pers" value="<?php echo $nama; ?>">
                </div>
                <div class="form-group">
                    <label for="alamat_pers">Alamat Pers</label>
                    <input type="text" class="form-control" name="alamat_pers" value="<?php echo $alamat; ?>">
                </div>
                <div class="form-group">
                    <label for="kontak_pers">Kontak Pers</label>
                    <input type="text" class="form-control" name="kontak_pers" value="<?php echo $kontak; ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_pers">Jenis Pers</label>
                    <input type="text" class="form-control" name="jenis_pers" value="<?php echo $jenis; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $kontak = mysqli_real_escape_string($conn, $_POST['kontak_pers']);

    $query = "UPDATE pers 
              SET kontak_pers='$kontak' 
              WHERE id_pers='$idpers'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>