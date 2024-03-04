<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto h4">
            <li class="nav-item active m-2 px-2">
                <a class="nav-link" href="participant_index.php">Home</a>
            </li>
            <li class="nav-item active m-2 px-2">
                <a class="nav-link" href="participant_logistics.php">Logistics</a>
            </li>
        </ul>  
  <div class="mx-auto order-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 align-items-center">
        <ul class="navbar-nav ml-auto h4">
            <li class="nav-item active m-2 px-4 h3">
                <a class="navbar-brand" href="participant_profile.php"><?php echo $user_data['Name'] ?></a>
            </li>
            <li class="nav-item active m-2 px-4">
                <a class="nav-link btn btn-outline-danger" href="logout.php">Logout</a>
            </li>
        </ul>
  </div>
</nav>

</body>
</html>
