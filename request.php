<?php
session_start();
require 'config.php'; // Pastikan file config.php sudah terhubung dengan database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $user_id = $_SESSION['user_id'];
    $business_name = $_POST['business_name'];
    $website_type = $_POST['website_type'];
    $description = $_POST['description'];
    $payment_method = $_POST['payment_method']; // Ambil metode pembayaran yang dipilih

    // Query untuk menyimpan data request ke database
    $query = "INSERT INTO requests (user_id, business_name, website_type, description, payment_method) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issss", $user_id, $business_name, $website_type, $description, $payment_method);

    if ($stmt->execute()) {
        echo "Request berhasil dikirim!";
    } else {
        echo "Terjadi kesalahan saat mengirim request.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Request</title>
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

        .request-form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            color: white;
            width: 100%;
            max-width: 450px;
            max-height: 80vh;
            overflow-y: auto;
            transform: scale(0.8) translateY(200px);
            opacity: 0;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        .request-form-container.active {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
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
            padding: 12px 20px;
            width: 100%;
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

        .payment-method-container {
            margin-bottom: 20px;
        }

        .custom-dropdown {
            position: relative;
            width: 100%;
        }

        .dropdown-button {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            cursor: pointer;
        }

        .dropdown-button:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background: rgba(0, 0, 0, 0.7);
            width: 100%;
            top: 100%;
            border-radius: 10px;
            margin-top: 5px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
        }

        .payment-option {
            padding: 10px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .payment-option:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .payment-option img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .payment-option span {
            font-size: 14px;
        }

        .custom-dropdown.active .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
<div class="request-form-container active">
    <h1 style="text-align: center;">Request Form</h1>
    <form method="POST" action="request_form.php">
        <!-- User Information -->
        <div class="form-group">
            <label for="user_name">Nama Pengguna</label>
            <input type="text" id="user_name" name="user_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">No Telepon</label>
            <input type="tel" id="phone" name="phone" class="form-control" required>
        </div>

        <!-- Business Information -->
        <div class="form-group">
            <label for="business_name">Business Name</label>
            <input type="text" id="business_name" name="business_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="website_type">Website Type</label>
            <select id="website_type" name="website_type" class="form-control" required>
                <option value="Landing Page">Landing Page</option>
                <option value="E-commerce">E-commerce</option>
                <option value="Company Profile">Company Profile</option>
                <option value="Portfolio">Portfolio</option>
                <option value="Toko Kelontong">Toko Kelontong</option>
                <option value="Bengkel Mobil/Motor">Bengkel Mobil/Motor</option>
                <option value="Catering">Catering</option>
                <option value="Toko Elektronik">Toko Elektronik</option>
                <option value="Custom">Custom</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter description here..." required></textarea>
        </div>

        <!-- Hosting Selection -->
        <div class="form-group">
            <label for="hosting_type">Pilih Hosting</label>
            <select id="hosting_type" name="hosting_type" class="form-control" required onchange="updateTotal()">
                <option value="0">Pilih Hosting</option>
                <option value="30000">Bronze - Rp 30.000</option>
                <option value="50000">Silver - Rp 50.000</option>
                <option value="80000">Gold - Rp 80.000</option>
                <option value="140000">Platinum - Rp 140.000</option>
            </select>
        </div>

        <!-- Domain Selection -->
        <div class="form-group">
            <label for="domain_type">Pilih Domain</label>
            <select id="domain_type" name="domain_type" class="form-control" required onchange="updateTotal()">
                <option value="0">Pilih Domain</option>
                <option value="235000">.com - Rp 235.000</option>
                <option value="200000">.id - Rp 200.000</option>
                <option value="220000">.org - Rp 220.000</option>
                <option value="240000">.net - Rp 240.000</option>
            </select>
        </div>

        <!-- Payment Method -->
        <div class="form-group">
            <label for="payment_method">Metode Pembayaran</label>
            <select id="payment_method" name="payment_method" class="form-control" required>
                <option value="BCA">BCA</option>
                <option value="Mandiri">Mandiri</option>
                <option value="BRI">BRI</option>
                <option value="BNI">BNI</option>
                <option value="Dana">Dana</option>
                <option value="OVO">OVO</option>
                <option value="Gopay">Gopay</option>
                <option value="ShopeePay">ShopeePay</option>
            </select>
        </div>

        <button type="submit" class="btn-feedback">Submit Request</button>
    </form>
    <div class="additional-links">
        <a href="store_index.php">Back</a>
    </div>
</div>

<script>
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownContent = document.getElementById('dropdown-content');
    const paymentOptions = document.querySelectorAll('.payment-option');

    dropdownButton.addEventListener('click', function () {
        dropdownContent.classList.toggle('active');
    });

    paymentOptions.forEach(option => {
        option.addEventListener('click', function () {
            dropdownButton.textContent = option.querySelector('span').textContent;
            dropdownContent.classList.remove('active');
            
            // Menyimpan pilihan metode pembayaran ke dalam input tersembunyi
            const existingInput = document.querySelector('input[name="payment_method"]');
            if (existingInput) {
                existingInput.value = option.dataset.payment;
            } else {
                const paymentMethodInput = document.createElement('input');
                paymentMethodInput.type = 'hidden';
                paymentMethodInput.name = 'payment_method';
                paymentMethodInput.value = option.dataset.payment;
                document.forms[0].appendChild(paymentMethodInput);
            }
        });
    });
</script>

</body>
</html>
