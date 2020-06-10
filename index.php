<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/signin.css">
    <link rel="stylesheet" href="styles/main.css">
  </head>
  <body>
    <div class="form">
      <form action="login.php" method="post">
        <?php
          if ($_GET['error'] == 'wrongpwd') {
            echo "Wrong Password";
          }
          ?>
        <p>Username</p>
        <input class="field" type="text" name="username" placeholder="Username">
        <br>
        <p>Password</p>
        <input class="field" type="password" name="password" placeholder="Password">
        <br>
        <br>
        <button type="submit" name="submit" class="btn">Submit</button>
        <br>
        <a href="signup.php">Signup</a>
      </div>
    </form>
  </body>
</html>
