<?php

  if (isset($_POST['signup-submit'])) {
      require "dbc.php";
      $username = $_POST['username'];
      $password = $_POST['password'];

      if (empty($username) || empty($password)) {
          header("Location: signup-form.php?error=emptyfields");
          exit();
      } else {
          $sql = "SELECT username FROM users WHERE username=?";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: signup-form.php?error=sqlerror");
              exit();
          } else {
              mysqli_stmt_bind_param($stmt, "s", $username);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);
              $resultCheck = mysqli_stmt_num_rows($stmt);
              if (resultCheck > 0) {
                  header("Location: signup-form.php?error=usertaken=".$username);
                  exit();
              } else {
                  $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                  $stmt = mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                      header("Location: signup-form.php?error=sqlerror");
                      exit();
                  } else {
                      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                      mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
                      mysqli_stmt_execute($stmt);
                      header("Location: signup-form.php?signup=success");
                      exit();
                  }
              }
          }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
  } else {
      header("Location: signup-form.php");
      exit();
  }
