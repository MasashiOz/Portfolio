<?php
    require_once "dbConnect.php";

        if(isset($_POST["O_login"])){
          $OwnerName = $_POST["OwnerName"];
          $OwnerPassword = $_POST["OwnerPassword"];

          $sql = "SELECT * FROM owners WHERE OwnerName = '$OwnerName'";
          $result = mysqli_query($conn, $sql);
                          
          if (mysqli_num_rows($result) > 0){
              $row = mysqli_fetch_assoc($result);
              $Owner = $row['OwnerName'];
              $pwdhashed = $row['OwnerPassword'];

              $checkPwd = password_verify($OwnerPassword, $pwdhashed);

                if ($checkPwd === false){
                  header("location: owner.php?login=fail");
                } else {
                  session_start();
                  $_SESSION["Oid"] = $row['id'];
                  $_SESSION["OwnerName"] = $row['OwnerName'];
                  header("location: PControl.php");
                }
          } else {
            header("location: owner.php?login=fail");
          }
        
          mysqli_close($conn);

        } else {
            header("location: owner.php");
        }
?>