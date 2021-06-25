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
      $productname = $row['ProductName'];
      $price = $row['Price'];
      $img1 = $row['Img1'];
      $img2 = $row['Img2'];
      $img3 = $row['Img3'];
      $stock = $row['Stock'];
    }
  }

  if(isset($POST["update"])){
    $productname = $_POST['ProductName'];
    $price = $_POST['Price'];
    $img1 = $_POST['Img1'];
    $img2 = $_POST['Img2'];
    $img3 = $_POST['Img3'];
    $stock = $_POST['Stock'];
    $id = $_POST['id'];

    $sql = "UPDATE products SET ProductName='$productname', Price='$price', Price='$price', Img1='$img1', Img2='$img2', Img3='$img3' WHERE id=$id;";

      if (mysqli_query($conn, $sql)){
        echo "Record updated successfully!";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
    $update = false;
  }

?>




<div class="container my-5">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price [￥]</th>
        <th scope="col">Img 1</th>
        <th scope="col">Img 2</th>
        <th scope="col">Img 3</th>
        <th scope="col">Stock</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT * FROM products";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
    ?>
      <tr>
        <th scope="row"><?php echo $row["id"];?></th>
        <td><?php echo $row["ProductName"]; ?></td>
        <td><?php echo $row["Price"]; ?></td>
        <td><?php echo "<img width='150px' src='images/" .$row["Img1"]."'>"; ?></td>
        <td><?php echo "<img width='150px' src='images/" .$row["Img2"]."'>"; ?></td>
        <td><?php echo "<img width='150px' src='images/" .$row["Img3"]."'>"; ?></td>
        <td><?php echo $row["Stock"]; ?></td>
        <td>
          <a href="PControl.php?edit=<?php echo $row["id"]; ?>" class="btn btn-sm btn-info mx-1" role="button" aria-pressed="true">Edit</a>
          <a href="PControl.php?delete=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger mx-1" role="button" aria-pressed="true">Delete</a>
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
      Product Name <input type="text" name="productname" class="form-control" value="<?php echo $productname;?>" required>
      Price <input type="number" name="price" class="form-control" value="<?php echo $price;?>" required>

      Img 1
      <div class="custom-file mb-1">
          <input type="file" class="custom-file-input" name="Img1" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" value="<?php echo $img1;?>">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
      </div>

      Img 2
      <div class="custom-file mb-1">
          <input type="file" class="custom-file-input" name="Img2" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02" value="<?php echo $img2;?>">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
      </div>

      Img 3
      <div class="custom-file mb-1">
          <input type="file" class="custom-file-input" name="Img3" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" value="<?php echo $img3;?>">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
      </div>

      Stock <input type="number" name="stock" class="form-control" value="<?php echo $stock;?>" required>

      <?php
      if($update == true){
      ?>
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