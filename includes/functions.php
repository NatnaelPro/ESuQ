<?php
    function check_query_success($query){
        global $connection;
        if(!$query) die("Query Faild : ".mysqli_error($connection));
    }
?>