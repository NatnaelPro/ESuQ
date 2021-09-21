
            <?php include "includes/header.php"; ?>
            <?php
                if(isset($_GET['delete'])){
                    $product_id = $_GET['delete'];

                    $query = "DELETE FROM product WHERE product_id = {$product_id}";
                    $delete_product_query = mysqli_query($connection, $query);
                    check_query_success($delete_product_query);
                    header('Refresh:0 url=product.php');
                }
            ?>

            <div class="row main-row">
            <table class="table table-border table-hover table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>image 1</th>
                        <th>image 2</th>
                        <th>image 3</th>
                        <th>image 4</th>
                        <th>Rate</th>
                        <th>Weight</th>
                        <th>Warrant_Period</th>
                        <th>Spec</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>  
                    <?php
                        $query = "SELECT * FROM product";
                        $products = mysqli_query($connection, $query);
                        check_query_success($products);

                        while($row = mysqli_fetch_assoc($products)){
                            $product_id = $row['product_id'];
                            $product_name = $row['product_name'];
                            $product_category_id = $row['product_category_id'];
                            $product_price = $row['product_price'];
                            $product_description = $row['product_description'];
                            $product_size = $row['product_size'];
                            $product_color = $row['product_color'];
                            $product_quantity = $row['product_quantity'];
                            $product_discount = $row['product_discount'];
                            $product_image1 = $row['product_image1'];
                            $product_image2 = $row['product_image2'];
                            $product_image3 = $row['product_image3'];
                            $product_image4 = $row['product_image4'];
                            $product_rate = $row['product_rate'];
                            $product_weight = $row['product_weight'];
                            $product_warrant_period = $row['product_warrent_period'];
                            $product_spec_id = $row['product_spec_id'];

                            echo "<tr>"; 
                            echo "<td>".$product_id."</td>";
                            echo "<td>".$product_name."</td>";

                            $query = "SELECT * FROM category WHERE cat_id = {$product_category_id}";
                            $select_category_id = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_category_id)){
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                            echo "<td>".$cat_title."</td>";
                            }
                            echo "<td>".$product_price."</td>";
                            echo "<td>".$product_description."</td>";
                            echo "<td>".$product_size."</td>";
                            echo "<td>".$product_color."</td>";
                            echo "<td>".$product_quantity."</td>";
                            echo "<td>".$product_discount."</td>";
                            echo "<td>".$product_image1."</td>";
                            echo "<td>".$product_image2."</td>";
                            echo "<td>".$product_image3."</td>";
                            echo "<td>".$product_image4."</td>";
                            echo "<td>".$product_rate."</td>";
                            echo "<td>".$product_weight."</td>";
                            echo "<td>".$product_warrant_period."</td>";
                            $query = "SELECT * FROM product_spec WHERE product_id = $product_id";
                            $query_result = mysqli_query($connection, $query);
                            $spec = "";
                            $count = 0;
                            while($row = mysqli_fetch_assoc($query_result)){
                                $count++;
                            }
                            if($count == 0)
                                $spec="Add spec";
                            else
                                $spec="Edit spec";
                            echo "<td> <a href='product_spec.php?product_id={$product_id}'>$spec</a></td>";
                            echo "<td> <a href='edit_product.php?edit={$product_id}'><i class='fa fa-pencil-square-o'></i></a></td>";
                            echo "<td> <a href='product.php?delete={$product_id}'> <i class='fa fa-trash'></i> </a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>  
            </div>
        </div>
    </div>
    

    <?php include "includes/footer.php"; ?>