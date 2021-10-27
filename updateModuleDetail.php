<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$dateErr = "";
$moduleid = "";
$modulestate = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['module_update'])) {
    $moduleid = $_POST['moduleID'];
    $today = date("Y-m-d H:i:s");
    $module_name = $_POST['module_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $user = $_SESSION['username'];
    if ($start_date > $end_date) {
        $dateErr = "Start date cannot be later than the End date.";
    } else {
        if (include 'DBConnect.php') {
            $sql = "UPDATE `module` SET `module_id`='$moduleid',`module_name`='$module_name',`start_date`='$start_date',`end_date`='$end_date',`last_modified_date`='$today',`last_modified_by`='$user' WHERE `module_id` = '$moduleid'";
            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }
    header("Location:editModules.php");
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['module_delete'])) {
    $moduleid = $_POST['moduleID'];
    if (include 'DBConnect.php') {
        $sql = "SELECT * FROM `activity` WHERE `module_id` = '$moduleid'";
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
                $sql = "DELETE FROM activity WHERE module_id = '$moduleid'";
                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        $sql = "DELETE FROM `module` WHERE `module_id` = '$moduleid'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    header("Location:editModules.php");
}
?>