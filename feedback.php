<?php
session_start(); // Memulai session
// Koneksi ke database
require 'config.php';

// Proses pengiriman feedback
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['feedback'])) {
        $feedback = $_POST['feedback'];
        $user_id = $_SESSION['user_id']; // Ambil user_id dari session

        // Query untuk memasukkan feedback ke database
        $query = "INSERT INTO feedback (user_id, feedback) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("is", $user_id, $feedback);

        if ($stmt->execute()) {
            echo "Feedback berhasil dikirim!";
        } else {
            echo "Terjadi kesalahan saat mengirim feedback.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Feedback - WEBUILDER ID">
    <title>Feedback - WEBUILDER ID</title>

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

        .feedback-container {
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

        .feedback-container.active {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        .feedback-container img {
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

        .btn-feedback {
            background: linear-gradient(90deg, #FFA500, #9B30FF);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
            padding: 10px;
        }

        .btn-feedback:hover {
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
    <div class="feedback-container" id="feedbackContainer">
        <!-- Form Feedback -->
        <h2 class="text-center">Feedback</h2>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php elseif (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form action="feedback.php" method="POST">
            <div class="mb-3">
                <label for="feedback_text" class="form-label">Feedback</label>
                <textarea class="form-control" id="feedback_text" name="feedback_text" placeholder="Masukkan feedback Anda" required></textarea>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select class="form-control" id="rating" name="rating" required>
                    <option value="1">1 (Buruk)</option>
                    <option value="2">2</option>
                    <option value="3">3 (Cukup)</option>
                    <option value="4">4</option>
                    <option value="5">5 (Sangat Baik)</option>
                </select>
            </div>

            <button type="submit" class="btn btn-feedback w-100">Kirim Feedback</button>
        </form>

    </div>

    <script>
        // Animasi saat halaman dimuat
        const feedbackContainer = document.getElementById('feedbackContainer');
        setTimeout(() => {
            feedbackContainer.classList.add('active');
        }, 100);

        // Animasi saat tombol back ditekan
        function goBack() {
            feedbackContainer.classList.remove('active');
            setTimeout(() => {
                window.history.back();
            }, 500);
        }
    </script>
</body>
</html>
