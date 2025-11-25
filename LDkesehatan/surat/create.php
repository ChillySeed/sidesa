<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $NIK = $_POST['NIK'];
        $idsurat = $_POST['id_surat'];
        $iddokter = $_POST['id_dokter'];
        $tpengajuan = $_POST['tanggal_pengajuan'];
        $tterbit = $_POST['tanggal_terbit'];
        $status = $_POST['status_surat'];
        $alasan = $_POST['alasan_pengajuan'];

        // ngecek NIK di tabel masyarakat
        $checkNIK = mysqli_query($conn, "SELECT * FROM masyarakat WHERE NIK = '$NIK'");
        if (mysqli_num_rows($checkNIK) == 0) {
            // kalo gak ada membuat pesan eror
            echo "Error: NIK not found in the system.";
            exit;
        }

        // ngecek id_dokter di tabel dokter
        $checkDokter = mysqli_query($conn, "SELECT * FROM dokter WHERE id_dokter = '$iddokter'");
        if (mysqli_num_rows($checkDokter) == 0) {
            // kalo gak ada membuat pesan eror
            echo "Error: ID Dokter not found in the system.";
            exit;
        }

        // pemasukan data
        $query = "INSERT INTO surat_dokter (NIK, id_surat, id_dokter, tanggal_pengajuan, tanggal_terbit, status_surat, alasan_pengajuan) 
                  VALUES ('$NIK', '$idsurat', '$iddokter', '$tpengajuan', '$tterbit', '$status', '$alasan')";
        

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
        background: linear-gradient(90deg, #ff007b, #ff80ff); /* Pink gradient */
        color: white;
        padding: 20px;
        margin-bottom: 20px; /* Adds spacing below the header */
    }

    /* Center and format header text */
    .warnakesehatan h2 {
        font-size: 2rem;
        font-weight: bold;
        margin: 0;
    }

    /* Maintain body text readability */
    body {
        color: white;
    }
</style>

    <div class="warnakesehatan">
        <center><h2>Pembuatan Surat Dokter</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    <div class="form-group">
                        <label for="id_surat">ID Surat</label>
                        <input type="text" class="form-control" name="id_surat" id="id_surat" placeholder="ex: SD008">
                    </div>

                    <div class="form-group">
                        <label for="id_dokter">ID Dokter</label>
                        <input type="text" class="form-control" name="id_dokter" id="id_dokter" placeholder="ex: DOK008">
                    </div>

                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control" name="NIK" id="NIK" placeholder="ex: 4612020201">
                    </div>
                    
                    <!-- ini sama tapi tanggal -->
                    <div class="form-group">
                        <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder="YY-MM-DD">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_terbit">Tanggal Terbit</label>
                        <input type="date" class="form-control" name="tanggal_terbit" id="tanggal_terbit" placeholder="YY-MM-DD">
                    </div>


                    <!-- Bentuk Radio alias centang centangan -->
                    <div class="form-group">
                        <label for="status_surat">Status Surat</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_surat" id="status_surat1" value="Ditolak">
                            <label class="form-check-label" for="exampleRadios1">
                                 Ditolak
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_surat" id="status_surat2" value="Diproses">
                            <label class="form-check-label" for="exampleRadios2">
                                Diproses
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_surat" id="status_surat3" value="Disetujui">
                            <label class="form-check-label" for="exampleRadios3">
                                Disetujui
                            </label>
                        </div>
                    </div>

                    <!-- Bentuk Textbox yang banyak baris -->
                    <div class="form-group">
                        <label for="alasan_pengajuan">Alasan</label>
                        <textarea class="form-control" name="alasan_pengajuan" id="alasan_pengajuan" rows="4" placeholder="Sakit DBD"></textarea>
                    </div>
                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
