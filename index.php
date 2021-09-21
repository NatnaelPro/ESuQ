<?php 
  include "includes/header.php";
?>

<section id="slider">
  <div id="mycarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
      <li data-target="#mycarousel" data-slide-to="1"></li>
      <li data-target="#mycarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="4000" >
        <div class="overlay-image" style="background-image: url('images/slider-1.jpg');"></div>
        <div class="container">
          <h1 class="display-4">Stay <span style="color:yellow;">home</span> <br> we deliver to you</h1>
          <a href="#" class="btn btn-lg">Buy Now</a>
        </div>
      </div>
      <div class="carousel-item" data-interval="3000">
        <div class="overlay-image" style="background-image: url('images/slide-2.jpeg');"></div>
        <div class="container">
          <h1></h1>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem pariatur doloremque quibusdam adipisci, hic deserunt saepe, ab earum non rerum iste inventore fuga sint mollitia, sapiente veniam blanditiis distinctio modi?</p>
          <a href="#" class="btn btn-lg">Click me</a>
        </div>
      </div>
      <div class="carousel-item" data-interval="2000">
        <div class="overlay-image" style="background-image: url('images/slider-2.jpg');"></div>
        <div class="container">
          <h1>Heading Example</h1>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem pariatur doloremque quibusdam adipisci, hic deserunt saepe, ab earum non rerum iste inventore fuga sint mollitia, sapiente veniam blanditiis distinctio modi?</p>
          <a href="#" class="btn btn-lg btn-primary">Click me</a>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>

<section id="product-may-like">
  <div class="container py-5">
    <div class="clearfix">
      <h1 class="mb-4 float-left">You May Like</h1>
      <nav aria-label="Page navigation example" class="float-right">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <i class="fa fa-angle-left"></i>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <i class="fa fa-angle-right"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="bg-light my-card-contianer pb-4">
          <div class="card my-card-img-container-1 my-card border-0">
            <div class="card-body">
              <img src="images/p1.png" alt="" class="img-fluid product-img" >
            </div>
          </div>
          <h3 class="text-center pl-3">Jebena</h3>
            <div class="mt-3 info pl-3">
              <span class="text1 d-block">Lorem ipsum dolor sit.</span>
            </div>
            <div class="cost mt-3 text-dark">
              <div class="star mt-3 align-items-center pl-3 mb-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
            <h3 class="pl-3">715 ETB</h3>
            <a href="#" class="btn float-right mr-3 mb-3">Show Now</a>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="bg-light my-card-contianer pb-4">
          <div class="card my-card my-card-img-container-2 border-0 pl-5">
            <div class="card-body">
              <img src="images/p2.png" alt="product_image" class="img-fluid product-img">
            </div>
          </div>
          <h3 class="text-center pl-3">Jebena</h3>
            <div class="mt-3 info pl-3">
              <span class="text1 d-block">Lorem ipsum dolor sit.</span>
            </div>
            <div class="cost mt-3 text-dark">
              <div class="star mt-3 align-items-center pl-3 mb-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
            <h3 class="pl-3">715 ETB</h3>
            <a href="#" class="btn float-right mr-3 mb-3">Show Now</a>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="bg-light my-card-contianer pb-4">
          <div class="card my-card my-card-img-container-3 border-0 pl-5">
            <div class="card-body">
              <img src="images/p3.png" alt="" class="img-fluid product-img">
            </div>
          </div>
          <h3 class="text-center pl-3">Jebena</h3>
            <div class="mt-3 info pl-3">
              <span class="text1 d-block">Lorem ipsum dolor sit.</span>
            </div>
            <div class="cost mt-3 text-dark">
              <div class="star mt-3 align-items-center pl-3 mb-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
            <h3 class="pl-3">715 ETB</h3>
            <a href="#" class="btn float-right mr-3 mb-3">Show Now</a>
          </div>
      </div>
    </div>
  </div>
