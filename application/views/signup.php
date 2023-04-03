<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up </title>
  <link rel="stylesheet" href="../../public/assets/css/login.css">
</head>
<body>
  <body>
    <div class="container">
      <h1>Sign Up</h1>
      <hr>
      <form action="create" method="POST">
        <label for="name">
          <input type="text" name="name" id="name" placeholder="Name" required />
        </label>
        <label for="email">
          <input type="email" name="email" id="email" placeholder="Email" required />
        </label>
        <label for="password">
          <input type="password" minlength="8" name="password" id="password" placeholder="Password" required />
        </label>
        <label for="submit">
          <input type="submit" name="submit" id="submit" value="Submit">
        </label>
        <span id="error">
          <?php
          if (isset($GLOBALS['error'])) {
            echo $GLOBALS['error'];
          }
          ?>
        </span>
      </form>
    </div>
  </body>
</body>

</html>
