<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $iddokter = $_POST['id_dokter'];
        $idpuskes = $_POST['id_puskesmas'];
        $nama = $_POST['nama_dokter'];
        $spek = $_POST['spesialisasi'];
        $jadwal = $_POST['jadwal_praktik'];

        // ngecek NIK di tabel masyarakat
        $checkidpuskes = mysqli_query($conn, "SELECT * FROM puskesmas WHERE id_puskesmas = '$idpuskes'");
        if (mysqli_num_rows($checkidpuskes) == 0) {
            // kalo gak ada membuat pesan eror
            echo "Error: ID Puskesmas not found in the system.";
            exit;
        }

        // pemasukan data
        $query = "INSERT INTO dokter (id_dokter, id_puskesmas, nama_dokter, spesialisasi, jadwal_praktik) 
                  VALUES ('$iddokter', '$idpuskes', '$nama', '$spek', '$jadwal')";
        

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
        <center><h2>Pembuatan Data Dokter</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    
                    <div class="form-group">
                        <label for="id_dokter">ID Dokter</label>
                        <input type="text" class="form-control" name="id_dokter" id="id_dokter" placeholder="ex: DOK008">
                    </div>
                    
                    <div class="form-group">
                        <label for="id_puskesmas">ID Puskesmas</label>
                        <input type="text" class="form-control" name="id_puskesmas" id="id_puskesmas" placeholder="ex: PUSK008">
                    </div>

                    <div class="form-group">
                        <label for="nama_dokter">Nama</label>
                        <input type="text" class="form-control" name="nama_dokter" id="nama_dokter" placeholder="ex: Agus Setiawan">
                    </div>

                    <div class="form-group">
                        <label for="spesialisasi">Spesialisasi</label>
                        <input type="text" class="form-control" name="spesialisasi" id="spesialisasi" placeholder="ex: Gigi">
                    </div>

                    <div class="form-group">
                        <label for="jadwal_praktik">Jadwal Praktik</label>
                        <input type="text" class="form-control" name="jadwal_praktik" id="jadwal_praktik" placeholder="ex: Senin - Sabtu 07:00 - 16:00 ">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
