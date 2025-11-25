<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $idpers = $_POST['id_pers'];
        $nama = $_POST['nama_pers'];
        $alamat = $_POST['alamat_pers'];
        $kontak = $_POST['kontak_pers'];
        $jenis = $_POST['jenis_pers'];

        // pemasukan data
        $query = "INSERT INTO pers (id_pers, nama_pers, alamat_pers, kontak_pers, jenis_pers) 
                  VALUES ('$idpers', '$nama', '$alamat', '$kontak', '$jenis')";
        

        $hasil = mysqli_query($conn, $query);
        if ($hasil) {
            header("Location: index.php");
        } else {
            echo "Data Gagal Ditambahkan";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>SIDESA Layanan Berita dan Pers</title>
    <!-- Memuat file CSS Bootstrap secara luring -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color: #3498db; color: white;">
<style>
    /* Gradient Header */
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

    body {
        color: white;
    }
</style>

    <div class="warnakesehatan">
        <center><h2>Pembuatan Data Pers</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    
                    <div class="form-group">
                        <label for="id_pers">ID pers</label>
                        <input type="text" class="form-control" name="id_pers" id="id_pers" placeholder="ex: PERS008">
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_pers">Nama Pers</label>
                        <input type="text" class="form-control" name="nama_pers" id="nama_pers" placeholder="ex: Kompas">
                    </div>

                    <div class="form-group">
                        <label for="alamat_pers">Alamat Pers</label>
                        <input type="text" class="form-control" name="alamat_pers" id="alamat_pers" placeholder="ex: Jl. Merdeka">
                    </div>

                    <div class="form-group">
                        <label for="kontak_pers">Kontak Pers</label>
                        <input type="text" class="form-control" name="kontak_pers" id="kontak_pers" placeholder="ex: 081234566789">
                    </div>

                    <div class="form-group">
                        <label for="jenis_pers">Jenis Pers</label>
                        <input type="text" class="form-control" name="jenis_pers" id="jenis_pers" placeholder="ex: Cetak">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
