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
    <center><h2>Edit Data Petugas</h2></center>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <?php
            require 'koneksi.php';

            $id = $_GET['id_sekretaris'] ?? $_POST['id_sekretaris'] ?? null;

            if ($id) {
                $id = mysqli_real_escape_string($conn, $id);
                $hasil = mysqli_query($conn, "SELECT * FROM sekretaris_desa WHERE id_sekretaris='$id'");

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil);
                    $id = $data['id_sekretaris'];
                    $jabatan = $data['jabatan'];
                    $nama = $data['nama_lengkap'];
                    $masuk = $data['tanggal_masuk'];
                    $telepon = $data['no_telepon'];
                    $email = $data['email'];
                } else {
                    echo "<p class='text-danger'>Error: Sekretaris not found.</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger'>Error: ID Sekretaris not provided.</p>";
                exit;
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id_sekretaris" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="id_sekretaris">ID Sekretaris</label>
                    <input type="text" class="form-control" name="id_sekretaris" value="<?php echo $id; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama</label>
                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $nama; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="text" class="form-control" name="tanggal_masuk" value="<?php echo $masuk; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Telepon</label>
                    <input type="text" class="form-control" name="no_telepon" value="<?php echo $telepon; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="<?php echo $jabatan; ?>">
                </div>
                <button type="button" onclick="location.href='index.php'" class="btn btn-secondary">Batal</button>
                <button type="submit" name="update" class="btn btn-warning float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $telepon = mysqli_real_escape_string($conn, $_POST['no_telepon']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);

    $query = "UPDATE sekretaris_desa 
              SET no_telepon='$telepon', email='$email', jabatan='$jabatan'
              WHERE id_sekretaris='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Error updating data: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>