<?php

require_once('../count.php');

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
  <link rel="stylesheet" href="../css/rstan.css">
</head>
<body>
  <header class="header">
    <div class="container">
      <h1 class="logo">เดอะการ์เดนโฮเทล</h1>
      <nav class="nav">
        <ul>
          <li><a href="../dashboard.php">บ้าน</a></li>
          <li><a href="../history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">ประวัติ</a></li>
          <li><a href="../contact.php">ติดต่อ</a></li>
          <li><a href="javascript:history.back()">กลับ</a></li>
          <li><a style="color: #ff5d5d;" href="../logout.php">ล็อคเอ้าท์</a></li>
        </ul>
      </nav>
    </div>
  </header>

  
  <section class="hero">
    <div class="backgound"></div>
    <div class="container">
      <h2>ความเรียบง่ายมีสไตล์ของโรงแรม</h2>
      <a href="../booking/bookstandard.php" class="btn" >จองเลย!</a>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <h2>ห้องมาตรฐาน</h2>
      <h4>ห้องที่กำลังว่าง <?php echo $standardCount ?>/29</h4>
      <p>
      ผ่อนคลายในห้องมาตรฐานของเรา ออกแบบมาเพื่อความสะดวกสบาย เพลิดเพลินกับสิ่งอำนวยความสะดวกที่จำเป็นและบรรยากาศสบาย ๆ เหมาะสำหรับการพักผ่อนอย่างผ่อนคลาย จองตอนนี้เพื่อรับประสบการณ์ที่คุ้มค่าและน่าพึงพอใจ</p>
      <ul class="features">
        <li>✔ ฟรี Wi-Fi</li>
        <li>✔ ที่จอดรถ</li>
      </ul>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <p>© 2024 Book a hotel. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
