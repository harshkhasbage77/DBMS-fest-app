<?php
session_start();

    include("connect.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $dept = $_POST["dept"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!empty($name) && !empty($roll) && !empty($dept) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            // save to database
            // *******
            // Add check for duplicate email and roll no.
            // *******
            $query = "INSERT INTO student (Roll, Name, Dept, email, password) VALUES ('$roll', '$name', '$dept', '$email', '$password')";
            $result = mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else{
            echo "Please enter valid information!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body bgcolor="FDEBD0">
    <div><h5><a href="signup.php">Back</a></h5></div>
    <div><h2>Sign up as Student</h2></div>

    <div id="box">
        <form method="post">
            Name: <input type="text" name="name" required><br><br>
            Roll No.: <input type="text" name="roll" required><br><br>
            Department: <input type="text" name="dept" required><br><br>
            <!-- Can add a dropdown menu for Department -->
            Email: <input type="email" name="email" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" value="Sign up"><br><br>

            <div><h4>Already have an account? <a href="login.php">Click here to login</a><br><br></h4></div>
        </form>
    </div>
</body>
</html>