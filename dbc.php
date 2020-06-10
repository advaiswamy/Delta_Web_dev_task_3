<?php

  $servername = "localhost";
  $dbUsername = "root";
  $dbPassword = "Qwerty!@#$%a18";
  $dbName = "invitations";

  $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

  if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
  }
