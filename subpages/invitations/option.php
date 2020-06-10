<?php
  session_start();
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/option.css">
  </head>
  <body>
    <div class="inv">
      <form action="" method="post">
        <?php
        require "inv.php";
        ?>
      </form>
      <br>
      <br>
      <a href='../../main-page.php'>Back</a>
      <script src="slide.js" charset="utf-8"></script>
    </div>
  </body>
</html>
