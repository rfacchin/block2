<!-- It will verify button name on $post"*******" has been pressed it will populate the relevant variables and using the  included (connection.php) 
it will create a connecting sending a query and IF sucessfull will display a confirmation if not it will show a error. -->
<?php
include 'connection.php';
include 'validation.php';

if (isset($_POST['mission'])) {
  $mission_destination  = validation_PHP($_POST["mission_destination"]);
  $mission_launch_date  = validation_PHP($_POST["mission_launch_date"]);
  $mission_type  = validation_PHP($_POST["mission_type"]);
  $mission_crew_size  = validation_PHP($_POST["mission_crew_size"]);
  $mission_target_id  = validation_PHP($_POST["mission_target_id"]);
  $sql = "INSERT INTO mission (destination, launch_date, type, crew_size, target_id ) VALUES ('$mission_destination','$mission_launch_date', '$mission_type', '$mission_crew_size', '$mission_target_id')";

  if ($connection->query($sql) === TRUE) {
    header("location:mission_insert_sucess_db.php");
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
    <li><a href="targets_db.php">2 - Targets</a></li>
    <li class="active"><a href="mission_db.php">3 - Missions</a></li>
    <li><a href="attends_db.php">4 - Attends</a></li>    
</ul>
  <br>
  <br>
</div>

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



<!-- part responsible to create the buttons group for each selected tab -->

<div class="container">
  <h2 style="text-align:center;">MISSIONS INFORMATION</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="mission_destination">Destination:</label>
      <input type="text" class="form-control" name="mission_destination" placeholder="Destination" required>
    </div>
    
    <div class="form-group">
      <label for="mission_launch_date">Launch Date:</label>
      <input type="date" class="form-control" name="mission_launch_date" placeholder="Launch Date" required>
    </div>
    
    <div class="form-group">
      <label for="mission_type">Mission Type:</label>
      <input type="text" class="form-control" name="mission_type" placeholder="Mission Type" required>
    </div>

    <div class="form-group">
      <label for="mission_crew_size">Crew Size:</label>
      <input type="number" class="form-control" name="mission_crew_size" placeholder="Crew Size" required>
    </div>




    <b>Target List:</b>
      <select name="mission_target_id" required class="form-control form-control-lg" aria-label=".form-select-lg example">
          <?php
            include 'connection.php';
            $sqlGetTarget = "SELECT * FROM targets";
            $rows = $connection->query($sqlGetTarget);
            echo "<option selected> -- Select your Target -- </option>";
            foreach ($rows as $row) {
            $value  = $row['target_id'];
            echo "<option value=$value>".$value ." - ". $row['name']."</option>";
            }
            echo "</select>";
          ?>
    
      <br>
    <button name="mission" class="btn btn-default">ADD A NEW MISSION</button>
  </form>
</div>

</body>



