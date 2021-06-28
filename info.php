<?php
    require_once "dbConnect.php";
    include_once "header.php";
?>

<div class="information container mt-4 contents">
  <div class="row row-cols-1 row-cols-md-2">
    <div class="col-7">
    </div>
    <div class="col-5 bg-secondary">
    </div>
  </div>

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