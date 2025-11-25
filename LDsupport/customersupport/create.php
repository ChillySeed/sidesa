<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $id = $_POST['id_cs'];
        $jadwal = $_POST['jadwal_kerja'];
        $nama = $_POST['nama_lengkap'];
        $telepon = $_POST['no_telepon'];
        $email = $_POST['email'];

        // pemasukan data
        $query = "INSERT INTO customer_support (id_cs, nama_lengkap, jadwal_kerja, no_telepon, email) 
                  VALUES ('$id', '$nama', '$jadwal', '$telepon', '$email')";
        

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
    <title>SIDESA Customer Support</title>
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
        <center><h2>Pembuatan Data Petugas</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    
                    <div class="form-group">
                        <label for="id_cs">ID Customer Support</label>
                        <input type="text" class="form-control" name="id_cs" id="id_cs" placeholder="ex: CS008">
                    </div>
                    
                    <div class="form-group">
                        <label for="jadwal_kerja">Jadwal Kerja</label>
                        <input type="text" class="form-control" name="jadwal_kerja" id="jadwal_kerja" placeholder="ex: Senin-Jumat">
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap">Nama</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="ex: Agus Setiawan">
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="ex: 082154789556 ">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="ex: joko@gmail.com ">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
