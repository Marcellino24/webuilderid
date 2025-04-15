<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Cek apakah email ada di database
    $stmt = $conn->prepare("SELECT id, name FROM users WHERE email = ?");
    if ($stmt === false) {
        die('Error preparing statement: ' . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $name);
        $stmt->fetch();

        // Buat token reset password
        $token = bin2hex(random_bytes(32));
        $expire_time = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Simpan token ke database (buat tabel reset_password jika belum ada)
        $insert_stmt = $conn->prepare("INSERT INTO reset_password (user_id, token, expire_at) VALUES (?, ?, ?)");
        if ($insert_stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }
        $insert_stmt->bind_param("iss", $user_id, $token, $expire_time);
        $insert_stmt->execute();

        // Kirim email reset password
        $reset_link = "http://yourwebsite.com/reset_password.php?token=" . $token;
        $subject = "Reset Kata Sandi Anda";
        $message = "Halo $name,\n\nKlik tautan berikut untuk mereset kata sandi Anda:\n$reset_link\n\nTautan ini hanya berlaku selama 1 jam.\n\nTerima kasih.";
        $headers = "From: no-reply@yourwebsite.com";

        if (mail($email, $subject, $message, $headers)) {
            $success = "Tautan reset kata sandi telah dikirim ke email Anda.";
        } else {
            $error = "Gagal mengirim email. Coba lagi nanti.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lupa Kata Sandi - WEBUILDER ID">
    <title>Lupa Kata Sandi - WEBUILDER ID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .forgot-password-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            color: white;
            width: 100%;
            max-width: 400px;
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

        .btn-reset {
            background: linear-gradient(90deg, #FFA500, #9B30FF);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
            padding: 10px;
        }

        .btn-reset:hover {
            background: linear-gradient(90deg, #9B30FF, #FFA500);
            box-shadow: 0px 0px 15px rgba(255, 215, 0, 0.8);
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <h2 class="text-center">Lupa Kata Sandi</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" required>
            </div>
            <button type="submit" class="btn btn-reset w-100">Kirim Tautan Reset</button>
        </form>
        <?php if (isset($error)) { echo '<div class="alert alert-danger mt-3">' . $error . '</div>'; } ?>
        <?php if (isset($success)) { echo '<div class="alert alert-success mt-3">' . $success . '</div>'; } ?>
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
