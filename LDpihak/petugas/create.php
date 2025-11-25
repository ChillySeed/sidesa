<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    // Mengambil data dari form
    $id_wewenang = $_POST['id_wewenang'];
    $nama_wewenang = $_POST['nama_wewenang'];
    $jenis_layanan = $_POST['jenis_layanan'];
    $kontak_darurat = $_POST['kontak_darurat'];
    $alamat_kantor = $_POST['alamat_kantor'];

    // Query untuk memasukkan data
    $query = "INSERT INTO pihak_wewenang (id_wewenang, nama_wewenang, jenis_layanan, kontak_darurat, alamat_kantor) 
              VALUES ('$id_wewenang', '$nama_wewenang', '$jenis_layanan', '$kontak_darurat', '$alamat_kantor')";
    
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        header("Location: index.php");
    } else {
        echo "Data gagal ditambahkan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - Pihak Wewenang</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color: #3498db; color: white;">
<style>
    /* Header Gradient */
    .header-gradient {
        background: linear-gradient(90deg, #ff007b, #ff80ff); /* Pink gradient */
        color: white;
        padding: 20px;
        margin-bottom: 20px;
    }

    .header-gradient h2 {
        font-size: 2rem;
        margin: 0;
        text-align: center;
    }

    /* Form styling */
    .form-container {
        padding: 20px;
        border-radius: 8px;
        background: transparent;
    }

    /* Input and text area styling */
    .form-control {
        background-color: white !important;
        color: black !important;
    }

    /* Label styling */
    .form-group label {
        color: white;
        font-weight: normal;
    }

    /* Button styling */
    .btn {
        border-radius: 5px;
        font-weight: bold;
        padding: 10px 20px;
    }

    .btn-secondary {
        background-color: #808080;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #666666;
    }

    .btn-primary {
        background-color: #ff007b;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #ff3399;
    }
</style>

    <div class="header-gradient">
        <h2>Tambah Data Pihak Wewenang</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                        <div class="form-group">
                            <label for="id_wewenang">ID Wewenang</label>
                            <input type="text" class="form-control" name="id_wewenang" id="id_wewenang" placeholder="Masukkan ID Wewenang" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_wewenang">Nama Wewenang</label>
                            <input type="text" class="form-control" name="nama_wewenang" id="nama_wewenang" placeholder="Masukkan Nama Wewenang" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_layanan">Jenis Layanan</label>
                            <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" placeholder="Masukkan Jenis Layanan" required>
                        </div>

                        <div class="form-group">
                            <label for="kontak_darurat">Kontak Darurat</label>
                            <input type="text" class="form-control" name="kontak_darurat" id="kontak_darurat" placeholder="Masukkan Kontak Darurat" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat_kantor">Alamat Kantor</label>
                            <textarea class="form-control" name="alamat_kantor" id="alamat_kantor" rows="3" placeholder="Masukkan Alamat Kantor" required></textarea>
                        </div>

                        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>