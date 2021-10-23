<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$today = date("Y-m-d H:i:s");
$uploader = $_SESSION["username"];
$moduleName = "";
$dateErr = "";
$course_id = "";
$module_id = "";
$activityName = "";
$description = "";
$start_date = "";
$end_date = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['module_submit'])) {
    $course = $_POST['course'];
    $moduleName = $_POST['moduleName'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    if ($start_date > $end_date) {
        $dateErr = "The start date is older than the end daste. Please check and re-input.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        if ($moduleName != null) {
            if (include 'DBConnect.php') {
                $sql = "INSERT INTO `module`(`course_id`, `module_name`, `start_date`, `end_date`, `creted_date`, `created_by`) "
                        . "VALUES ('$course','$moduleName','$start_date','$end_date','$today','$uploader')";
                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                } else {
                    echo "Module " . $moduleName . "has been created.";
                }
                $conn->close();
                header("location: moduleManage.php");
            }
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['activity_submit'])) {
    $module_id = $_POST['module'];
    $activityName = $_POST['activityName'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    if ($start_date > $end_date) {
        $dateErr = "The start date is older than the end daste. Please check and re-input.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        if ($activityName != null) {
            if (include 'DBConnect.php') {
                $sql = "INSERT INTO `activity`(`module_id`, `activity_name`, `description`, `start_date`, `end_date`, `creted_date`, `created_by`) "
                        . "VALUES ('$module_id','$activityName','$description','$start_date','$end_date','$today','$uploader')";
                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                } else {
                    echo "Activity " . $activityName . "has been created.";
                }
                $conn->close();
                header("location: moduleManage.php");
            }
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
?>