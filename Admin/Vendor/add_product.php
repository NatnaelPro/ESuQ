<?php include "includes/header.php"; 
    if(isset($_POST['add_product'])){
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
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image1_temp = $_FILES['product_image1']['tmp_name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image2_temp = $_FILES['product_image2']['tmp_name'];
        $product_image3 = $_FILES['product_image3']['name'];
        $product_image3_temp = $_FILES['product_image3']['tmp_name'];
        $product_image4 = $_FILES['product_image4']['name'];
        $product_image4_temp = $_FILES['product_image4']['tmp_name'];
        $target = "../images/";
        $target1 = $target. basename($_FILES['product_image1']['tmp_name']);
        $target2 = $target. basename($_FILES['product_image2']['tmp_name']);
        $target3 = $target. basename($_FILES['product_image3']['tmp_name']);
        $target4 = $target. basename($_FILES['product_image4']['tmp_name']);


        move_uploaded_file($product_image1_temp, $target1);
        move_uploaded_file($product_image2_temp, $target2);
        move_uploaded_file($product_image3_temp, $target3);
        move_uploaded_file($product_image4_temp, $target4);
        $query = "INSERT INTO product(product_name, product_category_id, product_price, product_description, product_size, ";
        $query .= "product_color, product_quantity, product_discount, product_warrent_period, product_weight, product_image1, product_image2, product_image3, product_image4) ";
        $query .= "VALUES('$product_name', '$product_category_id', '$product_price', '$product_description', '$product_size', ";
        $query .= "'$product_color', '$product_quantity', '$product_discount', '$product_warrent_period', '$product_weight',  '$product_image1', '$product_image2', '$product_image3', '$product_image4')";
        
        $insert_product = mysqli_query($connection, $query);
        check_query_success($insert_product);
    }
?>
                    <div class="product-form-container">
                        <form action="" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-4 mb-3 pl-3">
                                    <label for="validationCustom01">Product Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="product_name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid product name.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom04">State</label>
                                    <select name="product_category_id" class="custom-select" id="validationCustom04" required> 
                                        <?php 
                                            $query = "SELECT * FROM category";
                                            $select_category = mysqli_query($connection, $query);

                                            check_query_success($select_category);
                                            while($row = mysqli_fetch_assoc($select_category)){
                                                $cat_id = $row['cat_id'];;
                                                $cat_title = $row['cat_title'];
                                                echo "<option value='$cat_id'>{$cat_title}</option>";
                                            }
                                        ?> 
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid product type.
                                    </div>
                                </div>
          

                                <div class="col-md-4 mb-3 pr-3">
                                    <label for="validationCustomUsername">Product Price</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="product_price" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="test" name="product_price" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid product price.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3 pl-3">
                                    <label for="validationCustom03">Product Description</label>
                                    <textarea class="form-control" name="product_description" id="product_description" cols="20" rows="5"></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid product_description.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom05">Product Size</label>
                                    <input type="text" class="form-control" name="product_size" id="validationCustom05" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid product size.
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3 pr-3 pl-4">
                                    <label for="validationCustom05">Product Color</label>
                                    <input type="color" class="form-control w-50" name="product-color" id="validationCustom05" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid product_color.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3 pl-3">
                                    <label for="validationCustom05">Product Quantity</label>
                                    <input type="number" class="form-control" name="product_quantity" id="validationCustom05" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid product_quantity.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom05">Product_discount</label>
                                    <input type="text" class="form-control" name="product_discount" id="validationCustom05" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid product discount.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3 pr-3">
                                    <label for="validationCustom05">product Weight</label>
                                    <input type="number" class="form-control" name="product_weight" id="validationCustom05" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid product_weight.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3 pl-3">
                                    <label for="validationCustom05">warrent period</label>
                                    <input type="date" class="form-control" id="validationCustom05" name="product_warrent_period" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid warrent period.
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="custom-file" style="margin-top: 8px;">
                                        <input type="file" class="custom-file-input" name="product_image1" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose Image 1</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4 pr-3">
                                    <div class="custom-file" style="margin-top: 8px;">
                                        <input type="file" class="custom-file-input" name="product_image2" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose Image 2</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mt-4">
                                    <div class="custom-file" style="">
                                        <input type="file" class="custom-file-input" name="product_image3" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose Image 3</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4 mb-4">
                                    <div class="custom-file" style="">
                                        <input type="file" class="custom-file-input" name="product_image4" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose Image 4</label>
                                    </div>
                                </div>          
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-primary" name="add_product" type="submit">Add Product</button>
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