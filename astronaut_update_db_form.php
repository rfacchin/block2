<!-- That is the last step in the update process. -->
<!-- It will bring the ID from the page "***_update_db.php", and send a update query if id="the result from last page)" --> -->
<?php

include "connection.php";
include 'validation.php';

$id = $_GET['id'];

$result = mysqli_query($connection, "select * from astronaut where astronaut_id='$id'");
$data = mysqli_fetch_array($result);

if(isset($_POST['update']))
{
    $full_name = validation_PHP($_POST['astrounaut_name']);
    $number_Mission = validation_PHP($_POST['astronaut_number_mission']);
	$edit = "UPDATE astronaut SET name='$full_name', no_missions='$number_Mission' where astronaut_id='$id'";
	
    if ($connection->query($edit) === TRUE) {
        header("location:astronaut_update_db.php");
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
            <a href='astronaut_insert_db.php' type="button" class="btn btn-default btn-default btn-success">ADD A NEW ASTRONAUT</a>
            <a href='astronaut_select_db.php' type="button" class="btn btn-default btn-primary">LIST ALL THE ASTRONAUTS</a>
            <a href='astronaut_update_db.php' type="button" class="btn btn-lg btn-danger">MANAGE ASTRONAUT DETAILS</a>

    </div>
    
    <br>
    <br>
    <br>
<!-- Form bringing the data from *****update_db_.db populate the form and when clicke it will call the PHP on top of this page and update the dabase entry -->
<div class="container mt-3">
<div class="container">
    <form method="post" action="">
      <div class="form-group">
        <label for="astrounaut_name">Full Name:</label>
        <input type="text" class="form-control" name="astrounaut_name" value="<?php echo $data['name'] ?>" placeholder="Enter Full Name" Required>
      </div>
      <div class="form-group">
        <label for="astronaut_number_mission">Number Of Missions:</label>
        <input type="number" class="form-control" name="astronaut_number_mission" value="<?php echo $data['no_missions'] ?>" placeholder="Enter missions" Required>
      </div>
      <input type="submit" name="update" value="Update" class="btn btn-default"></input>
      <input type="button" value="Go back!" onclick="history.back()" class="btn btn-default"></input>
    </form>
  </div>

</body>
</div>

</html>
















