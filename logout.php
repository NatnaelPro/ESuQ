<?php
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        setcookie('user', '', time() - 3600);
        header('location:login.php');
    }
?>