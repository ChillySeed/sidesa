<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $idinfra = $_POST['id_infrastruktur'];
        $jenisinfra = $_POST['jenis_infrastruktur'];
        $penyedia = $_POST['penyedia_layanan'];
        $alamat = $_POST['alamat_kantor'];
        $notelepon = $_POST['no_telepon_kantor'];
        $jam = $_POST['jam_operasional'];

        // pemasukan data
        $query = "INSERT INTO infrastruktur (id_infrastruktur, jenis_infrastruktur, penyedia_layanan, alamat_kantor, no_telepon_kantor, jam_operasional) 
                  VALUES ('$idinfra', '$jenisinfra', '$penyedia', '$alamat', '$notelepon', '$jam')";
        

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
    <title>SIDESA Layanan Infrastruktur</title>
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
        <center><h2>Pembuatan Data Infrastruktur</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    
                    <div class="form-group">
                        <label for="id_infrastruktur">ID Infrastruktur</label>
                        <input type="text" class="form-control" name="id_infrastruktur" id="id_infrastruktur" placeholder="ex: INF008">
                    </div>
                    
                    <div class="form-group">
                        <label for="jenis_infrastruktur">Jenis Infrastruktur</label>
                        <input type="text" class="form-control" name="jenis_infrastruktur" id="jenis_infrastruktur" placeholder="ex: PLN">
                    </div>

                    <div class="form-group">
                        <label for="penyedia_layanan">Penyedia Layanan</label>
                        <input type="text" class="form-control" name="penyedia_layanan" id="penyedia_layanan" placeholder="ex: PLN Regional 2">
                    </div>

                    <div class="form-group">
                        <label for="alamat_kantor">Alamat Kantor</label>
                        <input type="text" class="form-control" name="alamat_kantor" id="alamat_kantor" placeholder="ex: Jl. Listrik Keren">
                    </div>

                    <div class="form-group">
                        <label for="no_telepon_kantor">No telepon Kantor</label>
                        <input type="text" class="form-control" name="no_telepon_kantor" id="no_telepon_kantor" placeholder="ex: 08123456789 ">
                    </div>

                    <div class="form-group">
                        <label for="jam_operasional">Jam Operasional</label>
                        <input type="text" class="form-control" name="jam_operasional" id="jam_operasional" placeholder="08:00-17:00 ">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
