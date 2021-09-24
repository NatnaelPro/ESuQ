<?php
include "includes/db.php"; 
include "includes/functions.php";
session_start();
    if(isset($_POST['load_product'])){
        $id = $_POST['id'];
        $type = $_POST['type'];
        $products = array();
        $product_id = 0;
        $page1 = $_POST['page'];
        $sub_cat_id = $_POST['sub_cat_id'];
        $product_num_per_page = 0;
        
        if($type == "sub_category")
            $query = "SELECT * FROM product WHERE sub_category_id = $id AND status = 'Approved'";
        else if($type == "category")
            $query = "SELECT * FROM product WHERE product_category_id = $id AND status = 'Approved'";
        else if($type == "main_category"){
            if($sub_cat_id == 0)
                $query = "SELECT * FROM product WHERE product_category_id = $id AND status = 'Approved' limit $page1,8";
            else if($sub_cat_id == 1){
                $query = "SELECT * FROM product WHERE sub_category_id = $sub_cat_id AND status = 'Approved' limit $page1,8";
            }
            else if($sub_cat_id == 2)
                $query = "SELECT * FROM product WHERE sub_category_id = $sub_cat_id AND status = 'Approved' limit $page1,8";
            else if($sub_cat_id == 3)
                $query = "SELECT * FROM product WHERE sub_category_id = $sub_cat_id AND status = 'Approved' limit $page1,8";
            else if($sub_cat_id == 12)
                $query = "SELECT * FROM product WHERE sub_category_id = 1 or sub_category_id = 2 AND status = 'Approved' limit $page1,8";
            else if($sub_cat_id == "0star_5")
                $query = "SELECT * FROM product WHERE product_category_id = $id AND status = 'Approved'";
                

        }
            
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        $product_num = mysqli_num_rows($query_result);
        $product_num_per_page = $product_num/8;
        $product_num_per_page = ceil($product_num_per_page);
        while($row = mysqli_fetch_assoc($query_result)){
            $product_id = $row['product_id'];
            $query_review = "SELECT * FROM review WHERE product_id = $product_id";
            $query_result_review = mysqli_query($connection, $query_review);
            check_query_success($query_result_review);
            $average_rating = 0;
            $total_review = 0;
            $total_user_rating = 0;
            while($row2 = mysqli_fetch_assoc($query_result_review)){
                $total_review++;
                $total_user_rating = $total_user_rating + $row2['rating'];
            }
            if($total_review != 0)
            $average_rating = $total_user_rating / $total_review;
            $products[] = array(
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'product_price' => $row['product_price'],
                'product_image' => $row['product_image1'],
                'average_review' => $average_rating
            );
        }
        if($sub_cat_id == 0){
            $query = "SELECT * FROM product WHERE product_category_id = $id";
            $query_result = mysqli_query($connection, $query);
            $product_num = mysqli_num_rows($query_result);
            $product_num_per_page = $product_num/8;
            $product_num_per_page = ceil($product_num_per_page);
        }
        $output = array(
            'products' => $products,
            'product_num_per_page' => $product_num_per_page
        );
        echo json_encode($output);
        //echo "done";   
    }
?>