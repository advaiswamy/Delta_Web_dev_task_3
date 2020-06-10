<?php
  echo "<link rel='stylesheet' href='../../styles/main.css'>";
  session_start();
  if (isset($_SESSION["id"])) {
      require "../../dbc.php";
      $sql = "SELECT inv_id, evt_name, strt_time, end_time FROM created_evnts WHERE user_id=?";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      echo "<br>";
      echo "<table border='1'>";
      echo "<tr>
      <td>
      Event Name
      </td>
      <td>
      Start Time
      </td>
      <td>
      End Time
      </td>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          foreach ($row as $field => $value) {
              if ($field == "evt_name") {
                  echo '<td><a href="../invitation.php?id='.$row["inv_id"].'&subpage=created-events/created-events.php">' . $value . '</a></td>';
              } elseif ($field != "inv_id") {
                  echo "<td>" . $value . "</td>";
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
