<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าเข้าสู่ระบบ</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="login-container">
    <form action="api/api_login.php" method="POST" class="login-form">
      <h2>เข้าสู่ระบบ</h2>
      
      <div class="input-group">
        <label for="username">ชื่อผู้ใช้</label>
        <input type="text" id="username" name="username" placeholder="กรุณากรอกชื่อผู้ใช้" required>
      </div>

      <div class="input-group">
        <label for="password">รหัสผ่าน</label>
        <input type="password" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" required>
      </div>

      <button type="submit" class="btn">เข้าสู่ระบบ</button>
      
      <div class="signup-link">
        <p>ยังไม่มีบัญชีผู้ใช้? <a href="register.php">สมัครสมาชิก</a></p>
        <p style="margin-top:10px;">ลืมรหัสผ่าน <a href="reset_pass.php" style="color:green;">รีเซ็ตรหัสผ่าน</a></p>
      </div>
    </form>
  </div>
</body>
</html>
