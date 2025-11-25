<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $NIK = $_POST['NIK'];
        $nama = $_POST['nama_lengkap'];
        $alamat = $_POST['alamat'];
        $tl = $_POST['tanggal_lahir'];
        $tele = $_POST['no_telepon'];
        $email = $_POST['email'];

        // pemasukan data
        $query = "INSERT INTO masyarakat (NIK, nama_lengkap, alamat, tanggal_lahir, no_telepon, email) 
                  VALUES ('$NIK', '$nama', '$alamat', '$tl', '$tele', '$email')";
        

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
    <title>SIDESA Data Masyarakat</title>
    <!-- Memuat file CSS Bootstrap secara luring -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
        <center><h2>Pembuatan Data Masyarakat</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    <div class="form-group">
                        <label for="NIK">Nomor Induk Kewarganegaaan</label>
                        <input type="text" class="form-control" name="NIK" id="NIK" placeholder="ex: 320900056">
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="ex: Agus Setiawan">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat / Domisili</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="ex: Jl. awok awok">
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>

                    <!-- ini juga ketikan -->
                    <div class="form-group">
                        <label for="alamat">Alamat / Domisili</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="ex: Jl. awok awok">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
