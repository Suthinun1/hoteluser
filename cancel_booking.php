<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['sess_id'])) {
    header('Location: ../login.php');
    exit();
}

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // อัปเดตสถานะเป็น "ยกเลิก"
    $sql = "UPDATE tb_booking SET status = 'ยกเลิก' WHERE idpri = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $booking_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('ยกเลิกการจองเรียบร้อยแล้ว!'); window.location.href = 'history.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด! โปรดลองอีกครั้ง'); window.history.back();</script>";
    }
}
?>
