<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/main-page.css">
  </head>
  <body>

    <p class="uid">Your ID: <?php echo $_SESSION['id']?> <br> Username: <?php echo $_SESSION['username']?></p>
    <a class="outline" href="subpages/create-event/create-event-form.php">Create Event</a>
    <a class="outline" href="subpages/created-events/created-events.php">Check created events</a>
    <a class="outline" href="subpages/invitations/option.php">Invitations</a>
    <a class="outline" href="subpages/upcoming-events/upcoming-events.php">Upcoming Events</a>
    <a class="outline" href="subpages/notification/notification.php">Notifications</a>
    <form action="logout.php" method="post">
      <button class="outline red" type="submit" name="logout" style="width: 260px;">Logout</button>
    </form>
  </body>
</html>
