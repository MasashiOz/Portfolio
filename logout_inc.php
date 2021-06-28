<?php
session_start();
unset($_SESSION["Uid"]);
unset($_SESSION["First_Name"]);
unset($_SESSION["Last_Name"]);
session_destroy();
header("location: index.php");
?>