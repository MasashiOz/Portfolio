<?php
    require_once "dbConnect.php";

        if(isset($_POST["login"])){
          $email = $_POST["email"];
          $password = $_POST["password"];

          $sql = "SELECT * FROM users WHERE Email = '$email'";
          $result = mysqli_query($conn, $sql);
                          
          if (mysqli_num_rows($result) > 0){
              $row = mysqli_fetch_assoc($result);
              $Email = $row['Email'];
              $pwdhashed = $row['PWD'];

              $checkPwd = password_verify($password, $pwdhashed);

                if ($checkPwd === false){
                  header("location: login.php?login=fail");
                } else {
                  session_start();
                  $_SESSION["Uid"] = $row['id'];
                  $_SESSION["First_Name"] = $row['First_Name'];
                  $_SESSION["Last_Name"] = $row['Last_Name'];
                  header("location: index.php");
                }
          } else {
            header("location: login.php?login=fail");
          }
        
          mysqli_close($conn);

        } else {
            header("location: login.php");
        }
?>