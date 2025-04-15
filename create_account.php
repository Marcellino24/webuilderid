<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $role = 'applicant'; // Default role untuk user baru

    // Validasi input
    if (empty($name) || empty($email) || empty($password)) {
        $error = "Semua kolom wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi ke database gagal: " . $conn->connect_error);
        }

        // Periksa apakah email sudah digunakan
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Email sudah terdaftar.";
        } else {
            // Gunakan password hashing
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Simpan data pengguna baru ke database
            $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password_hash, role) VALUES (?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die('Error preparing statement: ' . $conn->error);
            }

            $stmt->bind_param("sssss", $name, $email, $phone, $hashed_password, $role);
            if ($stmt->execute()) {
                $success = "Akun berhasil dibuat. Silakan login.";
                $stmt->close();
                $conn->close();
                header("Location: login.php");
                exit();
            } else {
                $error = "Terjadi kesalahan saat membuat akun: " . $stmt->error;
            }
        }

        // Tutup statement
        $stmt->close();
    }

    // Tutup koneksi
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Daftar - WEBUILDER ID">
    <title>Daftar Akun - WEBUILDER ID</title>

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

        .register-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            color: white;
            width: 100%;
            max-width: 400px;
            transform: scale(0.8) translateY(200px);
            opacity: 0;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        .register-container.active {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        .register-container img {
            display: block;
            margin: 0 auto 20px auto;
            max-width: 120px;
            border-radius: 50%;
        }

        .form-control {
            background: #fff;
            color: black;
            border: none;
            border-radius: 10px;
            padding: 10px;
            box-shadow: inset 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            background: #fff;
            color: black;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 8px rgba(255, 255, 255, 0.7);
        }

        .btn-register {
            background: linear-gradient(90deg, #FFA500, #9B30FF);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
            padding: 10px;
        }

        .btn-register:hover {
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
    <div class="register-container" id="registerContainer">
        <!-- Logo -->
        <img src="logo/logo.png" alt="Logo" class="logo">

        <!-- Tulisan Register -->
        <h2 class="text-center">Daftar Akun</h2>

        <!-- Form Register -->
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Anda" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Masukkan Nomor Telepon Anda">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi Anda" required>
            </div>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <button type="submit" class="btn btn-register w-100">Daftar</button>
        </form>

        <!-- Link Tambahan -->
        <div class="additional-links">
            <a href="login.php" class="login-link">Sudah punya akun? Login di sini</a>
        </div>
    </div>

    <script>
        // Animasi saat halaman dimuat
        const registerContainer = document.getElementById('registerContainer');
        setTimeout(() => {
            registerContainer.classList.add('active');
        }, 100);

        // Animasi saat tombol back ditekan
        function goBack() {
            registerContainer.classList.remove('active');
            setTimeout(() => {
                window.history.back();
            }, 500);
        }
    </script>
</body>
</html>
