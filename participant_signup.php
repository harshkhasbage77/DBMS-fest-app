<?php
session_start();

    include("connect.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST["name"];
        $college = $_POST["college"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!empty($name) && !empty($college) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            // save to database
            add_college($con, $college);
            // *******
            // Add check for duplicate email.
            // *******
            $query = "INSERT INTO participant (Name, College, email, password) VALUES ('$name', '$college', '$email', '$password')";
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
    <div><h2>Sign up as External Participant</h2></div>

    <div id="box">
        <form method="post">
            Name: <input type="text" name="name" required><br><br>
            College: <input type="text" name="college" required><br><br>
            <!-- Can add a dropdown menu for College -->
            Email: <input type="email" name="email" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" value="Sign up"><br><br>

            <div><h4>Already have an account? <a href="login.php">Click here to login</a><br><br></h4></div>
        </form>
    </div>
</body>
</html>