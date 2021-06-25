<?php
  include_once "ownerheader.php"
?>


<div class="O_login container my-4">
  <h3>Are you the owner?</h3>
  <form action="O_login_inc.php" method="POST">
    <input type="text" name="OwnerName" class="form-control my-2" placeholdeer="Owner Full Name" require>
    <input type="password" name="OwnerPassword" class="form-control my-2" placeholder="Owner Password" required>

    <button type="submit" name="O_login" class="btn btn-dark my-2">Login</button>
  </form>
</div>

<div class="O_signup container my-4">
<h3>Make a New owner!!</h3>
  <form action="O_signup_inc.php" method="POST">
    <input type="text" name="OwnerName" class="form-control my-2" placeholdeer="Owner Full Name" require>
    <input type="password" name="OwnerPassword" class="form-control my-2" placeholder="Owner Password" required>

    <button type="submit" name="O_signup" class="btn btn-dark my-2">Create</button>
  </form>
</div>

</body>
</html>