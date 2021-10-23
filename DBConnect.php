<?php

#DBConnect.php
$conn = new mysqli();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "comp9710";
$conn->connect($host, $user, $password, $dbname);
if (mysqli_connect_errno()) {
    echo("Failed to connect, the error message is : " .
    mysqli_connect_error());
    exit();
} /* else
  echo "Connect to mySQL successfully <br/>";
  if (!mysqli_set_charset($conn, "utf8")) {
  printf("Error loading character set utf8: %s\n", mysqli_error($conn));
  } else {
  printf("Current character set: %s\n", mysqli_character_set_name($conn));
  } */

////$conn->close();
?>
