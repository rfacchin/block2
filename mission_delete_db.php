<!-- That is the last step in the delete process. -->
<!-- It will bring the ID from the page "***_update_db.php", and send a delete query if id="the result from last page)" --> -->
<?php
include "connection.php";
include 'validation.php';

$id = $_GET['id'];
$delete = "DELETE FROM mission WHERE mission_id=$id";
           

    if ($connection->query($delete) === TRUE) {
        header("location:mission_update_db.php");
      } else {
        echo "Error: " . $delete . "<br>" . $connection->error;
      }
    
      $connection->close();
    exit; 
    
?>
