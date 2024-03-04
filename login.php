<?php
session_start();

    include("connect.php");
    include("functions.php");

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
    <style> 
    *{
        color: white;
    }
    .large-padding{
        padding: 2rem 10rem;
    }
    .blurred-background {
        background-color: rgba(0, 0, 0, 0.5); 
        /* filter: blur(2px);  */
    }
    body {
            /* Set the background image */
            background-image: url("./bg.jpg");

            /* Optional: Adjust background properties */
            /* background-repeat: no-repeat; Control image repetition */
            background-size: cover; /* Resize image to cover the entire viewport */
            background-position: center; /* Position image horizontally and vertically */
        }

    </style>

</head>

<body bgcolor="FDEBD0" class="container text-center justify-content-center align-items-center px-3 py-5">
    <div class="container align-items-center card blurred-background" style="padding: 4rem;"> 
    <div><h2>
        <p class="text-center fs-1 fw-bold"> Login </p> </h2>
    </div>
    <div id="box" class="container text-start h4" style="margin: 2rem 5rem; padding: 2rem 25rem;">
        <form method="post">
                Email: <input type="email" name="email" class="px-3 mx-3 my-1 form-control"><br>
                Password: <input type="password" name="password" class="px-3 mx-3 my-1 form-control"><br>
                <input type="submit" value="                                    Login                                    " class="btn btn-primary btn-lg text-center px-3"><br><br>
        </form>
<?php

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            // read from database
            
            $query = "SELECT * FROM student WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($con, $query);
            if($result) {
                if (mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if ($user_data["password"] === $password){
                        $roll = $user_data["Roll"];

                        $query = "SELECT * FROM manage WHERE Roll = '$roll' LIMIT 1";
                        $result = mysqli_query($con, $query);
                        if($result) {
                            if (mysqli_num_rows($result) > 0){
                                $_SESSION['user_type'] = "organizer";
                                $_SESSION['user_id'] = $user_data['Roll'];
                                header('Location: organizer_index.php');
                                die;
                            }}
                        

                        $_SESSION['user_type'] = "student";
                        $_SESSION['user_id'] = $user_data['Roll'];
                        header('Location: student_index.php');
                        die;
                    }
                }
            }

            $query = "SELECT * FROM participant WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($con, $query);
            if($result) {
                if (mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if ($user_data["password"] === $password){
                        $_SESSION['user_type'] = "participant";
                        $_SESSION['user_id'] = $user_data['PID'];
                        header('Location: participant_index.php');
                        die;
                    }
                }
            }

            $query = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($con, $query);
            if($result) {
                if (mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if ($user_data["password"] === $password){
                        $_SESSION['user_type'] = "admin";
                        $_SESSION['user_id'] = $user_data['ID'];
                        header('Location: admin_index.php');
                        die;
                    }
                }
            }

            echo "Wrong email or password!";
        }else{
            echo "Wrong email or password!";
        }
    }

?>
    </div>
    <div><h4>New user? <a href="signup.php">Sign up</a></h4></div><br><br>
    </div>
    
</body>
</html>