<?php
  if(isset($_GET["add"])){
    $productImage = $_GET["productImage"];
    $product = $_GET["product"];
    $price = $_GET["price"];
    $size = $_GET["size"];
    $quantity = $_GET["quantity"];

    $total = $price * $quantity;
  }
?>

<?php
    include_once "header.php";
?>

<div class="cart container mt-4 contents">
  <h2 class="my-3">Your cart</h2>

  <table>
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <hr>
    <tbody>
      <tr>
        <td><?php echo "<img src='https://via.placeholder.com/150?$productImage'>"; ?></td>
        <td>
          <p><?php echo $product; ?></p>
          <p><?php echo $size; ?></p>
          <a href="">Delete</a>
        </td>
        <td>
          <p><?php echo $price; ?></p>  
        </td>
        <td>
          <p><?php echo $quantity; ?></p>        
        </td>
        <td>
          <p><?php echo $total; ?></p>
        </td>
      </tr>
    </tbody>
    <hr>
  </table>
  <span>Subtotal</span>





  
</div>









<?php
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