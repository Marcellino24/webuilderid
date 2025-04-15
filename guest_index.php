<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WEBUILDER ID - Jasa Pembuatan Website untuk UMKM dan Perusahaan">
    <title>WEBUILDER ID</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(45deg, rgb(255, 153, 0), rgb(206, 82, 255), rgb(16, 190, 0));
            background-size: 400% 400%;
            animation: gradientFade 20s infinite alternate ease-in-out;
            color: white;
        }

        @keyframes gradientFade {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 15px 40px;
            background: rgba(255, 255, 255, 0);
            backdrop-filter: blur(10px);
            border-radius: 10px;
        }

        .header-container img {
            width: 150px;
            height: auto;
        }

           /* Efek Hover Navbar */
            /* Navbar Item Hover */
       /* Navbar Item Hover */
       /* Efek Hover dengan Sound */
        .nav-item a {
            color: white !important;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            position: relative;
            text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.3);
        }

        .nav-item a:hover {
            color: #FFD700 !important; /* Warna Emas */
            text-shadow: 0px 0px 8px rgba(255, 215, 0, 0.8);
        }

        /* Efek Underline Hover */
        .nav-item a::after {
            content: '';
            display: block;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #FFA500, #9B30FF); /* Gradasi Oranye ke Ungu */
            transition: width 0.3s ease-in-out;
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 3px;
        }

        .nav-item a:hover::after {
            width: 100%;
        }

        /* Dropdown Styling */
        .dropdown-menu {
            background: rgba(255, 255, 255, 0.5); /* Hitam Semi Transparan */
            border: none;
            box-shadow: 0px 0px 15px rgba(255, 165, 0, 0.3); /* Glow Halus */
            transition: all 0.3s ease-in-out;
        }

        .dropdown-item {
            color: white !important;
            transition: all 0.3s ease-in-out;
        }

        .dropdown-item:hover {
            background: linear-gradient(90deg, #FFA500, #9B30FF); /* Gradasi Oranye ke Ungu */
            color: black !important;
            font-weight: bold;
        }

            .search-container {
            position: relative;
        }

        .search-container input {
            width: 300px;
            padding: 8px 10px 8px 35px;
            border-radius: 20px;
            border: 2px solid transparent;
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            color: white;
            transition: all 0.3s ease;
        }

        .search-container .fa-search {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            transition: color 0.3s ease;
        }

        /* Efek Hover */
        .search-container input:hover {
            background: rgba(255, 255, 255, 0.5);
            border: 2px solid white;
        }

        /* Efek Fokus (Saat Diketik) */
        .search-container input:focus {
            background: rgba(255, 255, 255, 0.7);
            color: black;
            border: 2px solid #00c3ff;
        }

        .search-container input::placeholder {
            color: rgba(255, 255, 255, 0.7);
            transition: color 0.3s ease;
        }

        /* Efek Fokus Placeholder */
        .search-container input:focus::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .hero-image {
            width: 40%;
            max-height: 400px;
            object-fit: center;
            border-radius: 0px;
            margin-bottom: 10px;
        }

        .category-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }

        .gallery-container-product {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
            height: 30vh; /* Sama dengan tinggi layar */
        }

        .gallery-item {
            width: 250px;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .gallery-item img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item p {
            text-align: center;
            font-weight: bold;
            margin-top: 8px;
        }
        
        .login-icon a {
            color: white; /* Mengatur warna ikon dan teks menjadi putih */
            font-weight: bold;
            text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.3);
            transition: color 0.3s ease-in-out;
        }

        .login-icon a:hover {
            color: #FFD700; /* Warna saat hover (emas) */
            text-shadow: 0px 0px 8px rgba(255, 215, 0, 0.8);
        }

        .login-icon i {
            color: white; /* Warna ikon */
            margin-right: 5px; /* Menambahkan jarak antara ikon dan teks */
        }

        .why-us {
            background-color: #f9f9f9;
            padding: 40px 20px;
            text-align: center;
            border-radius: 0px;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .why-us .section-title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .why-us .description {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        /* Container Utama untuk Gambar */
        .gallery-container {
        position: relative;
        height: 30vh; /* Sama dengan tinggi layar */
        display: flex;
        justify-content: space-between; /* Menempatkan gambar di kiri dan kanan */
        align-items: center;
        overflow: hidden; /* Mencegah elemen keluar dari layar */
        }

        /* Container untuk Gambar */
        .image-container {
        width: 20%; /* Ukuran gambar (20% lebar layar) */
        height: auto;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        overflow: hidden;
        }

        .image-container.left {
        left: 0; /* Gambar di sebelah kiri */
        }

        .image-container.right {
        right: 0; /* Gambar di sebelah kanan */
        }

        /* Efek Pop-Up pada Gambar */
        .pop-up-image {
        width: 100%;
        height: auto;
        transform: scale(0.8);
        opacity: 0;
        transition: transform 0.4s ease, opacity 0.4s ease;
        }

        .pop-up-image.active {
        transform: scale(1);
        opacity: 1;
        }

        /* Styling untuk Section */
        #values {
        background: #ffffff;  /* Ubah background menjadi putih */
        padding: 50px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        }

        /* Judul Layanan */
        #values h2 {
        font-size: 3rem;
        color: #000000;  /* Ubah teks judul menjadi hitam */
        font-weight: bold;
        margin-bottom: 20px;
        }

        #values h3 {
        font-size: 1rem;
        color: #000000;  /* Ubah teks judul menjadi hitam */
        font-weight: bold;
        margin-bottom: 20px;
        }


        /* Judul di atas */
        #values .text-center {
        text-align: center;
        }

        #values h2 {
        font-size: 3rem;
        color: #000000;  /* Ubah teks menjadi hitam */
        font-weight: bold;
        }

        #values p {
        color: #333333;  /* Teks deskripsi menggunakan warna hitam pekat */
        margin-top: 10px;
        font-size: 1.2rem;
        }

        /* Container Horizontal */
        .values-container {
        display: flex;
        justify-content: center; /* Untuk menengahkan konten horizontal */
        gap: 20px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        margin-top: 30px;
        }

        /* Kartu Value */
        .value-card {
        flex: 0 0 300px;
        background: #f0f0f0;  /* Ubah background kartu menjadi warna abu terang */
        color: #000000;  /* Teks di dalam kartu menjadi hitam */
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);  /* Menggunakan shadow hitam lebih ringan */
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.5s ease;
        scroll-snap-align: start;
        }

        /* Nomor Futuristik */
        .value-number {
        font-size: 3rem;
        font-weight: bold;
        color: #1e88e5;  /* Mengubah nomor jadi warna biru */
        margin-bottom: 10px;
        text-shadow: 0 2px 10px rgba(30, 136, 229, 0.4);  /* Efek bayangan halus biru */
        }

        /* Konten Value */
        .value-content h3 {
        font-size: 1.5rem;
        margin-bottom: 8px;
        }

        .value-content p {
        font-size: 1rem;
        color: #333333;  /* Teks deskripsi di kartu menjadi warna hitam pekat */
        }

        /* Animasi Pop-Up */
        .value-card.active {
        transform: translateY(0);
        opacity: 1;
        }

        /* Kontak Kami */
        #contact {
        background: #ffffff;
        padding: 50px 20px;
        color: #000000;
        }

        #contact h2 {
        font-size: 2rem;
        color: #000000;
        margin-bottom: 20px;
        }

        .contact-box {
        display: inline-block;
        background-color: #f8f8f8;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        margin-top: 20px;
        }

        .contact-box p {
        font-size: 1rem;
        color: #333333;
        margin-bottom: 10px;
        }

        #contact a {
        color: #1e88e5;
        text-decoration: none;
        }

        /* Footer */
        footer {
        background-color: #333333;
        color: #ffffff;
        padding: 10px 0;
        }

        footer p {
        font-size: 1rem;
        }

    </style>
