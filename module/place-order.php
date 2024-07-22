<?php
require_once '../connect/connect.php';
session_start();

if (isset($_POST['btn-place-order'])) {
    $order_success_flag = 0;
    $orderItems = $_SESSION['cart'];
    $orderInfo = [];

    $orderInfo['customer_id'] = isset($_POST["customer_id"]) ? $_POST["customer_id"] : 0;
    $orderInfo['shipping_method_id'] = $_POST["shipping_method_id"];
    $orderInfo['payment_method_id'] = $_POST["payment_method_id"];
    $orderInfo['total_price'] = $_POST["sub_total"];
    $orderInfo['shipping_fee'] = $_POST["shipping_fee"];
    $orderInfo['total_bill'] = $_POST["grand_total"];
    $orderInfo['shipToName'] = $_POST["shipToName"];
    $orderInfo['shipToPhone'] = $_POST["shipToPhone"];
    $orderInfo['shipToAddress'] = $_POST["shipToAddress"];
    $orderInfo['shipToEmail'] = $_POST["shipToEmail"];
    $orderInfo['comment'] = $_POST["comment"];

    $sql_insert_order =  "INSERT INTO `orders` ( `customer_id` , `shipping_method_id` , `payment_method_id` , `total_price` , `shipping_fee` , `total_bill` , `shipToName` , `shipToPhone` , `shipToAddress` , `shipToEmail`, `comment` ) VALUES ('" . $orderInfo['customer_id'] . "' , '" . $orderInfo['shipping_method_id'] . "' , '" . $orderInfo['payment_method_id'] . "' , '" . $orderInfo['total_price'] . "' , '" . $orderInfo['shipping_fee'] . "' , '" . $orderInfo['total_bill'] . "' , '" . $orderInfo['shipToName'] . "' , '" . $orderInfo['shipToPhone'] . "' , '" . $orderInfo['shipToAddress'] . "' , '" . $orderInfo['shipToEmail'] . "' , '" . $orderInfo['comment'] . "' ) ";

    //save order to database
    $startTrans = 'START TRANSACTION;';  // Starting a mysql transaction
    mysqli_query($connect, $startTrans);

    $query = $sql_insert_order;
    $result = mysqli_query($connect, $query);
    if (mysqli_affected_rows($connect)) {
        $orderInfo['order_id'] = mysqli_insert_id($connect); //get last inserted order id
        //save orderItems to order details
        foreach ($orderItems as $orderItem) {
            if ($orderItem['sale_price'] == null || $orderItem['sale_price'] >= $orderItem['book_price']) {
                $orderItem['price'] = $orderItem['book_price'];
            } else {
                $orderItem['price'] =  $orderItem['sale_price'];
            }
            mysqli_query($connect, "INSERT INTO `order_detail` (  `orders_id` , `book_id` , `book_name` , `price` , `quantity` ) VALUES ( '" . $orderInfo['order_id'] . "' , '" . $orderItem['id'] . "' , '" . $orderItem['book_title'] . "' , '" . $orderItem['price'] . "' , '" . $orderItem['quantity'] . "' ) ");
        }
    }
    if (mysqli_error($connect)) {
        // Rollback can be done here 
        mysqli_query($connect, "ROLLBACK;"); // All above queries will get rolled back
        die(mysqli_error($connect));
    } else {
        mysqli_query($connect, "COMMIT;"); // changes will get saved to database
        $order_success_flag = 1;
    }
    unset($_SESSION['cart']); //unset all cart item in SESSION['cart'] after place order successfully
    header('location: ../order-complete.php?order_id=' . $orderInfo['order_id']);
} else {
    header('location: index.php');
    exit();
}