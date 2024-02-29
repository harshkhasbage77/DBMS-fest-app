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
</head>
<body bgcolor="FDEBD0">
    <div><h2>Login</h2></div>
    <div id="box">
        <form method="post">
            Email: <input type="email" name="email"><br><br>
            Password: <input type="password" name="password"><br><br>
            <input type="submit" value="Login"><br><br>
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
</body>
</html>