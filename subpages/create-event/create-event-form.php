<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <form action="create-event.php" method="post">
      Deadline
      <input type="datetime-local" name="deadline" min="<?php echo date('Y-m-d');?>T00:00" max="9999-12-31T00:00">
      <br>
      <br>
      Invite Status
      <select name="type" id="evt_type">
        <option value="public">Public</option>
        <option value="private">Private</option>
      </select>
      <br>
      <br>
      <p class="pvt hide">Send invites to:</p>
      <input type="text" name="priv-txt" class="pvt hide">
      <p class="pvt hide txt">(Enter user_id with commas Eg) 1,2,3)</p>
      <br class="pvt hide">
      Template
      <select name="template" id="template">
        <option value="none">None</option>
        <option value="birthday">Birthday</option>
        <!-- <option value="funeral">Funeral</option> -->
      </select>
      <br>
      <br>
      Font
      <select class="font" name="font" id="font">
        <option value="default">Default</option>
        <option value="Roboto">Roboto</option>
      </select>
      <br>
      <br>
      Font Color
      <input type="text" name="font-color" class="font-color" id="font-color" placeholder="Enter Color. Default: Black">
      <input type="hidden" name="colors" id="colors" value="black" style="display:none;">
      <br>
      <br>
      <div id="template-div" class="template-div inv">

        <div class="subdiv">


          <input type="text" name="event" placeholder="Event Name" class="inv">
          <br>
          <br>
          Event Date
          <input class="inv" type="date" name="date_evt" min="<?php echo date('Y-m-d');?>" max="9999-12-31">
          <br>
          <br>
          Start <input class="inv" type="time" name="start">
          End <input class="inv" type="time" name="end">
          <br>
          <br>
          <input class="inv" type="text" name="header" placeholder="Header">
          <br>
          <br>
          <textarea class="inv" name="message" rows="8" cols="30" placeholder="Message(Limit: 2000 characters)"></textarea>
          <br>
          <br>
          <input class="inv" type="text" name="footer" placeholder="Footer Message">

        </div>
      </div>
      <br>
      <br>
      <button type="submit" name="create">Create</button>
      <br>
      <br>
      <a href="../../main-page.php">Go back home</a>
      <?php
        if(isset($_GET['form'])){
          echo "".$_GET['form'];
        }
       ?>
    </form>
  </body>
  <script src="create-form.js" charset="utf-8"></script>
</html>
