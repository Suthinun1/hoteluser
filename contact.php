<?php

session_start();
if (!isset($_SESSION['sess_id'])) {
    header('Location: ../login.php'); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
<header class="header">
    <div class="container">
      <h1 class="logo">Book a hotel</h1>
      <nav class="nav">
        <ul>
          <li><a href="dashboard.php">บ้าน</a></li>
          <li><a href="history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">ประวัติ</a></li>   
          <li><a href="contact.php">ติดต่อ</a></li>
          <li><a href="javascript:history.back()">กลับ</a></li> 
          <li><a style="color: #ff5d5d;"href="../logout.php">ล๊อคเอาท์</a></li>
        </ul>
      </nav>
    </div>
  </header>
    <main>
        <section class="contact-us">
            <h2>ติดต่อ</h2>
            <p>ติดต่อเราหากต้องการความช่วยเหลือ</p>
            <div class="contact-options">
                <div class="contact-option">
                    <div class="icon">📞</div>
                    <h3>เบอร์ติดต่อ</h3>
                    <p style="margin-bottom:10px;">ติดต่อ 0123-456-789</p>
                </div>
                <div class="contact-option">
                <div class="icon">🏢</div>
                <h3>ที่อยู่</h3>
                    <p style="margin-bottom:10px;">444/444 ถนนมาลัยแมน ตำบลรั้วใหญ่ อำเภอเมือง จังหวัดสุพรรณบุรี</p>
                </div>
                <div class="contact-option">
                    <div class="icon">✉️</div>
                    <h3>อีเมล</h3>
                    <p style="margin-bottom:10px;">testxxx@example.com</p>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
    <div class="container">
      <p>© 2024 Book a hotel. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>