<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bill</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <body>
    <div class="container">
      <h1>Bill</h1>
      <hr>
      <form action="confirm.php" method="POST">
        <label for="email">
          <input type="email" name="email" id="email" placeholder="Email" required />
        </label>
        <label for="name">
          <input type="text" name="name" id="name" placeholder="Name" required />
        </label>
        <label for="phone">
          <input type="tel" name="phone" id="phone" minlength= "10"placeholder="Phone Number" required />
        </label>
        Payable Amount:
        <?php
        session_start();
        echo $_SESSION['price'].' Rupees';
        ?>
        <label for="submit">
          <input type="submit" id="submit" value="Continue" name="submit">
        </label>
      </form>
    </div>
  </body>
</body>

</html>
