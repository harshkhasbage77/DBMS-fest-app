<?php
session_start();
    include("connect.php");
    include("functions.php");

    $user_data = check_participant($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>

<body bgcolor="FDEBD0" >
    <?php include 'participant_navbar.php' ?>
    <div class="px-5">
        <br>
        <p class="display-6 justify-text-center">Events</p>
    </div> <br>

    <table class="table m-4"> 
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Type</th>
                <th>Date</th>
                <th>Register</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = get_events_data($con);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>" . $row["EName"] . "</td>
                <td>" . $row["EType"] . "</td>
                <td>" . $row["Date"] . "</td>";
                $query = "SELECT * FROM participate WHERE PID='$user_data[PID]' AND EID='$row[EID]'";
                $res = mysqli_query($con, $query);
                
                if($res && mysqli_num_rows($res) > 0) {
                    echo "<td> <a class='btn btn-danger btn-sm' href='participant_deregister.php?eid=$row[EID]&pid=$user_data[PID]'> Registered </a> </td>";
                } else {
                    echo "<td> <a class='btn btn-primary btn-sm' href='participant_register.php?eid=$row[EID]&pid=$user_data[PID]'> Register </a>  </td>";
                }
                echo "</tr>";
            }

?>
</tbody>
    </table>


</body>

</html>
