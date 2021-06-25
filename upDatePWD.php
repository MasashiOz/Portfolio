<?php
    include_once "header.php";
?>

<div class="signup container mt-4 contents">
  <h2 class="my-3">Reset your Password</h2>
  
  <!-- Alert when password is incorrect -->
  <?php
    if(isset($_GET['PWD'])){
        if($_GET['PWD'] == 'NotMatch'){

  ?>
        <div class="alert alert-danger" role="alert">
            New Password & Confirm Password are not match!!
        </div>
  <?php
        }
    }
  ?>

  <!-- Alert when firstname is incorrect -->
  <?php
    if(isset($_GET['firstname'])){
        if($_GET['firstname'] == 'wrong'){

  ?>
        <div class="alert alert-danger" role="alert">
            Email or First Name is wrong!!
        </div>
  <?php
        }
    }
  ?>
  
  <!-- Alert when firstname is incorrect -->
  <?php
    if(isset($_GET['email'])){
        if($_GET['email'] == 'NotExist'){

  ?>
        <div class="alert alert-danger" role="alert">
            Email or First Name is wrong!!
        </div>
  <?php
        }
    }
  ?>

  <form action="upDatePWD_inc.php" method="POST">
    <input type="email" name="email" class="form-control my-2" placeholder="Email Address" required>
    <input type="text" name="firstname" class="form-control my-2" placeholder="First Name" required>
    <input type="password" name="New_password" class="form-control my-2" placeholder="New Password" required>
    <input type="password" name="Confirm_password" class="form-control my-2" placeholder="Confirm Password" required>

    <button type="submit" name="reset" class="btn btn-dark my-2">Reset</button>
  </form>

  <a href="login.php" class="my-3">Back to Log in Page</a>

</div>


<?php
    include_once "footer.php";
?>

<style>
  @media screen and (max-width :767px){
    body{
      display: flex;
      flex-direction: column;
    }
    .contents{
      order: 4;
    }

  }
</style>