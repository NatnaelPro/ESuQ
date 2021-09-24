<?php 
  include "includes/header.php";
  $product_id = '';
  $customer_id = '';
  $sub_cat_id = '';
  if(isset($_SESSION['user-id'])){
    $customer_id = $_SESSION['user-id'];
  }
  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $query = "SELECT * FROM product WHERE product_id = $product_id";
    $query_result = mysqli_query($connection, $query);
    check_query_success($query_result);
    $row = mysqli_fetch_assoc($query_result);
    $sub_cat_id = $row['sub_category_id'];
  }
?>
    <div class="container">
        <div class="row pb-5 mb-5" style="border-bottom: 1px solid rgb(233, 230, 230);">
            <div class="col-md-4">
              <div class="my-5 py-3 " style="background-color: #F3F4F6">
                <div id="main-image" style="width: 100%; height: 50vh; background-image: url('./images/<?php echo $row['product_image1']; ?>'); background-size: contain; background-repeat: no-repeat; background-position: center">

                </div>
              </div>
                
                <div class="img-container">
                  <div class="py-2"style="background-color: #F3F4F6">
                    <div id="image2" class="img" style="background-image: url('./images/<?php echo $row['product_image2']; ?>'); background-size: contain; background-repeat: no-repeat; background-position: center"></div>
                  </div>
                  <div class="py-2"style="background-color: #F3F4F6">
                    <div id="image3" class="img" style="background-image: url('./images/<?php echo $row['product_image3']; ?>'); background-size: contain; background-repeat: no-repeat; background-position: center"></div>
                  </div>
                  <div class="py-2"style="background-color: #F3F4F6">
                    <div id="image4" class="img" style="background-image: url('./images/<?php echo $row['product_image4']; ?>'); background-size: contain; background-repeat: no-repeat; background-position: center"></div>
                  </div>
                </div>
                <script>
                  document.getElementById('image2').addEventListener('click', function(){
                    document.getElementById('main-image').style.backgroundImage = "url('./images/<?php echo $row['product_image2']; ?>')";
                  });
                  document.getElementById('image3').addEventListener('click', function(){
                    document.getElementById('main-image').style.backgroundImage = "url('./images/<?php echo $row['product_image3']; ?>')";
                  });
                  document.getElementById('image4').addEventListener('click', function(){
                    document.getElementById('main-image').style.backgroundImage = "url('./images/<?php echo $row['product_image4']; ?>')";
                  });
                  
                </script>
            </div>
            <div class="col-md-8 pt-5 pl-5">
                <h1 class="mb-3"><?php echo $row['product_name'];?></h1>
                <span class="rate rate-stars3">
                    <i class="fa fa-star main-rating3"></i>
                    <i class="fa fa-star main-rating3"></i>
                    <i class="fa fa-star main-rating3"></i>
                    <i class="fa fa-star main-rating3"></i>
                    <i class="fa fa-star main-rating3"></i>
                </span>
                <span> <span class="average_rating">0</span> Review</span>
                <h2 class="my-3">$<?php echo $row['product_price'];?></h2>
                <p class="mb-5"><?php echo $row['product_description']; ?></p>
                <button class="btn btn-detial-product" id='t'>Add To Cart</button>
                <input type="number" class="ml-3 quantity-product_details" value="1" min="1" max="<?php echo $row['product_quantity'];?>"> 
            </div>
        </div>

        <h3 class="mt-4 mb-4">Technical Specification</h3>
        <div id="product_specifications">
            <table class="table table-border mb-5">
              <?php 
                $product_id = $row['product_id'];
                $query = "SELECT * FROM product_spec WHERE product_id = $product_id";
                $query_result = mysqli_query($connection, $query);
                check_query_success($query_result);

                while($row = mysqli_fetch_assoc($query_result)){
                    $product_spec_id = $row['id'];
                    $product_spec_title = $row['product_spec_title'];
                    $product_spec_value = $row['product_spec_value'];
              ?>
                <tr>
                    <th><?php echo $product_spec_title;?> : </th>
                    <td><?php echo $product_spec_value;?> </td>
                </tr>

                <?php 
                  }
                ?>
            </table>
        </div>
        <div class="mb-5" style="border-bottom: 1px solid rgb(233, 230, 230);">
        <h3>Customer reviews</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="my-3">
                    <span class="rate rate-stars1">
                        <i class="fa fa-star main-rating rating"></i>
                        <i class="fa fa-star main-rating rating"></i>
                        <i class="fa fa-star main-rating rating"></i>
                        <i class="fa fa-star main-rating rating"></i>
                        <i class="fa fa-star main-rating rating"></i>
                    </span>
                    <span  class="pl-3" style="font-size: 20px;"> <span class="average_rating">0</span>  out of 5</span>
                    <p class="mt-2"style="font-size: 19px; color:rgb(146, 143, 143)"> <span id="total_review"> 0 </span> ratings</p>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p class="start-and-percent">5 strar</p>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="progress">
                            <div class="progress-bar" id="five_star_review_progress_bar" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="start-and-percent"><span id="five_star_review">0</span>%</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <p class="start-and-percent">4 strar</p>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="progress">
                            <div class="progress-bar" id="four_star_review_progress_bar" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="start-and-percent"><span id="four_star_review">0</span>%</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <p class="start-and-percent">3 strar</p>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="progress">
                            <div class="progress-bar" id="three_star_review_progress_bar" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="start-and-percent"><span id="three_star_review">0</span>%</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <p class="start-and-percent">2 strar</p>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="progress">
                            <div class="progress-bar" id="two_star_review_progress_bar" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="start-and-percent"><span id="two_star_review">0</span>%</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <p class="start-and-percent">1 strar</p>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="progress">
                            <div class="progress-bar" id="one_star_review_progress_bar" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="start-and-percent"> <span id="one_star_review">0</span>%</p>
                    </div>
                </div>


                <div class="advertisment mt-5" id="advertisment" style="background-image: url('images/advertisment.jpg'); background-size: cover; background-position: center; display:none">

                </div>
            </div>
            <div class="col-md-8 pl-5">
                <h4 class="mb-4">Review</h4>
                <select class="form-control review-filter" style="width: 270px;">
                    <option value="most-helpful-reviews">Most helpful reviews</option>
                    <option value="recent-reviews">Recent reviews</option>
                </select> 
                <div class="clearfix">
                    <div class="mt-4 float-left mb-5">
                        <span class='rate-stars2'>
                            <i class="fa fa-star main-rating2"></i>
                            <i class="fa fa-star main-rating2"></i>
                            <i class="fa fa-star main-rating2"></i>
                            <i class="fa fa-star main-rating2"></i>
                            <i class="fa fa-star main-rating2"></i>
                        </span>
                        <span  class="pl-3" style="font-size: 18px;"> <span class="average_rating">0</span> review</span>
                    </div>
                    <div class="float-right mt-4">
                        <!-- <h4> <a href="write_review.php?product_id=<?php echo $product_id;?>&customer_id=<?php echo $customer_id;?>"> <i class="fa fa-comment-o"></i> Write a review </a></h4> -->
                        <h3 id="add_review" style="cursor: pointer;"><i class="fa fa-comment-o"></i> write a review</h3>
                    </div>
                </div>

                <div id="review_content">
                  <h4>No review, be the first to review</h4>
                </div>
                <!-- <div class="clearfix">
                    <div class="float-left">
                        <svg class = "searchAreaIcons" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32.854 32.854">
                            <path id="shape" d="M66.427-38A16.433,16.433,0,0,0,50-21.573,16.433,16.433,0,0,0,66.427-5.146,16.433,16.433,0,0,0,82.854-21.573,16.433,16.433,0,0,0,66.427-38Zm0,4.928a4.922,4.922,0,0,1,4.928,4.928,4.922,4.922,0,0,1-4.928,4.928A4.922,4.922,0,0,1,61.5-28.144,4.922,4.922,0,0,1,66.427-33.072Zm0,23.326a11.828,11.828,0,0,1-9.856-5.29c.049-3.269,6.571-5.06,9.856-5.06,3.269,0,9.807,1.791,9.856,5.06A11.828,11.828,0,0,1,66.427-9.745Z" transform="translate(-50 38)"/>
                        </svg>
                        <span style="font-size: 20px; padding-left: 20px;" id="user_name">tomas jonney</span>
                    </div>
                    <div class="float-right">
                        <span>3 Months ago</span>
                        <span class="pl-3">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                    </div>
                </div>
                <p class="mt-3" id="user_review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit mollitia architecto, excepturi sed ea libero incidunt impedit totam quos nemo voluptates, ipsum tempora laudantium reiciendis amet quas unde. Adipisci, libero?</p>
                <div>
                    <p>300 people found this helpful</p>
                    <a href="#">Read more</a>
                </div>
                <div class="mt-4 mb-5">
                    <button class="btn helpful-btn">Helpful</button>
                    <a href="#" class="pl-5">Report abuse</a>
                </div> -->
                

                <!-- <div class="clearfix">
                    <div class="float-left">
                        <svg class = "searchAreaIcons" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32.854 32.854">
                            <path id="shape" d="M66.427-38A16.433,16.433,0,0,0,50-21.573,16.433,16.433,0,0,0,66.427-5.146,16.433,16.433,0,0,0,82.854-21.573,16.433,16.433,0,0,0,66.427-38Zm0,4.928a4.922,4.922,0,0,1,4.928,4.928,4.922,4.922,0,0,1-4.928,4.928A4.922,4.922,0,0,1,61.5-28.144,4.922,4.922,0,0,1,66.427-33.072Zm0,23.326a11.828,11.828,0,0,1-9.856-5.29c.049-3.269,6.571-5.06,9.856-5.06,3.269,0,9.807,1.791,9.856,5.06A11.828,11.828,0,0,1,66.427-9.745Z" transform="translate(-50 38)"/>
                        </svg>
                        <span style="font-size: 20px; padding-left: 20px;">Natnael Girma</span>
                    </div>
                    <div class="float-right">
                        <span>3 Months ago</span>
                        <span class="pl-3">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                    </div>
                </div>
                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit mollitia architecto, excepturi sed ea libero incidunt impedit totam quos nemo voluptates, ipsum tempora laudantium reiciendis amet quas unde. Adipisci, libero?</p>
                <div>
                    <p>300 people found this helpful</p>
                    <a href="#">Read more</a>
                </div>
                <div class="mt-4 mb-5">
                    <button class="btn helpful-btn">Helpful</button>
                    <a href="#" class="pl-5">Report abuse</a>
                </div>


                <div class="clearfix">
                    <div class="float-left">
                        <svg class = "searchAreaIcons" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32.854 32.854">
                            <path id="shape" d="M66.427-38A16.433,16.433,0,0,0,50-21.573,16.433,16.433,0,0,0,66.427-5.146,16.433,16.433,0,0,0,82.854-21.573,16.433,16.433,0,0,0,66.427-38Zm0,4.928a4.922,4.922,0,0,1,4.928,4.928,4.922,4.922,0,0,1-4.928,4.928A4.922,4.922,0,0,1,61.5-28.144,4.922,4.922,0,0,1,66.427-33.072Zm0,23.326a11.828,11.828,0,0,1-9.856-5.29c.049-3.269,6.571-5.06,9.856-5.06,3.269,0,9.807,1.791,9.856,5.06A11.828,11.828,0,0,1,66.427-9.745Z" transform="translate(-50 38)"/>
                        </svg>
                        <span style="font-size: 20px; padding-left: 20px;">Natnael Girma</span>
                    </div>
                    <div class="float-right">
                        <span>3 Months ago</span>
                        <span class="pl-3">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                    </div>
                </div>
                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit mollitia architecto, excepturi sed ea libero incidunt impedit totam quos nemo voluptates, ipsum tempora laudantium reiciendis amet quas unde. Adipisci, libero?</p>
                <div>
                    <p>300 people found this helpful</p>
                    <a href="#">Read more</a>
                </div>
                <div class="mt-4">
                    <button class="btn helpful-btn">Helpful</button>
                    <a href="#" class="pl-5">Report abuse</a>
                </div>
                <div class="mt-5 mb-5 float-right">
                    <a href="#">See more reviews</a>
                </div> -->
                
       </div>
    </div>
    </div>

    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Submit Review</h5>
            <button type="button" class="close" data-dismiss="modal" arial-label="close">
                <span arial-hidde"true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <h4 class="text-center mt-2 mb4">
                  <i class="fa fa-star star-light submit-star mr-1" id="submit_star_1" style="color: #f1f4f8;" data-rating="1"></i>
                  <i class="fa fa-star star-light submit-star mr-1" id="submit_star_2" style="color: #f1f4f8;" data-rating="2"></i>
                  <i class="fa fa-star star-light submit-star mr-1" id="submit_star_3" style="color: #f1f4f8;" data-rating="3"></i>
                  <i class="fa fa-star star-light submit-star mr-1" id="submit_star_4" style="color: #f1f4f8;" data-rating="4"></i>
                  <i class="fa fa-star star-light submit-star mr-1" id="submit_star_5" style="color: #f1f4f8;" data-rating="5"></i>
              </h4>
              <div class="form-group">
                  <textarea name="user_review" id="user_review_input" class="form-control" placeholder="Type Review here..."></textarea>
              </div>
              <div class="form-group text-center mt-4">
                <button type="button" class="btn btn-primary add_review" id="save_review">Submit</button>
              </div>
            </div>
          </div>
        </div>
    </div>




    <section id="product" class="mb-5" style="border-bottom: 1px solid rgb(233, 230, 230);">
        <div class="clearfix">
            <h3 class="mb-4 float-left">Products related to this item</h3>
          </div>



        
        <div class="container py-5">
          <div class="row" id="related_products">

            <div class="col-lg-3 product">
              <div class="bg-light my-card-contianer pb-4">
                <div class="card border-0 bg-light mb-2">
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
                  <h3 class="pl-3">$715</h3>
                  <a href="" class="btn btn-outline-success float-right mr-3">Show Now</a>
                </div>
            </div>
      
            <!-- <div class="col-lg-3">
              <div class="bg-light my-card-contianer pb-4">
                <div class="card border-0 bg-light mb-2">
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
                  <h3 class="pl-3">$715</h3>
                  <a href="" class="btn btn-outline-success float-right mr-3">Show Now</a>
                </div>
            </div>
      
            <div class="col-lg-3">
              <div class="bg-light my-card-contianer pb-4">
                <div class="card border-0 bg-light mb-2">
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
                  <h3 class="pl-3">$715</h3>
                  <a href="" class="btn btn-outline-success float-right mr-3">Show Now</a>
              </div>
            </div>
      
            <div class="col-lg-3">
              <div class="bg-light my-card-contianer pb-4">
                <div class="card border-0 bg-light mb-2">
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
                  <h3 class="pl-3">$715</h3>
                  <a href="" class="btn btn-outline-success float-right mr-3">Show Now</a>
              </div>
            </div> -->
          </div> 
          <!-- <a href="#" class="float-right mt-4 mr-3">See more</a> -->
          <button class="loadMore float-right  mr-3 border-0"  style="background: inherit; font-size: 18px;">See More</button>
        </div>
      </section>
      
      <div class="mb-5" style="border-bottom: 1px solid rgb(233, 230, 230);">
          <h3>Customer questions & answers</h3>
          <div class="answer-search-container mt-5">
            <input type="text" class="answer-search mb-5" placeholder="Have a questions? Search for answer">
            <i class="fa fa-search answer-search-icon"></i>
          </div>
          
          <div>
              <div class="mb-5">
                <p><span class="ml-5 pl-5 question-header">Question : </span> <span class="ml-5">Can it be used for sport?</span></p>
                <p style="margin-bottom: 0;"><span class="ml-5 pl-5 question-header">Answer : </span> <span class="ml-5" style="padding-left: 15px;">If you running you can use these.</span></p>
                <span style="margin-left: 230px; font-size: 14px; color: rgb(128, 128, 128);">By Natnael Girma on July 21, 2021</span>
              </div>

              <div class="mb-5">
                <p><span class="ml-5 pl-5 question-header">Question : </span> <span class="ml-5">Can it be used for sport?</span></p>
                <p style="margin-bottom: 0;"><span class="ml-5 pl-5 question-header">Answer : </span> <span class="ml-5" style="padding-left: 15px;">If you running you can use these.</span></p>
                <span style="margin-left: 230px; font-size: 14px; color: rgb(128, 128, 128);">By Natnael Girma on July 21, 2021</span>
              </div>

              <div class="mb-5">
                <p><span class="ml-5 pl-5 question-header">Question : </span> <span class="ml-5">Can it be used for sport?</span></p>
                <p style="margin-bottom: 0;"><span class="ml-5 pl-5 question-header">Answer : </span> <span class="ml-5" style="padding-left: 15px;">If you running you can use these.</span></p>
                <span style="margin-left: 230px; font-size: 14px; color: rgb(128, 128, 128);">By Natnael Girma on July 21, 2021</span>
              </div>
              <div class="mb-5 ml-5">
                  <button class="btn answer-btn">See more answered questions (904)</button>
              </div>
          </div>
         
      </div>



      <section id="product" class="mb-5">
        <div class="clearfix">
            <h3 class="mb-4 float-left">Customers who viewed this item also viewed</h3>
            <nav aria-label="Page navigation example" class="float-right">
              <ul class="pagination">
                <li class="page-item" style="margin-left: 10px">
                  <a class="page-link" href="#" aria-label="Previous">
                    <i class="fa fa-angle-left"></i>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <i class="fa fa-angle-right"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>




        
        <div class="container py-5">
          <div class="row">

            <div class="col-lg-3">
              <div class="bg-light my-card-contianer pb-4">
                <div class="card border-0 bg-light mb-2">
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
                  <h3 class="pl-3">$715</h3>
                  <a href="" class="btn btn-outline-success float-right mr-3">Show Now</a>
                </div>
            </div>
      
            <div class="col-lg-3">
              <div class="bg-light my-card-contianer pb-4">
                <div class="card border-0 bg-light mb-2">
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
                  <h3 class="pl-3">$715</h3>
                  <a href="" class="btn btn-outline-success float-right mr-3">Show Now</a>
                </div>
            </div>
      
            <div class="col-lg-3">
              <div class="bg-light my-card-contianer pb-4">
                <div class="card border-0 bg-light mb-2">
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
                  <h3 class="pl-3">$715</h3>
                  <a href="" class="btn btn-outline-success float-right mr-3">Show Now</a>
              </div>
            </div>
      
            <div class="col-lg-3">
              <div class="bg-light my-card-contianer pb-4">
                <div class="card border-0 bg-light mb-2">
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
                  <h3 class="pl-3">$715</h3>
                  <a href="" class="btn btn-outline-success float-right mr-3">Show Now</a>
              </div>
            </div>
          </div>
          <!-- <a href="#" class="float-right mt-4 mr-3">See more</a> -->
        </div>
      </section>
    </div>
    
