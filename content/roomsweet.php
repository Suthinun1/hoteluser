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
      <h1 class="logo">Book a hotel</h1>
      <nav class="nav">
        <ul>
          <li><a href="../dashboard.html">Home</a></li>
          <li><a href="../history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">History</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
          <li><a href="javascript:history.back()">Back</a></li>
          <li><a style="color: #ff5d5d;"href="../logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <h2>Stylish Simplicity of a Hotel</h2>
      <a href="../booking/booksweet.php" class="btn" >Book Now</a>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <h2>Sweet Room</h2>
      <h4>Room available <?php echo $sweetCount ?>/20</h4>
      <p>
        Discover the perfect romantic getaway in our Sweet Room, designed for love and intimacy. Experience luxurious amenities, elegant décor, and stunning views, creating the ideal atmosphere for your special moments together. Book now for an unforgettable stay.
      </p>
      <ul class="features">
        <li>✔ Free Wi-Fi</li>
        <li>✔ Car Parking</li>
        <li>✔ Duo Bed</li>
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
