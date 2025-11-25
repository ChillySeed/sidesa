<?php
session_start();
require 'koneksi.php'; // Database connection

// Check if the user is already logged in
if (isset($_SESSION['level'])) {
    header('Location: dashboard.php'); // Redirect to dashboard
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query database for the user
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Compare plain-text password directly
        if ($password === $user['password']) {
            // Store user data in session
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];

            header('Location: dashboard.php');
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Username not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIDESA</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ff007b, #2b86ff);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header h2 {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: #333;
        }

        .btn-login {
            background-color: #ff007b;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            width: 100%;
            color: white;
        }

        .btn-login:hover {
            background-color: #e6006b;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.9rem;
            text-align: center;
            margin-top: 15px;
        }

        /* Added space between the form fields */
        .form-group {
            margin-bottom: 20px; /* Adjust space between fields */
        }

        .form-group input {
            margin-top: 10px;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>SIDESA Login</h2>
        </div>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
            <?php if ($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
