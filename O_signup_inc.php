<?php
  require_once "dbConnect.php"
?>


<?php
// Insert area
  if(isset($_POST["O_signup"])){
      $OwnerName = $_POST["OwnerName"];
      $OwnerPassword = $_POST["OwnerPassword"];
      $OwnerpwdHashed = password_hash($OwnerPassword, PASSWORD_DEFAULT);
          
      $sql = "SELECT * FROM owners WHERE OwnerName = '$OwnerName'";
      $result = mysqli_query($conn, $sql);
                          
      if (mysqli_num_rows($result) > 0){
          header("location: O_signup.php?OwnerName=exist");
      } else {
          // sql to insert new record
          $sql = "INSERT INTO owners (OwnerName, OwnerPassword) VALUES ('$OwnerName', '$OwnerpwdHashed')";
                                    
          if (mysqli_query($conn, $sql)) {
              header("location: owner.php?O_signup=success");
          } else {
              header("location: O_signup.php?O_signup=fail");
          }             
          mysqli_close($conn);
      }
  } else {
      header("location: O_signup.php");
  }
?>