<?php
session_start();
    include("connect.php");
    include("functions.php");

    $user_data = check_student($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body bgcolor="FDEBD0">
    <?php include 'student_navbar.php' ?>
    <div class="container center">

        <h1 class="display-6">Student</h1>
        <a href="logout.php" class="btn btn-danger m-2 px-2 text-end">Log out</a>
        <div class="m-6 px-6 py-6"><h2>Welcome to student's index page</h2></div> <br>
        <div class="container center h4">
            Hello, <?php echo $user_data['Name']?>.

        </div>
    
    </div>
</body>
</html>