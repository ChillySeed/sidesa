<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $idberita = $_POST['id_berita'];
        $idpers = $_POST['id_pers'];
        $judul = $_POST['judul_berita'];
        $isi = $_POST['isi_berita'];
        $tanggal = $_POST['tanggal_berita'];
        $kategori = $_POST['kategori_berita'];


        // pemasukan data
        $query = "INSERT INTO berita (id_berita, id_pers, judul_berita, isi_berita, tanggal_berita, kategori_berita) 
                  VALUES ('$idberita', '$idpers', '$judul', '$isi', '$tanggal', '$kategori')";
        

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
        <center><h2>Pembuatan Data Berita</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    
                    <div class="form-group">
                        <label for="id_berita">ID Berita</label>
                        <input type="text" class="form-control" name="id_berita" id="id_berita" placeholder="ex: BR008">
                    </div>

                    <div class="form-group">
                        <label for="id_pers">ID Pers</label>
                        <input type="text" class="form-control" name="id_pers" id="id_pers" placeholder="ex: PERS008">
                    </div>

                    <div class="form-group">
                        <label for="judul_berita">Judul Berita</label>
                        <input type="text" class="form-control" name="judul_berita" id="judul_berita" placeholder="ex: Pentingnya Makan Gratis">
                    </div>

                    <div class="form-group">
                        <label for="isi_berita">Isi Berita</label>
                        <input type="text" class="form-control" name="isi_berita" id="isi_berita" placeholder="ex: Makan siang gratis prabu..">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_berita">Tanggal Berita</label>
                        <input type="text" class="form-control" name="tanggal_berita" id="tanggal_berita" placeholder="ex: 2024-12-05 08:30:00">
                    </div>

                    <div class="form-group">
                        <label for="kategori_berita">Kategori Berita</label>
                        <input type="text" class="form-control" name="kategori_berita" id="kategori_berita" placeholder="ex: Kesehatan">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
