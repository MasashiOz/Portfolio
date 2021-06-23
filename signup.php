<?php
    include_once "header.php";
?>

<div class="signup container mt-4 contents">
  <h2 class="my-3">Create your account</h2>
  <form action="signup_inc.php" method="POST">
    <input type="text" name="firstname" class="form-control my-2" placeholder="First Name" required>
    <input type="text" name="lastname" class="form-control my-2" placeholder="Last Name" required>
    <input type="email" name="email" class="form-control my-2" placeholder="Email Address" required>
    <input type="password" name="password" class="form-control my-2" placeholder="Password" required>

    <button type="submit" name="signup" class="btn btn-dark my-2">Create</button>
  </form>

  <a href="index.php" class="my-3">Back to Store</a>

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