</head>
<body>

<header class="header-container">
    <img src="logo/webuilder logo.png" alt="WEBUILDER ID Logo">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item dropdown">
                    <li class="nav-item"><a class="nav-link" href="business_profile.php">Profil Bisnis</a></li>
                    <li class="nav-item"><a class="nav-link" href="paket_umkm.html">Paket & Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="hosting.html">Hosting</a></li>
                    <li class="nav-item"><a class="nav-link" href="domain.html">Domain</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Feedback</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <form action="store.php" method="GET" class="search-container">
    <i class="fas fa-search"></i>
    <input type="text" id="searchInput" name="query" placeholder="Cari desain...">
    <button type="submit" style="display: none;"></button>
</form>

    <!-- Ikon Login -->
    <div class="login-icon">
        <a href="login.php" class="text-decoration-none">
            <i class="fas fa-lock"></i> <span>Need Login</span>
        </a>
    </div>
</header>

<!-- Hero Image -->
<div class="container text-center mt-4">
    <img src="foto/Foto.png" alt="Hero Image" class="hero-image">
</div>

<!-- Welcome Section -->
<div class="container text-center">
    <h2>Selamat Datang di WEBUILDER ID</h2>
    <p>Kami siap membantu Anda dalam pembuatan website untuk UMKM dan perusahaan.</p>
    <p>Saat ini anda berada pada Guest Account, Silahkan login untuk mengakses lebih banyak!.</p>
