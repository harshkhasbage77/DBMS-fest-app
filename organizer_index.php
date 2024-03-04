<?php
session_start();
    include("connect.php");
    include("functions.php");

    $user_data = check_organizer($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body bgcolor="FDEBD0">
    <h1>Organizer</h1>
    <a href="logout.php">Log out</a>
    <div><h2>This is the organizer's index page. </h2></div> <br>
    <?php include 'participant_logistics.php' ?>
    Hello, <?php echo $user_data['Name']?>.
</body>
</html>