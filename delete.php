<!-- This file is for deleting tasks -->
<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
$email = $_SESSION["email"];
   
require_once "database.php";
    $query = mysqli_prepare($conn, "SELECT * FROM `users` WHERE email = ?");
    mysqli_stmt_bind_param($query, "s", $email);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

//checking number of rows that are stored in the result variable
if(mysqli_num_rows($result) == 1){ //counting number of rows in result
   $user = mysqli_fetch_assoc($result);

}
$uid = $user["id"];

$id = $_GET["id"];
$sql = "DELETE FROM `tasks` WHERE id = $id AND user_id = $uid";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: tasks.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}