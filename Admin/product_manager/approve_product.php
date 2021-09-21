<?php 
    include('../../includes/db.php');
    include('../../includes/functions.php');

    if(isset($_POST['approve'])){
        $product_id = $_POST['product_id'];
        $action = $_POST['action'];
        if($action == "Unapprove")
            $query = "UPDATE product SET status = 'Unapproved' WHERE product_id = $product_id";
        else if($action == "Approve")
            $query = "UPDATE product SET status = 'Approved' WHERE product_id = $product_id";
        
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        echo "done";
    }
    if(isset($_POST['load_approve_data'])){
        $approve = array();
        $query = "SELECT * FROM product";
            $products = mysqli_query($connection, $query);
            check_query_success($products);

            while($row = mysqli_fetch_assoc($products)){
                $approve[] = array(
                    'status' => $row['status']
                );
            }
            $output = array(
                'approve' => $approve
                
            );
            echo json_encode($output);
    }
    if(isset($_POST['load_product'])){
        $products = array();
        $query = "SELECT * FROM product";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);

        while($row = mysqli_fetch_assoc($query_result)){
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
            $product_warrant_period = $row['product_warrent_period'];
            $product_spec_id = $row['product_spec_id'];
            $product_status = $row['status'];
            

            $cat_query = "SELECT * FROM category WHERE cat_id = {$product_category_id}";
            $cat_query_result = mysqli_query($connection, $cat_query);

            while($cat_row = mysqli_fetch_assoc($cat_query_result)){
                $cat_id = $cat_row['cat_id'];
                $cat_title = $cat_row['cat_title'];
            }
            
            $products[] = array(
                'id' => $row['product_id'],
                'name' => $row['product_name'],
                'category' => $cat_title,
                'price' => $row['product_price'],
                'description' => $row['product_description'],
                'quantity' => $row['product_quantity'],
                'discount' => $row['product_discount'],
                'warrent_period' => $row['product_warrent_period'],
                'image1' => $row['product_image1'],
                'image2' => $row['product_image2'],
                'image3' => $row['product_image3'],
                'image4' => $row['product_image4'],
                'status' => $row['status']
            );
        }
        $output = array(
            'products' => $products
            
        );
        echo json_encode($output);
    }
?>
