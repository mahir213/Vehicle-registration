<?php

session_start();

$servername = "localhost";
$db_username = "root";
$db_password = "";
$databasename = "vehicle_registration";

$conn = mysqli_connect($servername, $db_username, $db_password, $databasename);

if(!$conn) {
    die("Connection failed");
}

?>