<!-- THIS FOLLOW CODE WILL BE FOUND IN EVERY SINGLE PART OF THE WEBSITE. -->
<!-- resposible to create the front end part of the project -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SPACE PROJECT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- responsible for creating the top nav bar -->
<div class="container">
  <h3 style="text-align:center;" ></h3>
  <br>
  <br>
  <ul class="nav nav-tabs">  
    <li><a href="index.html">Home</a></li>
    <li><a href="astronaut_db.php">1 - Astrounaut</a></li>
    <li><a href="targets_db.php">2 - Targets</a></li>
    <li class="active"><a href="mission_db.php">3 - Missions</a></li>
    <li><a href="attends_db.php">4 - Attends</a></li>    
</ul>
  <br>
  <br>
</div>
<!-- part responsible to create the buttons group for each selected tab -->
<div class="container" style="text-align:center;">
    <br>
    <br>
    <h6 style="text-align:center;">click on one of the options bellow</h6>
    <a href='mission_insert_db.php' type="button" class="btn btn-lg btn-default btn-success">CREATE A NEW MISSION</a>
    <a href='mission_select_db.php' type="button" class="btn btn-default btn-primary">LIST ALL THE MISSIONS</a>
    <a href='mission_update_db.php' type="button" class="btn btn-default btn-danger">MANAGE MISSIONS DETAILS</a>

  </div>
  <br>
  <br>
  <br>
<!-- It displays a success message -->
  <div class="container">
  <h2 style="text-align:center;">NEW MISSION CREATED</h2>
  </div>

</body>



