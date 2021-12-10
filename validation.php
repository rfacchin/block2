<!-- that code is responsible to clean the data before sending the query to change anything on the data base -->
<?php
function validation_PHP($data_validation) {
  $data_validation = trim($data_validation);  
  $data_validation = stripslashes($data_validation);  
  $data_validation = htmlspecialchars($data_validation);
  return $data_validation;
}
?>

