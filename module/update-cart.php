<?php
session_start();
// ob_start();
include '../connect/connect.php';
$book_id = $_GET['book_id'] ?? null;
if(!$book_id && !is_numeric($book_id)){
    header("location: shop.php");
    exit();
}

$quantity = $_GET['quantity'] ?? null;
if(!$quantity && !is_numeric($quantity)){
    header("location: shop.php");
    exit();
}

if(array_key_exists($book_id, $_SESSION['cart'])){
    if ($_SESSION['cart'][$book_id]['quantity'] +$quantity  <= 0) {
        unset($_SESSION['cart'][$book_id]);
    }else{
        $_SESSION['cart'][$book_id]['quantity'] += $quantity;
    }
}
//remove product from cart by id
if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    if(array_key_exists($remove_id, $_SESSION['cart'])){
        unset($_SESSION['cart'][$remove_id]);
    }
}
// echo "<pre>";
// print_r($_SESSION['cart']);
// header('Location: ../cart.php');
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
