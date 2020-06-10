<?php
  session_start();
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="inv">
      <table border="1">
      <form action="" method="post">
        <?php
        require "inv.php";
        ?>
      </form>
      </table>
      <br>
      <br>
      <a href='../../main-page.php'>Back</a>
    </div>
  </body>
</html>
