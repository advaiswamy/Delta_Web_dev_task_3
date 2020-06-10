<?php
session_start();
if (isset($_SESSION["id"])) {
    require "../../dbc.php";
    $id = (int)$_SESSION['id'];
    $query = "SELECT * FROM inv_status WHERE approval='pending' AND end_user=$id AND deadline > cast((now()) as datetime)";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = (int)$row["inv_id"];
        $sql = "SELECT * FROM created_evnts WHERE inv_id=$id";
        $result2 = mysqli_query($conn, $sql);
        $row2 = mysqli_fetch_assoc($result2);

        echo "<div class='content'>";
        echo "<p>".$row2['evt_name']."</p>";
        echo "<div class='slider hide' id='slider'>";
        echo "<a href='../invitation.php?id=".$row['inv_id']."&subpage=invitations/option.php'>See invite</a><br><br>";
        echo "User_ID: ".$row['user_id'];
        echo "<p>Response:</p>";
        echo "<textarea name='response' rows='8' cols='30' placeholder='Food preferences/ Number of people' style='resize:none'></textarea><br><br>";
        echo "<button type='submit' name='accept'>Accept</button>&nbsp;";
        echo "<button type='submit' name='reject'>Reject</button>";
        echo "</div>";
        echo "</div>";
    }

    if (isset($_POST['accept'])) {
        $user_id = (int)$_SESSION['id'];
        $response = $_POST['response'];
        $sql2 = "UPDATE inv_status SET response=?, approval='approved' WHERE end_user=$user_id";
        $stmt2 = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt2, $sql2);
        mysqli_stmt_bind_param($stmt2, "s", $response);
        mysqli_stmt_execute($stmt2);
        header("Location: option.php");
        exit();
    }
    if (isset($_POST['reject'])) {
        $user_id = (int)$_SESSION['id'];
        $sql2 = "UPDATE inv_status SET response=?, approval='rejected' WHERE end_user=$user_id";
        mysqli_stmt_prepare($stmt2, $sql2);
        mysqli_stmt_bind_param($stmt2, "s", $response);
        mysqli_stmt_execute($stmt2);
        header("Location: option.php");
        exit();
    }
} else{
  header("Location: ../../main-page.php");
  exit();
}
?>
