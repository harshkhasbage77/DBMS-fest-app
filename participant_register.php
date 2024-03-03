<?php
session_start();
include("connect.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    if (!isset($_GET["pid"]) || !isset($_GET["eid"])){
        echo "2";
        header('Location: participant_index.php');
        exit;
    }
    $pid = $_GET["pid"];
    $eid = $_GET["eid"];
    $query = "INSERT INTO participate(PID, EID) VALUES('$pid', '$eid')";
    mysqli_query($con, $query);

    header('Location: participant_index.php');
    exit;
}
?>
