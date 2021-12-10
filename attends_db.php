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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  
<!-- This will format the table (will be found in every part that a table is required)  -->
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
<!-- section responsible to create the insert form. It will force the user to fill all the fields and once clicked will run the PHP on top of this page (method post) -->
<!-- It will also bring the data from 2 separeted table mission / astrounaut. create a dropdown selection  -->
      <div class="container">
        <h2 style="text-align:center;">ATTENDS INFORMATION</h2>
        <div class="form-group">
        
          <form action="attends_insert_sucess_db.php" method="post"><b>Mission List:</b>

                      <select name="attends_mission_name" class="form-control form-control-lg" aria-label=".form-select-lg example">
                        
                          <?php
                            include 'connection.php';

                            $sqlGetMission = "SELECT * FROM mission";
                            $rows = $connection->query($sqlGetMission);
                            echo "<option selected> -- Select a Mission -- </option>";
                            foreach ($rows as $row) {
                            $value  = $row['mission_id'];
                            echo "<option value=$value>".$value ." - ". $row['destination']."</option>";
                            }
                            echo "</select>";
                          ?>


                        <b>Astronaut List:</b>
                        <select name="attends_astronaut_id" class="form-control form-control-lg" aria-label=".form-select-lg example">
                          <?php
                            include 'connection.php';

                            $sqlGetastronaut = "SELECT * FROM astronaut";
                            $rows = $connection->query($sqlGetastronaut);
                            echo "<option selected> -- Select an Astronaut -- </option>";
                            foreach ($rows as $row) {
                            $value  = $row['astronaut_id'];
                            echo "<option value=$value>".$value ." - ". $row['name']."</option>";
                            }
                            echo "</select>";

                          ?>   
                            <br>
                            <div>
                                <button type="submit" name="save_select" class="btn btn-default">ADD NEW ATTEND</button>
                            </div>

          </form>
        </div>
      </div>

</body>
</html>