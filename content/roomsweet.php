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
  <link rel="stylesheet" href="../css/rswt.css">
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
      <a href="../booking/booksweet.php" class="btn" >จองเลย!</a>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <h2>ห้องสวีท</h2>
      <h4>ห้องที่กำลังว่าง <?php echo $sweetCount ?>/20</h4>
      <p>
      ค้นพบสถานที่พักผ่อนแสนโรแมนติกที่สมบูรณ์แบบใน Sweet Room ของเรา ซึ่งออกแบบมาเพื่อความรักและความใกล้ชิด สัมผัสประสบการณ์สิ่งอำนวยความสะดวกที่หรูหรา การตกแต่งที่หรูหรา และทิวทัศน์อันตระการตา สร้างบรรยากาศที่เหมาะสำหรับช่วงเวลาพิเศษของคุณร่วมกัน จองตอนนี้เพื่อการเข้าพักอันน่าจดจำ
      </p>
      <ul class="features">
        <li>✔ ฟรี Wi-Fi</li>
        <li>✔ ที่จอดรถ</li>
        <li>✔ เตียงคู่</li>
      </ul>
    </div>
  </section>

  <div id="bookModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="book.php" method="POST">
      <!-- Name and Contact Information -->
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" required>
      
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" required>
      
      <label for="phone">Phone Number:</label>
      <input type="text" id="phone" name="phone" required>

      <label for="checkin">Check-in Date:</label>
      <input type="date" id="checkin" name="checkin" required>
      
      <input type="hidden" id="roomtype" name="roomtype" vlaue="sweet"required>

      <button type="submit" class="btn">Confirm Booking</button>
    </form>
  </div>
</div>

  <footer class="footer">
    <div class="container">
      <p>© 2024 Book a hotel. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