<?php include "includes/footer.php"; ?>
<script>
 

      $(document).ready(function(){
        var rating_data = 0;
        
        $(document).on('click', '.submit-star', function(){
          var rating = $(this).data('rating');

          reset_background();
          for(var i = 1; i <= rating; i++){
            $('#submit_star_'+i).addClass('text-warning');
          }
          rating_data = $(this).data('rating');
        });

        function reset_background(){
          for(var i=1; i<=5; i++){
            $('#submit_star_'+i).addClass('star-light');
            $('#submit_star_'+i).removeClass('text-warning');
          }
        }

        $('#add_review').click(function(){
          $.ajax({
            url:"write_review.php",
            method:"POST",
            dataType:"JSON",
            data:{check:'check', product_id:<?php echo $product_id?>},
            success:function(data){
              if(data.isCustomerAlreadyReview == "true"){
                $('#add_review').css('font-size', '16px');
                $('#add_review').css('color', 'red');
                $('#add_review').html('you already reviewed '+ "<span id='edit_review' style='color:blue;'>Edit review</span>");
                $('#edit_review').click(function(){
                  $('#save_review').removeClass('add_review');
                  $('#review_modal').modal('show');
                  $('#user_review_input').val(data.user_review);
                  for(var i=1; i<=data.rating; i++){
                    $('#submit_star_'+i).addClass('text-warning');
                  } 
                  $('#save_review').text('Edit review');
                  $('#save_review').addClass('edit_review');
                  
                  $('.edit_r;eview').click(function(){
                    var user_review = $('#user_review_input').val();
                    var edited_rating = 0;
                    for(var j=1; j<=5; j++){
                        if($('#submit_star_'+j).hasClass('text-warning'))
                        edited_rating++;
                    }
                    $.ajax({
                      url:"write_review.php",
                      method:"POST",
                      data:{edit:'edit', rating_data:edited_rating, user_review:user_review, product_id:<?php echo $product_id?>},
                      success:function(data){
                        $('#review_modal').modal('hide');
                        $('#add_review').html('review edited');
                        //$('#add_review').delay(2000).fadeOut();
                        $('#add_review').css('color', 'green');
                        $('#add_review').css('pointer-events', 'none');
                        load_rating_data();
                      }
                      })
                  })

                });

              }else{
                $('#review_modal').modal('show');
                $('.add_review').click(function(){
                  var user_review = $('#user_review_input').val();
                  if(user_review == ''){
                    var error = "please fill the field";
                    alert(error);
                  }else{
                    if($('#save_review').hasClass('add_review')){
                      $.ajax({
                      url:"write_review.php",
                      method:"POST",
                      data:{add:'add', rating_data:rating_data, user_review:user_review, product_id:<?php echo $product_id?>},
                      success:function(data){
                        $('#review_modal').modal('hide');
                        load_rating_data();
                      }
                    })
                    }
                  }
                });
              }
            }       
          })
        });



       


        

        
        
        load_rating_data();

        function load_rating_data(){
          var review_array = [];
          var revew_filter = $('.review-filter').val();
          $.ajax({
            url:"write_review.php",
            method:"POST",
            data:{action:'load_data', product_id:'<?php echo $product_id;?>', filter:revew_filter},
            dataType:"JSON",
            success:function(data){
              $('#advertisment').css('display', 'block');
              $('.average_rating').text(data.average_rating);
              $('#total_review').text(data.total_review);

              // var count_star = 0;
              // $('.main-rating').each(function(){
              //   count_star++;
              //   if(Math.ceil(data.average_rating) >= count_star){
              //     $(this).addClass('text-warning');
              //   }
              // });rateme
              var htmlEle = "";
              for(var s=0; s<5; s++){
                var class_name = '';
                
                if(data.average_rating > s)
                  class_name = 'text-warning';
                else
                  $('#user_star2').css("color", "rgb(211, 211, 211)");
                  
               htmlEle += "                <i class='fa fa-star "+class_name+"' id='user_star2' style='font-size: 20px;'></i>";
              }
              $('.rate-stars1').html(htmlEle);

              var htmlEle = "";
              for(var s=0; s<5; s++){
                var class_name = '';
                
                if(data.average_rating > s)
                  class_name = 'text-warning';
                else
                  $('#user_star3').css("color", "rgb(211, 211, 211)");
                  
               htmlEle += "                <i class='fa fa-star "+class_name+"' id='user_star3'></i>";
              }
              $('.rate-stars2').html(htmlEle);

              
              var htmlEle = "";
              for(var s=0; s<5; s++){
                var class_name = '';
                
                if(data.average_rating > s)
                  class_name = 'text-warning';
                else
                  $('#user_star4').css("color", "rgb(211, 211, 211)");
                  
               htmlEle += "                <i class='fa fa-star "+class_name+"' id='user_star4' style='font-size: 20px;'></i>";
              }
              $('.rate-stars3').html(htmlEle);

              //five star progress bar
              var five_star_review_percent = 100 * data.five_star_review;
              five_star_review_percent = parseInt(five_star_review_percent / data.total_review);
              $('#five_star_review').text(five_star_review_percent);
              five_star_review_percent = five_star_review_percent + "%";
              $('#five_star_review_progress_bar').width(five_star_review_percent);

              //four star progress bar
              var four_star_review_percent = 100 * data.four_star_review;
              four_star_review_percent = parseInt(four_star_review_percent / data.total_review);
              $('#four_star_review').text(four_star_review_percent);
              four_star_review_percent = four_star_review_percent + "%";
              $('#four_star_review_progress_bar').width(four_star_review_percent);

              //three star progress bar
              var three_star_review_percent = 100 * data.three_star_review;
              three_star_review_percent = parseInt(three_star_review_percent / data.total_review);
              $('#three_star_review').text(three_star_review_percent);
              three_star_review_percent = three_star_review_percent + "%";
              $('#three_star_review_progress_bar').width(three_star_review_percent);

              //two star progress bar
              var two_star_review_percent = 100 * data.two_star_review;
              two_star_review_percent = parseInt(two_star_review_percent / data.total_review);
              $('#two_star_review').text(two_star_review_percent);
              two_star_review_percent = two_star_review_percent + "%";
              $('#two_star_review_progress_bar').width(two_star_review_percent);

              //one star progress bar
              var one_star_review_percent = 100 * data.one_star_review;
              one_star_review_percent = parseInt(one_star_review_percent / data.total_review);
              $('#one_star_review').text(one_star_review_percent);
              one_star_review_percent = one_star_review_percent + "%";
              $('#one_star_review_progress_bar').width(one_star_review_percent);
              

if(data.review_content.length > 0){
  var html = "";
for(var i=0; i<data.review_content.length; i++){
            html += "<div class='review_parent' style='display:none;'>";
            html += "<div class='clearfix'>";
            html += "      <div class='float-left'>";
            html += "            <svg class = 'searchAreaIcons' xmlns='http://www.w3.org/2000/svg' width='25' height='25' viewBox='0 0 32.854 32.854'>";
            html += "                <path id='shape' d='M66.427-38A16.433,16.433,0,0,0,50-21.573,16.433,16.433,0,0,0,66.427-5.146,16.433,16.433,0,0,0,82.854-21.573,16.433,16.433,0,0,0,66.427-38Zm0,4.928a4.922,4.922,0,0,1,4.928,4.928,4.922,4.922,0,0,1-4.928,4.928A4.922,4.922,0,0,1,61.5-28.144,4.922,4.922,0,0,1,66.427-33.072Zm0,23.326a11.828,11.828,0,0,1-9.856-5.29c.049-3.269,6.571-5.06,9.856-5.06,3.269,0,9.807,1.791,9.856,5.06A11.828,11.828,0,0,1,66.427-9.745Z' transform='translate(-50 38)'/>";
            html += "           </svg>";
            html += "            <span style='font-size: 20px; padding-left: 20px;' id='user_name'>"+data.review_content[i].username+"</span>";
            html += "        </div>";
            html += "        <div class='float-right'>";
            var d = new Date(Date.parse(data.review_content[i].date.replace(/[-]/g,'/')));
            //console.log(data.review_content[i].date);
            //console.log(timeSince(d));
            html += "            <span>"+timeSince(d)+"</span>";
            html += "            <span class='pl-3'>";
              for(var s=0; s<5; s++){
                var class_name = '';
                
                if(data.review_content[i].rating > s)
                  class_name = 'text-warning';
                else
                  $('#user_star').css("color", "rgb(211, 211, 211)");
            html += "                <i class='fa fa-star "+class_name+"' id='user_star'></i>";
              }
              review_array.push(data.review_content[i].review_id);
              //console.log(review_array[i]);
            html += "            </span>";
            html += "        </div>";
            html += "    </div>";
            html += "    <p class='mt-3 review_contents'>"+data.review_content[i].content+"</p>";
            html += "    <div>";
            //html += "        <p class='more-less' style='cursor:pointer;'>Read more</p>";
            html += "        <p>"+data.review_content[i].helpful+" people found this helpful</p>";
            html += "    </div>";
            html += "    <div class='mt-4 mb-5'>";
            html += "        <button class='btn helpful-btn' value='"+review_array[i]+"'>Helpful </button>";
            html += "        <a href='#' class='pl-5'>Report abuse</a>";
            if(data.review_content[i].logged_customer_id != 0){
              if(data.review_content[i].customer_id == data.review_content[i].logged_customer_id){
              html += "        <button class='pl-5 Edit-review-button' value='"+review_array[i]+"' style='background:inherit;border:none;'>Edit</button>";
              html += "        <button class='pl-5 Delete-review-button' value='"+review_array[i]+"' style='background:inherit;border:none;'>Delete</button>";
              }
            }
            html += "    </div>";
            html += "</div>";            
}
$('#review_content').html(html + "<span class='see-more-review float-right mb-2' style='cursor:pointer;color:blue;'>See More Review</span>");
}
    var showCharacter = 100; 
    var moreText = "Read more";
    var lessText = "Read less";
$('.review_contents').each(function(){
  var content = $(this).html();
  if(content.length > showCharacter){
    var showContent = content.substr(0, showCharacter);
    var hidenContent = content.substr(showCharacter);
    var fullContent = showContent + "<span class='mycontent'><span class='hidden'> " + hidenContent + " </span><span class='morelink mt-1' style='cursor:pointer;color:blue;display:block;'> "+moreText+" </span></span>"
    $(this).html(fullContent);
    $('.hidden').hide();
  }
 });

 $('.morelink').click(function(){
            if($(this).hasClass('less')){
                $(this).removeClass('less');
                $(this).html(moreText);
            }else{
                $(this).addClass('less');
                $(this).html(lessText);
            }

            $(this).prev().slideToggle();


        });

        $(".review_parent").slice(0,3).show();  
        if($(".review_parent:hidden").length == 0){
        $(".see-more-review").hide(); 
      }

              //}

            } //if end
          })
        }    
        
    $('#review_content').on('click', '.helpful-btn', function(){
    $.ajax({
      url:"write_review.php",
      method:'POST',
      data:{helpful_btn: 'helpful_btn_clicked', review_id: this.value},
      success:function(data){
        load_rating_data();
      }
    })
});



$('#review_content').on('click', '.see-more-review', function(){
      $(".review_parent:hidden").slice(0,3).show();
      if($(".review_parent:hidden").length == 0){
        $(".see-more-review").fadeOut(); //this will hide the button
      }
    });


$('.review-filter').change(function(){
  load_rating_data();
});


$('#review_content').on('click', '.Edit-review-button', function(){
  $.ajax({
  url:"write_review.php",
  method:"POST",
  dataType:"JSON",
  data:{check:'check', product_id:<?php echo $product_id?>},
  success:function(data){
    $('#review_modal').modal('show');
    $('#user_review_input').val(data.user_review);
    $('#save_review').removeClass('add_review');
    $('#save_review').addClass('edit_review');
    for(var i=1; i<=data.rating; i++){
      $('#submit_star_'+i).addClass('text-warning');
    }
    //console.log($(this).val());
    var review_id = $('.Edit-review-button').val();
    
    console.log(review_id);
    $('.edit_review').click(function(){
      var user_review = $('#user_review_input').val();
    var edited_rating = 0;
    for(var j=1; j<=5; j++){
        if($('#submit_star_'+j).hasClass('text-warning'))
        edited_rating++;
    }
   
    $.ajax({
      url:"write_review.php",
      method:"POST",
      data:{edit2:'edit2', rating_data:edited_rating, user_review:user_review, review_id:review_id},
      success:function(data){
        $('#review_modal').modal('hide');
        load_rating_data();
        //alert(data);
      }
    })
  });
  }
})
});


$('#review_content').on('click', '.Delete-review-button', function(){
  $.ajax({
    url:"write_review.php",
    method:'POST',
    data:{delete: 'delete', review_id: this.value},
    success:function(data){
      load_rating_data();
    }
  })
});

      category(<?php echo $sub_cat_id;?>, "related_products", "product", "sub_category");
      });

      


      function timeSince(date){
        var seconds = Math.floor((new Date() - date) / 1000);
        var interval = seconds/ 31536000;

        if(interval > 1){
            return Math.floor(interval) + " Years ago";
        }

        interval = seconds / 2592000;
        if(interval > 1){
            return Math.floor(interval) + " Months ago";
        }
        interval = seconds / 86400;
        if(interval > 1){
            return Math.floor(interval) + " Days ago";
        }
        interval = seconds / 3600;
        if(interval > 1){
            return Math.floor(interval) + " Hours ago";
        }
        interval = seconds / 60;
        if(interval > 1){
            return Math.floor(interval) + " Minutes ago";
        }
        return Math.floor(seconds) + " Seconds";
    }
      
     
    </script> 