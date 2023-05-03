<!-- This file is for logout feature -->
<?php
session_start();
session_destroy();
header("Location: login.php");
?>