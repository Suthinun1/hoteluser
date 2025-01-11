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
          <li><a href="dashboard.php">Home</a></li>
          <li><a href="history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">History</a></li>   
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="javascript:history.back()">Back</a></li> 
          <li><a style="color: #ff5d5d;"href="../logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>
    <main>
        <section class="contact-us">
            <h2>Contact Us</h2>
            <p>We're here to help</p>
            <div class="contact-options">
                <div class="contact-option">
                    <div class="icon">📞</div>
                    <h3>Call Us</h3>
                    <p style="margin-bottom:10px;">Tel. 0123-456-789</p>
                </div>
                <div class="contact-option">
                <div class="icon">🏢</div>
                <h3>Address</h3>
                    <p style="margin-bottom:10px;">1234 Dream Street, Suite 567, Suphanburi City, Thailand, 72000</p>
                </div>
                <div class="contact-option">
                    <div class="icon">✉️</div>
                    <h3>Email a Question</h3>
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