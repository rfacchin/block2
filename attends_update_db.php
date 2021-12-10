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
    <a href='attends_insert_db.php' type="button" class="btn btn-default btn-success">CREATE A NEW ATTEND LINK (astronaut / mission crew)</a>
    <a href='attends_select_db.php' type="button" class="btn btn-default btn-primary">LIST ALL THE ATTENDS</a>
    <a href='attends_update_db.php' type="button" class="btn btn-lg btn-danger">MANAGE ATTENDS DETAILS</a>

  </div>
    
    <br>
    <br>
    <br>
<!-- Table creating section -->
<div class="container mt-3">
<h6 style="text-align:center;">THE BELLOW TABLE IS POPULATED BY COLLECTING DATA FROM 3 SEPARATE TABLES (targets, astronaut and mission)</h6>
<h6 style="text-align:center;">when clicking on <b>DELETE</b> it will delete the attend entry (attend table) and UPDATE (decreasing by 1) the number of missions (astrounaut table) and crew size (mission table)</h6>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ASTRONAUT ID</th>
                    <th>ASTRONAUT NAME</th>
                    <th>MISSIONS ID</th>
                    <th>MISSION DESTINATION</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>

            <!-- It will populate the above table with the batabase content --> 
    <?php
    include 'connection.php';

    $sql = "SELECT astronaut_id, mission_id FROM attends ";
    $result = $connection->query($sql);
    

    if ($result->num_rows > 0) {
      while ($attend_array = $result->fetch_assoc()) {

        $defaultAstronautId = $attend_array['astronaut_id'];
        $astronaut_query = "SELECT * FROM astronaut WHERE astronaut_id='$defaultAstronautId' ";
        $astronaut_request = $connection->query($astronaut_query);
        $astronaut_array = $astronaut_request->fetch_assoc();

        $defaultMissionId = $attend_array['mission_id'];
        $mission_query = "SELECT * FROM mission WHERE mission_id='$defaultMissionId' ";
        $mission_request = $connection->query($mission_query);
        $mission_array = $mission_request->fetch_assoc();


        echo "<tr>";
        echo "<td>" . $attend_array["astronaut_id"] . "<td>" . $astronaut_array["name"] . "<td>" . " " . $attend_array["mission_id"]. "<td>" . $mission_array["destination"];?>
        <td><a href="attends_delete_db.php?id=<?php echo $attend_array["astronaut_id"]?>&mission=<?php echo $attend_array["mission_id"]?>&astronaut=<?php echo $attend_array["astronaut_id"]?>" onclick="return confirm('Are you sure?')">Delete</a></td>
        <td><a href="attends_delete_db.php?id=<?php echo $attend_array["astronaut_id"]?>" onclick="return confirm('Are you sure?')">Delete</a></td> -->
        
    <?php

        
        
      }
    }

    $connection->close();
    ?>

</tbody>

</body>
</div>

</html>

