<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Laporan - Layanan Keamanan</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color: #3498db; color: white;">
<style>
    /* Header Gradient */
    .header-gradient {
        background: linear-gradient(90deg, #ff007b, #ff80ff); /* Pink gradient */
        color: white;
        padding: 20px;
        margin-bottom: 20px;
    }

    .header-gradient h2 {
        font-size: 2rem;
        margin: 0;
        text-align: center;
    }

    /* Form styling */
    .form-container {
        padding: 20px;
        border-radius: 8px;
        background: transparent;
    }

    /* Input and text area styling */
    .form-control {
        background-color: white !important;
        color: black !important;
    }

    /* Label styling */
    .form-group label {
        color: white;
        font-weight: normal;
    }

    /* Button styling */
    .btn {
        border-radius: 5px;
        font-weight: bold;
        padding: 10px 20px;
    }

    .btn-secondary {
        background-color: #808080;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #666666;
    }

    .btn-primary {
        background-color: #ff007b;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #ff3399;
    }
</style>

    <div class="header-gradient">
        <h2>Tambah Laporan Keamanan</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" required>
                        </div>

                        <div class="form-group">
                            <label for="id_wewenang">ID Wewenang</label>
                            <input type="text" class="form-control" name="id_wewenang" id="id_wewenang" placeholder="Masukkan ID Wewenang" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_interaksi">Tanggal Interaksi</label>
                            <input type="date" class="form-control" name="tanggal_interaksi" id="tanggal_interaksi" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi_interaksi">Deskripsi Interaksi</label>
                            <textarea class="form-control" name="deskripsi_interaksi" id="deskripsi_interaksi" rows="3" placeholder="Deskripsikan interaksi" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status_interaksi">Status Interaksi</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_interaksi" id="status_interaksi1" value="Tertunda" required>
                                <label class="form-check-label" for="status_interaksi1">Tertunda</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_interaksi" id="status_interaksi2" value="Selesai" required>
                                <label class="form-check-label" for="status_interaksi2">Selesai</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="catatan_interaksi">Catatan Interaksi</label>
                            <textarea class="form-control" name="catatan_interaksi" id="catatan_interaksi" rows="3" placeholder="Catatan tambahan"></textarea>
                        </div>

                        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>