<?php
echo "<link rel='stylesheet' href='styles.css'>";
echo "<link rel='stylesheet' href='../styles/template.css'>";
echo "<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap' rel='stylesheet'>";
echo "<link href='https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap' rel='stylesheet'>";
echo "<link href='https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&display=swap' rel='stylesheet'>";
session_start();
if(isset($_SESSION['id'])){
  require "../dbc.php";
  $inv = $_GET['id'];
  $sql = "SELECT * FROM invitation WHERE inv_id=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $inv);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_assoc($result);
  $id = (int)$row["inv_id"];

  $sql2 = "SELECT * FROM created_evnts WHERE inv_id=$id";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $strt_time = substr($row2["strt_time"], 0,5);
  $end_time = substr($row2["end_time"], 0,5);

  echo "<div class='invite' id='invite'>";
  echo "<div class='subdiv' id='subdiv'>";
  echo "<p class='head font'>".$row2["evt_name"]."</p>";
  echo "<p class='font'><span class='thick'>Event date:</span> ".date("d/m/Y", strtotime($row["date_inv"]))."</p>";
  echo "<p class='font'><span class='thick'>Start Time:</span> ".$strt_time."&emsp;<span class='thick'>End Time:</span> ".$end_time."</p>";
  echo "<p class='font'>".$row["header"]."</p>";
  echo "<p class='font'>".$row["message"]."</p>";
  echo "<p class='font'>".$row["footer"]."</p>";
  echo "</div>";
  echo "<img class='birthday-temp' id='birthday-temp' src='../images/birthday-template.jpg' alt='balloon template' style='display:none;'>";
  echo "<img class='wedding-temp' id='wedding-temp' src='../images/wedding-template.jpg' alt='wedding template' style='display:none;'>";
  echo "</div>";
  $page = $_GET['subpage'];
  echo "<br><br><a href='".$page."'>Back</a>";
  echo "<script src='invite/template.js' charset='utf-8'></script>";
} else{
  header("Location: ../index.php?nosession");
  exit();
}
