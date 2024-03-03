<?php
session_start();

if (isset($_SESSION["user_type"])){
    unset($_SESSION["user_type"]);
}

if (isset($_SESSION["user_id"])){
    unset($_SESSION["user_id"]);
}

header("Location: login.php");
die;
?>