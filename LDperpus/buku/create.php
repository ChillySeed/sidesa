<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $idbuku = $_POST['id_buku'];
        $judul = $_POST['judul_buku'];
        $penerbit = $_POST['penerbit_buku'];
        $penulis = $_POST['penulis_buku'];
        $tterbit = $_POST['tahun_terbit'];

        // pemasukan data
        $query = "INSERT INTO buku_perpus (id_buku, judul_buku, penerbit_buku, penulis_buku, tahun_terbit) 
                  VALUES ('$idbuku', '$judul', '$penerbit', '$penulis', '$tterbit')";
        

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
    <title>SIDESA Layanan Perpustakaan</title>
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
        <center><h2>Pembuatan Data Buku</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    <div class="form-group">
                        <label for="id_buku">ID Buku</label>
                        <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="ex: BK006">
                    </div>
                    
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="ex: Cinta ku lepas">
                    </div>

                    <div class="form-group">
                        <label for="penerbit_buku">Penerbit Penulis Buku</label>
                        <input type="text" class="form-control" name="penerbit_buku" id="penerbit_buku" placeholder="ex: PT. Setiawan Family">
                    </div>

                    <div class="form-group">
                        <label for="penulis_buku">Penulis Buku</label>
                        <input type="text" class="form-control" name="penulis_buku" id="penulis_buku" placeholder="ex: Agus Setiawan">
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="date" class="form-control" name="tahun_terbit" id="tahun_terbit">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
