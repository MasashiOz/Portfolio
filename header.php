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
  <link rel="stylesheet" href="assets/styles/header.css">
  <title>Company</title>
  <script src="https://kit.fontawesome.com/7ae489ddff.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body>

  <nav class="navbar navbar-expand-md navbar1">
    <div class="container">
      <div class="collapse navbar-collapse Search-form mr-auto my-2" id="navbarScroll">
        <form class="d-flex rounded-pill">
          <button type="submit" class="btn btn--search fas">
          <span class="fas fa-search" aria-hidden="true"></span>
          </button>
          <input class="rounded-pill" type="search" placeholder="Search" aria-label="Search">
        </form>
      </div>
    
      <div class="collapse navbar-collapse NotSearch-form" id="navbarScroll">
        <ul class="navbar-nav mb-2 navbar-nav-scroll ml-auto">

          <?php
          if(isset($_SESSION["First_Name"])){
            $user_FirstName = $_SESSION["First_Name"];
            $user_LastName = $_SESSION["Last_Name"];
          
          ?>
          <li class="nav-item">
              <a class="nav-link" href="#"><?php echo "Welcome $user_FirstName " . "$user_LastName" ?></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="logout_inc.php">LOG OUT</a>
          </li>
          <?php
          } else {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">LOG IN</a>
          </li>
          <li class="nav-item separate">
            <span class="nav-link">/</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">SIGN UP</a>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    
      <a class="btn btn--cart fas ml-auto my-2" href="">
        <span class="fas fa-shopping-cart" aria-hidden="true"></span>
        <span>Cart</span>
      </a>
    </div>
  </nav>
  
  <nav class="navbar navbar-expand-md navbar2">
    
    <div class="container">
      <div class="small-device">
        <div class="menu d-inline-flex flex-fill justify-content-start">
          <button class="navbar-toggler my-2" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
            <span>menu</span>
          </button>
        </div>
        <div class="cart d-inline-flex flex-fill justify-content-end">
           <a class="btn btn--cart fas my-2" href="">
            <span class="fas fa-shopping-cart" aria-hidden="true"></span>
            <span>Cart</span>
        </a>
        </div>       
      </div>
      <a class="navbar-brand py-4" href="#">Company</a>
      <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav mt-2 navbar-nav-scroll ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">ITEM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ABOUT</a>
          </li>
        </ul>
      </div>
    </div>
    
  </nav>

<div class="brand container">
  <a class="navbar-brand-2 py-4" href="#">Company</a>
</div>

