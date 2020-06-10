<?php

session_start();
  if (isset($_SESSION['id'])) {
      if (isset($_POST['create'])) {
          require "../../dbc.php";
          $deadline = $_POST['deadline'];
          $deadline = date("Y-m-d H:i:s", strtotime($deadline));
          $type = $_POST['type'];
          $user = $_SESSION['id'];
          $template = $_POST['template'];
          $name = $_POST['event'];
          $evt_date = $_POST['date_evt'];
          $start = $_POST['start'];
          $end = $_POST['end'];
          $header = $_POST['header'];
          $body = $_POST['message'];
          $footer = $_POST['footer'];
          $approval = "pending";
          $font = $_POST['font'];
          $fontcolor = $_POST['colors'];

          $sql = "INSERT INTO invitation (user_id, template, status, header, message, footer, date_inv, deadline) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
          $sql2 = "INSERT INTO created_evnts (user_id, inv_id, evt_name, strt_time, end_time) VALUES(?, ?, ?, ?, ?)";
          $sql3 = "INSERT INTO inv_status (user_id, inv_id, approval, deadline, end_user) VALUES(?, ?, ?, ?, ?)";
          $sql4 = "INSERT INTO style (inv_id, font, font_color) VALUES(?,?,?)";

          $users = "SELECT id FROM users";
          $result2 = mysqli_query($conn, $users);

          $stmt = mysqli_stmt_init($conn);
          $stmt2 = mysqli_stmt_init($conn);
          $stmt3 = mysqli_stmt_init($conn);
          $stmt4 = mysqli_stmt_init($conn);

          if (!(mysqli_stmt_prepare($stmt, $sql) && mysqli_stmt_prepare($stmt2, $sql2) && mysqli_stmt_prepare($stmt3, $sql3) && mysqli_stmt_prepare($stmt4, $sql4))) {
              header("Location: create-event.php?error=sqlerror");
              exit();
          } else {
              mysqli_stmt_bind_param($stmt, "isssssss", $user, $template, $type, $header, $body, $footer, $evt_date, $deadline);
              mysqli_stmt_execute($stmt);

              $sql = "SELECT * FROM invitation WHERE inv_id=?";
              $stmt = mysqli_stmt_init($conn);
              mysqli_stmt_prepare($stmt, $sql);
              mysqli_stmt_bind_param($stmt, "s", mysqli_insert_id($conn));
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              if ($row = mysqli_fetch_assoc($result)) {
                  mysqli_stmt_bind_param($stmt4, "iss", $row["inv_id"], $font, $fontcolor);
                  mysqli_stmt_execute($stmt4);
                  mysqli_stmt_bind_param($stmt2, "iisss", $user, $row["inv_id"], $name, $start, $end);
                  mysqli_stmt_execute($stmt2);

                  if ($type == "public") {
                      while ($rows = mysqli_fetch_assoc($result2)) {
                          if ($row["user_id"] != $rows["id"]) {
                            mysqli_stmt_bind_param($stmt3, "iissi", $user, $row['inv_id'], $approval, $deadline, $rows["id"]);
                            mysqli_stmt_execute($stmt3);
                          }
                      }
                  }else if($type == "private") {
                    $members = $_POST['priv-txt'];
                    $arr = explode(",",$members);
                    for ($i=0; $i < count($arr); $i++) {
                      if($arr[$i] != $_SESSION["id"]){
                        mysqli_stmt_bind_param($stmt3, "iissi", $user, $row['inv_id'], $approval, $deadline, $arr[$i]);
                        mysqli_stmt_execute($stmt3);
                      }
                    }
                  }

                  echo "Event created successfully";
                  echo "<br>";
                  echo "<br>";
                  echo '<a href="../../main-page.php">Home</a>';
              } else {
                  header("Location: create-event-form.php?form=errorfetch");
                  exit();
              }
          }
      } else {
          header("Location: create-event-form.php?form=error");
          exit();
      }
  } else {
      header("Location: ../../index.php?error=nosession");
      exit();
  }
