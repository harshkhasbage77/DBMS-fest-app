<?php
// echo phpinfo();
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "fest";

$con = mysqli_connect($serverName, $userName, $password, $dbName);
if (mysqli_connect_errno()) {
    echo "Failed to connect!";
    exit();
}
// echo "Connected successfully!";
?>
