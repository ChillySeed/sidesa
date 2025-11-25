<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDESA Customer Support</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #3498db;
            color: white;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .btn-back {
            background-color: #A7D477;
            color: black;
            font-size: 1.5rem;
            padding: 15px 30px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            display: inline-block;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-back:hover {
            background-color: #2980b9;
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
            flex-grow: 1; 
            justify-content: space-evenly;
            align-items: center;
            width: 100%;
        }

        .pillar {
            background-color: white;
            color: white;
            margin: 0 20px;
            width: 400px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-size: cover;
            background-position: center;
        }

        .pillar .content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 0 0 10px 10px;
        }

        .pillar .content h3 {
            margin-bottom: 10px;
            font-size: 1.8rem;
        }

        .pillar .content p {
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .pillar .content .btn {
            font-size: 1.2rem;
            padding: 12px 25px;
            text-transform: uppercase;
            border-radius: 30px;
            background: linear-gradient(90deg, #ff007b, #ff80ff);
            color: white;
            border: none;
            text-decoration: none;
        }

        .pillar .content .btn:hover {
            background: linear-gradient(90deg, #ff80ff, #ff007b);
        }

    </style>
</head>
<body>

    <div class="dashboard-header">
        <h2>Dashboard - Customer Support</h2>
    </div>
    <a href="../dashboard.php" class="btn-back">Back to General Dashboard</a>
    <div class="container">
        <!-- dafttar petugas -->
        <div class="pillar" style="background-image: url('images/petugas.jpg');">
            <div class="content">
                <h3>Petugas</h3>
                <p>Manage Petugas records such as adding, editing, or deleting data.</p>
                <a href="customersupport/index.php" class="btn">Manage Petugas</a>
            </div>
        </div>

        <!-- Surat Pillar -->
        <div class="pillar" style="background-image: url('images/support.jpg');">
            <div class="content">
                <h3>Aduan</h3>
                <p>Manage Aduan records such as adding, editing, or deleting data.</p>
                <a href="supportticket/index.php" class="btn">Manage Aduan</a>
            </div>
        </div>
    </div>

</body>
</html>