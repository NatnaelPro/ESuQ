<?php 
  ob_start();
  include "db.php"; 
  include "functions.php";
  session_start();
  if(isset($_COOKIE['user'])){
    $_SESSION['user-id'] = $_COOKIE['user'];
  }

  if(isset($_SESSION['user-id'])){
    if(!isset($_SESSION['cart'])){
        $query = "SELECT * FROM cart";
        $cart = mysqli_query($connection, $query);
        check_query_success($cart);
        $count = 0;
        while($row = mysqli_fetch_assoc($cart)){
            $_SESSION['cart'][$count] = array('product_id' => $row['product_id'], "product_name" => $row['product_name'], "product_price" => $row['price'], "product_quantity" => $row['quantity'], "total_price" => $row['total_price'], "product_image" => $row['product_image']);
            $count++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/product_details.css">
    <link rel="stylesheet" href="css/admin_signup_style.css">
    <title>Homepage</title>
</head>
<body>
  <div class="upper-header">
    <div class="row">
      <div class="col-md-8 ml-0">
        <i class="fa fa-phone"></i><span>+251923211734</span>
        <i class="fa fa-map-marker"></i><span>Ethiopia, Addis Ababa</span>
        <i class="fa fa-clock-o"></i><span>All week 27/7</span>
      </div>
      <div class="col-md-2 col-sm-6">
        <span class="dropdown">
          <button class="btn px-2 py-1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            English
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="z-index: 6;">
            <a class="dropdown-item" href="#">English</a>
            <a class="dropdown-item" href="#">Amharic</a>
          </div>
        </span>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="social-media-icons  mt-2">
          <i class="fa fa-youtube-play"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-pinterest"></i>
          <i class="fa fa-facebook"></i>
        </div>
      </div>
    </div>
  </div>

  <header class="sticky-top" style="width:100%;">
  <div class="row" style="margin-right: 0;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 py-0 my-0">
      <div class="col-md-2">
        <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo" style="width:100px !important;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="col-md-5">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
      <div class="col-md-5">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <?php
              if(isset($_SESSION['user-id'])){
                //echo "<a href='./profile.php'>Profile</a>";
                $user_id = $_SESSION['user-id'];
                $query = "SELECT * FROM user WHERE id = $user_id";
                $query_result = mysqli_query($connection, $query);
                check_query_success($query_result);
                $row = mysqli_fetch_assoc($query_result);
                
                ?>
                <div class="colFlex">
                  <!-- <span style="color: black; font-size: 17px; ">Hello, <?php //echo $row['first_name'];?></span> -->
                  <div class="dropdown">
                    <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span style="color: black; font-size: 17px; ">Hello, <?php echo $row['first_name'];?></span>
                    </span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="./profile.php">profile</a>
                      <a class="dropdown-item" href="logout.php?logout">logout</a>
                    </div>
                  </div>
             </div>
             <?php
              }else{
              ?>
              <div class="colFlex">
                <a href="login.php">
                <!-- <a href="login.php"><svg class = "searchAreaIcons" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32.854 32.854">
                    <path id="shape" d="M66.427-38A16.433,16.433,0,0,0,50-21.573,16.433,16.433,0,0,0,66.427-5.146,16.433,16.433,0,0,0,82.854-21.573,16.433,16.433,0,0,0,66.427-38Zm0,4.928a4.922,4.922,0,0,1,4.928,4.928,4.922,4.922,0,0,1-4.928,4.928A4.922,4.922,0,0,1,61.5-28.144,4.922,4.922,0,0,1,66.427-33.072Zm0,23.326a11.828,11.828,0,0,1-9.856-5.29c.049-3.269,6.571-5.06,9.856-5.06,3.269,0,9.807,1.791,9.856,5.06A11.828,11.828,0,0,1,66.427-9.745Z" transform="translate(-50 38)"/>
                  </svg> -->
                  <span style="color: black; font-size: 17px;">login</span>
                </a>
             </div>
             <?php } ?>

            </li>
            <li class="nav-item">
              <div class="colFlex">
                <a href="./cart.php">
                    <div id = "cart">
                        <svg searchAreaIcons id="bdcb0c3f6d67999723518ef3c2ad5494" xmlns="http://www.w3.org/2000/svg" width="22" height="25" viewBox="0 0 30.929 31.487">
                            <path id="Path_4" data-name="Path 4" d="M40.723,8.427a1.192,1.192,0,0,0-.988-.524h0l-23.521.054L14.254,2.021A1.2,1.2,0,0,0,13.118,1.2H11.193a1.195,1.195,0,1,0,0,2.389h1.06L14.2,9.5c.006.019.013.035.019.054l2.982,9.054-3.711,6.915a1.194,1.194,0,0,0,1.054,1.758H35.554a1.193,1.193,0,1,0,0-2.386H16.542l2.67-4.977H35.885a1.189,1.189,0,0,0,1.108-.751l3.85-9.622A1.2,1.2,0,0,0,40.723,8.427Zm-5.649,9.1H19.357l-2.364-7.183L37.965,10.3Z" transform="translate(-10 -1.2)" fill="#fcb100"/>
                            <path id="Path_5" data-name="Path 5" d="M198.994,897.9a1.594,1.594,0,1,0,1.594,1.594A1.593,1.593,0,0,0,198.994,897.9Z" transform="translate(-191.486 -869.601)"/>
                            <path id="Path_6" data-name="Path 6" d="M659.594,897.9a1.594,1.594,0,1,0,1.594,1.594A1.593,1.593,0,0,0,659.594,897.9Z" transform="translate(-637.55 -869.601)"/>
                          </svg>
                          <svg id="onCartIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 19.165 21">
                            <g id="Group_2" data-name="Group 2" transform="translate(0 -1.465)">
                              <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="9.583" cy="9.583" rx="9.583" ry="9.583" transform="translate(0 1.764)" fill="#e81d1d"/>
                              <text id="A_transformative_tri" data-name="A transformative tri" transform="translate(5.496 1.465)" fill="#fff" font-size="14" font-family="Heebo-Regular, Heebo" opacity="0.92"><tspan x="0" y="15" id='added_product_num'>
                                
                              </tspan></text>
                            </g>
                          </svg>
                    </div>
                  </a>
              </div>
            </li>
            <li class="nav-item">
              <div class="colFlex">
                <a href="chat.html"><svg class="searchAreaIcons" id="download_397748" xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 34.205 31.507">
                    <path id="Path_990" data-name="Path 990" d="M24.192,70.036c7.707,0,13.682-4.4,13.591-10.935,0-5.783-6.115-10.4-13.825-10.4S10,53.318,10,59.1a10.358,10.358,0,0,0,5.455,9.326c0,.024-.007.038-.007.063,0,1.564-1.3,3.714-1.818,4.6h0a.762.762,0,0,0-.066.311.792.792,0,0,0,.792.792c.066,0,.168-.014.206-.014.01,0,.014,0,.014,0,2.726-.447,6.75-3.515,7.347-4.241a9.477,9.477,0,0,0,1.539.108c.22,0,.454-.01.726-.01Zm-3.141-2.3-1.368,1.138A18.466,18.466,0,0,1,16.8,71.139a8.945,8.945,0,0,0,.688-2.712l.1-1.305-1.162-.593a8.289,8.289,0,0,1-4.29-7.427c0-4.593,5.305-8.269,11.822-8.269S35.647,54.5,35.647,59.1c-.017,5.1-4.869,8.834-11.385,8.834a12.475,12.475,0,0,1-2.017-.112L21.05,67.74ZM44.2,67.733a7.244,7.244,0,0,0-3.955-6.761,9.467,9.467,0,0,1-.527,2.325C35.437,73.753,22.272,72.214,22.2,72.284c2.122,2.59,5.591,4.227,9.944,4.227.237,0,.436,0,.625,0a8.406,8.406,0,0,0,1.333-.087c.517.628,3.414,3.386,5.769,3.773,0,0,0,0,.01,0,.031,0,.122.01.181.01a.683.683,0,0,0,.684-.684.753.753,0,0,0-.056-.269h0a11.709,11.709,0,0,1-1.141-4.349c0-.021-.007-.035-.007-.052,3.187-1.633,4.663-4.01,4.663-7.12Z" transform="translate(-10 -48.7)" fill="#fcb100"/>
                    <path id="Path_991" data-name="Path 991" d="M181.3,297.6a2.3,2.3,0,1,0,.674-1.623,2.323,2.323,0,0,0-.674,1.623Z" transform="translate(-175.321 -286.693)" fill="#fcb100"/>
                    <path id="Path_992" data-name="Path 992" d="M533.9,297.6a2.3,2.3,0,1,0,.674-1.623,2.323,2.323,0,0,0-.674,1.623Z" transform="translate(-515.614 -286.693)" fill="#fcb100"/>
                    <path id="Path_993" data-name="Path 993" d="M358.1,297.6a2.3,2.3,0,1,0,.674-1.623,2.3,2.3,0,0,0-.674,1.623Z" transform="translate(-345.95 -286.693)" fill="#fcb100"/>
                    <path id="Path_994" data-name="Path 994" d="M177.1,297.6a2.3,2.3,0,1,0,.674-1.623,2.323,2.323,0,0,0-.674,1.623Z" transform="translate(-171.268 -286.693)" fill="#fcb100"/>
                  </svg>
                  </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
  </nav>
  <div class="col-md-12 px-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 py-0 my-0" >
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mynavlist">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <div class="active-border"></div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">New Araival</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./product_category.php?category_id=1">Electronics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./product_category.php?category_id=2">Clothes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./product_category.php?category_id=3">Cometics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Deals For You</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Discount</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./vendor_login.php">Vendor</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  </div>
</header>