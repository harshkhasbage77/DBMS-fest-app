<?php
session_start();
    include("connect.php");
    include("functions.php");

    $user_data = check_participant($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body bgcolor="FDEBD0">
    <?php include 'participant_navbar.php' ?>
    <h1>Participant</h1>
    <a href="logout.php">Log out</a>
    <div><h2>Profile</h2></div> <br>

    Hello, <?php echo $user_data['Name']?>.


</body>
</html>