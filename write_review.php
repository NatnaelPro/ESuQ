<?php
include "includes/db.php"; 
include "includes/functions.php";
session_start();

    if(isset($_POST['add']))
    {
        $customer_id = $_SESSION['user-id'];
        $product_id = $_POST['product_id'];
        $content = $_POST['user_review'];
        $rating = $_POST['rating_data'];
        $query = "INSERT INTO review(product_id, customer_id, content, rating, submite_date) ";
        $query.= "VALUES($product_id, $customer_id, '$content', $rating, NOW())";

        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        echo "your review and rating successfully submitted";

    }

    if(isset($_POST['action'])){
        $average_rating = 0;
        $total_review = 0;
        $five_star_review = 0;
        $four_star_review = 0;
        $three_star_review = 0;
        $two_star_review = 0;
        $one_star_review = 0;
        $total_user_rating = 0;
        $review_content = array();
        $username = "natnael girma";
        $customer_id = 1;
        $product_id = $_POST['product_id'];
        if(isset($_SESSION['user-id']))
            $logged_customer_id = $_SESSION['user-id'];
        else
            $logged_customer_id = 0;
        if($_POST['filter'] == 'recent-reviews')
            $query = "SELECT * FROM review WHERE product_id = $product_id ORDER BY id DESC";
        else if($_POST['filter'] == 'most-helpful-reviews')
            $query = "SELECT * FROM review WHERE product_id = $product_id ORDER BY helpful DESC";
        $query_result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($query_result)){
            $customer_id = $row['customer_id'];
            $query2 = "SELECT * from user WHERE id = $customer_id";
            $query_result2 = mysqli_query($connection, $query2);
            $row2 = mysqli_fetch_assoc($query_result2);
            $username = $row2['first_name']." ".$row2['last_name'];
            $review_content[] = array(
                'review_id' => $row['id'],
                'product_id' => $row['product_id'],
                'username' => $username,
                'customer_id' => $row['customer_id'],
                'logged_customer_id' => $logged_customer_id,
                'content' => $row['content'],
                'rating' => $row['rating'],
                'helpful' => $row['helpful'],
                'date' => $row['submite_date']
            );
            
            if($row['rating'] == '5')
                $five_star_review++;
            if($row['rating'] == '4')
                $four_star_review++;  
            if($row['rating'] == '3')
                $three_star_review++;  
            if($row['rating'] == '2')
                $two_star_review++;  
            if($row['rating'] == '1')
                $one_star_review++;    

            $total_review++;

            $total_user_rating = $total_user_rating + $row['rating'];
        }

        $average_rating = $total_user_rating / $total_review;

        $output = array(
            'average_rating' => number_format($average_rating),
            'total_review' => $total_review,
            'five_star_review' => $five_star_review,
            'four_star_review' => $four_star_review,
            'three_star_review' => $three_star_review,
            'two_star_review' => $two_star_review,
            'one_star_review' => $one_star_review,
            'review_content' => $review_content
        );
        echo json_encode($output);
    }

    if(isset($_POST['helpful_btn'])){
        $review_id = $_POST['review_id'];
        $query = "SELECT * FROM review where id = $review_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        $row = mysqli_fetch_assoc($query_result);
        
        $helpful = ++$row['helpful'];
        //echo $helpful;
        $query = "UPDATE review SET helpful = $helpful WHERE id = $review_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
       // echo "done";
    }

    if(isset($_POST['check'])){
        $customer_id = $_SESSION['user-id'];
        $product_id = $_POST['product_id'];
        $query = "SELECT * FROM review WHERE customer_id = $customer_id AND product_id = $product_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        $isCustomerAlreadyReview = "false";
        $rating = 0;
        $user_review = "";
        while($row = mysqli_fetch_assoc($query_result)){
            $isCustomerAlreadyReview = "true";
            $rating = $row['rating'];
            $user_review = $row['content'];
        }
        $output = array(
            'isCustomerAlreadyReview' => $isCustomerAlreadyReview,
            'rating' => $rating,
            'user_review' => $user_review
        );
        echo json_encode($output);
    }

    if(isset($_POST['edit'])){
        $customer_id = $_SESSION['user-id'];
        $product_id = $_POST['product_id'];
        $rating = $_POST['rating_data'];
        $user_review = $_POST['user_review'];
        $query = "UPDATE review set rating = $rating, content = '$user_review' WHERE product_id = $product_id AND customer_id = $customer_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
    }

    if(isset($_POST['edit2'])){
        $rating = $_POST['rating_data'];
        $user_review = $_POST['user_review'];
        $review_id = $_POST['review_id'];
        $query = "UPDATE review set rating = $rating, content = '$user_review' WHERE id = $review_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        echo "$rating <br> $user_review";
    }

    if(isset($_POST['delete'])){
        $review_id = $_POST['review_id'];
        $query = "DELETE FROM review WHERE id = $review_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        echo "done!";
    }

    if(isset($_POST['insert'])){
        echo "insert";
    }

?>