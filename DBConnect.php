<?php

#DBConnect.php
$host = 'mytestserver2.mysql.database.azure.com';
$username = 'vasulg';
$password = 'Flinders@';
$db_name = 'comp9710';
$conn = mysqli_init();

mysqli_ssl_set($conn, NULL, NULL, "cacert.pem", NULL, NULL);

// Establish the connection
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

//If connection failed, show the error
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
