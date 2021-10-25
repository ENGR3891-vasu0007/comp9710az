<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_update'])) {
    $role = $_POST['role'];
    $userid = $_POST['userID'];
    $today = date("Y-m-d H:i:s");
    $user_name = $_POST['user_name'];
    $fisrt_name = $_POST['firstName'];
    $middle_name = $_POST['midName'];
    $last_name = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $user = $_SESSION['username'];
    if ($user_name != null) {
        if (include 'DBConnect.php') {
            $sql = "UPDATE `users` SET `username`='$user_name',`role_id`='$role',`role_id`='$role',`first_name`='$fisrt_name',`middle_name`='$middle_name',`family_name`='$last_name',"
                    . "`gender`='$gender',`username`='$user_name',`email_address`='$email',`last_modified_date`='$today',`last_modified_by`='$user' WHERE `user_id` = '$userid'";
            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }
    header("Location:editUser.php");
    exit;
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_delete'])) {
    $userid = $_POST['userID'];
    if (include 'DBConnect.php') {
        $sql = "DELETE FROM `users` WHERE `user_id` = '$userid'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    header("Location:editUser.php");
    exit;
}
?>