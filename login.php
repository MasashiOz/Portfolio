<?php
    include_once "header.php";
?>

<div class="signup container mt-4 contents">
  <h2 class="my-3">Log In</h2>

  <!-- Alert when password is incorrect -->
  <?php
    if(isset($_GET['login'])){
        if($_GET['login'] == 'fail'){

  ?>
        <div class="alert alert-danger" role="alert">
            Incorrect Email-Address/password!
        </div>
  <?php
        }
    }
  ?>

  <!-- Alert when password is success -->
  <?php
    if(isset($_GET['signup'])){
        if($_GET['signup'] == 'success'){

  ?>
        <div class="alert alert-success" role="alert">
            SIGNUP SUCCESS!
        </div>
  <?php
        }
    }
  ?>

  <form action="login_inc.php" method="POST">
    <input type="email" name="email" class="form-control my-2" placeholder="Email Address" required>
    <input type="password" name="password" class="form-control my-2" placeholder="Password" required>

    <a href="upDatePWD.php" class="my-2 d-block">Forgot your Password ?</a>

    <button type="submit" name="login" class="btn btn-dark my-2">Log In</button>
  </form>

  <a href="signup.php" class="my-2 d-block">Create your account</a>
  <a href="index.php" class="my-1 d-block">Back to Store</a>

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