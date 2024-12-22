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
  <title>Thank You</title>
  <link rel="stylesheet" href="css/success.css">
</head>
<body>

  <main class="main-content">
    <div class="content-container">
      <div class="icon-check">
        <img src="img/success.png" alt="Success" />
      </div>
      <h2>Thank you for booking room with Our</h2>
      <p>The staff will contact you back within 10-20 minutes</p>
      <a class="btn" href="dashboard.html">Return to home page</a>
    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <p style="margin-bottom: 0;">© 2024 Book a hotel. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
