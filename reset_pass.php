<?php
require_once('connect.php');
include_once('functions.php');

$resetdata = new DB_con();

if (isset($_POST['reset'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];

    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];
    
    if ($new_password != $confirm_password) {
        echo "<script>alert('New Password and Confirm Password do not match');</script>";
    } else {
        // เก็บรหัสผ่านเป็นข้อความธรรมดาในฐานข้อมูล
        $update = $resetdata->resetPassword($username, $new_password);
    
        if ($update) {
            echo "<script>alert('Password Reset Successfully');</script>";
            echo "<script>window.location.href='login.php'</script>";
        } else {
            echo "<script>alert('Failed to update password');</script>";
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/resetp.css">
</head>
<body>
<div class="login-container">
    <h2>Reset Password</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email" required>
        </div>
        <div class="input-group">
            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new-password" placeholder="Enter new Password" required>
        </div>
        <div class="input-group">
            <label for="confirm-password">Confirm New Password</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new Password" required>
        </div>
        <button type="submit" name="reset">Reset Password</button>
        <div class="signup-link">
            <p>Remembered your password? <a href="login.php">Login</a></p>
        </div>
    </form>
</div>
</body>
</html>
