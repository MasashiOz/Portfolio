<?php
    include_once "header.php";
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div class="detail-Products container mt-4 contents">
  <a href="index.php">HOME</a>
  <span> > </span>
  <span>item name 【color】</span>

  <div class="row row-cols-1 row-cols-md-2">
    <div class="Product-image col">
      <div class="main-img js-main-img">
        <img class="w-75 d-block mx-auto my-3" style="height: auto;" src="https://via.placeholder.com/150?text=Photo+1"/>
      </div>
      <ul class="sub-img js-sub-img" style="list-style-type: none;">
        <div class="row my-1">
          <li class="col-4">
            <img class="w-100" style="height: auto;" src="https://via.placeholder.com/150?text=Photo+1"/>
          </li>
          <li class="col-4">
            <img class="w-100" style="height: auto;" src="https://via.placeholder.com/150?text=Photo+2"/>
          </li>
          <li class="col-4">
            <img class="w-100" style="height: auto;" src="https://via.placeholder.com/150?text=Photo+3"/>
          </li>
        </div>
      </ul>
    </div>

    <div class="Product-form col">
      <h3>item name 【color】</h3>
      <h4>￥1000</h4>

      <form action="" method="GET">
        <input type="hidden" name="productImage" val="text=Photo+1">
        <input type="hidden" name="product" value="item name 【color】">
        <input type="hidden" name="price" value="1000">
        <label for="size">Size</label>
        <select class="form-control" name="size" id="size">
          <option value="XL">XL</option>
          <option value="L">L</option>
          <option value="M">M</option>
          <option value="S">S</option>
        </select>

        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" name="quantity" id="quantity" value=1>

        <button class="btn btn-lg btn-outline-dark my-2 d-block" name="add" formaction="cart.php">Add to cart</button>
        <button class="btn btn-lg btn-dark my-2 d-block" name="buy" formaction="">Buy Now!!</button>

      </form>

      <div class="Product-detail">
        <div class="summary">
          <h6>【Product Summary】</h6>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In labore cum porro explicabo dolor. Quidem quod, corporis ad mollitia minima consequuntur consectetur reiciendis illum voluptatibus autem possimus. Quaerat aspernatur reiciendis explicabo laborum doloribus magni vel at debitis molestiae minus? Odio rerum magnam cum dolores, dolor animi sit nulla possimus accusamus?</p>
        </div>
        <div class="material">
          <h6>【Material】</h6>
          <p>Cotton 100%</p>
        </div>
        <div class="size-description">
          <h6>【Size Description】</h6>
          <p>Size XL: Sleeve length 20.5cm / Shoulder width 52cm / Body width 57cm / Length 77cm</p>
          <p>Size L: Sleeve length 19cm / Shoulder width 51cm / Body width 56cm / Length 72cm</p>
          <p>Size M: Sleeve length 17.5cm / Shoulder width 49cm / Body width 55cm / Length 67cm</p>
          <p>Size S: Sleeve length 16.5cm / Shoulder width 44.5cm / Body width 48.5cm / Length 62cm</p>
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
      <div class="card border-0 col" style="width: 18rem;">
          <a href="detailProducts.php" id="item-1"><img src="https://via.placeholder.com/150" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <p class="item-name" for="item-1">item name 【color】</p>
            <p class="item-price" for="item-1">￥price</p>
          </div>
        </div>
        <div class="card border-0 col" style="width: 18rem;">
          <a href="" id="item-2"><img src="https://via.placeholder.com/150" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <p class="item-name" for="item-2">item name 【color】</p>
            <p class="item-price" for="item-2">￥price</p>
          </div>
        </div>
        <div class="card border-0 col" style="width: 18rem;">
          <a href="" id="item-3"><img src="https://via.placeholder.com/150" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <p class="item-name" for="item-3">item name 【color】</p>
            <p class="item-price" for="item-3">￥price</p>
          </div>
        </div>
        <div class="card border-0 col" style="width: 18rem;">
          <a href="" id="item-4"><img src="https://via.placeholder.com/150" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <p class="item-name" for="item-4">item name 【color】</p>
            <p class="item-price" for="item-4">￥price</p>
          </div>
        </div>
    </div>
  </div>

</div>

<script>
  $(function () {
    $(".js-sub-img img").on("click", function () {
      img = $(this).attr("src");
        $(".js-main-img img").fadeOut(10, function () {
          $(".js-main-img img")
            .attr("src", img)
            .on("load", function () {
              $(this).fadeIn(10);
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