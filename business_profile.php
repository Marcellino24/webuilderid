<?php 
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profil Bisnis Interaktif - WebuilderID">
    <meta name="author" content="WebuilderID">
    <title>Profil Bisnis Interaktif - WebuilderID</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(45deg, rgb(255, 153, 0), rgb(206, 82, 255), rgb(16, 190, 0));
            background-size: 400% 400%;
            animation: gradientFade 20s infinite alternate ease-in-out;
            overflow-x: hidden;
        }

        @keyframes gradientFade {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h2 {
            color: #333;
        }

        .section {
            padding: 50px 0;
        }

        .section:nth-child(even) {
            background-color: #f3f3f3;
        }

        .text-container, .image-container {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .text-container.visible, .image-container.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .section-content {
            display: flex;
            align-items: center;
        }

        .section-content img {
            width: 100%;
            max-width: 500px;
        }

         /* Back button styles */
         .back-button {
            display: flex;
            align-items: center;
            position: absolute;
            top: 20px;
            left: 20px;
            background: none;
            border: none;
            color: black;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .back-button span {
            font-size: 1.5rem;
            margin-right: 5px;
        }

        .back-button:hover {
            color: #FFA500;
        }
    </style>
</head>
<body>

<button class="back-button" onclick="goBack()">
    <span>&lt;</span> Back
</button>

<!-- Profil Usaha -->
<section class="section">
    <div class="container">
        <div class="row section-content">
            <div class="col-md-6 text-container">
                <h2>Profil Usaha</h2>
                <p>WebuilderID adalah perusahaan teknologi yang berfokus pada solusi digital inovatif untuk bisnis. Kami membantu UMKM hingga perusahaan besar dengan pengembangan web, aplikasi, dan layanan teknologi lainnya untuk mendukung transformasi digital.</p>
            </div>
            <div class="col-md-6 image-container">
                <img src="https://via.placeholder.com/500x300" alt="Profil Usaha">
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi -->
<section class="section">
    <div class="container">
        <div class="row section-content">
            <div class="col-md-6 image-container">
                <img src="https://via.placeholder.com/500x300" alt="Visi Misi">
            </div>
            <div class="col-md-6 text-container">
                <h2>Visi dan Misi</h2>
                <p><strong>Visi:</strong> Menjadi perusahaan teknologi terpercaya yang menghadirkan solusi terbaik untuk semua kalangan bisnis.</p>
                <p><strong>Misi:</strong> Memberikan layanan inovatif dengan kualitas tinggi, berorientasi pada kebutuhan pelanggan, dan mendukung keberlanjutan teknologi di masa depan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Tujuan Bisnis -->
<section class="section">
    <div class="container">
        <div class="row section-content">
            <div class="col-md-6 text-container">
                <h2>Tujuan Bisnis</h2>
                <p>Kami bertujuan untuk menciptakan platform digital yang user-friendly dan efisien, membantu klien mencapai target mereka lebih cepat dan lebih baik. Kami percaya pada pendekatan yang kolaboratif dan transparan dalam memberikan solusi.</p>
            </div>
            <div class="col-md-6 image-container">
                <img src="https://via.placeholder.com/500x300" alt="Tujuan Bisnis">
            </div>
        </div>
    </div>
</section>

<!-- Susunan Organisasi -->
<section class="section">
    <div class="container">
        <div class="row section-content">
            <div class="col-md-6 image-container">
                <img src="https://via.placeholder.com/500x300" alt="Susunan Organisasi">
            </div>
            <div class="col-md-6 text-container">
                <h2>Susunan Organisasi</h2>
                <p>Tim kami terdiri dari para ahli di bidang teknologi, desain, dan pemasaran digital. Struktur organisasi kami dirancang untuk memastikan efektivitas dan efisiensi dalam setiap proyek yang kami kerjakan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Data Kepuasan Pengguna -->
<section class="section">
    <div class="container">
        <div class="row section-content">
            <div class="col-md-6 text-container">
                <h2>Data Kepuasan Pengguna</h2>
                <p>Kami sangat bangga dengan tingkat kepuasan pelanggan kami. Berdasarkan survei terakhir, 95% pelanggan merasa puas dengan layanan kami, dan 87% mengatakan bahwa mereka akan menggunakan jasa kami kembali di masa depan.</p>
                <ul>
                    <li><strong>Kecepatan Respon:</strong> 4.8/5</li>
                    <li><strong>Kualitas Layanan:</strong> 4.9/5</li>
                    <li><strong>Harga Terjangkau:</strong> 4.7/5</li>
                </ul>
            </div>
            <div class="col-md-6 image-container">
                <img src="https://via.placeholder.com/500x300" alt="Data Kepuasan Pengguna">
            </div>
        </div>
    </div>
</section>

<!-- Total Banyaknya UMKM yang Merekomendasikan Jasa -->
<section class="section">
    <div class="container">
        <div class="row section-content">
            <div class="col-md-6 image-container">
                <img src="https://via.placeholder.com/500x300" alt="Total UMKM">
            </div>
            <div class="col-md-6 text-container">
                <h2>Total Banyaknya UMKM yang Merekomendasikan Jasa Kami</h2>
                <p>Sampai saat ini, sebanyak <strong>120+ UMKM</strong> telah menggunakan dan merekomendasikan jasa kami kepada komunitas mereka. Kami terus berkomitmen untuk membantu lebih banyak UMKM dalam transformasi digital.</p>
                <ul>
                    <li><strong>UMKM Kuliner:</strong> 45%</li>
                    <li><strong>UMKM Fashion:</strong> 30%</li>
                    <li><strong>UMKM Lainnya:</strong> 25%</li>
                </ul>
                <p>Kami percaya bahwa keberhasilan klien kami adalah keberhasilan kami juga.</p>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            } else {
                entry.target.classList.remove('visible');
            }
        });
    }, {
        threshold: 0.1
    });

    document.querySelectorAll('.text-container, .image-container').forEach(el => {
        observer.observe(el);
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>
