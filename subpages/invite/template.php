<?php
  session_start();
  if(isset($_SESSION["id"])){
    require "../../dbc.php";
    $id = $_GET['id'];
    $query = "SELECT template FROM invitation WHERE inv_id=$id";
    $res = mysqli_query($conn, $query);
    $row_res = mysqli_fetch_assoc($res);
    $sqlfont = "SELECT font, font_color FROM style WHERE inv_id=$id";
    $resfont = mysqli_query($conn, $sqlfont);
    $row_resfont = mysqli_fetch_assoc($resfont);
    $combine = array_merge($row_res, $row_resfont);
    echo json_encode($combine);
}
else{
  header("Location: ../../index.php?error=nosession");
  exit();
}
