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
    <title>Logistics</title>
</head>
<body bgcolor="FDEBD0">
    <?php include 'participant_navbar.php' ?>
    <h1>Participant</h1>
    <a href="logout.php">Log out</a>
    <div><h2>Accomodation</h2></div> <br>
    <div><h2>Food</h2></div> <br>

    Hello, <?php echo $user_data['Name']?>.
    <div class="container mt-3 mb-3">
        <h1>[Fest Name] - Details</h1>
        <hr>

        <h2>Schedule</h2>
        <div class="accordion" id="accordionSchedule">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Day 1 - [Date]
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSchedule">
                    <div class="accordion-body">
                        <ul>
                            <li>[Event Name] - [Time]</li>
                            <li>[Event Name] - [Time]</li>
                            <li>[Event Name] - [Time]</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>

        <h2>Accomodation</h2>
        <p>
            [Information about available accommodation options, including rates and booking details.]
        </p>

        <h2>Food</h2>
        <p>
            [Information about available food options, including meal plans and costs.]
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>