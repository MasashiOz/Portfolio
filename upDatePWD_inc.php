<?php
  require_once "dbConnectUser.php"
?>

<?php
  if(isset($_POST["reset"])){
      $email = $_POST["email"];
      $firstname = $_POST["firstname"];
      $New_password = $_POST["New_password"];
      $Confirm_password = $_POST["Confirm_password"];
      $New_pwdHashed = password_hash($New_password, PASSWORD_DEFAULT);

      $sql = "SELECT * FROM users WHERE Email ='$email'";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $firstname_DB = $row['First_Name'];
        $id = $row['id'];

        if($firstname == $firstname_DB){

          if($New_password == $Confirm_password){

              $sql = "UPDATE users SET PWD='$New_pwdHashed' WHERE id=$id";

              if (mysqli_query($conn, $sql)){
                header("location: login.php?resetPWD=success");
              } else {
                header("location: upDatePWD.php?resetPWD=fail");
              }
              mysqli_error($conn);
          } else {
            header("location: upDatePWD.php?PWD=NotMatch");
          }
        } else {
          header("location: upDatePWD.php?firstname=wrong");
        }
      } else {
        header("location: upDatePWD.php?email=NotExist");
      }
  } else {
    header("location: upDatePWD.php");
  }

?>





