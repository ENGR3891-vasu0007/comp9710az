<?php

if ($_SESSION["usertype"] == 1 || $_SESSION["usertype"] == 2) {
    include 'DBConnect.php';
    $sql = "SELECT * FROM module";
    $result = $conn->query($sql) or die(mysqli_error());
}
?>