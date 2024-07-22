<?php
session_start();
include("includes/connect.php");
include("includes/data.php");

//update order status
if (isset($_POST['upate_order_status_btn'])) {
    $order_id = $_POST['order_id'];
    $old_order_status_id = $_POST['old_order_status_id'];
    $order_status_id = $_POST['order_status_id'];
    if ($order_status_id == $old_order_status_id) {
        $message = "Status no changed";
    } else {
        $sql_update = "UPDATE orders SET order_status_id = {$order_status_id} WHERE id = {$order_id}";
        $query = mysqli_query($link, $sql_update);
        $message = "Update status successfully";
    }
    redirect("view-orders-detail.php?id=$order_id", $message);
}