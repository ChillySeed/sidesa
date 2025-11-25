<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['level'])) {
    header('Location: login.php');
    exit();
}

// Retrieve user's level
$level = $_SESSION['level'];
?>

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
            cursor: pointer;
        }

        .pillar .content .btn.active {
            background-color: #2ecc71; 
        }

        .pillar .content .btn.disabled {
            background-color: #e74c3c; 
            cursor: not-allowed;
        }

        .logout-container {
            text-align: center;
            margin-top: 30px;
        }

        .logout-container .access-level {
            font-size: 2rem;  /* Increased size */
            color: #333;
            margin-bottom: 10px;
        }

        .logout-btn {
            background-color: #2980b9; /* Changed button color */
            padding: 12px 25px;
            border-radius: 50px;
            color: white;
            font-size: 1.2rem;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none; /* Remove underline */
        }

        .logout-btn:hover {
            background-color: #1f6692; /* Darker shade on hover */
        }
    </style>
</head>
<body>

    <div class="dashboard-header">
        <h2>Dashboard - Manajemen Layanan Desa</h2>
    </div>

    <!-- Logout Button -->
    <div class="logout-container">
        <div class="access-level">
            <strong>Access Level:</strong> <?php echo $level; ?>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="container">
        <!-- LDadmin Pillar -->
        <div class="pillar">
            <img src="images/ldadmin.png" alt="LDadmin">
            <div class="content">
                <h3>Layanan Administrasi</h3>
                <p>Manage administration tasks for the system.</p>
                <a href="LDadmin/dashboard.php" class="btn <?php echo ($level >= 7) ? 'active' : 'disabled'; ?>" id="ldadminBtn" <?php echo ($level < 7) ? 'disabled' : ''; ?>>Manage Layanan</a>
            </div>
        </div>

        <!-- LDberita Pillar -->
        <div class="pillar">
            <img src="images/ldberita.jpg" alt="LDberita">
            <div class="content">
                <h3>Layanan Berita dan Pers</h3>
                <p>Manage news and announcements.</p>
                <a href="LDberita/dashboard.php" class="btn <?php echo ($level >= 2) ? 'active' : 'disabled'; ?>" id="ldberitaBtn" <?php echo ($level < 2) ? 'disabled' : ''; ?>>Manage Layanan</a>
            </div>
        </div>
        
        <div class="pillar">
            <img src="images/ldinfra.jpg" alt="LDinfra">
            <div class="content">
                <h3>Layanan Infrastruktur</h3>
                <p>Manage infrastructure records.</p>
                <a href="LDinfra/dashboard.php" class="btn <?php echo ($level >= 6) ? 'active' : 'disabled'; ?>" id="ldinfraBtn" <?php echo ($level < 6) ? 'disabled' : ''; ?>>Manage Layanan</a>
            </div>
        </div>

        <!-- LDperpus Pillar -->
        <div class="pillar">
            <img src="images/ldperpus.jpg" alt="LDperpus">
            <div class="content">
                <h3>Layanan Perpustakaan</h3>
                <p>Manage library resources and data.</p>
                <a href="LDperpus/dashboard.php" class="btn <?php echo ($level >= 4) ? 'active' : 'disabled'; ?>" id="ldperpusBtn" <?php echo ($level < 4) ? 'disabled' : ''; ?>>Manage Layanan</a>
            </div>
        </div>

        <!-- LDpihak Pillar -->
        <div class="pillar">
            <img src="images/ldpihak.jpg" alt="LDpihak">
            <div class="content">
                <h3>Layanan Pihak Wewenang</h3>
                <p>Manage parties involved in the community services.</p>
                <a href="LDpihak/dashboard.php" class="btn <?php echo ($level >= 5) ? 'active' : 'disabled'; ?>" id="ldkeamananBtn" <?php echo ($level < 5) ? 'disabled' : ''; ?>>Manage Layanan</a>
            </div>
        </div>

        <!-- LDsupport Pillar -->
        <div class="pillar">
            <img src="images/ldsupport.jpg" alt="LDsupport">
            <div class="content">
                <h3>Customer Support</h3>
                <p>Support center for system-related inquiries.</p>
                <a href="LDsupport/dashboard.php" class="btn <?php echo ($level >= 3) ? 'active' : 'disabled'; ?>" id="ldsupportBtn" <?php echo ($level < 3) ? 'disabled' : ''; ?>>Manage Layanan</a>
            </div>
        </div>

        <!-- LDkesehatan Pillar -->
        <div class="pillar">
            <img src="images/ldkesehatan.jpg" alt="LDkesehatan">
            <div class="content">
                <h3>Layanan Kesehatan</h3>
                <p>Manage health-related data and services.</p>
                <a href="LDkesehatan/dashboard.php" class="btn <?php echo ($level >= 8) ? 'active' : 'disabled'; ?>" id="ldkesehatanBtn" <?php echo ($level < 8) ? 'disabled' : ''; ?>>Manage Layanan</a>
            </div>
        </div>

         <!-- PDmasyarakat Pillar -->
         <div class="pillar">
            <img src="images/pdmas.jpg" alt="PDmas">
            <div class="content">
                <h3>Pendaftaran Masyarakat</h3>
                <p>Manage Populace records.</p>
                <a href="PDmasyarakat/index.php" class="btn <?php echo ($level >= 1) ? 'active' : 'disabled'; ?>" id="ldmasyarakatBtn" <?php echo ($level < 1) ? 'disabled' : ''; ?>>Manage Data</a>
            </div>
        </div>
        

    </div>

    <script>
        // JavaScript to prevent default behavior for disabled buttons
        document.querySelectorAll('.btn.disabled').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();  // Prevent the redirect
                alert('Access Level anda terlalu rendah');  // Optional: Alert the user
            });
        });
    </script>

</body>
</html>
