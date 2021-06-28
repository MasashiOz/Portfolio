<?php
session_start();
unset($_SESSION["Oid"]);
unset($_SESSION["OwnerName"]);
header("location: owner.php");
?>