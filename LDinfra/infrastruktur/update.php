<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Infrastruktur</title>
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
    <center><h2>Edit Data Infrastruktur</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idinfra = $_GET['id_infrastruktur'] ?? $_POST['id_infrastruktur'] ?? null;

            if ($idinfra) {
                $idinfra = mysqli_real_escape_string($conn, $idinfra);
                $hasil = mysqli_query($conn, "SELECT * FROM infrastruktur WHERE id_infrastruktur='$idinfra'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idinfra = $data['id_infrastruktur'];
                    $jenisinfra = $data['jenis_infrastruktur'];
                    $penyedia = $data['penyedia_layanan'];
                    $alamat = $data['alamat_kantor'];
                    $notelp = $data['no_telepon_kantor'];
                    $jam = $data['jam_operasional'];
                } else {
                    echo "<p class='text-danger'>Error: Infrastruktur not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Infrastruktur not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_infrastruktur" value="<?php echo $idinfra; ?>">
                <div class="form-group">
                    <label for="id_infrastruktur">ID Infrastruktur</label>
                    <input type="text" class="form-control" name="id_infrastruktur" value="<?php echo $idinfra; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="jenis_infrastruktur">Jenis Infrastruktur</label>
                    <input type="text" class="form-control" name="jenis_infrastruktur" value="<?php echo $jenisinfra; ?>">
                </div>
                <div class="form-group">
                    <label for="penyedia_layanan">Penyedia Layanan</label>
                    <input type="text" class="form-control" name="penyedia_layanan" value="<?php echo $penyedia; ?>">
                </div>
                <div class="form-group">
                    <label for="alamat_kantor">Alamat Kantor</label>
                    <input type="text" class="form-control" name="alamat_kantor" value="<?php echo $alamat; ?>">
                </div>
                <div class="form-group">
                    <label for="no_telepon_kantor">No Telp Kantor</label>
                    <input type="text" class="form-control" name="no_telepon_kantor" value="<?php echo $notelp; ?>">
                </div>
                <div class="form-group">
                    <label for="jam_operasional">Jam Operasional</label>
                    <input type="text" class="form-control" name="jam_operasional" value="<?php echo $jam; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $notelp = mysqli_real_escape_string($conn, $_POST['no_telepon_kantor']);

    $query = "UPDATE infrastruktur 
              SET no_telepon_kantor='$notelp' 
              WHERE id_infrastruktur='$idinfra'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>