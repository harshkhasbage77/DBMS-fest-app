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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
        <style>
            *{
                color: white;
            }
            form{
                /* max-width: 40%; */

            }
            .blurred-background {
                background-color: rgba(0, 0, 0, 0.5); 
                /* filter: blur(2px);  */
            }
            body{
                background-image: url("./bg2.jpg");
                background-size: cover; /* Resize image to cover the entire viewport */
                background-position: center; /* Position image horizontally and vertically */
            }
        </style>    
</head>
<body bgcolor="FDEBD0" class="container text-center justify-content-center align-items-center px-3 py-5">
    <div class="btn btn-danger text-start m-3 " ><h5><a href="signup.php" class="text-decoration-none px-3 py-2" style="color: white;">Back</a></h5></div> 
    <br>
    <div class="blurred-background round-4 py-4">

        <div class="bold"><h2>Sign up as External Participant</h2></div>
    
        <div id="box" class="h5 text-start d-flex">
            <form method="post" class="center" style="padding:5% 30%;">
                Name: <input type="text" name="name" required class="form-control"><br><br>
                College: <input type="text" name="college" required class="form-control"><br><br>
                <!-- Can add a dropdown menu for College -->
                Email: <input type="email" name="email" required class="form-control"><br><br>
                Password: <input type="password" name="password" required class="form-control"><br><br>
                <input type="submit" value="Sign up" class="btn btn-primary"><br><br>
    
                <div><h4>Already have an account? <a href="login.php">Click here to login</a><br><br></h4></div>
            </form>
        </div>

    </div>
</body>
</html>