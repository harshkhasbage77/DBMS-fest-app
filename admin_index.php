<?php
session_start();
    include("connect.php");
    include("functions.php");

    $user_data = check_admin($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Index</title>
</head>
<body bgcolor="FDEBD0">
    <h1>Admin</h1>
    <a href="logout.php">Log out</a>
    <div><h2>This is the index page</h2></div> <br>

    Hello, admin.
</body>
</html>