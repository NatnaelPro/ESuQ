<?php include "includes/header.php";
    // $is_new_product = "false";
    // $product_id = 0;
    // if(isset($_GET['product_id'])){
    //     $is_new_product = "true";
    //     $product_id = $_GET['product_id'];
    // }
    // global $subtotal;
    // $subtotal = 0;
    // if(!isset($_SESSION['user-id'])){
    //     header('location:index.php');
    //     //session_start();
    // }
    // if(isset($_GET['product_id'])){
    //     $product_id = $_GET['product_id'];
    //     $query = "SELECT * FROM product WHERE product_id = $product_id";
    //     $products = mysqli_query($connection, $query);
    //     $row = mysqli_fetch_assoc($products);
    //     check_query_success($products);
    //     $product_id = $row['product_id'];
    //     $product_name = $row['product_name'];
    //     $product_price = $row['product_price'];
    //     $product_quantity = $row['product_quantity'];
    //     $product_image = $row['product_image'];
    //     $customer_id = $_SESSION['user-id'];
    //     $product_quantity = 1;
    //     if(isset($_SESSION['cart'])){
    //         if(empty($_SESSION['cart'])){
    //             $count = count($_SESSION['cart']);
    //             $_SESSION['cart'][$count] = array('product_id' => $row['product_id'], 'product_name' => $row['product_name'], "product_price" => $row['product_price'], "product_quantity" => $product_quantity, "total_price" => $row['product_price'],  "product_image" => $row['product_image']);
    //             $query = "INSERT INTO cart(customer_id, product_id, price, quantity, total_price, product_image, product_name) ";
    //             $query .= "VALUES($customer_id, $product_id, $product_price,  $product_quantity, $product_price, '$product_image', '$product_name')";
    //             $updateCart = mysqli_query($connection, $query);
    //             check_query_success($products);
    //             //setcookie('cart', serialize($_SESSION['cart']), time() + (86400 * 30));
    //             echo "<br>".$count."<br>";
    //         }else{
    //             $isAdded = false;
    //             foreach($_SESSION['cart'] as $key => $value){
    //                 if($product_id == $value['product_id']){
    //                     $isAdded = true;
    //                 }
    //            }
    //             if(!$isAdded){
    //                 $count = count($_SESSION['cart']);
    //                 $_SESSION['cart'][$count] = array('product_id' => $row['product_id'], 'product_name' => $row['product_name'], "product_price" => $row['product_price'], "product_quantity" => $product_quantity, "total_price" => $row['product_price'],  "product_image" => $row['product_image']);
    //                 //setcookie('cart', serialize($_SESSION['cart']), time() + (86400 * 30));
                    
    //                 echo "<br>".$count."<br>";
    //                 $query = "INSERT INTO cart(customer_id, product_id, price, quantity, total_price, product_image, product_name) ";
    //                 $query .= "VALUES($customer_id, $product_id, $product_price,  $product_quantity, $product_price, '$product_image', '$product_name')";
    //                 $updateCart = mysqli_query($connection, $query);
    //                 check_query_success($products);
    //             }else{
    //                 echo "already added";
    //             }
    //         }
    //         header('location:cart.php');
    //     }
    //     else{
    //        $_SESSION['cart'][0] = array('product_id' => $row['product_id'], "product_name" => $row['product_name'], "product_price" => $row['product_price'], "product_quantity" => $product_quantity, "total_price" => $row['product_price'], "product_image" => $row['product_image']);
           
    //        $query = "INSERT INTO cart(customer_id, product_id, price, quantity, total_price, product_image, product_name) ";
    //             $query .= "VALUES($customer_id, $product_id, $product_price,  $product_quantity, $product_price, '$product_image', '$product_name')";
    //             $updateCart = mysqli_query($connection, $query);
    //             check_query_success($products);

    //    }
    // }
    // if(isset($_GET['remove_product'])){
    //     foreach($_SESSION['cart'] as $key => $value){
    //         if($value['product_id'] == $_GET['remove_product']){
    //             $product_id = $_GET['remove_product'];
    //             $query = "DELETE FROM cart WHERE product_id = $product_id";
    //             $deleteFromCart = mysqli_query($connection, $query);
    //             check_query_success($deleteFromCart);
    //             unset($_SESSION['cart'][$key]);
    //             header('location:cart.php');
    //         }
    //     }
    // }
    // if(isset($_POST['quantity'])){
    //     foreach($_SESSION['cart'] as $key => $value){
    //         if($value['product_id'] == $_POST['product_id']){
    //             $product_id = $value['product_id'];
    //             $_SESSION['cart'][$key]['product_quantity'] = $_POST['quantity'];
    //             $_SESSION['cart'][$key]['total_price'] = $value['product_price'] * $_POST['quantity'];
    //             $total_price = $_SESSION['cart'][$key]['total_price'];
    //             $product_quantity = $_SESSION['cart'][$key]['product_quantity'];
    //                 $query = "UPDATE cart SET quantity = $product_quantity, total_price = $total_price WHERE product_id = $product_id";
    //                 $queryUpdate = mysqli_query($connection, $query);
    //                 check_query_success($queryUpdate);
    //         }
    //     }
    // }
