<?php
$servername = "localhost";
$username = "root";
$password = "";
$gamedb = "gamedb";

$conn = mysqli_connect($servername, $username, $password, $gamedb);

if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}

?>