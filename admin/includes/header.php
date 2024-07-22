<?php
error_reporting(0);
session_start();
if ($_COOKIE["auth"] != "admin_in") {
    header("location:" . "./");
}
include("includes/connect.php");
include("includes/data.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@hoangnx.hut">

    <meta name="description" content="Bookstore Admin Panel">
    <title>Bookstore Admin Panel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="includes/style.css">
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Alertify JS CSS + Bootstrp theme-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <!-- End Alertify JS CSS + Bootstrp theme-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="bg-primary active">
            <div class="sidebar-header">
                <h3>
                    Admin Panel<br>
                    <i id="sidebarCollapse" class="glyphicon glyphicon-circle-arrow-left"></i>
                </h3>
                <strong>
                    Menu<br>
                    <i id="sidebarExtend" class="glyphicon glyphicon-circle-arrow-right"></i>
                </strong>
            </div><!-- /sidebar-header -->

            <!-- start sidebar -->
            <ul class="list-unstyled components">
                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                <li>
                    <a href="home.php" aria-expanded="false">
                        <i class="glyphicon glyphicon-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li><a href="book.php"> <i class="glyphicon glyphicon-book"></i>Book</a></li>
                <li><a href="orders.php"> <i class="glyphicon glyphicon-shopping-cart"></i>Orders <span
                            class="pull-right"><?= counting("orders", "id") ?></span></a></li>
                <li><a href="category.php"> <i class="glyphicon glyphicon-folder-open"></i>Category</a></li>
                <li><a href="author.php"> <i class="glyphicon glyphicon-user"></i>Author</a></li>
                <li><a href="publisher.php"> <i class="glyphicon glyphicon-list-alt"></i>Publisher</a></li>
                <li><a href="customer.php"> <i class="glyphicon glyphicon-th-list"></i>Customer</a></li>
                <!-- <li><a href="order_detail.php"> <i class="glyphicon glyphicon-tasks"></i>Order_detail</a></li> -->
                <li><a href="order_status.php"> <i class="glyphicon glyphicon-th-list"></i>Order status</a></li>
                <li><a href="payment_method.php"> <i class="glyphicon glyphicon-ok"></i>Payment method</a></li>
                <li><a href="shipping_method.php"> <i class="glyphicon glyphicon-send"></i>Shipping method</a></li>
                <li><a href="users.php"> <i class="glyphicon glyphicon-th-large"></i>Admin Users</a></li>
            </ul>

            <div class="visit">
                <p class="text-center">@2022 Copyright Pustok Bookstore &hearts;</p>
                <a href="../index.php" target="_blank">Visit Store</a>
            </div>
        </nav><!-- /end sidebar -->

        <!-- Page Content Holder -->
        <div id="content">