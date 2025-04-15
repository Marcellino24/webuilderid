<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "web_builder_id"; // Ganti sesuai database Anda
$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil kategori unik untuk filtering
$categoryQuery = "SELECT DISTINCT kategori FROM produk";
$categoryResult = $conn->query($categoryQuery);

// Proses pencarian dan filter
$search = isset($_GET['search']) ? $_GET['search'] : "";
$filter = isset($_GET['filter']) ? $_GET['filter'] : "";

$query = "SELECT * FROM produk WHERE 1";

if (!empty($search)) {
    $query .= " AND nama LIKE '%" . $conn->real_escape_string($search) . "%'";
}

if (!empty($filter)) {
    $query .= " AND kategori = '" . $conn->real_escape_string($filter) . "'";
}

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store - WebuilderID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(45deg, #FF9900, #CE52FF, #10BE00);
            background-size: 400% 400%;
            animation: gradientFade 20s infinite alternate ease-in-out;
        }
        @keyframes gradientFade {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .container {
            margin-top: 50px;
        }
        .product-card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: transparent;
            border: 2px solid white;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .back-button span {
            font-size: 1.5rem;
            margin-right: 8px;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .carousel-item img {
        width: 800%;
        height: 300px;
        object-fit: cover; /* Supaya gambar lebih tajam */
        max-width: 800%;
        max-height: 300%;
    }
        .carousel-item:hover img {
            opacity: 1;
        }

        .btn-primary {
    background: linear-gradient(45deg, orange, purple);
    border: none;
    color: white;
    transition: 0.3s ease-in-out;
}

.btn-primary:hover {
    background: linear-gradient(45deg, purple, orange);
    transform: scale(1.05);
}

    </style>
</head>
<body>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="foto/Gambar 1.png" class="d-block w-100" alt="Gambar 1">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="foto/Gambar 2.png" class="d-block w-100" alt="Gambar 2">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="foto/Gambar 3.png" class="d-block w-100" alt="Gambar 3">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="foto/Gambar 4.png" class="d-block w-100" alt="Gambar 4">
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center text-white mb-4">Cari Website UMKM Impianmu</h2>

        <!-- Pencarian dan Filter -->
        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari desain website..." value="<?= htmlspecialchars($search) ?>">
                </div>
                <div class="col-md-4">
                    <select name="filter" class="form-control">
                        <option value="">Semua Kategori</option>
                        <?php while ($row = $categoryResult->fetch_assoc()): ?>
                            <option value="<?= $row['kategori'] ?>" <?= $filter == $row['kategori'] ? "selected" : "" ?>><?= $row['kategori'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning w-100"><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
        </form>

        <!-- Daftar Produk -->
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card product-card">
                            <img src="<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>" class="product-img">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $row['nama'] ?></h5>
                                <p class="text-muted">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                                <a href="request_copy.php?id=<?= $row['id'] ?>" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-white text-center">Produk tidak ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php $conn->close(); ?>
