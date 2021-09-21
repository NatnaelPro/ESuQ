<?php
include "includes/db.php"; 
include "includes/functions.php";
session_start();
    if(isset($_POST['load'])){
        $cart = array();
        $sub_total_price = 0;
        if(isset($_SESSION['user-id']))
            $customer_id = $_SESSION['user-id'];
        else
            $customer_id = 0;
        $query = "SELECT * FROM cart WHERE customer_id = $customer_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        while($row = mysqli_fetch_assoc($query_result)){
            $cart[] = array(
                'product_image' => $row['product_image'],
                'product_name' => $row['product_name'],
                'price' => $row['price'],
                'cart_id' => $row['id'],
                'total_price' => $row['total_price'],
                'quantity' => $row['quantity']
            );
            $sub_total_price = $sub_total_price + $row['total_price'];
        }
        $output = array(
            'cart' => $cart,
            'sub_total_price' => $sub_total_price
        );
        echo json_encode($output);
    }

    if(isset($_POST['increment_quantity'])){
        $id = $_POST['id'];
        $quantity = 0;
        $query = "SELECT * FROM cart WHERE id = $id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        $row = mysqli_fetch_assoc($query_result);
        $total_price = $row['price'] + $row['total_price'];
        $quantity = $row['quantity'] + 1;
        $query_update = "UPDATE cart SET total_price = $total_price, quantity = $quantity WHERE id = $id";
        $query_update_result = mysqli_query($connection, $query_update);
        check_query_success($query_update_result);
    }

    if(isset($_POST['decrease_quantity'])){
        $id = $_POST['id'];
        $query = "SELECT * FROM cart WHERE id = $id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        $row = mysqli_fetch_assoc($query_result);
        if($row['quantity'] > 1){
            $total_price = $row['total_price'] - $row['price'];
        $quantity = $row['quantity'] - 1;
        $query_update = "UPDATE cart SET total_price = $total_price, quantity = $quantity WHERE id = $id";
        $query_update_result = mysqli_query($connection, $query_update);
        check_query_success($query_update_result);
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $query = "DELETE FROM cart WHERE id = $id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
    }

    if(isset($_POST['insert'])){
        $id = $_POST['product_id'];
        $customer_id = $_SESSION['user-id'];
        $query = "SELECT * FROM cart WHERE product_id = $id AND customer_id = $customer_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        $num_row = mysqli_num_rows($query_result);
        if($num_row == 0){
            $query = "SELECT * FROM product WHERE product_id = $id";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
            $row = mysqli_fetch_assoc($query_result);
            $customer_id = $_SESSION['user-id'];
            $price = $row['product_price'];
            $quantity = $row['product_quantity'];
            //$total_price = $row['total_price'];
            $product_image = $row['product_image1'];
            $product_name = $row['product_name'];

            $query = "INSERT INTO cart(customer_id, product_id, price, quantity, total_price, product_image, product_name) ";
            $query .= "VALUES($customer_id, $id, $price, 1, $price, '$product_image', '$product_name')";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
        }
    }
    if(isset($_POST['cart_num'])){
        $customer_id = $_POST['customer_id'];
        $query = "SELECT * FROM cart WHERE customer_id = $customer_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        echo mysqli_num_rows($query_result);
    }

    if(isset($_POST['checking'])){
        $product_id = $_POST['product_id'];
        $customer_id = $_SESSION['user-id'];
        $query = "SELECT * FROM cart WHERE product_id = $product_id AND customer_id = $customer_id";
        $query_result = mysqli_query($connection, $query);
        $num_row = mysqli_num_rows($query_result);
        if($num_row == 0)
            echo "not_added";
        else 
            echo "already_added";
    }
?>