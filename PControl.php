<?php
  require_once "dbConnect.php";
  include_once "ownerheader.php";

  // Delete area
  if(isset($_GET["delete"])){
    $id = $_GET["delete"];
  
    // sql to delete data
    $sql = "DELETE FROM products WHERE id=$id;";
  
    if (mysqli_query($conn, $sql)){
      echo "Record deleted successfully!";
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
  }

  // default value
  $category = 'Tops';
  $productname = '';
  $price = '';
  $img1 = '';
  $img2 = '';
  $img3 = '';
  $stock = '';
  $update = false;

  if(isset($_GET["edit"])){
    $id = $_GET["edit"];

    $sql = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $update = true;

    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $category = $row['Category'];
      $productname = $row['ProductName'];
      $price = $row['Price'];
      $img1 = $row['Img1'];
      $img2 = $row['Img2'];
      $img3 = $row['Img3'];
      $stock = $row['Stock'];
    }
  }

  if(isset($_POST["update"])){
    $category = $_POST['Category'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $img1_new = $_FILES['Img1']['name'];
    $img1_old = $_POST['Img1-data'];
    $img2_new = $_FILES['Img2']['name'];
    $img2_old = $_POST['Img2-data'];
    $img3_new = $_FILES['Img3']['name'];
    $img3_old = $_POST['Img3-data'];
    $stock = $_POST['stock'];
    $id = $_POST['id'];

    if($img1_new == ""){
      $img1 = $img1_old;
    } else{
      $img1 = $img1_new;
      $img1 = $_FILES['Img1']['name'];
      $target1 = "assets/images/".basename($img1);
      move_uploaded_file($_FILES['Img1']['tmp_name'], $target1);
    }
    
    if($img2_new == ""){
      $img2 = $img2_old;
    } else{
      $img2 = $img2_new;
      $img2 = $_FILES['Img2']['name'];
      $target2 = "assets/images/".basename($img2);
      move_uploaded_file($_FILES['Img2']['tmp_name'], $target2);
    }
    
    if($img3_new == ""){
      $img3 = $img3_old;
    } else{
      $img3 = $img3_new;
      $img3 = $_FILES['Img3']['name'];
      $target3 = "assets/images/".basename($img3);
      move_uploaded_file($_FILES['Img3']['tmp_name'], $target3);
    }

    $sql = "UPDATE products SET Category='$category', ProductName='$productname', Price='$price', Img1='$img1', Img2='$img2', Img3='$img3', Stock='$stock' WHERE id=$id;";

      if (mysqli_query($conn, $sql)){
        echo "Record updated successfully!";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
      $category = 'Tops';
      $productname = '';
      $price = '';
      $img1 = '';
      $img2 = '';
      $img3 = '';
      $stock = '';
      $update = false;
  }



  if(isset($_POST["save"])){
    $category = $_POST['Category'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];

    $img1 = $_FILES['Img1']['name'];
    $target1 = "assets/images/".basename($img1);

    $img2 = $_FILES['Img2']['name'];
    $target2 = "assets/images/".basename($img2);

    $img3 = $_FILES['Img3']['name'];
    $target3 = "assets/images/".basename($img3);

    $stock = $_POST['stock'];
    
    $sql = "SELECT * FROM products WHERE ProductName = '$productname'";
    $result = mysqli_query($conn, $sql);
                    
    if (mysqli_num_rows($result) > 0){
            header("location: PControl.php?ProductName=exist");
    } else {
          // sql to insert new record
          $sql = "INSERT INTO products (Category, ProductName, Price, Img1, Img2, Img3, Stock) VALUES ('$category', '$productname', '$price', '$img1', '$img2', '$img3', '$stock')";
          
          move_uploaded_file($_FILES['Img1']['tmp_name'], $target1);
          move_uploaded_file($_FILES['Img2']['tmp_name'], $target2);
          move_uploaded_file($_FILES['Img3']['tmp_name'], $target3);
          
          if (mysqli_query($conn, $sql)) {
                  header("location: PControl.php?register=success");
          } else {
              header("location: PControl.php?register=fail");
          }             
          mysqli_close($conn);
      }
  }
?>


<div class="container my-5">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Category</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Img 1</th>
        <th scope="col">Img 2</th>
        <th scope="col">Img 3</th>
        <th scope="col">Stock</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT * FROM products ORDER BY Stock";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
    ?>
      <tr>
        <th scope="row"><?php echo $row["id"];?></th>
        <td><?php echo $row["Category"]; ?></td>
        <td><?php echo $row["ProductName"]; ?></td>
        <td><?php echo $row["Price"]; ?></td>
        <td><?php echo "<img width='150px' src='assets/images/" .$row["Img1"]."'>"; ?></td>
        <td><?php echo "<img width='150px' src='assets/images/" .$row["Img2"]."'>"; ?></td>
        <td><?php echo "<img width='150px' src='assets/images/" .$row["Img3"]."'>"; ?></td>
        <td><?php echo $row["Stock"]; ?></td>
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

  <div class="row justify-content-center">

    <form action="" method="POST" enctype="multipart/form-data">
      Category
      <select name="Category" class="form-control" value="<?php echo $category;?>" required>
        <option value="Tops">Tops</option>
        <option value="Shoes">Shoes</option>
        <option value="Accessories">Accessories</option>
      </select>
      Product Name <input type="text" name="productname" class="form-control" value="<?php echo $productname;?>" required>
      Price <input type="number" name="price" class="form-control" value="<?php echo $price;?>" required>

      Img 1
      <div class="custom-file mb-1">
          <input type="file" class="custom-file-input" name="Img1" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
      </div>

      Img 2
      <div class="custom-file mb-1">
          <input type="file" class="custom-file-input" name="Img2" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02">
          <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
      </div>

      Img 3
      <div class="custom-file mb-1">
          <input type="file" class="custom-file-input" name="Img3" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
          <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
      </div>

      Stock <input type="number" name="stock" class="form-control" value="<?php echo $stock;?>" required>

      <?php
      if($update == true){
        ?>
      <input type="hidden" name="Img1-data" value="<?php echo $img1;?>">
      <input type="hidden" name="Img2-data" value="<?php echo $img2;?>">
      <input type="hidden" name="Img3-data" value="<?php echo $img3;?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <button type="submit" name="update" class="btn btn-secondary my-3">UPDATE</button>                           
      <?php
      } else {
      ?>

      <button type="submit" name="save" class="btn btn-primary my-3">SAVE</button>

      <?php
      }
      ?>
    </form>
  </div>
</div>

</body>
</html>