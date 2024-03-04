<?php
session_start();
    include("connect.php");
    include("functions.php");

    $user_data = check_admin($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
            /* background-image: url("./bg.jpg"); */

            /* Optional: Adjust background properties */
            /* background-repeat: no-repeat; Control image repetition */
            background-size: cover; /* Resize image to cover the entire viewport */
            background-position: center; /* Position image horizontally and vertically */
        }

    </style>
</head>
<body bgcolor="FDEBD0" class="container text-center justify-content-center align-items-center px-3 py-5">
    <h1>Admin</h1>
    <a href="logout.php">Log out</a>
    <div><h2>This is the index page</h2></div> <br>

    Hello, admin.

    <form method="get">

    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="EID">
    <option selected>Select event</option>

    <?php
            $result = get_events_data($con);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <option value='$row[EID]'>" . $row["EName"] . "</option>";
               
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
    </select>

    <select class="form-select form-select-sm" aria-label="Small select example" name="Roll">
    <option selected>Select student</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <?php
    
    ?>
    </select>

    <input type="submit" value="Submit">

    </form>


</body>
</html>