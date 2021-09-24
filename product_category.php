<?php include "includes/header.php"; ?>
<?php 
  $category_id = 1;
  if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];
  }
?>
<h1 class="text-center">Electrons</h1>
<span style='font-size: 35px; margin-left: 200px; cursor: pointer;' id="filter"> <i class='fa fa-filter'></i> Filter </span>
<span style='font-size: 35px; margin-left: 200px; cursor: pointer;' id="filter_close"> <i class='fa fa-remove'></i> Filter </span> 
<div class="container">
  <div class="sort" style="height: 400px; background-color: #f1f1f1;" id="filters">
    <div class="row">
      <div class="col-md-4">
          <h4 class="text-center pt-3">Price</h4>
         
        
          <!-- <input type="range" class="form-range" value="200" min="0" max="1000">
          <input type="range" class="form-range" value="800" min="0" max="1000"> -->

        
        <!-- <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox"><span style='font-size: 20px;'>1 - 500</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox"><span style='font-size: 20px;'>500 - 1,000</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox"><span style='font-size: 20px;'>1,001 - 2,000</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox"><span style='font-size: 20px;'>2,001 - 5,000</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox"><span style='font-size: 20px;'>5,001 - 10,000</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox"><span style='font-size: 20px;'>10,001 - 50,000</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox"><span style='font-size: 20px;'>50,001 - 100,000</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox"><span style='font-size: 20px;'> > 100,001</span></div> -->
      </div>
      <div class="col-md-4">
        <h4 class="text-center pt-3">Type</h4>
        <div style="padding-left: 80px; padding-top: 10px;"><input id="phone" class="ml-5 pl-5 mr-3" type="checkbox" value="phone"><span style='font-size: 20px;'>Mobile Phone</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input id="computer" class="ml-5 pl-5 mr-3" type="checkbox" value="computer"><span style='font-size: 20px;'>Laptop & Tablet</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input id="monitor" class="ml-5 pl-5 mr-3" type="checkbox" value="monitor"><span style='font-size: 20px;'>Monitor</span></div>


      </div>
      <div class="col-md-4">
        <h4 class="text-center pt-3">Sort By</h4>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox" id="best_seller"><span style='font-size: 20px;'>Best Seller</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox" id="new_arrival"><span style='font-size: 20px;'>New Arriaval</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox" id="5_star"><span style='font-size: 20px;'>5 Star</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox" id="4_star"><span style='font-size: 20px;'>4 Star</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox" id="3_star"><span style='font-size: 20px;'>3 Star</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox" id="2_star"><span style='font-size: 20px;'>2 Star</span></div>
        <div style="padding-left: 80px; padding-top: 10px;"><input class="ml-5 pl-5 mr-3" type="checkbox" id="1_star"><span style='font-size: 20px;'>1 Star</span></div>
      </div>
    </div>
  </div>
</div>
<section id="product">
  <div class="container py-5">
    <div class="row" id="main_category">





  <?php
  $page1 = 0;
  if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page == "" || $page == "1"){
      $page1 = 0;
    }
    else{
      $page1 = ($page * 8) - 8;
    }
  }


// $query = "SELECT * FROM product WHERE product_category_id = $category_id AND status = 'Approved' limit $page1,8";
// $products = mysqli_query($connection, $query);
// check_query_success($products);
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

      
      </div>
  </div>
</section>  


<section id="categoty-seemore">
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <?php 
         
      ?>
        <ul class="pagination">
            <li class="page-item" >
            <a class="page-link border-0" href="#" aria-label="Previous" style="background-color: inherit">
                <i class="fa fa-arrow-left"></i>
            </a>
            </li>
            <span id="pagination" class="pt-2">
              <!-- <li style="display: inline;"><a href="#">1</a></li>
              <li style="display: inline;"><a href="#">1</a></li>       
              <li style="display: inline;"><a href="#">1</a></li>                 -->

            </span>
            <?php 
            // query = "SELECT * FROM product WHERE product_category_id = $category_id";
            // $products = mysqli_query($connection, $query);
            // $product_num = mysqli_num_rows($products);
            // $product_num_per_page = $product_num/8;
            // $product_num_per_page = ceil($product_num_per_page);

            // for($i=1; $i<=$product_num_per_page; $i++){
            //   echo "<li class='page-item'><a class='page-link border-0' href='product_category.php?page=$i&category_id=$category_id' style='background-color: inherit'>$i</a></li>";
            // }
             
            ?>
            <li class="page-item">
            <a class="page-link border-0" href="#" aria-label="Next" style="background-color: inherit">
                <i class="fa fa-arrow-right"></i>
            </a>
            </li>
        </ul>
    </nav>
</section>

<?php include "includes/footer.php"; ?>

<script>

  load_product(0);
  
  $('#5_star').click(function(){
    if($('#5_star').is(":checked")){
      load_product('0star_5');
    }
  });


  //fiter category by type
  $('#phone').click(function(){
    if(($('#phone').is(":checked")) && ($('#computer').is(":checked"))){
      load_product(12);
       $('#filters').show();
       $('#filter_close').show();
    }else if($('#phone').is(":checked")){
      load_product(1);
       $('#filters').show();
       $('#filter_close').show();
       //console.log("phone checked");
    }else{
      load_product(0);
      $('#filters').show();
      $('#filter_close').show();
    }
  });

  $('#computer').click(function(){
    if(($('#phone').is(":checked")) && ($('#computer').is(":checked"))){
      load_product(12);
       $('#filters').show();
       $('#filter_close').show();
    }else if($('#computer').is(":checked")){
      load_product(2);
       $('#filters').show();
       $('#filter_close').show();
       //console.log("checked");
    }else {
      load_product(0);
      $('#filters').show();
      $('#filter_close').show();
      //console.log("unchecked");
    }
  });

  $('#monitor').click(function(){
    if($('#monitor').is(":checked")){
      load_product(3);
       $('#filters').show();
       $('#filter_close').show();
       //console.log("checked");
    }else{
      load_product(0);
      $('#filters').show();
      $('#filter_close').show();
      //console.log("unchecked");
    }
  });


  function load_product(sub_cat_id){
    var html = "";
    var html_pagination = "";
    $.ajax({
      url:"product_loader.php",
      method:'POST',
      dataType:"JSON",
      data:{load_product: 'load_p;roduct', id: <?php echo $category_id?>, type:'main_category', page: <?php echo $page1;?>, sub_cat_id:sub_cat_id},
      success:function(data){
        //alert(data);
        for(var i=0; i<data.products.length; i++){
          html += "<div class='col-lg-3'>";
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
          $('#main_category').html(html);
          
        }
        for(var i=1; i <= data.product_num_per_page; i++){
          html_pagination += "<li class='page-item' style='display: inline;'><a style='display: inline;' class='page-link border-0' href='product_category.php?page="+i+"&category_id=<?php echo $category_id; ?>' style='background-color: inherit'>" + i + "</a></li>";
          //console.log(i);
        }
        $('#pagination').html(html_pagination);
      }
    })
    $('#filters').hide();
    $('#filter_close').hide();
    $('#filter').click(function(){
      $('#filters').show();
      $('#filter_close').show();
      $('#filter').hide();
    });

    $('#filter_close').click(function(){
      $('#filters').hide();
      $('#filter_close').hide();
      $('#filter').show();
    });
  }
  
</script>