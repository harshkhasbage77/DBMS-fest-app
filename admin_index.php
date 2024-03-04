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
        /* color:; */
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
    <h1>Admin Panel</h1>
    <a href="logout.php">Log out</a>
    <div><h2>This is the admin panel page.</h2></div> <br>
    <div class="section container">
        <h2>
            Assign Organizer Role to a Student.
    </h2>
        <form method="get">

        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="EID">
        <option selected>Select event</option>

        <?php
                $result = get_events_data($con);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <option value='$row[EID]'>" . $row["EName"] . "</option>";
                    
                }
        ?>
        
        </select>

        <select class="form-select form-select-sm h6" aria-label="Small select example" name="Roll">
        <option selected>Select student</option>
        <?php
                $result = get_students_data($con);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <option value='$row[Roll]'>" . $row["Name"] . "</option>";   
                }
        ?>
        </select>

        <input type="submit" class="btn btn-primary px-4 py-2" value="AssignRole">

        </form>

    </div>


    <!-- <div class="section container">
        <h2>
            Section 2 : Add and Delete Student
        </h2>

        
        <select class="form-select form-select-sm h6" aria-label="Small select example" name="Roll">
        <option selected>Select student to Delete</option>
    
        </select>

        <input type="submit" class="btn btn-primary px-4 py-2" value="Delete">

        </form>


    </div> -->

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET"){
        $EID = $_GET["EID"];
        $Roll = $_GET["Roll"];

        $query = "SELECT * FROM student_participate WHERE Roll='$Roll' AND EID='$EID'";
        $res = mysqli_query($con, $query);
        if($res && mysqli_num_rows($res) > 0) {
            echo "<a class='btn btn-danger btn-sm' href='volunteer_register.php?eid=$row[EID]&roll=$user_data[Roll]'> Participant </a>";
        } else {
            echo "<a class='btn btn-primary btn-sm' href='volunteer_register.php?eid=$row[EID]&roll=$user_data[Roll]'> Participant </a>";
        }

        $query = "SELECT * FROM volunteer WHERE Roll='$Roll' AND EID='$EID'";
        $res = mysqli_query($con, $query);
        if($res && mysqli_num_rows($res) > 0) {
            echo "<a class='btn btn-danger btn-sm' href='volunteer_register.php?eid=$row[EID]&roll=$user_data[Roll]'> Volunteer </a>";
        } else {
            echo "<a class='btn btn-primary btn-sm' href='volunteer_register.php?eid=$row[EID]&roll=$user_data[Roll]'> Volunteer </a>";
        }

        $query = "SELECT * FROM manage NATURAL JOIN role WHERE Roll='$Roll' AND EID='$EID'";
        $res = mysqli_query($con, $query);
        if($res && mysqli_num_rows($res) > 0) {
            $data = mysqli_fetch_assoc($res);
            switch($data["Rname"]) {
                case "Coordinator":
                    echo "<a class='btn btn-danger btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Coordinator </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Head </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Secretary </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Member </a>";
                    break;
                case "Heads":
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Coordinator </a>";
                    echo "<a class='btn btn-danger btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Head </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Secretary </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Member </a>";
                    break;
                case "Secretary":
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Coordinator </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Head </a>";
                    echo "<a class='btn btn-danger btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Secretary </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Member </a>";
                    break;
                case "Members":
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Coordinator </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Head </a>";
                    echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Secretary </a>";
                    echo "<a class='btn btn-danger btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Member </a>";
                    break;
            }
        } else {
            echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Coordinator </a>";
            echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Head </a>";
            echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Secretary </a>";
            echo "<a class='btn btn-primary btn-sm' href='organizer_register.php?eid=$row[EID]&roll=$user_data[Roll]&role=$user_data[RID]'> Member </a>";
        }
    }
?>



</body>
</html>