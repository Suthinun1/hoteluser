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
  <title>Wiin Phetchaburi</title>
  <link rel="stylesheet" href="../css/rvip.css">
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
          <li><a style="color: #ff5d5d;"href="../logout.php">ล๊อคเอาท์</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <h2>ความเรียบง่ายมีสไตล์ของโรงแรม</h2>
      <a href="../booking/bookvip.php" class="btn" >จองเลย!</a>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <h2>ห้องวีไอพี</h2>
      <h4>ห้องที่กำลังว่าง <?php echo $vipCount ?>/10</h4>
      <p>
      ค้นพบความหรูหราขั้นสุดยอดในห้องวีไอพีของเรา ซึ่งออกแบบมาเพื่อความหรูหราและความสะดวกสบาย เพลิดเพลินกับสิ่งอำนวยความสะดวกระดับพรีเมียม การตกแต่งที่หรูหรา และทิวทัศน์อันน่าทึ่ง เหมาะสำหรับการทำงานหรือการพักผ่อน จองตอนนี้เพื่อยกระดับการเข้าพักของคุณ
      </p>
      <ul class="features">
        <li>✔ ฟรี Wi-Fi</li>
        <li>✔ ที่จอดรถ</li>
        <li>✔ สี่เตียงนอน</li>
        <li>✔ ห้องครัว</li>
        <li>✔ โซนออกกำลังกายฟรี</li>
        <li>✔ สระว่ายน้ำส่วนตัว</li> 
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
