<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 

</head>
<body bgcolor="FDEBD0" class="m-6 px-6 py-6">
    <div class="container center">
        <p class="display-6"> Welcome to Signup Page!</p>
        <p class="px-6"><h3>Sign up as:</h3></p>
        <div class="container d-flex d-flex-row justify-content-center">
            
            <div class="card d-flex d-col m-4" style="width: 18rem; overflow-x:clip;">
                <img src="./ext.webp" class="card-img-top " alt="External Participant" style="height: 320px; width: 500px;">
                <div class="card-body">
                    <h5>External Participant</h5>
                    <div class="btn btn-outline-primary justify-text-center">
                        <a href="participant_signup.php">Register</a>
                    </div>
                </div>
            </div>
            
            <div class="card d-flex d-col m-4" style="width: 18rem;">
                <img src="./kgp.png" class="card-img-top img-fluid" alt="Host University Student">
                <div class="card-body">
                    <h5>Host University Student</h5>
                    <div class="btn btn-outline-primary center">
                        <a href="student_signup.php">Register</a>
                    </div> 
                </div>
            </div>
        
        </div>
        <div><h4>Already have an account? <a href="login.php">Click here to login</a><br><br></h4></div>

    </div>
</body>
</html>