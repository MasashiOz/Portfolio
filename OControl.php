<?php
  require_once "dbConnect.php";
  include_once "ownerheader.php";

  // Delete area
  if(isset($_GET["delete"])){
    $id = $_GET["delete"];
  
    // sql to delete data
    $sql = "DELETE FROM owners WHERE id=$id;";
  
    if (mysqli_query($conn, $sql)){
      echo "Record deleted successfully!";
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
  }

  // default value
  $OwnerName = '';



  if(isset($_POST["O_signup"])){
    $OwnerName = $_POST["OwnerName"];
    $OwnerPassword = $_POST["OwnerPassword"];
    $OwnerpwdHashed = password_hash($OwnerPassword, PASSWORD_DEFAULT);
        
    $sql = "SELECT * FROM owners WHERE OwnerName = '$OwnerName'";
    $result = mysqli_query($conn, $sql);
                        
    if (mysqli_num_rows($result) > 0){
        header("location: OControl.php?OwnerName=exist");
    } else {
        // sql to insert new record
        $sql = "INSERT INTO owners (OwnerName, OwnerPassword) VALUES ('$OwnerName', '$OwnerpwdHashed')";
                                  
        if (mysqli_query($conn, $sql)) {
            header("location: OControl.php?O_signup=success");
        } else {
            header("location: OControl.php?O_signup=fail");
        }             
        mysqli_close($conn);
    }
  }  
?>


<div class="container my-5">
  <div class="row">
    <div class="col justify-content-center">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Owner Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT * FROM owners";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
        ?>
          <tr>
            <th scope="row"><?php echo $row["id"];?></th>
            <td><?php echo $row["OwnerName"]; ?></td>
            <td>
              <a href="PControl.php?edit=<?php echo $row["id"]; ?>" class="d-block btn btn-sm btn-info my-1" role="button" aria-pressed="true">Edit</a>
              <a href="PControl.php?delete=<?php echo $row["id"]; ?>" class="d-block btn btn-sm btn-danger my-1" role="button" aria-pressed="true">Delete</a>
            </td>
          </tr>
        <?php
            }
          } else {
            echo "0 results";
          }
          mysqli_close($conn);
        ?>
        </tbody>
      </table>
    </div>

    <div class="col justify-content-center">
      <form action="OControl.php" method="POST">
        <input type="text" name="OwnerName" class="form-control my-2" placeholdeer="Owner Full Name" require>
        <input type="password" name="OwnerPassword" class="form-control my-2" placeholder="Owner Password" required>

        <button type="submit" name="O_signup" class="btn btn-dark my-2">Create</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>