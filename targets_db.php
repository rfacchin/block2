<!-- It will verify button name on $post"*******" has been pressed it will populate the relevant variables and using the  included (connection.php) 
it will create a connecting sending a query and IF sucessfull will display a confirmation if not it will show a error. -->
<?php
include 'connection.php';
include 'validation.php';

if (isset($_POST['target'])) {
  $target_name  = validation_PHP($_POST["target_name"]);
  $target_first_mission  = validation_PHP($_POST["target_first_mission"]);
  $target_type  = validation_PHP($_POST["target_type"]);
  $target_number_missions  = validation_PHP($_POST["target_number_missions"]);
  $sql = "INSERT INTO targets (name, first_mission, type, no_mission ) VALUES ('$target_name','$target_first_mission','$target_type', '$target_number_missions')";
  
  if ($connection->query($sql) === TRUE) {
    header("location:targets_insert_sucess_db.php");
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
<h3 style="text-align:center;" ></h3>
  <br>
  <br>
  <ul class="nav nav-tabs">  
    <li><a href="index.html">Home</a></li>
    <li><a href="astronaut_db.php">1 - Astrounaut</a></li>
    <li class="active"><a href="targets_db.php">2 - Targets</a></li>
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
    <a href='targets_insert_db.php' type="button" class="btn btn-lg btn-default btn-success">CREATE A NEW TARGET</a>
    <a href='targets_select_db.php' type="button" class="btn btn-default btn-primary">LIST ALL TARGETS</a>
    <a href='targets_update_db.php' type="button" class="btn btn-default btn-danger">MANAGE TARGET DETAILS</a>

  </div>
  <br>
  <br>
  <br>

<!-- section responsible to create the insert form. It will force the user to fill all the fields and once clicked will run the PHP on top of this page (method post) -->

<div class="container">
  <h2 style="text-align:center;">TARGETS INFORMATION</h2>
  <form action="" method="post">
     <div class="form-group">
      <label for="targets_name">Name:</label>
      <input type="text" class="form-control" name="target_name" placeholder="Enter the Target Name" required>
    </div>

    <div class="form-group">
      <label for="target_first_mission">First Mission:</label>
      <input type="date" class="form-control" name="target_first_mission" placeholder="first mission date" required>
    </div>

    <div class="form-group">
      <label for="target_type">Target Type:</label>
      <input type="text" class="form-control" name="target_type" placeholder="Target Type" required>
    </div>

    <div class="form-group">
      <label for="target_number_missions">Number Of Missions:</label>
      <input type="number" class="form-control" name="target_number_missions" placeholder="Enter how many mission" required>
    </div>


    <input type="submit" name="target" value ="ADD A NEW TARGET" class="btn btn-default"></button>
  </form>
</div>

</body>
</html>


