<!-- That is the last step in the update process. -->
<!-- It will bring the ID from the page "***_update_db.php", and send a update query if id="the result from last page)" --> -->
<?php

include "connection.php";
include 'validation.php';

$id = $_GET['id'];

$result = mysqli_query($connection, "SELECT * FROM mission WHERE mission_id='$id'");
$data = mysqli_fetch_array($result);

if(isset($_POST['update']))
{
    $destination = validation_PHP($_POST['mission_destination']);
    $launch_date = validation_PHP($_POST['mission_launch_date']);
    $type = validation_PHP($_POST['mission_type']);
    $crew_size = validation_PHP($_POST['mission_crew_size']);
    $target_id = validation_PHP($_POST['mission_target_id']);
    $edit = "UPDATE mission SET destination='$destination', launch_date='$launch_date', type='$type', crew_size='$crew_size', target_id='$target_id' where mission_id='$id'";
    	
    if ($connection->query($edit) === TRUE) {
       header("location:mission_update_db.php");
      } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
      }
    
      $connection->close();
      exit; 
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
    <a href='mission_insert_db.php' type="button" class="btn btn-default btn-success">CREATE A NEW MISSION</a>
    <a href='mission_select_db.php' type="button" class="btn btn-default btn-primary">LIST ALL THE MISSIONS</a>
    <a href='mission_update_db.php' type="button" class="btn btn-lg btn-danger">MANAGE MISSIONS DETAILS</a>

  </div>
  <br>
  <br>
  <br>
<!-- Form bringing the data from *****update_db_.db populate the form and when clicke it will call the PHP on top of this page and update the dabase entry -->
    <div class="container">
  <h2 style="text-align:center;">MISSIONS INFORMATION</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="mission_destination">Destination:</label>
      <input type="text" class="form-control" name="mission_destination" placeholder="Destination" value="<?php echo $data['destination'] ?>" placeholder="Enter Destination" Required>
      
    </div>
    
    <div class="form-group">
      <label for="mission_launch_date">Launch Date:</label>
      <input type="date" class="form-control" name="mission_launch_date" placeholder="Launch Date" value="<?php echo $data['launch_date'] ?>" placeholder="Enter Launch Date" Required>
    </div>
    
    <div class="form-group">
      <label for="mission_type">Mission Type:</label>
      <input type="text" class="form-control" name="mission_type" placeholder="Mission Type" value="<?php echo $data['type'] ?>" placeholder="Enter Mission Type" Required>
    </div>

    <div class="form-group">
      <label for="mission_crew_size">Crew Size:</label>
      <input type="number" class="form-control" name="mission_crew_size" placeholder="Crew Size" value="<?php echo $data['crew_size'] ?>" placeholder="Enter Crew Size" Required>
    </div>


    <b>Target ID:</b>
    
    <select name="mission_target_id" class="form-control form-control-lg" aria-label=".form-select-lg example">
          <?php
            include 'connection.php';
            $sqlGetTarget = "SELECT * FROM targets";
            $rows = $connection->query($sqlGetTarget);
            $defaultValueId  = $data['target_id'];

            $sqlGetTarget_default = mysqli_query($connection, "SELECT * FROM targets WHERE target_id='$defaultValueId'");
            $data1 = mysqli_fetch_array($sqlGetTarget_default);                         
            $selectedTargetName  = $data1['name'];          

            echo "<option value=$defaultValueId>"."CURRENT SELECTION : ( "."<b>".$defaultValueId ." - ". $selectedTargetName." )"."<b>"."</option>";
            foreach ($rows as $row) {
            $value  = $row['target_id'];
            echo "<option value=$value>".$value ." - ". $row['name']."</option>";
            }
            echo "</select>";
          ?>
      <br>
    <input type="submit" name="update" value="Update" class="btn btn-default"></input>
      <input type="button" value="Go back!" onclick="history.back()" class="btn btn-default"></input>
  </form>
</div>