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
      <p></p>
      <a class="btn" href="history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">Go to the purchase history page.</a>
    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <p>© 2024 Book a hotel. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
