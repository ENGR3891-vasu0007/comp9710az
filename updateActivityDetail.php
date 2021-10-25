<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$dateErr = "";
$activityid = "";
$activitystate = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['activity_update'])) {
    $activityid = $_POST['activityID'];
    $today = date("Y-m-d H:i:s");
    $activity_name = $_POST['activity_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];
    $user = $_SESSION['username'];
    if ($start_date > $end_date) {
        $dateErr = "Start date cannot be later than the End date.";
    } else {
        if (include 'DBConnect.php') {
            $sql = "UPDATE `activity` SET `activity_id`='$activityid',`description`='$description',`activity_name`='$activity_name',`start_date`='$start_date',`end_date`='$end_date',`last_modified_date`='$today',`last_modified_by`='$user' WHERE `activity_id` = '$activityid'";
            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }
    header("Location:editActivity.php");
    exit;
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['activity_delete'])) {
    $activityid = $_POST['activityID'];
    if (include 'DBConnect.php') {
        $sql = "SELECT * FROM `activity` WHERE `activity_id` = '$activityid'";
        $result = $conn->query($sql) or die(mysqli_error());
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $activity_id = $row['activity_id'];
                $sql = "DELETE FROM document WHERE activity_id = '$activity_id'";
                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $sql = "DELETE FROM video WHERE activity_id = '$activity_id'";
                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        $sql = "DELETE FROM `activity` WHERE `activity_id` = '$activityid'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    header("Location:editActivity.php");
    exit;
}
?>