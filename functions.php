<?php
function check_login($con) {
    if(isset($_SESSION["user_id"])) {
        $user = $_SESSION["user_id"];
        $query = "SELECT * FROM users WHERE user_id = '$user' LIMIT 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // redirect to Login
    header("Location: login.php");
    die;
}

function check_participant($con) {
    if(isset($_SESSION["user_type"]) && isset($_SESSION["user_id"]) && $_SESSION["user_type"]==="participant") {
        $PID = $_SESSION["user_id"];
        $query = "SELECT * FROM participant WHERE PID = '$PID' LIMIT 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // redirect to Login
    header("Location: login.php");
    die;
}

function check_student($con) {
    if(isset($_SESSION["user_type"]) && isset($_SESSION["user_id"]) && $_SESSION["user_type"]==="student") {
        $roll = $_SESSION["user_id"];
        $query = "SELECT * FROM student WHERE Roll = '$roll' LIMIT 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // redirect to Login
    header("Location: login.php");
    die;
}

function check_organizer($con) {
    if(isset($_SESSION["user_type"]) && isset($_SESSION["user_id"]) && $_SESSION["user_type"]==="organizer") {
        $roll = $_SESSION["user_id"];
        $query = "SELECT * FROM manage WHERE Roll = '$roll' LIMIT 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            $query = "SELECT * FROM student WHERE Roll = '$roll' LIMIT 1";
            $result = mysqli_query($con, $query);
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // redirect to Login
    header("Location: login.php");
    die;
}

function check_admin($con) {
    if(isset($_SESSION["user_type"]) && isset($_SESSION["user_id"]) && $_SESSION["user_type"]==="admin") {
        $ID = $_SESSION["user_id"];
        $query = "SELECT * FROM admin WHERE ID = '$ID' LIMIT 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // redirect to Login
    header("Location: login.php");
    die;
}

function add_college($con, $college) {
    $query = "SELECT * FROM college WHERE Name = '$college' LIMIT 1";
    $result = mysqli_query($con, $query);
    if (!($result && mysqli_num_rows($result) > 0)) {
        $query = "INSERT INTO college(Name) VALUES('$college')";
        mysqli_query($con, $query);
    }
}

function random_num($length, $con) {
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    $query = "SELECT * FROM users WHERE user_id = '$text' LIMIT 1";
    $result = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result) > 0) {
        return random_num($length, $con);
    }
    return $text;
}

function get_events_data($con) {
    $query = "SELECT * FROM event NATURAL JOIN Etypes";
    $result = mysqli_query($con, $query);
    return $result;
}

?>