<?php
  session_start();
  echo "<link rel='stylesheet' href='../../styles/main.css'>";
  if (isset($_SESSION["id"])) {
      require "../../dbc.php";
      $sql = "SELECT inv_id FROM inv_status WHERE approval=\"approved\" AND end_user=?";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      echo "<br>";
      echo "<table border='1'>";
      echo "<tr>
      <th>
      User ID
      </th>
      <th>
      Event Name
      </th>
      <th>
      Start Time
      </th>
      <th>
      End Time
      </th>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          foreach ($row as $field => $value) {
              if ($field == "inv_id") {
                  $value = (int)$value;
                  $sql2 = "SELECT user_id, inv_id, evt_name, strt_time, end_time FROM created_evnts WHERE inv_id = $value";
                  $result2 = mysqli_query($conn, $sql2);
                  $query = mysqli_fetch_assoc($result2);

                  foreach ($query as $fields => $values) {
                      if ($fields == "evt_name") {
                          echo '<td><a href="../invitation.php?id='.$query["inv_id"].'&subpage=upcoming-events/upcoming-events.php">' . $values . '</a></td>';
                      } elseif ($fields != "inv_id") {
                          echo "<td>" . $values . "</td>";
                      }

                  }
              }
          }
          echo "</tr>";
      }
      echo "</table>";
  } else {
      header("Location: ../../main-page.php?error=nosession");
  }

echo "<br><br>";
echo '<a href="../../main-page.php">Back</a>';
