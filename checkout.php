<?php 
  include "includes/header.php";
  $customer_id = $_SESSION['user-id'];
  $query = "SELECT * FROM user WHERE id = $customer_id";
  $query_result = mysqli_query($connection, $query);
  check_query_success($query_result);
  $row = mysqli_fetch_assoc($query_result);
?>
<link rel="stylesheet" href="css/style_checkout.css">
<div class="Mymodal clearfix">
    <div class="modal-product">
      <div class="Myproduct"> 

        <!-- Slideshow container -->
        <div class="product-slideshow">

          <!-- Full-width images with number and caption text -->
          <div class="productSlides fade block">
            <img src="images/laptop3.png" alt="product image" style="width:100%">
          </div>

          <div class="productSlides fade block">
            <img src="images/laptop2.png" style="width:100%">
          </div>

          <div class="productSlides fade">
            <img src="" style="width:100%">
          </div>

          <div class="productSlides fade">
            <img src="" style="width:100%">
          </div>

          <div class="productSlides fade">
            <img src="" style="width:100%">
          </div>

          <br>

          <!-- The dots/circles -->
          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
          </div>

        </div>

        <h1 class="product-name">
          Gucci Tian GG<br>Supreme Backpack
        </h1>
        <p class="product-code-name">
          Style ‎428027 K0LCN 8685
        </p>
        <p class="product-price">
          $1,590
        </p>

      </div>

      <div class="round-shape"></div>
    </div>
    <div class="modal-info">
      <div class="info">
        <h2>Payment Information</h2>
        <form action="#">
          <ul class="form-list">
            <li class="form-list-row">
              <div class="user">
                <label for="#">First name</label><br>
                <i class="fas fa-user"></i></i>
                <input type="text" value="<?php echo $row['first_name']; ?>" required>
              </div>
            </li>
            <li class="form-list-row">
                <div class="user">
                  <label for="#">Last name</label><br>
                  <i class="fas fa-user"></i></i>
                  <input type="text" value="<?php echo $row['last_name']; ?>" required>
                </div>
              </li>
            <li class="form-list-row">
                <div class="user">
                  <label for="#">Email</label><br>
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" width = "17px" data-icon="envelope" class="svg-inline--fa fa-envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 352c-16.53 0-33.06-5.422-47.16-16.41L0 173.2V400C0 426.5 21.49 448 48 448h416c26.51 0 48-21.49 48-48V173.2l-208.8 162.5C289.1 346.6 272.5 352 256 352zM16.29 145.3l212.2 165.1c16.19 12.6 38.87 12.6 55.06 0l212.2-165.1C505.1 137.3 512 125 512 112C512 85.49 490.5 64 464 64h-416C21.49 64 0 85.49 0 112C0 125 6.01 137.3 16.29 145.3z"></path></svg>
                  <input type="text" required value="<?php echo $row['email']; ?>">
                </div>
              </li>
            <li class="form-list-row">
                <div class="user">
                  <label for="#">Address</label><br>
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" width="17px" data-icon="location-dot" class="svg-inline--fa fa-location-dot" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M192 0C85.97 0 0 85.97 0 192c0 77.41 26.97 99.03 172.3 309.7c9.531 13.77 29.91 13.77 39.44 0C357 291 384 269.4 384 192C384 85.97 298 0 192 0zM192 271.1c-44.13 0-80-35.88-80-80S147.9 111.1 192 111.1s80 35.88 80 80S236.1 271.1 192 271.1z"></path></svg><input type="text" required>
                </div>
              </li>
               
            <li class="form-list-row">
              <div class="checkbox">
                <label for="checkbox">
                  <input id="checkbox" type="checkbox">
                  <span>Remember My Information</span>
                </label>
              </div>
            </li>
          </ul>
          <button class="order-btn">Order</button>
        </form>
      </div>
    </div>
  </div>
  <div class="myfooter"></div>
  <script src="js/checkout.js"></script>
  <?php include "includes/footer.php"; ?>