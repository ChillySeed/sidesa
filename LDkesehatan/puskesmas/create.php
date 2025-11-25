<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $idpuskes = $_POST['id_puskesmas'];
        $nama = $_POST['nama_puskesmas'];
        $alamat = $_POST['alamat'];
        $tele = $_POST['no_telepon'];

        // pemasukan data
        $query = "INSERT INTO puskesmas (id_puskesmas, nama_puskesmas, alamat, no_telepon) 
                  VALUES ('$idpuskes', '$nama', '$alamat', '$tele')";
        

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
    <title>SIDESA Layanan Kesehatan</title>
    <!-- Memuat file CSS Bootstrap secara luring -->
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


    body {
        color: white;
    }
</style>

    <div class="warnakesehatan">
        <center><h2>Pembuatan Data PUSKESMAS</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    
                    <div class="form-group">
                        <label for="id_puskesmas">ID Puskesmas</label>
                        <input type="text" class="form-control" name="id_puskesmas" id="id_puskesmas" placeholder="ex: PUSK008">
                    </div>

                    <div class="form-group">
                        <label for="nama_puskesmas">Nama PUSKESMAS</label>
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="ex: Puskesmas Indra Jaya">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat PUSKESMAS</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="ex: Jl. Kampung Durian Runtuh">
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="ex: 08123456789 ">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
