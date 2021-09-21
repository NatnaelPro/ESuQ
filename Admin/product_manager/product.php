
            <?php include "includes/header.php"; ?>
            <div class="row main-row">
            <table class="table table-border table-hover table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>image 1</th>
                        <th>image 2</th>
                        <th>image 3</th>
                        <th>image 4</th>
                        <th>Warrant_Period</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody id="product_table">  
                    <?php
                        // $count = 0;
                        // $query = "SELECT * FROM product";
                        // $products = mysqli_query($connection, $query);
                        // check_query_success($products);

                        // while($row = mysqli_fetch_assoc($products)){
                        //     $product_id = $row['product_id'];
                        //     $product_name = $row['product_name'];
                        //     $product_category_id = $row['product_category_id'];
                        //     $product_price = $row['product_price'];
                        //     $product_description = $row['product_description'];
                        //     $product_size = $row['product_size'];
                        //     $product_color = $row['product_color'];
                        //     $product_quantity = $row['product_quantity'];
                        //     $product_discount = $row['product_discount'];
                        //     $product_image1 = $row['product_image1'];
                        //     $product_image2 = $row['product_image2'];
                        //     $product_image3 = $row['product_image3'];
                        //     $product_image4 = $row['product_image4'];
                        //     $product_warrant_period = $row['product_warrent_period'];
                        //     $product_spec_id = $row['product_spec_id'];
                        //     $product_status = $row['status'];

                        //     echo "<tr>"; 
                        //     echo "<td>".$product_id."</td>";
                        //     echo "<td>".$product_name."</td>";

                        //     $query = "SELECT * FROM category WHERE cat_id = {$product_category_id}";
                        //     $select_category_id = mysqli_query($connection, $query);

                        //     while($row = mysqli_fetch_assoc($select_category_id)){
                        //         $cat_id = $row['cat_id'];
                        //         $cat_title = $row['cat_title'];
                        //     echo "<td>".$cat_title."</td>";
                        //     }
                        //     echo "<td>".$product_price."</td>";
                        //     echo "<td>".$product_description."</td>";
                        //     echo "<td>".$product_quantity."</td>";
                        //     echo "<td>".$product_discount."</td>";
                        //     echo "<td> <img src='../../images/$product_image1' width='50'> </td>";
                        //     echo "<td> <img src='../../images/$product_image2' width='50'> </td>";
                        //     echo "<td> <img src='../../images/$product_image3' width='50'> </td>";
                        //     echo "<td> <img src='../../images/$product_image4' width='50'> </td>";
                        //     echo "<td>".$product_warrant_period."</td>";
                        //     echo "<td> <button class='status_btn_$count' style='border:0; background-color: inherit;'>  </button> </td>";
                        //     echo "<td> <button class='status' style='border: 0; background-color: inherit; color: blue; text-decoration: underline;' value='".$product_id."'>Approve</button></td>";
                        //     echo "<td> <button class='status' style='border: 0; background-color: inherit; color: blue; text-decoration: underline;' value='".$product_id."'>Unapprove</button></td>";
                        //     echo "<td> <button class='delete' style='border:0; background-color: inherit;'> <i class='fa fa-trash'></i> </button> </td>";
                        //     echo "</tr>";
                        //     $count++;
                        // }
                    ?>
                </tbody>
            </table>  
            </div>
        </div>
    </div>
    

    <?php include "includes/footer.php"; ?>

    <script>
        load_product();
        $('#product_table').on('click', '.status', function(){
            product_id = $(this).val();
            action = $(this).text();
        $.ajax({
            url:"approve_product.php",
            method:'POST',
            data:{approve:'approve' , product_id: product_id, action: action},
            success:function(data){
                load_product();
            }
        })
         });
       

        function load_product(){
            var html = "";
         $.ajax({
            url:"approve_product.php",
            method:'POST',
            dataType:"JSON",
            data:{load_product:'load_product'},
            success:function(data){
                //alert(data.products.length);
                for(var i=0; i<data.products.length; i++){
                    html += "<tr>";
                    html += "<td>" + data.products[i].id + "</td>";
                    html += "<td>" + data.products[i].name + "</td>";
                    html += "<td>" + data.products[i].category + "</td>";
                    html += "<td>" + data.products[i].price + "</td>";
                    html += "<td>" + data.products[i].description + "</td>";
                    html += "<td>" + data.products[i].quantity + "</td>";
                    html += "<td>" + data.products[i].discount + "</td>";
                    html += "<td><img src='../../images/" + data.products[i].image1 + "' width='50'></td>";
                    html += "<td><img src='../../images/" + data.products[i].image2 + "' width='50'></td>";
                    html += "<td><img src='../../images/" + data.products[i].image3 + "' width='50'></td>";
                    html += "<td><img src='../../images/" + data.products[i].image4 + "' width='50'></td>";
                    html += "<td>" + data.products[i].warrent_period + "</td>";
                    html += "<td>" + data.products[i].status + "</td>";
                    html += "<td> <button class='status' style='border: 0; background-color: inherit; color: blue; text-decoration: underline;' value='"+data.products[i].id+"'>Approve</button></td>";
                    html += "<td> <button class='status' style='border: 0; background-color: inherit; color: blue; text-decoration: underline;' value='"+data.products[i].id+"'>Unapprove</button></td>";
                    html += "<td> <button class='delete' style='border:0; background-color: inherit;'> <i class='fa fa-trash'></i> </button> </td>";
                    html += "<tr>";
                }
                  
                   $('#product_table').html(html);
            }
        })
        }
         

         
    </script>