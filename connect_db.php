<?php # CONNECT TO MySQL DATABASE.

# Connect/Link  on 'localhost' .

$link = mysqli_connect('localhost','root','','CodeSpace'); 
  if (!$link) { 
 
  die('Could not connect to MySQL: ' .mysqli_connect_error()); 
} 
  echo 'Connected to the database successfully!';  
?>