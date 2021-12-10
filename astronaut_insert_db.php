<!-- It will verify button name on $post"*******" has been pressed it will populate the relevant variables and using the  included (connection.php) 
it will create a connecting sending a query and IF sucessfull will display a confirmation if not it will show a error. -->
<?php
include 'connection.php';
include 'validation.php';

if (isset($_POST['astronaut'])) {
  $astrounaut_name  = validation_PHP($_POST["astrounaut_name"]);
  $astronaut_number_mission  = validation_PHP($_POST["astronaut_number_mission"]);
  $sql = "INSERT INTO astronaut (name, no_missions) VALUES ('$astrounaut_name','$astronaut_number_mission')";
  if ($connection->query($sql) === TRUE) {
    header("location:astronaut_insert_sucess_db.php");  
  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
  $connection->close();
}

?>

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
    <h3 style="text-align:center;"></h3>
    <br>
    <br>
    <ul class="nav nav-tabs">
      <li><a href="index.html">Home</a></li>
      <li class="active"><a href="astronaut_db.php">1 - Astrounaut</a></li>
      <li><a href="targets_db.php">2 - Targets</a></li>
      <li><a href="mission_db.php">3 - Missions</a></li>
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
    <a href='astronaut_insert_db.php' type="button" class="btn btn-lg btn-default btn-success">INSERT A NEW ASTRONAUT</a>
    <a href='astronaut_select_db.php' type="button" class="btn btn-default btn-primary">LIST ALL THE ASTRONAUTS</a>
    <a href='astronaut_update_db.php' type="button" class="btn btn-default btn-danger">MANAGE ASTRONAUT DETAILS</a>

  </div>
  <br>
  <br>
  <br>

<!-- section responsible to create the insert form. It will force the user to fill all the fields and once clicked will run the PHP on top of this page (method post) -->
  <div class="container">
  <h2 style="text-align:center;">ASTRONAUTS INFORMATION</h2>
    <form method="post" action="">
      <div class="form-group">
        <label for="astrounaut_name">Full Name:</label>
        <input type="text" class="form-control" name="astrounaut_name" placeholder="Enter Astronaut Full Name" Required>
      </div>
      <div class="form-group">
        <label for="astronaut_number_mission">Number Of Missions:</label>
        <input type="number" class="form-control" name="astronaut_number_mission" placeholder="Enter how many mission" Required>
      </div>
      <input type="submit" name="astronaut" value="ADD A NEW ASTRONAUT" class="btn btn-default"></input>
    </form>
  </div>

</body>

</html>