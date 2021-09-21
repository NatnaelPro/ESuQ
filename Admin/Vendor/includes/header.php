<?php
include "../../includes/db.php";
include "../../includes/functions.php";
    if(isset($_COOKIE['vendor'])){
        $_SESSION['vendor-id'] = $_COOKIE['vendor'];
    }

    if(!isset($_SESSION['vendor-id'])){
        header('location:../vendor_login.php');
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        
        <?php include "sidebar.php"; ?>

        <!-- Page Content  -->
        <div id="content">

            <!-- Navigation -->
            <?php include "navigation.php"; ?>