<section id="newsletter">
  <div class="row mt-5">
    <div class="col-sm-6">
      <div class="container">
        <h1>Subscribe to our newsletter</h1>
      </div>
    </div>
    <div class="col-sm-6">
      <form>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Enter your email address">
          <button type="submit" class="btn">Subscribe</button>
        </div>
      </form>
    </div>
  </div>
</section>



<footer>
  <div class="row">
    <div class="col-md-3 text-center">
      <img src="images/logo.png"  alt="logo" width="200">
      <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae asperiores dicta dolores fuga in fugit est odio quam eligendi animi.</p>
    </div>

    <div class="col-md-3 links">
      <h5>Hot links</h5>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>

    <div class="col-md-3 links">
      <h5>More info</h5>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#">How it works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Decline rule</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Terms & conditions</a>
        </li>
      </ul>
    </div>


    <div class="col-md-3 links">
      <h5>Customer Care</h5>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Terms of user</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Privacy policy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Discount system</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="clearfix">
      <p class="float-left ml-3 mt-2"><span>E-SuQ </span> All right reserved</p>
      <div class="social-media-icons mr-5 mt-2 float-right">
        <i class="fa fa-youtube-play"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-pinterest"></i>
        <i class="fa fa-facebook"></i>
      </div>
    </div>
  </div>
</footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
$('#added_product_num').text('4');
category(1, "electronics", "product", "category");
category(2, "clothes", "product-clothes", "category");
category(3, "cosmetics", "product-cosmetics", "category");


$('#mobile_phone').click(function(){
  $(".loadMore").show(); 
    category(1, "electronics", "product", "sub_category");
  });

  $('#laptop').click(function(){
    $(".loadMore-clothes").show();
    category(2, "electronics", "product", "sub_category");
  });

  $('#shoes').click(function(){
    category(3, "clothes", "product-clothes", "sub_category");
  });




  function category(sub_cat_id, cat_element_id, cat_element_class, type){
    
    $.ajax({
    url:"product_loader.php",
    method:'POST',
    dataType:"JSON",
    data:{load_product: 'load_product', id: sub_cat_id, type: type, page: 0, sub_cat_id:0},
    success:function(data){
    //alert(data);
      var html = "";
      for(var i=0; i<data.products.length; i++){
        html += "<div class='col-lg-3 "+cat_element_class+"'>";
        html += " <div class='bg-light my-card-contianer pb-4 mb-5'>";
        html += "   <div class='card border-0 bg-light mb-2 py-4'>";
        html += "     <a href='product_details.php?product_id="+data.products[i].product_id+"'><div class='card-body pt-4' id='test' style=\"background-image: url('images/"+data.products[i].product_image+"');  background-size: contain; background-repeat: no-repeat; background-position: center; width: 100%; height: 30vh;\"></div></a>";
        html += "   </div>";
        html += "   <h5 class='pl-3 product_name'>"+data.products[i].product_name+"</h5>";
        html += "   <div class='cost mt-3 text-dark'>";
        html += "     <div class='star mt-3 align-items-center pl-3 mb-2'>";
        for(var s=0; s<5; s++){
          var class_name = '';
            if(data.products[i].average_review > s)
              class_name = 'text-warning';
            else
              $('#user_star3').css("color", "rgb(211, 211, 211)");

            html += "       <i class='fa fa-star "+class_name+"'></i>";
          // html += "       <i class='fa fa-star'></i>";
          // html += "       <i class='fa fa-star'></i>";
          // html += "       <i class='fa fa-star'></i>";
          // html += "       <i class='fa fa-star'></i>";
        }
        html += "       </div>";
        html += "    </div>";
        html += "   <h3 class='pl-3' style='font-family: serif;'>"+data.products[i].product_price+" ETB</h3>";
        html += "   <button class='btn btn-outline-success float-right mr-3 add_to_cart' value='"+data.products[i].product_id+"'>Add To Cart</button>";
        //html += "   <div class='already_added'>Already added</div>";
        html += " </div>";
        html += "</div>";
      }
      
      
      $('#'+cat_element_id).html(html);
      if(cat_element_id == "electronics" || cat_element_id == "related_products"){
        $(".product").slice(0,4).show();
        $(".loadMore").on("click", function(){
          $(".product:hidden").slice(0,4).show();
          if($(".product:hidden").length == 0){
            $(".loadMore").fadeOut(); //this will hide the button
          }
        })
      }
      else if(cat_element_id == "clothes"){
        $(".product-clothes").slice(0,4).show();
        $(".loadMore-clothes").on("click", function(){
          $(".product-clothes:hidden").slice(0,4).show();
          if($(".product-clothes:hidden").length == 0){
            $(".loadMore-clothes").fadeOut(); //this will hide the button
          }
        })
      }
      else if(cat_element_id == "cosmetics"){
        $(".product-cosmetics").slice(0,4).show();
        $(".loadMore-cosmetics").on("click", function(){
          $(".product-cosmetics:hidden").slice(0,4).show();
          if($(".product-cosmetics:hidden").length == 0){
            $(".loadMore-cosmetics").fadeOut(); //this will hide the button
          }
        })
      }
      
     }
  })
  <?php
    if(isset($_SESSION['user-id']))
      $customer_id = $_SESSION['user-id'];
    else
      $customer_id = 0;
  ?>
  $.ajax({
    url:"cart_loader.php",
    method:"POST",
    data:{cart_num:'cart_num', customer_id:<?php echo $customer_id; ?>},
    success:function(data){
      $('#added_product_num').text(data);
    }
  })

  
  

  }

  $('#electronics').on('click', '.add_to_cart', function(){
     var product_id = $(this).val();
     var temp = add_to_cart(product_id);
    if(temp == "already_added"){
      $(this).text("already_added");
      $(this).css('background', '#ee91a8');
      $(this).css('color', '#fff');
    }
  });

  $('#clothes').on('click', '.add_to_cart', function(){
     var product_id = $(this).val();
     var temp = add_to_cart(product_id);
    if(temp == "already_added"){
      $(this).text("already_added");
      $(this).css('background', '#ee91a8');
      $(this).css('color', '#fff');
    }
  });

  $('#cosmetics').on('click', '.add_to_cart', function(){
     var product_id = $(this).val();
     var temp = add_to_cart(product_id);
    if(temp == "already_added"){
      $(this).text("already_added");
      $(this).css('background', '#ee91a8');
      $(this).css('color', '#fff');
    }
  });

  


function add_to_cart(product_id){
  var temp = '';
  $.ajax({
      async: false,
      url:"cart_loader.php",
      method:"POST",
      data:{checking:'checking', product_id: product_id},
      success:function(data){
        if(data == "already_added")
          temp = data;
        else
          window.location = "cart.php?product_id="+product_id;
      }
    })
    return temp;
}


























// Example starter JavaScript for disabling form submissions if there are invalid fields
// (function() {
//   'use strict';
//   window.addEventListener('load', function() {
//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     var forms = document.getElementsByClassName('needs-validation');
//     // Loop over them and prevent submission
//     var validation = Array.prototype.filter.call(forms, function(form) {
//       form.addEventListener('submit', function(event) {
//         if (form.checkValidity() === false || (document.getElementById('password').value != document.getElementById('passwordConfirm').value)) {
//           event.preventDefault();
//           event.stopPropagation();
//         }
//         form.classList.add('was-validated');
//       }, false);
//     });
//   }, false);
// })();



















  </script>
</body>
</html>