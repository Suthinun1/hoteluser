<?php

    require_once('connect.php');
    include_once('functions.php');

    $insertdata = new DB_con();

    if (isset($_POST['insert'])) {
        // รับค่าจากฟอร์ม
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $uname = $_POST['username'];
        $email = $_POST['email'];  // New line to capture email
        $pass = $_POST['password'];
    
        // ตรวจสอบว่าค่าของ confirm password ตรงกันหรือไม่
        if ($pass != $_POST['confirm-password']) {
            echo "<script>alert('Password and Confirm Password do not match');</script>";
        } else {
            // เรียกใช้ฟังก์ชัน insert ให้ถูกต้อง
            $sql = $insertdata->insert($uname, $pass, $fname, $lname, $email); // Updated to include email
    
            if ($sql) {
                echo "<script>alert('Register Successfully');</script>";
                echo "<script>window.location.href='login.php'</script>";
            } else {
                echo "<script>alert('Something Went Wrong');</script>";
                echo "<script>window.location.href='register.php'</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/register.css">
    <style>
          html, body {
    height: 100%; /* กำหนดความสูงของหน้าทั้งหมด */
    margin: 0; /* ลบ padding/margin */
    overflow-y: scroll; /* อนุญาตให้เลื่อนในแนวตั้ง */
    scrollbar-width: none; /* ซ่อน scrollbar บน Firefox */
}   
    </style>
</head>
<body>
    <div class="container">
        <h2>สมัครสมาชิก</h2>
        <form action="" method="post" class="register-form">
            <div class="form-group">
                <label for="firstname">ชื่อจริง</label>
                <input type="text" id="firstname" name="firstname" placeholder="กรุณากรอกชื่อจริง" required>
            </div>
            <div class="form-group">
                <label for="lastname">นามสกุล</label>
                <input type="text" id="lastname" name="lastname" placeholder="กรุณากรอกนามสกุล" required>
            </div>
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" id="username" name="username" placeholder="กรุณากรอกชื่อผู้ใช้" required>
            </div>
            <div class="form-group">
                <label for="email">อีเมล</label>
                <input type="email" id="email" name="email" placeholder="กรุณากรอกอีเมล" required>
            </div>
            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <input type="password" id="password" name="password" placeholder="สร้างรหัสผ่าน" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">ยืนยันรหัสผ่าน</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="ยืนยันรหัสผ่าน" required>
            </div>
            <button type="submit" class="btn" name="insert">สมัครสมาชิก</button>
            <div class="login-link">
                <p>คุณมีบัญชีแล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
            </div>
        </form>
    </div>
</body>
</html>
