<?php
session_start();

include("connect.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    if (!isset($_GET["pid"]) || !isset($_GET["eid"])){
        header('Location: participant_index.php');
        exit;
    }
    $pid = $_GET["pid"];
    $eid = $_GET["eid"];
    $query = "DELETE FROM participate WHERE PID='$pid' AND EID='$eid'";
    mysqli_query($con, $query);
    header('Location: participant_index.php');
    exit;
}
?>
