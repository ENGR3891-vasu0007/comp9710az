<?php

// Initialize the session
session_start();
//Confirm to set machine_state off
include 'DBConnect.php';
$sql = "UPDATE user_account SET machine_state = 0 WHERE `username` = '" . $_SESSION["username"] . "'";
if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: index.php");
exit;
?>