?>
<section id="product_cart">
    <div class="container ">
        <div class="row">
            <div class="col-sm-9">
                <Table class="table table-border">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="mycart">
                        
                    </tbody>
                </Table>
            </div>
            <div class="col-sm-3">
                <table class="table table-border order-table">
                    <thead>
                        <tr style="border-bottom: 2px solid #b4b2b2;">
                            <td>Order Summary</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="clearfix" id="subtotal">
                                    <!-- <p class="float-left">subtotal</p>
                                    <p class="float-right" id="subtotal">$333</p> -->
                                </div>
                                
                                <div class="clearfix">
                                    <p class="float-left">Shipping</p>
                                    <p class="float-right">Free</p>
                                </div>
                            </td>
                        </tr>
                        <tr style="border-top: 2px solid #b4b2b2;">
                            <td class="total">
                                <div class="clearfix" id="total">
                                    <p class="float-left">Total</p>
                                    <p class="float-right">$512</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <button class="btn checkout">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "includes/footer.php"; ?>
<script>
    
    $(document).ready(function(){
        var cart_length = 0;
        load_cart_items();
        function load_cart_items(){
            $.ajax({
            url:"cart_loader.php",
            async:false,
            method:'POST',
            dataType:"JSON",
            data:{load:'load'},
            success:function(data){
                var html = '';
                var html_subtotal = '';
                var html_total = '';
                //alert(data.cart.length);
                cart_length = data.cart.length;
                $('#added_product_num').text(data.cart.length);
                for(var i=0; i<data.cart.length; i++){
                    html += "<tr>";
                    html += "   <td>";
                    html += "        <div class='row'>";
                    html += "            <div class='col-sm-4'>";
                    html += "                <img src='images/"+data.cart[i].product_image+"' alt='' width='100'>";
                    html += "            </div>";
                    html += "            <div class='col-sm-8'>";
                    html += "                <h5 class='mt-3'>"+data.cart[i].product_name+"</h5> <br>";
                    html += "            </div>";
                    html += "    </td>";
                    html += "    <td class='table-row'>";
                    html += "        <span class='price' style='background: inherit; padding:0;'>"+data.cart[i].price+" ETB</span>";
                    html += "    </td>";
                    html += "    <td class='table-row'>";
                    html += "        <button class='minus_"+i+" minus' value='"+data.cart[i].cart_id+"'   style='border:0; height:32px; background: #E1E1E1;'>-</button><input type='number' class='quantity' name='quantity' value='"+data.cart[i].quantity+"' min='1' max='100'><button class = 'plus_"+i+" plus' value='"+data.cart[i].cart_id+"' style='border:0; height:32px; background: #E1E1E1;'>+</button>";
                    html += "    </td>";
                    html += "    <td class='table-row'>";
                    html += "        <p class='ttt' style='display: inline;'>"+data.cart[i].total_price+" ETB</p>";
                    html += "    </td>";
                    html += "    <td class='table-row'>";
                    //html += "        <div class='circle'>";
                    html += "            <button style='color:red; border:0; background:inherit; border-radius:50%;' class='delete' value='"+data.cart[i].cart_id+"'>  <i class='fa fa-trash' style='font-size: 30px;'></i></button>";
                    //html += "        </div>";
                    html += "    </td>";
                    html += "</tr>";

                }
                $('#mycart').html(html);
                html_subtotal += " <p class='float-left'>subtotal</p>";
                html_subtotal += "<p class='float-right' id='subtotal'>"+data.sub_total_price+" ETB</p>";

                html_total += "<p class='float-left'>Total</p>";
                html_total += "<p class='float-right'>"+data.sub_total_price+" ETB</p>"

                $('#subtotal').html(html_subtotal);
                $('#total').html(html_total);
            }
           
        });
        
        }

    for(var j=0; j<cart_length; j++){
        var class_name = ".minus_"+j; 
        $('#mycart').on('click', class_name, function(){
            // console.log($(this).val());
            $.ajax({
                url:"cart_loader.php",
                method:'POST',
                data:{decrease_quantity: 'decrease_quantity', id:$(this).val()},
                success:function(data){
                load_cart_items();
                }
            })
        });
    }

    for(var j=0; j<cart_length; j++){
        var class_name = ".plus_"+j; 
        $('#mycart').on('click', class_name, function(){
            $.ajax({
                url:"cart_loader.php",
                method:'POST',
                data:{increment_quantity: 'increment_quantity', id:$(this).val()},
                success:function(data){
                load_cart_items();
                }
            })
        });
    }

    $('#mycart').on('click', '.delete', function(){
        console.log($(this).val());
        $.ajax({
            url:"cart_loader.php",
            method:'POST',
            data:{delete: 'delete', id:$(this).val()},
            success:function(data){
            load_cart_items();
            }
        })
    });
    <?php 
        if(isset($_GET['product_id'])){
            ?>
            $.ajax({
                url:"cart_loader.php",
                method:'POST',
                data:{insert: 'insert', product_id:<?php echo $_GET['product_id']; ?>},
                success:function(data){
                //alert(data);
                load_cart_items();
                }
            })
            <?php
        }
    ?>

        
    });
   
    // var class_name = ".minus_"+0; 
    // $('#mycart').on('click', class_name, function(){
    //                     console.log($(this).val());
    //     });
    

// var quantityArray = document.getElementsByClassName('quantity');
// function quantityInc(){
//   for(i=0; i<quantityArray.length; i++){
//     var quantity = parseInt(quantityArray[i].value) + 1;
//     quantityArray[i].value=quantity;
//   }
//   console.log(quantityInc.length);
// }
    

// var total = 0;
// var p = document.getElementsByClassName('price');
// var q = document.getElementsByClassName('quantity');
// var t = document.getElementsByClassName('ttt');
// var subtotal = document.getElementById('subtotal');
//   function subTotal(){
//     total=0;
//     for(i=0; i<p.length; i++){
//       t[i].innerText=(p[i].value)*(q[i].value);
//       total = total + (p[i].value)*(q[i].value);
//     }
//     subtotal.innerText = total;
//     this.form.submit();
//   }
</script>