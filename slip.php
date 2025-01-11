<?php
// เริ่มต้น session
session_start();

// ตรวจสอบว่า session ของผู้ใช้ถูกตั้งค่าแล้วหรือไม่
if (!isset($_SESSION['sess_id'])) {
    header('Location: ../login.php');
    exit();
}

// ตรวจสอบว่าได้ส่ง booking_id หรือไม่
if (!isset($_GET['booking_id'])) {
    header('Location: history.php?user_id=' . $_SESSION['sess_id']);
    exit();
}

$booking_id = $_GET['booking_id'];

// เรียกใช้ไฟล์ connect.php
include 'connect.php';

// ดึงข้อมูลการจองจากฐานข้อมูล
$sql = "SELECT * FROM tb_booking WHERE idpri = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "No booking found.";
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .slip-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            text-align: center;
        }
        .slip-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .slip-details {
            text-align: left;
            margin-bottom: 20px;
            line-height: 1.8;
        }
        .slip-details span {
            font-weight: bold;
        }
        .slip-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
        .slip-image {
            max-width: 100%;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="slip-container">
    <div class="slip-header">Booking Slip</div>
    
    <div class="slip-details">
        <p><span>Name:</span> <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></p>
        <p><span>Phone:</span> <?php echo $row['phone']; ?></p>
        <p><span>Check-in:</span> <?php echo $row['checkin']; ?></p>
        <p><span>Check-out:</span> <?php echo $row['checkout']; ?></p>
        <p><span>Room Type:</span> <?php echo $row['roomtype']; ?></p>
        <p><span>Price:</span> <?php echo number_format($row['price'], 2); ?> THB</p>
        <p><span>Status:</span> <?php echo $row['status']; ?></p>
        <p><span>Room ID:</span> <?php echo $row['id_room'] ?: 'Pending confirmation'; ?></p>
    </div>

    <?php if (!empty($row['slip_image'])): ?>
        <div>
            <img src="<?php echo $row['slip_image']; ?>" alt="Payment Slip" class="slip-image">
        </div>
    <?php else: ?>
        <p style="color: red;">No payment slip uploaded.</p>
    <?php endif; ?>

    <div class="slip-footer">
        © 2024 Book a hotel. All rights reserved.
    </div>
</div>

</body>
</html>