</section>









<section id="product">
  <div class="container py-5">
    <div class="clearfix">
      <h1 class="mb-4 float-left">Electronics</h1>
      <nav class="navbar navbar-expand-lg navbar-light bg-inherit float-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">New Ariavals <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Best Sellers</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="#">Mobile phone</a> -->
              <button class='nav-link' id='mobile_phone' style='background:inherit;border:none;'>Mobile phone</button>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="#">Laptops, Tablets, Computers </a> -->
              <button class='nav-link' id='laptop' style='background:inherit;border:none;'>Laptops, Tablets, Computers</button>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tvs and monitors</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="row" id="electronics">
      
<?php
// $query = "SELECT * FROM product WHERE product_category_id = 1";
// $products = mysqli_query($connection, $query);
// check_query_success($products);
// $count = 0;
//     while($row = mysqli_fetch_assoc($products)){
//       $product_id = $row['product_id'];
//       $product_name = $row['product_name'];
//       $product_category_id = $row['product_category_id'];
//       $product_price = $row['product_price'];
//       $product_description = $row['product_description'];
//       $product_size = $row['product_size'];
//       $product_color = $row['product_color'];
//       $product_quantity = $row['product_quantity'];
//       $product_discount = $row['product_discount'];
//       $product_image1 = $row['product_image1'];
//       $product_rate = $row['product_rate'];
//       $product_weight = $row['product_weight'];
//       $product_warrant_period = $row['product_warrent_period'];
?>





      <!-- <div class="col-lg-3 product">
        <div class="bg-light my-card-contianer pb-4 mb-5">
        <div class="card border-0 bg-light mb-2 py-4">
          <a href="product_details.php?product_id=<?php //echo $product_id;?>"><div class="card-body pt-4" id="test" style="background-image: url('<?php echo './images/'.$product_image1;?>');  background-size: contain; background-repeat: no-repeat; background-position: center; width: 100%; height: 30vh;"></div></a>
        </div>
          <h5 class="pl-3 product_name"><?php //echo $product_name; ?></h5>
            <div class="cost mt-3 text-dark">
              <div class="star mt-3 align-items-center pl-3 mb-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
            <h3 class="pl-3">$<?php //echo $product_price; ?></h3>
            <?php //echo "<a href='cart.php?product_id=$product_id' class='btn btn-outline-success float-right mr-3'>Add To Cart</a>"; ?>
            <div class="hidden-button"></div>
        </div>
      </div> -->
     
    </div>
    <!-- <a href="#" class="float-right mt-4 mr-3 loadmore">See more</a> -->
    <!-- <button class="loadMore float-right  mr-3 border-0" style="background: inherit; font-size: 18px;">See More</button> -->
    <button class="loadMore float-right  mr-3 border-0"  style="background: inherit; font-size: 18px;">See More</button>
  </div>
  </div>
  </div>
</section>



