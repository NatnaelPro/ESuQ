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
        
        if($type == "sub_category")
            $query = "SELECT * FROM product WHERE sub_category_id = $id AND status = 'Approved'";
        else if($type == "category")
            $query = "SELECT * FROM product WHERE product_category_id = $id AND status = 'Approved'";
        else if($type == "main_category")
            $query = "SELECT * FROM product WHERE product_category_id = $id AND status = 'Approved' limit $page1,8";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
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
        $output = array(
            'products' => $products
            
        );
        echo json_encode($output);
        //echo "done";   
    }
?>