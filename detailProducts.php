<?php
    require_once "dbConnect.php";
    include_once "header.php";
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php
    if(isset($_GET['Apnum'])){
      $Pid = $_GET['Pid'];
      $size = $_GET['size'];
      $quantity = $_GET['quantity'];

      // session_start();

      $_SESSION["Pro"][$Pid]=[
        'size' => $size,
        'quantity' => $quantity
      ];
      // var_dump($_SESSION["Pro"]);

      header("location: cart.php");
    }


    if(isset($_GET['pnum'])){
      $id = $_GET['pnum'];

      $sql = "SELECT * FROM products WHERE id=$id";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $category = $row['Category'];
        $productname = $row['ProductName'];
        $price = $row['Price'];
        $img1 = $row['Img1'];
        $img2 = $row['Img2'];
        $img3 = $row['Img3'];
        $stock = $row['Stock'];


?>

<div class="detail-Products container mt-4 contents">
  <a href="index.php">HOME</a>
  <span> > </span>
  <span><?php echo $row["ProductName"]; ?></span>

  <div class="row row-cols-1 row-cols-md-2">
    <div class="Product-image col">
      <div class="main-img js-main-img">
      <img width='150px' src='assets/images/<?php echo $row["Img1"];?>' class='w-100' alt='Product Image' style='height: auto;'>
      </div>
      <ul class="sub-img js-sub-img" style="list-style-type: none;">
        <div class="row my-1">
          <li class="col-4">
          <img width='150px' src='assets/images/<?php echo $row["Img1"];?>' class='w-100' alt='Product Image1' style='height: auto;'>
          </li>
          <li class="col-4">
          <img width='150px' src='assets/images/<?php echo $row["Img2"];?>' class='w-100' alt='Product Image2' style='height: auto;'>
          </li>
          <?php
            if($row["Img3"] != ""){
          ?>
          <li class="col-4">
          <img width='150px' src='assets/images/<?php echo $row["Img3"];?>' class='w-100' alt='Product Image3' style='height: auto;'>
          </li>
          <?php
            }
          ?>
        </div>
      </ul>
    </div>

    <div class="Product-form col">
      <h3><?php echo $row["ProductName"]; ?></h3>
      <h4>￥<?php echo $row["Price"]; ?></h4>

      <form action="" method="GET">
        <?php
          if($category == "Tops"){
        ?>    
            <label for="size">Size</label>
            <select class="form-control" name="size" id="size">
              <option value="XL">XL</option>
              <option value="L">L</option>
              <option value="M">M</option>
              <option value="S">S</option>
            </select>
        <?php
          } else if($category == "Shoes"){
        ?>
            <label for="size">Size</label>
            <select class="form-control" name="size" id="size">
              <option value="28.0 cm">28.0 cm</option>
              <option value="27.0 cm">27.0 cm</option>
              <option value="26.0 cm">26.0 cm</option>
              <option value="25.0 cm">25.0 cm</option>
            </select>
        <?php
          } else {
        ?>
            <input type="hidden" name="size" value="">
        <?php   
          }
        ?>

        <label for="quantity">Quantity</label>
        <select class="form-control" name="quantity" id="quantity">
        <?php
          for ($count = 1; $count <= $stock; $count++){
        ?>
          <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
        <?php
          }
        ?>
        </select>
        <?php
          if($stock == 0){
        ?>
            <p>Out of stock</p>
        <?php
          } else{
        ?>
        <input type="hidden" name="Pid" value="<?php echo $row["id"]; ?>">
        <button class="btn btn-lg btn-outline-dark my-2 d-block" name="Apnum" formaction="detailProducts.php">Add to cart</button>
        <button class="btn btn-lg btn-dark my-2 d-block" name="buy" formaction="">Buy Now!!</button>
        <?php
          }
        ?>
      </form>

      <div class="Product-detail">
        <div class="summary">
          <h6>【Product Summary】</h6>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In labore cum porro explicabo dolor. Quidem quod, corporis ad mollitia minima consequuntur consectetur reiciendis illum voluptatibus autem possimus. Quaerat aspernatur reiciendis explicabo laborum doloribus magni vel at debitis molestiae minus? Odio rerum magnam cum dolores, dolor animi sit nulla possimus accusamus?</p>
        </div>
        <div class="material">
          <h6>【Material】</h6>
          <p>Lorem ipsum dolor sit.</p>
        </div>
        <div class="detail">
          <h6>【Product Detail】</h6>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, dignissimos?</p>
          <br>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quia itaque eligendi, nesciunt rerum harum! Ea vero labore architecto obcaecati recusandae eum! Omnis voluptatem culpa aperiam iure excepturi illum fugiat nostrum recusandae ea id cumque possimus itaque blanditiis doloremque perferendis voluptate quisquam, adipisci quasi ipsam officia alias expedita, distinctio iusto.</p>
        </div>
      </div>

      <h6>Share this product</h6>
      <a class="twitter-share-button" href="https://twitter.com/intent/tweet"><span class="fab fa-twitter-square"></span></a>
      <a class="facebook-share-button" href="https://twitter.com/intent/tweet"><span class="fab fa-facebook-square"></span></a>
    </div>
  </div>

  <div class="recommend">
    <h5 class="my-3">Recommended for you</h5>
    <div class="row row-cols-2 row-cols-md-4">
      <?php
        $sql = "SELECT * FROM products WHERE Category='$category' ORDER BY rand() LIMIT 4";
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) > 0){

          while ($row = mysqli_fetch_assoc($result)){
      ?>
            <div class="card border-0 col" style="width: 18rem;">
            <a href="detailProducts.php?pnum=<?php echo $row["id"]; ?>"><?php echo "<img width='150px' src='assets/images/" .$row["Img1"]."' class='card-img-top' alt='Product Image'>"; ?></a>
            <div class="card-body">
              <p class="item-name"><?php echo $row["ProductName"]; ?></p>
              <p class="item-price"><?php echo $row["Price"]; ?></p>
            </div>
          </div>
    <?php
          }
        }
      }
    }
    mysqli_close($conn);
    ?>
    </div>
  </div>

</div>


<script>
  $(function () {
    $(".js-sub-img img").on("click", function () {
      img = $(this).attr("src");
        $(".js-main-img img").fadeOut(20, function () {
          $(".js-main-img img")
            .attr("src", img)
            .on("load", function () {
              $(this).fadeIn(20);
            });
        });
    });
  });
</script>

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