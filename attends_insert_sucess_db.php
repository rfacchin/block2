<?php
include 'connection.php';
include 'validation.php';

$attends_mission_id  = $_POST["attends_mission_name"];
$attends_astronaut_id  = $_POST["attends_astronaut_id"];



$sql = "INSERT INTO attends (mission_id, astronaut_id) VALUES ($attends_mission_id,'$attends_astronaut_id')";

if ($connection->query($sql) === TRUE) {
  $update_mission = "UPDATE mission SET crew_size= crew_size +1 WHERE mission_id = $attends_mission_id";
  mysqli_query($connection, $update_mission);
  
  $update_astronaut = "UPDATE astronaut SET no_missions= no_missions +1 WHERE astronaut_id = $attends_astronaut_id";
  mysqli_query($connection, $update_astronaut);
  
} else {
  echo $attends_astronaut_id;
  echo $attends_mission_id;
  // echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
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
    <!-- it is responsible for format the table.
    it will be found in every page that a table is used -->
  <style>
    table {
      border-collapse: collapse;
      color: #588c7e;
      font-family: monospace;
      font-size: 20px;
      text-align: center;
    }

    th {
      text-align: center;
      background-color: #586d8c;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }
  </style>

</head>
<body>
  <!-- responsible for creating the top nav bar -->
<div class="container">
    <h3 style="text-align:center;"></h3>
    <br>
    <br>
    <ul class="nav nav-tabs">
      <li><a href="index.html">Home</a></li>
      <li><a href="astronaut_db.php">1 - Astrounaut</a></li>
      <li><a href="targets_db.php">2 - Targets</a></li>
      <li><a href="mission_db.php">3 - Missions</a></li>
      <li class="active"><a href="attends_db.php">4 - Attends</a></li>
    </ul>
    <br>
    <br>
  </div>
<!-- part responsible to create the buttons group for each selected tab -->
  <div class="container" style="text-align:center;">
    <br>
    <br>
    <h6 style="text-align:center;">click on one of the options bellow</h6>
    <a href='attends_insert_db.php' type="button" class="btn btn-lg btn-default btn-success">CREATE A NEW ATTEND LINK (astronaut / mission crew)</a>
    <a href='attends_select_db.php' type="button" class="btn btn-default btn-primary">LIST ALL THE ATTENDS</a>
    <a href='attends_update_db.php' type="button" class="btn btn-default btn-danger">MANAGE ATTENDS DETAILS</a>

  </div>
  <br>
  <br>
  <br>
<!-- It displays a success message -->
  <div class="container">
  <h2 style="text-align:center;">NEW ATTEND LINK CREATED</h2>
  <h5 style="text-align:center;">Number of Missions incremented (astronaut table)</h5>
  <h5 style="text-align:center;">Crew Size incremented (mission table)</h5>  
  </div>



</body>

</html>