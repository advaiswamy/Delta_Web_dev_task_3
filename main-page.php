<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styles/main.css">
  </head>
  <body>
    <form action="logout.php" method="post">
      <button class="btn" type="submit" name="logout">Logout</button>
    </form>
    <br>
    <a href="subpages/create-event/create-event-form.php">Create Event</a>
    <br>
    <br>
    <a href="subpages/created-events/created-events.php">Check created events</a>
    <br>
    <br>
    <a href="subpages/invitations/option.php">Invitations</a>
    <br>
    <br>
    <a href="subpages/upcoming-events/upcoming-events.php">Upcoming Events</a>
    <br>
    <br>
    <a href="subpages/notification/notification.php">Notifications</a>
  </body>
</html>
