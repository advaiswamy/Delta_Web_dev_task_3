
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styles/signin.css">
    <link rel="stylesheet" href="styles/main.css">
  </head>
  <body>
    <form class="form" action="signup.php" method="post">
      <p>Username</p>
      <input class="field" type="text" name="username" placeholder="Username">
      <p>Password</p>
      <input class="field" type="password" name="password" placeholder="Password">
      <br>
      <br>
      <button class="btn" type="submit" name="signup-submit">Sign Up</button>
      <br>
      <br>
      <a href="index.php">Back</a>
      <?php
        if($_GET['signup'] == 'success'){
          header("Location: index.php");
          exit();
        }
       ?>

    </form>
  </body>
</html>
