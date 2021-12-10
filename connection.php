<!-- This code is responsible to create a conection to the database -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "block2-back_end";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}


?>