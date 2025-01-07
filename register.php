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
        <h2>Register</h2>
        <form action="" method="post" class="register-form">
            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Create new firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Create new lastname" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Create new username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Create new Password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn" name="insert">Register</button>
            <div class="login-link">
                <p>You have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
