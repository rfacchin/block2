<!-- That is the last step in the update process. -->
<!-- It will bring the ID from the page "***_update_db.php", and send a update query if id="the result from last page)" --> -->
<?php
include "connection.php";
include 'validation.php';
$id = $_GET['id'];
$result = mysqli_query($connection, "select * from targets where target_id='$id'");
$data = mysqli_fetch_array($result);

if(isset($_POST['update']))
{
  $target_name  = validation_PHP($_POST["target_name"]);
  $target_first_mission  = validation_PHP($_POST["target_first_mission"]);
  $target_type  = validation_PHP($_POST["target_type"]);
  $target_number_missions  = validation_PHP($_POST["target_number_missions"]);
	
  $edit = "UPDATE targets SET name='$target_name', first_mission='$target_first_mission', type='$target_type', no_mission='$target_number_missions' where target_id='$id'";
	
    if ($connection->query($edit) === TRUE) {
        header("location:targets_update_db.php");
      } else {
        echo "Error: " . $edit . "<br>" . $connection->error;
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
    <a href='targets_insert_db.php' type="button" class="btn btn-default btn-success">CREATE A NEW TARGET</a>
    <a href='targets_select_db.php' type="button" class="btn btn-default btn-primary">LIST ALL TARGETS</a>
    <a href='targets_update_db.php' type="button" class="btn btn-lg btn-danger">MANAGE TARGET DETAILS</a>

  </div>
  <br>
  <br>
  <br>

<!-- Form bringing the data from *****update_db_.db populate the form and when clicke it will call the PHP on top of this page and update the dabase entry -->     
  <div class="container">
  <h2 style="text-align:center;">TARGETS INFORMATION</h2>
  <form action="" method="post">
     <div class="form-group">
      <label for="targets_name">Name:</label>
      <input type="text" class="form-control" name="target_name" value="<?php echo $data['name'] ?>" placeholder="Enter the Target Name" required>
    </div>

    <div class="form-group">
      <label for="target_first_mission">First Mission:</label>
      <input type="date" class="form-control" name="target_first_mission" value="<?php echo $data['first_mission'] ?>" placeholder="first mission date" required>
    </div>

    <div class="form-group">
      <label for="target_type">Target Type:</label>
      <input type="text" class="form-control" name="target_type" value="<?php echo $data['type'] ?>" placeholder="Target Type" required>
    </div>

    <div class="form-group">
      <label for="target_number_missions">Number Of Missions:</label>
      <input type="number" class="form-control" name="target_number_missions" value="<?php echo $data['no_mission'] ?>" placeholder="Enter how many mission" required>
    </div>
    <input type="submit" name="update" value="Update" class="btn btn-default"></input>
    <input type="button" value="Go back!" onclick="history.back()" class="btn btn-default"></input>
  </form>
</div>
</body>

</html>