<?php
  session_start();
  if (isset($_SESSION['id'])) {
    require "../../dbc.php";

      $sql = "SELECT * FROM inv_status WHERE end_user=? AND approval='pending' AND deadline > cast((now()) as datetime);";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      echo "<p style='font-size:30px;'>New Invites</p>";
      while($row = mysqli_fetch_assoc($result)){
        $uid = (int)$row['user_id'];
        $sql2 = "SELECT * FROM users WHERE id=$uid";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo "".$row2["username"]." has invited you to an event.<br>";
      }


      $sql3 = "SELECT * FROM inv_status WHERE user_id=? AND approval='approved'";
      $stmt3 = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt3, $sql3);
      mysqli_stmt_bind_param($stmt3, "s", $_SESSION['id']);
      mysqli_stmt_execute($stmt3);
      $result3 = mysqli_stmt_get_result($stmt3);
      echo "<p style='font-size:30px;'>Accepted Invites</p>";
      while($row3 = mysqli_fetch_assoc($result3)){
        $uid = (int)$row3['end_user'];
        $sql4 = "SELECT * FROM users WHERE id=$uid";
        $result4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_assoc($result4);
        echo "".$row4["username"]." has accepted your invite.<br>";
      }
      echo "<br><br><a href = '../../main-page.php'>Back</a>";

  } else {
      header("Location: index.php?error=nosession");
      exit();
  }
