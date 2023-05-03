<!-- This file is for database connectivity -->
<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbNmae = "eked_task_manegment";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbNmae);
if(!$conn){
  die("Something went wrong");
}

?>