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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body bgcolor="FDEBD0">
    <?php include 'participant_navbar.php' ?>
    <h1 class="m-6 px-6">Participant</h1>
    <a href="logout.php" class="px-6 py-2">Log out</a>
    <!-- <div><h2>Accomodation</h2></div> <br>
    <div><h2>Food</h2></div> <br> -->

    Hello, Participant <?php echo $user_data['Name']?> !. Get even logistics here.
    <div class="container mt-3 mb-3">
        <h1>Cultural Fest - Details</h1>
        <hr>
        <h2>Schedule</h2>
        <div class="accordion d-flex flex-row" id="accordionSchedule">

            <!-- Day 1 Schedule -->
            <div class="accordion-item round">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Day 1 - October 26, 2024
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSchedule">
                    <div class="accordion-body">
                        <ul>
                            <li>Opening Ceremony - 10:00 AM</li>
                            <li>Guest Lecture - 11:00 AM</li>
                            <li>Coding Competition - 1:00 PM</li>
                            <li>Campus Tour - 1:00 PM</li>
                            <li>Robowars - 1:00 PM</li>
                            <li>Tech Quiz - 1:00 PM</li>
                            <li>Codenite - 1:00 PM</li>
                            <li>Developers Point - 1:00 PM</li>
                            <li>YouTuber's Roundtable - 1:00 PM</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Day 2 Schedule -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Day 2 - October 27, 2024
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSchedule">
                    <div class="accordion-body">
                        <ul>
                            <li>Dance Competition - 10:00 AM</li>
                            <li>Art Exhibition - 11:30 AM</li>
                            <li>Music Concert - 2:00 PM</li>
                            <li>Drama Performance - 4:00 PM</li>
                            <li>Photography Contest - 6:00 PM</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Day 3 Schedule -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Day 3 - October 28, 2024
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSchedule">
                    <div class="accordion-body">
                        <ul>
                            <li>Poetry Slam - 10:00 AM</li>
                            <li>Fashion Show - 12:00 PM</li>
                            <li>Comedy Night - 2:00 PM</li>
                            <li>Award Ceremony - 4:00 PM</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <h2>Accomodation</h2>
        <p>
            You have been assigned a shared room in the college hostel. The check-in time is 12:00 PM on October 25th and the check-out time is 10:00 AM on October 27th. Please bring your college ID card and a valid photo ID for registration.
        </p>

        <h2>Food</h2>
        <p>
            A meal plan is included with your registration fee. Breakfast, lunch, and dinner will be served in the college cafeteria. Please note that there are vegetarian and non-vegetarian options available.
        </p>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>