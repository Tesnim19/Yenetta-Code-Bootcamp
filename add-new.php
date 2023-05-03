<!-- This file is for adding new tasks -->
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


if (isset($_POST["submit"])) {
   $task = $_POST['task'];
   $date = $_POST['date'];
   $status = $_POST['status'];

   $uid = $user["id"];

   $sql = "INSERT INTO `tasks` (`id`, `task`, `due_date`, `status`, `user_id`) VALUES (NULL,'$task','$date','$status','$uid' ) " ;

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: tasks.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>TASK MANAGEMENT SYSTEM</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: rgb(152, 185, 203);;">
      TASK MANAGEMENT SYSTEM
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New task</h3>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Task:</label>
                  <input type="text" class="form-control" name="task" placeholder="Do...">
               </div>

               <div class="col">
                  <label class="form-label">Due Date:</label>
                  <input type="date" class="form-control" name="date" placeholder="05/03/23">
               </div>
            </div>

            <div class="form-group mb-3">
               <label>Status:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="status" id="complete" value="complete">
               <label for="complete" class="form-input-label">Complete</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="status" id="incomplete" value="incomplete">
               <label for="incomplete" class="form-input-label">Incomplete</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="tasks.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>