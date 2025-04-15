<?php
require 'config.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = $_POST['request_id'];
    $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $status = 'Pending';
    
    $sql = "INSERT INTO payments (request_id, user_id, amount, payment_method, status, created_at) 
            VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iidss", $request_id, $user_id, $amount, $payment_method, $status);
    
    if ($stmt->execute()) {
        echo "<script>alert('Pembayaran berhasil diproses!'); window.location.href='thank_you.php';</script>";
    } else {
        echo "<script>alert('Gagal memproses pembayaran.'); window.location.href='payment.php';</script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Form Pembayaran</h2>
        <form action="payment.php" method="POST">
            <label for="request_id">ID Request:</label>
            <input type="number" name="request_id" required>
            
            <label for="user_id">ID User:</label>
            <input type="number" name="user_id" required>
            
            <label for="amount">Total Pembayaran:</label>
            <input type="text" name="amount" id="total_amount" readonly>
            
            <label for="payment_method">Metode Pembayaran:</label>
            <select name="payment_method" required>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="E-Wallet">E-Wallet</option>
                <option value="Credit Card">Credit Card</option>
            </select>
            
            <button type="submit">Bayar Sekarang</button>
        </form>
    </div>
</body>
</html>
