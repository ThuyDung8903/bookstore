<?php
session_start();
ob_start();
// unset($_SESSION['cart']);
include '../connect/connect.php';
if (isset($_GET['book_id']) && is_numeric($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
} else {
    //if has no get book_id
    header("Location: ../index.php");
    exit();
}
$sql = "SELECT * FROM book WHERE id = {$book_id}";
$query = mysqli_query($connect, $sql);
$products = [];
while($product = mysqli_fetch_assoc($query)){
    $products[] = $product;
}
$cart = array();
foreach ($products as $value) {
    $cart[$value['id']] = $value;
}
// $detail = $cart[$book_id];
// echo "<pre>";
// print_r($detail);
$quantity = (isset($_GET['quantity'])&&is_numeric($_GET['quantity']))? $_GET['quantity'] : 1;
if (isset($_GET['book_id'])) {
    if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
        $cart[$book_id]['quantity'] = $quantity;
        $_SESSION['cart'][$book_id] = $cart[$book_id];
    } else {
        if (array_key_exists($book_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$book_id]['quantity']+=$quantity;
        } else {
            $cart[$book_id]['quantity'] = $quantity;
            $_SESSION['cart'][$book_id] = $cart[$book_id];
        }
    }
    echo "<pre>";
    print_r($_SESSION['cart']);

    // $subTotal = 0;
    // foreach($_SESSION['cart'] as $value){
    //     $total = $value['quantity']*$value['book_price'];
    //     $subTotal += $total;
    // }
    // echo $subTotal;
    // array_sum(array_column($_SESSION['cart'], 'quantity'));
    // $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
    // header("location: ".$_SESSION['previous_page']);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);