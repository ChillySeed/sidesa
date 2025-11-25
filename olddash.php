<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDESA</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            color: white;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

    
        .dashboard-header {
            background: linear-gradient(90deg, #ff007b, #ff80ff);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
            width: 100%;
            height: 100%;
            gap: 20px; 
            padding: 20px;
        }

        .pillar {
            background-color: #3498db;
            color: white;
            width: 250px;
            height: 300px;
            flex: 0 1 calc(25% - 20px); 
            max-width: calc(25% - 20px);
            margin: 10px 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            position: relative;
        }

        .pillar img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .pillar .content {
            padding: 0px;
            flex-grow: 1;
        }

        .pillar .content h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .pillar .content p {
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .pillar .content .btn {
            font-size: 1rem;
            padding: 10px 20px;
            text-transform: uppercase;
            border-radius: 30px;
            text-decoration: none;
            background-color: #e74c3c; 
            color: white;
            border: none;
            cursor: not-allowed;
        }

        .pillar .content .btn.active {
            background-color: #2ecc71; 
            cursor: pointer;
        }

        .pillar .content .btn:hover {
            background-color: #e74c3c; 
        }
    </style>
</head>
<body>

    
    <div class="dashboard-header">
        <h2>Dashboard - Manajemen Layanan Desa</h2>
    </div>

    <div class="container">
        <!-- LDadmin Pillar -->
        <div class="pillar">
            <img src="images/ldadmin.png" alt="LDadmin">
            <div class="content">
                <h3>Layanan Administrasi</h3>
                <p>Manage administration tasks for the system.</p>
                <button class="btn" disabled>LDadmin</button>
            </div>
        </div>

        <!-- LDberita Pillar -->
        <div class="pillar">
            <img src="images/ldberita.png" alt="LDberita">
            <div class="content">
                <h3>Layanan Berita dan Pers</h3>
                <p>Manage news and announcements.</p>
                <button class="btn" disabled>LDberita</button>
            </div>
        </div>

        <!-- LDinfra Pillar -->
        <div class="pillar">
            <img src="images/ldinfra.png" alt="LDinfra">
            <div class="content">
                <h3>Layanan infrastruktur</h3>
                <p>Manage infrastructure records.</p>
                <button class="btn" disabled>LDinfra</button>
            </div>
        </div>

        <!-- LDperpus Pillar -->
        <div class="pillar">
            <img src="images/ldperpus.jpg" alt="LDperpus">
            <div class="content">
                <h3>Layanan Perpustakaan</h3>
                <p>Manage library resources and data.</p>
                <a href="LDPerpus/dashboard.php" class="btn active">Manage Buku</a>
            </div>
        </div>

        <!-- LDpihak Pillar -->
        <div class="pillar">
            <img src="images/ldpihak.png" alt="LDpihak">
            <div class="content">
                <h3>Layanan Pihak Wewenang</h3>
                <p>Manage parties involved in the community services.</p>
                <button class="btn" disabled>LDpihak</button>
            </div>
        </div>

        <!-- LDsupport Pillar -->
        <div class="pillar">
            <img src="images/ldsupport.png" alt="LDsupport">
            <div class="content">
                <h3>Customer Support</h3>
                <p>Support center for system-related inquiries.</p>
                <button class="btn" disabled>LDsupport</button>
            </div>
        </div>

        <!-- LDkesehatan Pillar -->
        <div class="pillar">
            <img src="images/ldkesehatan.jpg" alt="LDkesehatan">
            <div class="content">
                <h3>Layanan Kesehatan</h3>
                <p>Manage health-related data and services.</p>
                <a href="LDkesehatan/dashboard.php" class="btn active">Manage Health</a>
            </div>
        </div>

         <!-- PDmasyarakat Pillar -->
         <div class="pillar">
            <img src="images/pdmas.jpg" alt="PDmas">
            <div class="content">
                <h3>Pendaftaran Masyarakat</h3>
                <p>Manage Populace records.</p>
                <a href="PDmasyarakat/index.php" class="btn active">Manage People</button>
            </div>
        </div>
    </div>

</body>
</html>
