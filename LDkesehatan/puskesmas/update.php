<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Kesehatan</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color: #3498db; color: white;">
<style>

    .warnakesehatan {
        background: linear-gradient(90deg, #ff007b, #ff80ff); 
        color: white;
        padding: 20px;
        margin-bottom: 20px;
    }


    .warnakesehatan h2 {
        font-size: 2rem;
        font-weight: bold;
        margin: 0;
    }
</style>

<div class="warnakesehatan">
    <center><h2>Edit Data PUSKESMAS</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $idpuskes = $_GET['id_puskesmas'] ?? $_POST['id_puskesmas'] ?? null;

            if ($idpuskes) {
                $idpuskes = mysqli_real_escape_string($conn, $idpuskes);
                $hasil = mysqli_query($conn, "SELECT * FROM puskesmas WHERE id_puskesmas='$idpuskes'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $idpuskes = $data['id_puskesmas'];
                    $nama = $data['nama_puskesmas'];
                    $alamat = $data['alamat'];
                    $tele = $data['no_telepon'];
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
                <input type="hidden" name="id_puskesmas" value="<?php echo $idpuskes; ?>">
                <div class="form-group">
                    <label for="id_puskesmas">ID Puskesmas</label>
                    <input type="text" class="form-control" name="id_puskesmas" value="<?php echo $idpuskes; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_puskesmas">Nama</label>
                    <input type="text" class="form-control" name="nama_puskesmas" value="<?php echo $nama; ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat / Domisili</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" >
                </div>
                <div class="form-group">
                    <label for="no_telepon">No Telepon</label>
                    <input type="text" class="form-control" name="no_telepon" value="<?php echo $tele; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_puskesmas']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $tele = mysqli_real_escape_string($conn, $_POST['no_telepon']);

    $query = "UPDATE puskesmas 
              SET alamat='$alamat', no_telepon='$tele' , nama_puskesmas='$nama' 
              WHERE id_puskesmas='$idpuskes'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>