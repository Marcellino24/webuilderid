<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard HRD Universitas Bunda Mulia - Kelola data karyawan dengan mudah dan efisien.">
    <meta name="author" content="Wayang Nusantara Studio">
    <title>UBM HRD Dashboard</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome (Latest Version) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">
    
    <!-- Inline CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #222;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header .logo {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .header .logo span {
            color: #ff9800;
        }

        .header .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
        }

        .header .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .header .profile h5 {
            margin: 0;
            color: #ff9800;
        }

        .header nav {
            display: flex;
            gap: 30px;
        }

        .header nav a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .header nav a:hover {
            background-color: #ff9800;
            border-radius: 5px;
            color: #222;
        }

        .content {
            padding: 20px;
            margin-top: 60px;
        }

        .zoomable {
            height: 55px;
            cursor: pointer;
        }

        .zoomable:hover {
            transform: scale(2.5);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <h1><span>UBM</span> HRD Dashboard</h1>
        </div>

        <nav>
            <a href="company_profile.php">Company Profile</a>
            <a href="games.php">Games</a>
            <a href="applications.php">Applications</a>
            <a href="interview_schedules.php">Interview Schedules</a>
            <a href="recruitment_position.php">Recruitment Position</a>
            <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>

        <div class="profile">
            <img src="profile.jpg" alt="User Photo">
            <h5>Marcellino Natanael</h5>
        </div>
    </header>

    <!-- Content -->
    <div class="content">
        <header class="bg-light text-center py-4">
            <h2 class="text-uppercase text-primary mb-1">Dashboard</h2>
            <p class="text-muted">Universitas Bunda Mulia - HRD System</p>
        </header>

        <div class="container">
            <p>Welcome to the dashboard!</p>
            <!-- Your dynamic content can go here -->
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
