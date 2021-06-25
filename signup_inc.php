<?php
  require_once "dbConnect.php"
?>


<?php
// Insert area
  if(isset($_POST["signup"])){
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $pwdHashed = password_hash($password, PASSWORD_DEFAULT);
          
      $sql = "SELECT * FROM users WHERE Email = '$email'";
      $result = mysqli_query($conn, $sql);
                          
      if (mysqli_num_rows($result) > 0){
          header("location: signup.php?Email=exist");
      } else {
          // sql to insert new record
          $sql = "INSERT INTO users (First_Name, Last_Name, Email, PWD) VALUES ('$firstname', '$lastname', '$email', '$pwdHashed')";
                                    
          if (mysqli_query($conn, $sql)) {
              header("location: login.php?signup=success");
          } else {
              header("location: signup.php?signup=fail");
          }             
          mysqli_close($conn);
      }
  } else {
      header("location: signup.php");
  }
?>