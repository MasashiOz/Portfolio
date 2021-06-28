<?php
    require_once "dbConnect.php";
    include_once "header.php";
?>

<div class="contents">
  <div class="container my-4">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/images/pexels-sebastian-voortman-214574.jpg" class="d-block w-100" alt="nature">
        </div>
        <div class="carousel-item">
          <img src="assets/images/pexels-picjumbocom-196667.jpg" class="d-block w-100" alt="city">
        </div>
        <div class="carousel-item">
          <img src="assets/images/pexels-alena-koval-886521.jpg" class="d-block w-100" alt="green">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="sub-hero container">
    <div class="row">
      <div class="text col-md-6 my-3">
        <h5>A chance to take a step forward</h5>
        <p>The unique colors and patterns will give you the opportunity to take one step forward with conviction and live your life with individuality and confidence.</p>
      </div>
      <div class="image col-md-6">
        <img src="assets/images/handicraft-4388501_1920.jpg" class="d-block w-100" alt="hand-craft">
      </div>
    </div>
  </div>

  <div class="Item container my-3">
    <h5 class="my-3">PRODUCT</h5>
    <div class="row row-cols-2 row-cols-md-4">
      <?php
        $sql = "SELECT * FROM products ORDER BY Price DESC LIMIT 12";
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) > 0){

          while ($row = mysqli_fetch_assoc($result)){
      ?>
            <div class="card border-0 col" style="width: 18rem;">
            <a href="detailProducts.php?pnum=<?php echo $row["id"]; ?>"><?php echo "<img width='150px' src='assets/images/" .$row["Img1"]."' class='card-img-top' alt='Product Image'>"; ?></a>
            <div class="card-body">
              <p class="item-name"><?php echo $row["ProductName"]; ?></p>
              <p class="item-price">￥<?php echo $row["Price"]; ?></p>
              <?php
                if($row["Stock"] == 0){
              ?>
                  <p>Out of stock</p>
              <?php
                }
              ?>
            </div>
          </div>
      <?php
          }
        }
      ?>
    </div>
    
    <a href="">See more products</a>
    
  </div>

  <div class="PickUp container my-3">
    <h5 class="my-3">Pick Up</h5>
    <div class="row row-cols-2 row-cols-md-4">
      <?php
        $sql = "SELECT * FROM products ORDER BY Stock LIMIT 4";
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) > 0){

          while ($row = mysqli_fetch_assoc($result)){
      ?>
            <div class="card border-0 col" style="width: 18rem;">
            <a href="detailProducts.php?pnum=<?php echo $row["id"]; ?>"><?php echo "<img width='150px' src='assets/images/" .$row["Img1"]."' class='card-img-top' alt='Product Image'>"; ?></a>
            <div class="card-body">
              <p class="item-name"><?php echo $row["ProductName"]; ?></p>
              <p class="item-price">￥<?php echo $row["Price"]; ?></p>
              <?php
                if($row["Stock"] == 0){
              ?>
                  <p>Out of stock</p>
              <?php
                }
              ?>
            </div>
          </div>
      <?php
          }
        }
        mysqli_close($conn);
      ?>
    </div>
  </div>

  <div class="Concept-Movie container my-3">
    <h5 class="my-3">Concept Movie</h5>
    <div class="movie-wrap">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/pW3zuPNDh-Q?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>


  <!-- this is a comment -->
</div>


<?php
    include_once "footer.php";
?>


<style>
  .movie-wrap {
      position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
  }

  .movie-wrap iframe {
      position: absolute;
      top: 5%;
      left: 12.5%;
      width: 75%;
      height: 75%;
  }

  @media screen and (max-width :767px){
    body{
      display: flex;
      flex-direction: column;
    }
    .contents{
      order: 4;
    }

    .sub-hero{
      display: flex;
      flex-direction: column;
    }
    .text{
      order: 2;
    }
    .image{
      order: 1;
    }

    .Item td{
      width: 20%;

    }

  }
</style>
