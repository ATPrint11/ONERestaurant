<?php
    include "procces/connect.php";
    $query = mysqli_query($conn, "SELECT * FROM tbmenulist");
    while ($row = mysqli_fetch_array($query)){
        $result[] = $row;
    }
?>

<div class="col-lg-9 mt-2">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php
    $slide=0;
    $firstSlideButton=true;
    foreach ($result as $dataTombol){
        ($firstSlideButton) ? $active="active" : $active="";
        $firstSlideButton=false;
    ?>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $active ?>" aria-current="true" aria-label="Slide <?php echo $slide+1 ?>"></button>
    <?php 
        $slide ++;
        } 
    ?>
  </div>
  <div class="carousel-inner rounded">
    <?php 
        $firstSlide=true;
        foreach ($result as $data){
            ($firstSlide) ? $active = "active" : $active = "";
            $firstSlide=false;
    ?>
    <div class="carousel-item <?php echo $active ?>">
      <img src="assets/img/<?php echo $data['photo'] ?>" class="img-fluid" style="height:250px; width:1000px; object-fit:cover;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo $data['menu_name'] ?></h5>
        <p><?php echo $data['information'] ?></p>
      </div>
    </div>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <h5 class="card-title">ONE RESTAURANT - CAFE FOOD AND BEVERAGE ORDERING APP</h5>
            <p class="card-text">An easy and practical food and beverage ordering app. Enjoy a variety of your favorite food and beverage menus with a few clicks. Order, pay and track your order easily through the ONE Restaurant app.</p>
            <a href="order" class="btn btn-primary">Create an Order</a>
        </div>
    </div>
</div>