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

// ตรวจสอบว่าแบบฟอร์มถูกส่งมาหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลการอัพโหลดสลิป
    if (isset($_FILES['slip_image']) && $_FILES['slip_image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["slip_image"]["name"]);
        
        // อัพโหลดไฟล์
        if (move_uploaded_file($_FILES["slip_image"]["tmp_name"], $target_file)) {
            // อัพเดตฐานข้อมูลสำหรับไฟล์สลิป
            $slip_image = $target_file;
            $update_sql = "UPDATE tb_booking SET slip_image = ?, status = 'ชำระเงินเสร็จสิ้น' WHERE idpri = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("si", $slip_image, $booking_id);
            $update_stmt->execute();
            
            // แจ้งเตือนผ่าน JavaScript
            echo "<script type='text/javascript'>alert('The file " . basename($_FILES["slip_image"]["name"]) . " has been uploaded and the status has been updated to \"ชำระเงินเสร็จสิ้น\".');</script>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/his.css">
    <title>Payment</title>
    <style>
        .form-container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .slip-image {
            max-width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="container">
        <h1 class="logo">เดอะการ์เดนโฮเทล</h1>
        <nav class="nav">
            <ul>
                <li><a href="dashboard.php">บ้าน</a></li>
                <li><a href="history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">ประวัติ</a></li>
                <li><a href="contact.php">ติดต่อ</a></li>
                <li><a href="javascript:history.back()">กลับ</a></li>
                <li><a style="color: #ff5d5d;" href="logout.php">ล๊อคเอาท์</a></li>
            </ul>
        </nav>
    </div>
</header>

<h1 class="headtx">การชำระเงิน</h1>

<div class="form-container">
    <h2>ชื่อ: <?php echo $row['firstname']. ' ' . $row['lastname']; ?></h2>
    <h3 style="">จำนวนที่ชำระ: <?php echo number_format($row['price'], 2); ?> บาท</h3>
    <br>
    <hr>
    <br>
    <h3>ธนาคารกสิกร: 123-45678-90</h3>
    <h3>ชื่อ: สุธินันท์ เขียนศรี</h3>
    <form action="payment.php?booking_id=<?php echo $booking_id; ?>" method="post" enctype="multipart/form-data">
        <label for="slip_image">อัพโหลดสลิปการชำระเงิน</label>
        <input type="file" name="slip_image" id="slip_image" required>
        
        <input type="submit" value="Submit Payment">
    </form>

    <?php
    // แสดงรูปสลิปถ้ามี
    if (!empty($row['slip_image'])) {
        echo "<img src='" . $row['slip_image'] . "' class='slip-image' alt='Payment Slip'>";
    }
    ?>
</div>

<footer class="footer" style="position: relative;">
    <div class="container">
        <p>© 2024 Book a hotel. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
