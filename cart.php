<?php
    require_once "dbConnect.php";
    include_once "header.php";

    if(isset($_GET['delete'])){
      $Pid = $_GET['delete'];
      unset($_SESSION["Pro"][$Pid]);
    }

?>

<div class="cart container mt-4 contents">
  <h2 class="my-3">Your cart</h2>
  <form action="info.php" method="GET">
    <?php
      $subtotal = 0;
          
      if(isset($_SESSION["Pro"])){
        $products = $_SESSION["Pro"];
    ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col-3"></th>
          <th scope="col-3"></th>
          <th scope="col-2">Price</th>
          <th scope="col-2">Quantity</th>
          <th scope="col-2">Total</th>
        </tr>
      </thead>
      <tbody>
    <?php
      foreach($products as $Pid => $product){
        $size = $product['size'];
        $quantity = $product['quantity'];        
              
        $sql = "SELECT * FROM products WHERE id=$Pid";
        $result = mysqli_query($conn, $sql);
              
        if (mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
          $category = $row['Category'];
          $productname = $row['ProductName'];
          $price = $row['Price'];
          $img1 = $row['Img1'];
          $stock = $row['Stock'];
                
          $total = $price * $quantity;
          $subtotal = $subtotal + $total;
    ?>

        <tr>
            <td class="col-3">
                <img src='assets/images/<?php echo $row["Img1"];?>' class='w-75' alt='Product Image' style='height: auto;'>
            </td>
            <td class="col-3">
              <p><?php echo $productname; ?></p>
              <p><?php echo $size;?></p>
              <input type="hidden" name="size" value="<?php echo $size;?>">
              <a href="cart.php?delete=<?php echo $Pid;?>">Delete</a>
            </td>
            <td class="col-2">
              <p><?php echo $price; ?></p>  
            </td>
            <td class="col-2">
            <p><?php echo $quantity;?></p>
            <input type="hidden" name="quantity" value="<?php echo $quantity;?>">
            </td>
            <td class="col-2">
              <p>￥<?php echo $total; ?></p>
            </td>
        </tr>

        <?php
              }
            }
        ?>
      </tbody>
    </table>
    <div class="subtotal container text-right">
        <hr>
        <p class="d-inline">Subtotal: </p>
        <p class="d-inline">￥<?php echo $subtotal; ?></p>
        <a href="index.php" class="btn btn-lg btn-outline-dark mx-2">Continue Shopping</a>
        <button class="btn btn-lg btn-dark mx-2" name="buy">Buy Now!!</button>
    </div>    
  </form>
    <?php
      } else{
        echo "There is nothing in the cart.";
      }
    ?>

 
</div>

<?php
    mysqli_close($conn);
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