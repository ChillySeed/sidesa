<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $NIK = $_POST['NIK'];
        $idpinjam = $_POST['id_peminjaman'];
        $idbuku = $_POST['id_buku'];
        $tpinjam = $_POST['tanggal_pinjam'];
        $tkembali = $_POST['tanggal_kembali'];
        $status = $_POST['status_peminjaman'];

        // ngecek NIK di tabel masyarakat
        $checkNIK = mysqli_query($conn, "SELECT * FROM masyarakat WHERE NIK = '$NIK'");
        if (mysqli_num_rows($checkNIK) == 0) {
            // kalo gak ada membuat pesan eror
            echo "Error: NIK not found in the system.";
            exit;
        }

        // ngecek id_buku di tabel dokter
        $checkDokter = mysqli_query($conn, "SELECT * FROM buku_perpus WHERE id_buku = '$idbuku'");
        if (mysqli_num_rows($checkDokter) == 0) {
            // kalo gak ada membuat pesan eror
            echo "Error: ID Buku not found in the system.";
            exit;
        }

        // pemasukan data
        $query = "INSERT INTO peminjaman_buku (NIK, id_peminjaman, id_buku, tanggal_pinjam, tanggal_kembali, status_peminjaman) 
                  VALUES ('$NIK', '$idpinjam', '$idbuku', '$tpinjam', '$tkembali', '$status')";
        

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
        <center><h2>Pembuatan Data Peminjaman Buku</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    <div class="form-group">
                        <label for="id_peminjaman">ID Peminjaman</label>
                        <input type="text" class="form-control" name="id_peminjaman" id="id_peminjaman" placeholder="ex: PM008">
                    </div>

                    <div class="form-group">
                        <label for="id_buku">ID Dokter</label>
                        <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="ex: BK008">
                    </div>

                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control" name="NIK" id="NIK" placeholder="ex: 4612020201">
                    </div>
                    
                    <!-- ini sama tapi tanggal -->
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" placeholder="DD-MM-YY">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali" placeholder="DD-MM-YY">
                    </div>


                    <!-- Bentuk Radio alias centang centangan -->
                    <div class="form-group">
                        <label for="status_peminjaman">Status Peminjaman</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_peminjaman" id="status_peminjaman1" value="Ditolak">
                            <label class="form-check-label" for="exampleRadios1">
                                Kembali
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_peminjaman" id="status_peminjaman2" value="Diproses">
                            <label class="form-check-label" for="exampleRadios2">
                                Dipinjam
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_peminjaman" id="status_peminjaman3" value="Disetujui">
                            <label class="form-check-label" for="exampleRadios3">
                                Terlambat
                            </label>
                        </div>
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
