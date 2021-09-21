<?php include "includes/header.php"; 
    if(isset($_GET['edit'])){
        $product_id = $_GET['edit'];
        $query = "SELECT * FROM product WHERE product_id = $product_id";
        $select_all_product = mysqli_query($connection, $query);
        check_query_success($select_all_product);

        while($row = mysqli_fetch_assoc($select_all_product)){
            $product_name = $row['product_name'];
            $product_category_id = $row['product_category_id'];
            $product_price = $row['product_price'];
            $product_description = $row['product_description'];
            $product_size = $row['product_size'];
            $product_color = $row['product_color'];
            $product_quantity = $row['product_quantity'];
            $product_discount = $row['product_discount'];
            $product_weight = $row['product_weight'];
            $product_warrent_period = date('Y-m-d', strtotime($row['product_warrent_period'])); 
            $product_image = $row['product_image'];
        }
    }


    if(isset($_POST['edit_product'])){
        $product_name = $_POST['product_name'];
        $product_category_id = $_POST['product_category_id'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];
        $product_size = $_POST['product_size'];
        $product_color = $_POST['product-color'];
        $product_quantity = $_POST['product_quantity'];
        $product_discount = $_POST['product_discount'];
        $product_warrent_period = date('Y-m-d', strtotime($_POST['product_warrent_period']));
        $product_weight = $_POST['product_weight'];
        $product_image = $_FILES['product_image']['name'];
        $product_image_temp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_temp, "../images/$product_image");
        if(empty($product_image)){
            $query = "SELECT * FROM product WHERE product_id = $product_id";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_image)){
                $product_image = $row['product_image'];
            }
        }


        $query = "UPDATE product SET product_name = '{$product_name}', product_category_id = '{$product_category_id}', product_price = '{$product_price}', ";
        $query .= "product_description = '{$product_description}', product_size = '{$product_size}', product_color = '{$product_color}', ";
        $query .= "product_quantity = '{$product_quantity}', product_discount = '{$product_discount}', product_warrent_period = '{$product_warrent_period}', ";
        $query .= "product_weight = '{$product_weight}', product_image = '{$product_image}' WHERE product_id = '$product_id'";
        
        $update_product = mysqli_query($connection, $query);
        check_query_success($update_product);


    }
?>
                    <div class="product-form-container">
                        <form action="" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-4 mb-3 pl-3">
                                    <label for="validationCustom01">Product Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $product_name; ?>" name="product_name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for="validationCustom04">Category</label>
                                    <select name="product_category_id" class="custom-select" id="validationCustom04" required> -->
                                        <?php 
                                            $query = "SELECT * FROM category";
                                            $select_category = mysqli_query($connection, $query);

                                            check_query_success($select_category);
                                            // while($row = mysqli_fetch_assoc($select_category)){ //to get edited product category
                                            //     $cat_id = $row['cat_id'];;
                                            //     $cat_title = $row['cat_title'];
                                            //     if($product_category_id === $cat_id)
                                            //     echo "<option value='$cat_id'>{$cat_title}</option>";
                                            // }
                                            while($row = mysqli_fetch_assoc($select_category)){ //to get other categories 
                                                $cat_id = $row['cat_id'];;
                                                $cat_title = $row['cat_title'];
                                                if(!($product_category_id === $cat_id))
                                                echo "<option value='$cat_id'>{$cat_title}</option>";
                                                else
                                                echo "<option value='$cat_id'>{$cat_title}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3 pr-3">
                                    <label for="validationCustomUsername">Product Price</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="product_price" value="<?php echo $product_price; ?>" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="test" name="product_price" required>
                                        <div class="invalid-feedback">
                                        Please choose a username.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3 pl-3">
                                    <label for="validationCustom03">Product Description</label>
                                    <textarea class="form-control" name="product_description" id="product_description" cols="20" rows="5"><?php echo $product_description; ?></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom05">Product Size</label>
                                    <input type="text" class="form-control" name="product_size" value="<?php echo $product_size; ?>" id="validationCustom05" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3 pr-3 pl-4">
                                    <label for="validationCustom05">Product Color</label>
                                    <input type="color" class="form-control w-50" name="product-color" id="validationCustom05" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3 pl-3">
                                    <label for="validationCustom05">Product Quantity</label>
                                    <input type="number" class="form-control" name="product_quantity" value="<?php echo $product_quantity; ?>" id="validationCustom05" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom05">Product_discount</label>
                                    <input type="text" class="form-control" name="product_discount" value="<?php echo $product_quantity; ?>"  id="validationCustom05" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3 pr-3">
                                    <label for="validationCustom05">product Weight</label>
                                    <input type="number" class="form-control" name="product_weight"  value="<?php echo $product_weight; ?>" id="validationCustom05" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3 pl-3">
                                    <label for="validationCustom05">warrent period</label>
                                    <input type="date" class="form-control" id="validationCustom05" name="product_warrent_period" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4 text-center">
                                    <div class="form-group">
                                        <img width="200" src="../images/<?php echo $product_image; ?>" alt="no pick">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="custom-file" style="margin-top: 8px;">
                                        <input type="file" class="custom-file-input" name="product_image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-primary" name="edit_product" type="submit">Update Product</button>
                            </div>
                        </form>
                    </div>
        </div> <!-- End of content id -->
     </div> <!-- End of Wrapper class -->

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

    <?php include "includes/footer.php"; ?>
<!--     
    <div class="form-group">
                                <label for="title">Product Name</label>
                                <input type="text" class="form-control" name="product_name">
                                <div class="valid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Product Type</label>
                                <input type="text" class="form-control" name="product_type">
                                <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Product Price</label>
                                <input type="text" class="form-control" name="product_price">
                                <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="post_content">Product Description</label>
                            <textarea class="form-control" name="post_content" id="product_description" cols="20" rows="5"></textarea>
                            <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Product Size</label>
                                <input type="text" class="form-control" name="product_size">
                                <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-outline">
                                <label for="title">Product Color</label>
                                <input type="text" class="form-control" name="product_color">
                                <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Product Quantity</label>
                                <input type="text" class="form-control" name="product_qunatity">
                                <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Product_discount</label>
                                <input type="text" class="form-control" name="product_discount">
                                <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group">
                                <img width="100" src="" alt="no pick">
                            </div>
                            <div class="form-group">
                                <label for="title">product Weight</label>
                                <input type="text" class="form-control" name="product_weight">
                                <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">warrent period</label>
                                <input type="text" class="form-control" name="product_warrent_period">
                                <div class="invalid-feedback">
                                    plwase enter product name.
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <input type="submit" class="btn product-form-btn " name="create_post" value="Publish Post">
                            </div> -->