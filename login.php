<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="login-container">
    <form action="api/api_login.php" method="POST" class="login-form">
      <h2>Login</h2>
      
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required>
      </div>

      <button type="submit" class="btn">Login</button>
      
      <div class="signup-link">
        <p>Don't have an account? <a href="register.php">Sign up</a></p>
        <p style="margin-top:10px;">Forgot password <a href="reset_pass.php" style="color:green;">Reset password</a></p>
      </div>
    </form>
  </div>
</body>
</html>