</div>

<!-- Galeri Desain Terlaris -->
<div class="container mt-5">
    <h3 class="category-title">Desain Terpopuler</h3>
    <div class="gallery-container-product">
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/Jasa-Website-Kuliner.jpg" alt="Desain 1">
            <p>Desain Modern</p>
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/epok.jpg" alt="Desain 2">
            <p>Desain Minimalis</p>
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/landing-page-thumbnail-1.jpg" alt="Desain 3">
            <p>Desain Futuristik</p>
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/elixir-ii.jpg" alt="Desain 3">
            <p>Desain Bisnis</p>
        </div>
    </div>
</div>

<!-- Galeri Desain Terlaris -->
<div class="container mt-5">
    <h3 class="category-title">Katagori Website</h3>
    <div class="gallery-container-product">
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/9 of the Best OpenCart Themes for Tool & Hardware Stores.jpg" alt="Desain 1">
            <p>E-Commerce</p>
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/Blog home page — Untitled UI.jpg" alt="Desain 2">
            <p>Jasa dan Layanan</p>
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/Batik E-commerce Website.jpg" alt="Desain 3">
            <p>Fashion</p>
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/Catera - Catering & Event Planner Wordpress Theme.jpg" alt="Desain 3">
            <p>Makanan & Minuman</p>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h3 class="category-title">Rancangan Wireframe</h3>
    <div class="gallery-container-product">
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/free-wireframe-templates-31 (1).jpg" alt="Desain 1">
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/27e2cf1da349fbe6cf7d3452cd5bfdc7f557bf7b-1440x835.png" alt="Desain 2">
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/Global Sources.jpg" alt="Desain 3">
        </div>
        <div class="gallery-item" onclick="window.location.href='store.php'">
            <img src="foto/saas-landing-page-w400.jpeg" alt="Desain 3">
        </div>
    </div>
</div>

<section class="why-us">
  <div class="container">
    <h2 class="section-title">Kenapa Harus Menggunakan Layanan Kami?</h2>
    <p class="description">
      Bayangkan memiliki partner bisnis yang tidak hanya menyediakan produk berkualitas, tetapi juga peduli dengan kebutuhan spesifik Anda. Dengan layanan kami, Anda akan merasakan kemudahan dalam setiap proses, mulai dari pemilihan produk hingga pengiriman yang tepat waktu. Kami memahami bahwa setiap pelanggan itu unik, itulah mengapa kami menawarkan solusi yang disesuaikan dengan kebutuhan Anda. Tidak hanya itu, produk kami telah dipercaya oleh ratusan pelanggan setia karena keandalan dan inovasinya. Jadi, tunggu apa lagi? Jadikan kami pilihan utama Anda, dan rasakan bagaimana kami dapat membantu Anda mencapai lebih banyak dalam waktu yang lebih singkat!
    </p>
  </div>
</section>

<div class="container mt-5">
    <h3 class="category-title">News</h3>
    <div class="gallery-container-product">
        <div class="gallery-item" onclick="window.open('https://ukmindonesia.id/baca-deskripsi-posts/7-jenis-inovasi-teknologi-untuk-bisnis-umkm-wajib-tahu')">
            <img src="foto/pasted image 0.png" alt="Desain 1">
            <p>​7 Jenis Inovasi Teknologi untuk Bisnis, UMKM Wajib Tahu!</p>
        </div>
        <div class="gallery-item" onclick="window.open('https://pip.kemenkeu.go.id/berita/81/dhawafest-pesona-2024-bangkitkan-semangat-umkm-menuju-kemajuan')">
            <img src="foto/WhatsApp_Image_2024-03-05_at_10.09.04_1709774923.jpeg" alt="Desain 2">
            <p>DhawaFest Pesona 2024 Bangkitkan Semangat UMKM Menuju Kemajuan</p>
        </div>
        <div class="gallery-item" onclick="window.open('https://money.kompas.com/read/2024/04/24/224108326/simak-6-tips-menjalankan-bisnis-di-era-digital?page=all')">
            <img src="foto/Kompas.jpg" alt="Desain 3">
            <p>Simak 6 Tips Menjalankan Bisnis di Era Digita
        </div>
        <div class="gallery-item" onclick="window.open('https://www.djkn.kemenkeu.go.id/kpknl-kendari/baca-artikel/17371/Meningkatkan-UMKM-dengan-Teknologi-Informasi-Langkah-Menuju-Era-Digital.html#:~:text=Teknologi%20informasi%20memungkinkan%20UMKM%20mengintegrasikan,%2C%20Shopee%2C%20atau%20Tiktok%20Shop.')">
            <img src="foto/UMKM_digital.jpeg" alt="Desain 3">
            <p>Apa manfaat utama teknologi informasi bagi UMKM?</p>
        </div>
    </div>
