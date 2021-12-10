<!-- That is the last step in the delete process. -->
<!-- It will bring the ID / mission and astronaut from the page "***_update_db.php", and send a delete query if id="the result from last page)" --> -->
<?php
include "connection.php";
include 'validation.php';

$id = $_GET['id'];
$mission = $_GET['mission'];
$astronaut = $_GET['astronaut'];

$delete = "DELETE FROM attends WHERE astronaut_id=$id and mission_id=$mission";
$update_mission_crew_size = "UPDATE mission SET crew_size=crew_size - 1 where mission_id='$mission'";
$update_astronaut_no_mission = "UPDATE astronaut SET no_missions=no_missions - 1 where astronaut_id='$astronaut'";
           

    if ($connection->query($delete) === TRUE) {
      $connection->query($update_mission_crew_size);  
      $connection->query($update_astronaut_no_mission);
     
      header("location:attends_update_db.php");
      } else {
        echo "Error: " . $delete . "<br>" . $connection->error;
      }
    
      $connection->close();
    exit; 
    
?>
