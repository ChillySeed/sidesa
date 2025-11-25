<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $idsurat = $_POST['id_surat'];
        $nik = $_POST['NIK'];
        $idinfra = $_POST['id_infrastruktur'];
        $jenis = $_POST['jenis_surat'];
        $tanggal = $_POST['tanggal_pengajuan'];
        $status = $_POST['status_pengajuan'];
        $catatan = $_POST['catatan'];

        // pemasukan data
        $query = "INSERT INTO pengaduan_infrastruktur (id_surat, NIK, id_infrastruktur, jenis_surat, tanggal_pengajuan, status_pengajuan, catatan) 
                  VALUES ('$idsurat', '$nik', '$idinfra', '$jenis', '$tanggal', '$status', '$catatan')";
        

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
    <title>SIDESA Layanan Pelaporan Infrastruktur</title>
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
        <center><h2>Pembuatan Data Pelaporan Infrastruktur</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    
                    <div class="form-group">
                        <label for="id_surat">ID Surat</label>
                        <input type="text" class="form-control" name="id_surat" id="id_surat" placeholder="ex: SUR008">
                    </div>

                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control" name="NIK" id="NIK" placeholder="ex: 31720214141048">
                    </div>

                    <div class="form-group">
                        <label for="id_infrastruktur">ID Infrastruktur</label>
                        <input type="text" class="form-control" name="id_infrastruktur" id="id_infrastruktur" placeholder="ex: INF008">
                    </div>

                    <div class="form-group">
                        <label for="jenis_surat">Jenis Surat</label>
                        <input type="text" class="form-control" name="jenis_surat" id="jenis_surat" placeholder="ex: Pemutusan ">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                        <input type="text" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder="ex: 2024-01-01 ">
                    </div>

                    <div class="form-group">
                        <label for="status_pengajuan">Status Pengajuan</label>
                        <input type="text" class="form-control" name="status_pengajuan" id="status_pengajuan" placeholder="ex: Ditolak ">
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan" placeholder="ex: P ">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
