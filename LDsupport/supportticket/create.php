<!-- pembuatannya datanya -->

<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        // pencarian data
        $NIK = $_POST['NIK'];
        $id = $_POST['id_user_support'];
        $idpetugas = $_POST['id_customer_support'];
        $tanggal = $_POST['tanggal_layanan'];
        $catatan = $_POST['catatan'];

        // ngecek NIK di tabel masyarakat
        $checkNIK = mysqli_query($conn, "SELECT * FROM masyarakat WHERE NIK = '$NIK'");
        if (mysqli_num_rows($checkNIK) == 0) {
            // kalo gak ada membuat pesan eror
            echo "Error: NIK not found in the system.";
            exit;
        }

        // ngecek id_sekretaris di tabel sekretaris_desa
        $checkpetugas = mysqli_query($conn, "SELECT * FROM customer_support WHERE id_cs = '$idpetugas'");
        if (mysqli_num_rows($checkpetugas) == 0) {
            // kalo gak ada membuat pesan eror
            echo "Error: ID Dokter not found in the system.";
            exit;
        }

        // pemasukan data
        $query = "INSERT INTO support_ticket (NIK, id_user_support, id_customer_support, tanggal_layanan, catatan) 
                  VALUES ('$NIK', '$id', '$idpetugas', '$tanggal', '$catatan')";
        

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
        <center><h2>Tambah Aduan</h2></center>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                    <!-- Cuma sekedar ketikan -->
                    <div class="form-group">
                        <label for="id_user_support">ID Ticket</label>
                        <input type="text" class="form-control" name="id_user_support" id="id_user_support" placeholder="ex: TIC000">
                    </div>

                    <div class="form-group">
                        <label for="id_customer_support">ID Petugas</label>
                        <input type="text" class="form-control" name="id_customer_support" id="id_customer_support" placeholder="ex: CS008">
                    </div>

                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control" name="NIK" id="NIK" placeholder="ex: 4612020201">
                    </div>
                    
                    <!-- ini sama tapi tanggal -->
                    <div class="form-group">
                        <label for="tanggal_layanan">Tanggal Layanan</label>
                        <input type="date" class="form-control" name="tanggal_layanan" id="tanggal_layanan">
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan" placeholder="ex: Pertanyaan Dokumen">
                    </div>

                    <button type="button" name="batal" onclick="location.href='index.php'" class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
