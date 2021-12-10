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
    <a href='targets_select_db.php' type="button" class="btn btn-lg btn-primary">LIST ALL TARGETS</a>
    <a href='targets_update_db.php' type="button" class="btn btn-default btn-danger">MANAGE TARGET DETAILS</a>

  </div>
  <br>
  <br>
  <br>

     <!-- Table creating section -->
    <div class="container mt-3">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>TARGET ID</th>
                    <th>NAME</th>
                    <th>LAUNCH DATE</th>
                    <th>TYPE</th>
                    <th>NUMBER OF MISSIONS</th>
                </tr>
            </thead>
            <tbody>
                      

<!-- It will populate the above table with the batabase content -->
            <?php
    include 'connection.php';

    $sql = "SELECT * FROM targets ";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["target_id"] . "<td>" . $row["name"] . "<td>" . " " . $row["first_mission"]. "<td>" . " " . $row["type"]. "<td>" . " " . $row["no_mission"]."";
      }
    }

    $connection->close();
    ?>
</tbody>
</table>
</body>

</html>
