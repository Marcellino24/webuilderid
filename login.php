<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input dari form login
    $user_id = trim($_POST['user_id']);
    $password = trim($_POST['password']);

    // Menyiapkan prepared statement untuk menghindari SQL injection
    $stmt = $conn->prepare("SELECT user_id, password, role FROM users WHERE user_id = ?");
    
    if ($stmt === false) {
        die('Error preparing statement: ' . $conn->error);
    }

    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind hasil
        $stmt->bind_result($db_user_id, $db_password, $db_role);
        $stmt->fetch();

        // Verifikasi password yang di-hash
        if (password_verify($password, $db_password)) {
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['role'] = $db_role;
            header("Location: index.php"); // Redirect ke halaman utama
            exit();
        } else {
            $error = "User ID atau password salah.";
        }
    } else {
        $error = "User ID atau password salah.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Login - WEBUILDER ID">
    <title>Login - WEBUILDER ID</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, rgb(255, 153, 0), rgb(206, 82, 255), rgb(16, 190, 0));
            background-size: 400% 400%;
            animation: gradientFade 20s infinite alternate ease-in-out;
            overflow: hidden;
        }

        @keyframes gradientFade {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            color: white;
            width: 100%;
            max-width: 400px;
            transform: scale(0.8) translateY(200px);
            opacity: 0;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        .login-container.active {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        .login-container img {
            display: block;
            margin: 0 auto 20px auto;
            max-width: 120px;
            border-radius: 50%;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            box-shadow: inset 0px 2px 6px rgba(255, 255, 255, 0.2);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            color: black;
            border: 1px solid white;
            box-shadow: 0px 0px 8px rgba(255, 255, 255, 0.7);
        }

        .btn-login {
            background: linear-gradient(90deg, #FFA500, #9B30FF);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
            padding: 10px;
        }

        .btn-login:hover {
            background: linear-gradient(90deg, #9B30FF, #FFA500);
            box-shadow: 0px 0px 15px rgba(255, 215, 0, 0.8);
        }

        .additional-links {
            margin-top: 15px;
            text-align: center;
        }

        .additional-links a {
            color: rgb(255, 255, 255);
            font-weight: bold;
            text-decoration: none;
            display: block;
            margin-top: 5px;
        }

        .additional-links a:hover {
            color: white;
            text-shadow: 0px 0px 5px rgba(255, 247, 0, 0.7);
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <i class="fas fa-arrow-left back-button" onclick="goBack()"></i>
    <div class="login-container" id="loginContainer">
        <!-- Logo -->
        <img src="logo/logo.png" alt="Logo" class="logo">

        <!-- Tulisan Login -->
        <h2 class="text-center">LOGIN</h2>

        <!-- Form Login -->
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi Anda" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>

        <!-- Link Tambahan -->
        <div class="additional-links">
            <a href="forgot_password.php" class="forgot-link">Lupa Kata Sandi?</a>
            <a href="create_account.php" class="signup-link">Belum punya akun? Daftar sekarang</a>
            <a href="guest_index.php" class="signup-link">Kembali Halaman Guess</a>
        </div>
    </div>

    <script>
        // Animasi saat halaman dimuat
        const loginContainer = document.getElementById('loginContainer');
        setTimeout(() => {
            loginContainer.classList.add('active');
        }, 100);

        // Animasi saat tombol back ditekan
        function goBack() {
            loginContainer.classList.remove('active');
            setTimeout(() => {
                window.history.back();
            }, 500);
        }
    </script>
</body>
</html>
