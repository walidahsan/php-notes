<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phppractice";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "connection was not established";
}
