<?php
session_start();

include("connect.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    if (!isset($_GET["roll"]) || !isset($_GET["eid"])){
        header('Location: student_index.php');
        exit;
    }
    $roll = $_GET["roll"];
    $eid = $_GET["eid"];
    $query = "DELETE FROM student_participate WHERE Roll='$roll' AND EID='$eid'";
    mysqli_query($con, $query);
    header('Location: student_index.php');
    exit;
}
?>
