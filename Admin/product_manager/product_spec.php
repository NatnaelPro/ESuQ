<?php include "includes/header.php";
    $isEditBtnClick = false;
    $product_id = 0;
    if(isset($_POST['update_product_spec'])){
        $product_spec_id = $_GET['edit'];
        $product_spec_title = $_POST['product_spec_title'];
        $product_spec_value = $_POST['product_spec_value'];
        $query = "UPDATE product_spec SET product_spec_title = '$product_spec_title', product_spec_value = '$product_spec_value' WHERE id = $product_spec_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
    }

    if(isset($_GET['delete'])){
        $product_spec_id = $_GET['delete'];
        $query = "DELETE FROM product_spec WHERE id = $product_spec_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
    }

    if(isset($_GET['edit'])){
        $isEditBtnClick = true;
        $product_spec_id = $_GET['edit'];
        $query = "SELECT * FROM product_spec WHERE id = $product_spec_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        $row = mysqli_fetch_assoc($query_result);
        $product_spec_title = $row['product_spec_title'];
        $product_spec_value = $row['product_spec_value'];
    }

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        if(isset($_POST['add_product_spec'])){
            $product_spec_title = $_POST['product_spec_title'];
            $product_spec_value = $_POST['product_spec_value'];
    
            $query = "INSERT INTO product_spec(product_spec_title, product_spec_value, product_id) VALUES('$product_spec_title', '$product_spec_value', '$product_id')";
            $addSpecQuery = mysqli_query($connection, $query);
            check_query_success($addSpecQuery);
        }
    }
    
?>
    <form action="" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
            <div class="mb-3 pl-3" style="width: 500px; margin: auto">
                <label for="validationCustom01">Product spec title</label>
                <input type="text" class="form-control" value="<?php if($isEditBtnClick) echo $product_spec_title; else '';?>" id="validationCustom01" name="product_spec_title" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please provide a valid product name.
                </div>
            </div>
            <div class="mb-3 pl-3" style="width: 500px; margin: auto">
                <label for="validationCustom01">Product spec value</label>
                <input type="text" class="form-control" value="<?php if($isEditBtnClick) echo $product_spec_value; else '';?>" id="validationCustom01" name="product_spec_value" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please provide a valid product name.
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
            <button class="btn btn-primary" name="<?php if($isEditBtnClick) echo 'update_product_spec'; else echo 'add_product_spec';?>" type="submit"><?php if($isEditBtnClick) echo 'update_product_spec'; else echo 'add_product_spec';?></button>
        </div>
    </form>

   
    <h3 class="mt-4 mb-4">Technical Specification</h3>
        <div id="product_specifications">
            <table class="table table-border mb-5">
            <?php
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
                    <td><a href="product_spec.php?edit=<?php echo $product_spec_id; ?>&product_id=<?php echo $product_id; ?>"><i class='fa fa-pencil-square-o'></i></a></td>
                    <td><a href="product_spec.php?delete=<?php echo $product_spec_id; ?>&product_id=<?php echo $product_id; ?>"><i class='fa fa-trash'></i></i></a></td>

                </tr>
            <?php
                }
            ?>
            </table>
        </div>
<?php include "includes/footer.php"; ?>