<section id="product">
  <div class="container py-5">
    <div class="clearfix">
      <h1 class="mb-4 float-left">Clothes</h1>
      <nav class="navbar navbar-expand-lg navbar-light bg-inherit float-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">New Ariavals <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Best Sellers</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="#">For Men</a> -->
              <button class='nav-link' id='shoes' style='background:inherit;border:none;'>Mobile phone</button>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">For Women</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">For Kids</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Habesha dress</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="row" id="clothes">








      <?php 
        // $query = "SELECT * FROM product WHERE product_category_id = 2";
        // $products = mysqli_query($connection, $query);
        // check_query_success($products);
        // $count = 0;
        //     while($row = mysqli_fetch_assoc($products)){
        //       $product_id = $row['product_id'];
        //       $product_name = $row['product_name'];
        //       $product_category_id = $row['product_category_id'];
        //       $product_price = $row['product_price'];
        //       $product_description = $row['product_description'];
        //       $product_size = $row['product_size'];
        //       $product_color = $row['product_color'];
        //       $product_quantity = $row['product_quantity'];
        //       $product_discount = $row['product_discount'];
        //       $product_image1 = $row['product_image1'];
        //       $product_rate = $row['product_rate'];
        //       $product_weight = $row['product_weight'];
        //       $product_warrant_period = $row['product_warrent_period'];

      
      ?>






      <!-- <div class="col-lg-3 product-clothes">
        <div class="bg-light my-card-contianer pb-4 mb-5">
        <div class="card border-0 bg-light mb-2 py-4">
          <a href="product_details.php?product_id=<?php //echo $product_id;?>"><div class="card-body pt-4" id="test" style="background-image: url('<?php echo './images/'.$product_image1;?>');  background-size: contain; background-repeat: no-repeat; background-position: center; width: 100%; height: 30vh;"></div></a>
        </div>
          <h5 class="pl-3"><?php //echo $product_name;?></h5>
            <div class="cost mt-3 text-dark">
              <div class="star mt-3 align-items-center pl-3 mb-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div> 
            <h3 class="pl-3">$<?php //echo $product_price?></h3>
            <?php //echo "<a href='cart.php?product_id=$product_id' class='btn btn-outline-success float-right mr-3'>Add To Cart</a>"; ?>
          </div>
      </div> -->


      </div>
      
      <button class="loadMore-clothes float-right mr-3 border-0"  style="background: inherit; font-size: 18px;">See More</button>
    </div>
   
  </div>
</section>



<section id="product">
  <div class="container py-5">
    <div class="clearfix">
      <h1 class="mb-4 float-left">Cosmetics</h1>
      <nav class="navbar navbar-expand-lg navbar-light bg-inherit float-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">New Ariavals <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Best Sellers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Eye Makeup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Fragrance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Bath</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Hair</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="row" id="cosmetics">


    


    <?php 
        // $query = "SELECT * FROM product WHERE product_category_id = 3";
        // $products = mysqli_query($connection, $query);
        // check_query_success($products);
        // $count = 0;
        //     while($row = mysqli_fetch_assoc($products)){
        //       $product_id = $row['product_id'];
        //       $product_name = $row['product_name'];
        //       $product_category_id = $row['product_category_id'];
        //       $product_price = $row['product_price'];
        //       $product_description = $row['product_description'];
        //       $product_size = $row['product_size'];
        //       $product_color = $row['product_color'];
        //       $product_quantity = $row['product_quantity'];
        //       $product_discount = $row['product_discount'];
        //       $product_image1 = $row['product_image1'];
        //       $product_rate = $row['product_rate'];
        //       $product_weight = $row['product_weight'];
        //       $product_warrant_period = $row['product_warrent_period'];

      
      ?>

      <!-- <div class="col-lg-3 product-cosmetics">
        <div class="bg-light my-card-contianer pb-4 mb-5">
        <div class="card border-0 bg-light mb-2 py-4">
          <a href="product_details.php?product_id=<?php //echo $product_id;?>"><div class="card-body pt-4" id="test" style="background-image: url('<?php echo './images/'.$product_image1;?>');  background-size: contain; background-repeat: no-repeat; background-position: center; width: 100%; height: 30vh;"></div></a>
        </div>
          <h5 class="pl-3"><?php //echo $product_name;?></h5>
            <div class="cost mt-3 text-dark">
              <div class="star mt-3 align-items-center pl-3 mb-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
            <h3 class="pl-3">$<?php //echo $product_price?></h3>
            <?php //echo "<a href='cart.php?product_id=$product_id' class='btn btn-outline-success float-right mr-3'>Add To Cart</a>"; ?>
          </div>
      </div> -->
      

    </div>
    <button class="loadMore-cosmetics float-right  mr-3 border-0" style="background: inherit; font-size: 18px;">See More</button>
  </div>
</section>

<?php include "includes/footer.php"; ?>

