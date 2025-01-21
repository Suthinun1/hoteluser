<?php
require_once('connect.php');
include_once('functions.php');

$resetdata = new DB_con();

if (isset($_POST['reset'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];

    if ($new_password != $confirm_password) {
        echo "<script>alert('รหัสผ่านใหม่และการยืนยันรหัสผ่านไม่ตรงกัน');</script>";
    } else {
        // เก็บรหัสผ่านเป็นข้อความธรรมดาในฐานข้อมูล
        $update = $resetdata->resetPassword($username, $new_password);
    
        if ($update) {
            echo "<script>alert('รีเซ็ตรหัสผ่านสำเร็จ');</script>";
            echo "<script>window.location.href='login.php'</script>";
        } else {
            echo "<script>alert('ไม่สามารถอัปเดตรหัสผ่านได้');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รีเซ็ตรหัสผ่าน</title>
    <link rel="stylesheet" href="css/resetp.css">
</head>
<body>
<div class="login-container">
    <h2>รีเซ็ตรหัสผ่าน</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="username">ชื่อผู้ใช้</label>
            <input type="text" id="username" name="username" placeholder="กรุณากรอกชื่อผู้ใช้" required>
        </div>
        <div class="input-group">
            <label for="email">อีเมล</label>
            <input type="email" id="email" name="email" placeholder="กรุณากรอกอีเมล" required>
        </div>
        <div class="input-group">
            <label for="new-password">รหัสผ่านใหม่</label>
            <input type="password" id="new-password" name="new-password" placeholder="กรุณากรอกรหัสผ่านใหม่" required>
        </div>
        <div class="input-group">
            <label for="confirm-password">ยืนยันรหัสผ่านใหม่</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="กรุณายืนยันรหัสผ่านใหม่" required>
        </div>
        <button type="submit" name="reset">รีเซ็ตรหัสผ่าน</button>
        <div class="signup-link">
            <p>จำรหัสผ่านได้แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
        </div>
    </form>
</div>
</body>
</html>
