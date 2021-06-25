<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Company Owner site</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Company</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">

      <?php
      if(isset($_SESSION["OwnerName"])){
        $owner_Name = $_SESSION["OwnerName"];
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="#">Owners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo "Welcome $owner_Name "?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="O_logout_inc.php">LOG OUT</a>
        </li>
      <?php
      } else {
      ?>
        <li class="nav-item active">
          <a class="nav-link disabled" href="#">Owners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Products</a>
        </li>
      <?php
      }
      ?>      
      
      </ul>
    </div>
  </nav>
