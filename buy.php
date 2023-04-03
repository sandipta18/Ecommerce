<?php
require_once 'calculateamount.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to Continue</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <body>
    <div class="container">
      <h1>Login</h1>
      <hr>
      <form action="checkout.php" method="POST">
        <label for="email">
          <input type="email" name="email" id="email" placeholder="Email" required />
        </label>
        <label for="password">
          <input type="password" name="password" id="password" placeholder="Password" required />
        </label>
        <span id="error">
          <?php
          if(isset($GLOBALS['error'])) {
            echo  $GLOBALS['error'];
          }
          ?>
        </span>
        <span id="message">
          <?php
          if(isset($_COOKIE['message'])) {
            echo $_COOKIE['message'];
          }
          ?>
        </span>
        <label>Already have an account? <a href="signup.php">Signup Instead</a></label>
        <label for="submit">
          <input type="submit" id="submit" value="Login" name="submit">
        </label>
      </form>
    </div>
  </body>
</body>

</html>
