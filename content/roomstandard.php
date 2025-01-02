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
      <h1 class="logo">Book a hotel</h1>
      <nav class="nav">
        <ul>
          <li><a href="../dashboard.html">Home</a></li>
          <li><a href="../history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">History</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
          <li><a href="javascript:history.back()">Back</a></li>
          <li><a style="color: #ff5d5d;" href="../logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>

  
  <section class="hero">
    <div class="backgound"></div>
    <div class="container">
      <h2>Stylish Simplicity of a Hotel</h2>
      <a href="../booking/bookstandard.php" class="btn" >Book Now</a>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <h2>Standard Room</h2>
      <h4>Vacant room <?php echo $standardCount ?>/29</h4>
      <p>
      Relax in our Standard Room, designed for comfort and convenience. Enjoy essential amenities and a cozy atmosphere, perfect for a restful stay. Book now for an affordable and pleasant experience.
      </p>
      <ul class="features">
        <li>✔ Free Wi-Fi</li>
        <li>✔ Car Parking</li>
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