</div>

<section id="gallery" class="py-8 bg-gray-100">
  <div class="gallery-container">
    <!-- Gambar Kiri -->
    <div class="image-container right">
      <a href="https://wa.me/6285220192915" target="_blank">
        <img src="foto/Gambar (2).png" alt="Image 1" class="pop-up-image">
      </a>
    </div>
  </div>
</section>

<section id="values" class="py-8 bg-gray-900">
  <div class="text-center">
    <h2>Value Kami</h2> <!-- Judul layanan -->
    <h3>Kami akan terus meningkatkan kualitas pelayanan kami</h3>
  </div>
  <div class="values-container">
    <div class="value-card">
      <div class="value-number">01</div>
      <div class="value-content">
        <h3>Pelayanan Ramah & Cepat</h3>
        <p>Kami selalu memberikan pelayanan yang mengutamakan kepuasan pelanggan.</p>
      </div>
    </div>
    <div class="value-card">
      <div class="value-number">02</div>
      <div class="value-content">
        <h3>Produk Berkualitas</h3>
        <p>Produk kami dipilih dengan cermat untuk menjaga kualitas terbaik.</p>
      </div>
    </div>
    <div class="value-card">
      <div class="value-number">03</div>
      <div class="value-content">
        <h3>Harga Kompetitif</h3>
        <p>Harga yang kami tawarkan sangat kompetitif tanpa mengorbankan kualitas.</p>
      </div>
    </div>
    <div class="value-card">
      <div class="value-number">04</div>
      <div class="value-content">
        <h3>Dukungan Pelanggan 24/7</h3>
        <p>Tim kami siap membantu kapan pun Anda membutuhkan bantuan.</p>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="py-8 bg-white text-center">
  <h2>Kontak Kami</h2>
  <div class="contact-box">
    <p>Email: <a href="mailto:info@yourcompany.com" class="text-blue-500">webuilderid.com</a></p>
    <p>Telepon: +62 852-2019-2915</p>
    <p>Alamat: Jl. Lodan Raya No.2, RT.12/RW.2, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430</p>
  </div>
</section>

<!-- Footer Section -->
<footer class="bg-gray-800 text-white text-center py-4">
  <p>&copy; 2025 WebuilderID. Semua Hak Cipta Dilindungi.</p>
</footer>

<script>
    // Load Audio
    const hoverSound = new Audio("sound/button-124476.mp3");
    const dropdownSound = new Audio("sounds/dropdown.mp3");

    // Tambahkan suara ke semua menu navbar
    document.querySelectorAll(".nav-item a").forEach(item => {
        item.addEventListener("mouseenter", () => {
            hoverSound.currentTime = 0; // Reset agar bisa dimainkan berulang
            hoverSound.play();
        });
    });

    // Tambahkan suara ke dropdown menu
    document.querySelectorAll(".dropdown-item").forEach(item => {
        item.addEventListener("mouseenter", () => {
            dropdownSound.currentTime = 0;
            dropdownSound.play();
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
  const images = document.querySelectorAll(".pop-up-image");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("active");
        } else {
          entry.target.classList.remove("active");
        }
      });
    },
    { threshold: 0.3 } // Aktif jika 50% gambar terlihat di layar
  );

  images.forEach((image) => observer.observe(image));
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const valueCards = document.querySelectorAll(".value-card");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("active"); // Pop-up
        } else {
          entry.target.classList.remove("active"); // Pop-in
        }
      });
    },
    { threshold: 0.2 } // Aktif jika 20% elemen terlihat di layar
  );

  valueCards.forEach((card) => observer.observe(card));
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
