<?php
//this file execute actions from pages "edit-%.php"
include("includes/connect.php");
include("includes/data.php");

$cat = $_POST['cat'];
$cat_get = $_GET['cat'];
$act = $_POST['act'];
$act_get = $_GET['act'];
$id = $_POST['id'];
$id_get = $_GET['id'];


if ($cat == "author" || $cat_get == "author") {
	$author_name = addslashes(htmlentities($_POST["author_name"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `author` (  `author_name` ) VALUES ( '" . $author_name . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `author` SET  `author_name` =  '" . $author_name . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `author` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "author.php");
}

//Process add or edit book
if ($cat == "book" || $cat_get == "book") {
	$book_title = addslashes(htmlentities($_POST["book_title"], ENT_QUOTES));
	$author_id = addslashes(htmlentities($_POST["author_id"], ENT_QUOTES));
	$publisher_id = addslashes(htmlentities($_POST["publisher_id"], ENT_QUOTES));
	$category_id = addslashes(htmlentities($_POST["category_id"], ENT_QUOTES));
	$book_price = addslashes(htmlentities($_POST["book_price"], ENT_QUOTES));
	$sale_price = addslashes(htmlentities($_POST["sale_price"], ENT_QUOTES));
	$short_description = addslashes(htmlentities($_POST["short_description"], ENT_QUOTES));
	//upload image
	$book_image = upload_image();
	$detail_description = addslashes(htmlentities($_POST["detail_description"], ENT_QUOTES));
	$book_status = addslashes(htmlentities($_POST["book_status"], ENT_QUOTES));
	$is_best_seller = addslashes(htmlentities($_POST["is_best_seller"], ENT_QUOTES));
	$is_featured_product = addslashes(htmlentities($_POST["is_featured_product"], ENT_QUOTES));
	$is_new_arrival = addslashes(htmlentities($_POST["is_new_arrival"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `book` (  `book_title` , `author_id` , `publisher_id` , `category_id` , `book_price` , `sale_price` , `short_description` , `book_image` , `detail_description` , `book_status` , `is_best_seller` , `is_featured_product` , `is_new_arrival` ) VALUES ( '" . $book_title . "' , '" . $author_id . "' , '" . $publisher_id . "' , '" . $category_id . "' , '" . $book_price . "' , '" . $sale_price . "' , '" . $short_description . "' , '" . $book_image . "' , '" . $detail_description . "' , '" . $book_status . "' , '" . $is_best_seller . "' , '" . $is_featured_product . "' , '" . $is_new_arrival . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `book` SET  `book_title` =  '" . $book_title . "' , `author_id` =  '" . $author_id . "' , `publisher_id` =  '" . $publisher_id . "' , `category_id` =  '" . $category_id . "' , `book_price` =  '" . $book_price . "' , `sale_price` =  '" . $sale_price . "' , `short_description` =  '" . $short_description . "' , `book_image` =  '" . $book_image . "' , `detail_description` =  '" . $detail_description . "' , `book_status` =  '" . $book_status . "' , `is_best_seller` =  '" . $is_best_seller . "' , `is_featured_product` =  '" . $is_featured_product . "' , `is_new_arrival` =  '" . $is_new_arrival . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `book` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "book.php");
}

if ($cat == "category" || $cat_get == "category") {
	$category_name = addslashes(htmlentities($_POST["category_name"], ENT_QUOTES));
	$status = addslashes(htmlentities($_POST["status"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `category` (  `category_name` , `status` ) VALUES ( '" . $category_name . "' , '" . $status . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `category` SET  `category_name` =  '" . $category_name . "' , `status` =  '" . $status . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `category` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "category.php");
}

if ($cat == "customer" || $cat_get == "customer") {
	$username = addslashes(htmlentities($_POST["username"], ENT_QUOTES));
	$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
	$fullname = addslashes(htmlentities($_POST["fullname"], ENT_QUOTES));
	$address = addslashes(htmlentities($_POST["address"], ENT_QUOTES));
	$phone = addslashes(htmlentities($_POST["phone"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `customer` (  `username` , `password` , `fullname` , `address` , `phone` , `email` ) VALUES ( '" . $username . "' , '" . md5($password) . "', '" . $fullname . "' , '" . $address . "' , '" . $phone . "' , '" . $email . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `customer` SET  `username` =  '" . $username . "' , `fullname` =  '" . $fullname . "' , `address` =  '" . $address . "' , `phone` =  '" . $phone . "' , `email` =  '" . $email . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `customer` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "customer.php");
}

if ($cat == "order_detail" || $cat_get == "order_detail") {
	$orders_id = addslashes(htmlentities($_POST["orders_id"], ENT_QUOTES));
	$book_id = addslashes(htmlentities($_POST["book_id"], ENT_QUOTES));
	$book_name = addslashes(htmlentities($_POST["book_name"], ENT_QUOTES));
	$price = addslashes(htmlentities($_POST["price"], ENT_QUOTES));
	$quantity = addslashes(htmlentities($_POST["quantity"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `order_detail` (  `orders_id` , `book_id` , `book_name` , `price` , `quantity` ) VALUES ( '" . $orders_id . "' , '" . $book_id . "' , '" . $book_name . "' , '" . $price . "' , '" . $quantity . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `order_detail` SET  `orders_id` =  '" . $orders_id . "' , `book_id` =  '" . $book_id . "' , `book_name` =  '" . $book_name . "' , `price` =  '" . $price . "' , `quantity` =  '" . $quantity . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `order_detail` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "order_detail.php");
}

if ($cat == "order_status" || $cat_get == "order_status") {
	$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `order_status` (  `description` ) VALUES ( '" . $description . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `order_status` SET  `description` =  '" . $description . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `order_status` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "order_status.php");
}

if ($cat == "orders" || $cat_get == "orders") {
	$order_status_id = addslashes(htmlentities($_POST["order_status_id"], ENT_QUOTES));
	$customer_id = addslashes(htmlentities($_POST["customer_id"], ENT_QUOTES));
	$shipping_method_id = addslashes(htmlentities($_POST["shipping_method_id"], ENT_QUOTES));
	$payment_method_id = addslashes(htmlentities($_POST["payment_method_id"], ENT_QUOTES));
	$order_date = addslashes(htmlentities($_POST["order_date"], ENT_QUOTES));
	$total_price = addslashes(htmlentities($_POST["total_price"], ENT_QUOTES));
	$shipping_fee = addslashes(htmlentities($_POST["shipping_fee"], ENT_QUOTES));
	$total_bill = addslashes(htmlentities($_POST["total_bill"], ENT_QUOTES));
	$shipToName = addslashes(htmlentities($_POST["shipToName"], ENT_QUOTES));
	$shipToPhone = addslashes(htmlentities($_POST["shipToPhone"], ENT_QUOTES));
	$shipToAddress = addslashes(htmlentities($_POST["shipToAddress"], ENT_QUOTES));
	$shipToEmail = addslashes(htmlentities($_POST["shipToEmail"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `orders` (  `order_status_id` , `customer_id` , `shipping_method_id` , `payment_method_id` , `order_date` , `total_price` , `shipping_fee` , `total_bill` , `shipToName` , `shipToPhone` , `shipToAddress` , `shipToEmail` ) VALUES ( '" . $order_status_id . "' , '" . $customer_id . "' , '" . $shipping_method_id . "' , '" . $payment_method_id . "' , '" . $order_date . "' , '" . $total_price . "' , '" . $shipping_fee . "' , '" . $total_bill . "' , '" . $shipToName . "' , '" . $shipToPhone . "' , '" . $shipToAddress . "' , '" . $shipToEmail . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `orders` SET  `order_status_id` =  '" . $order_status_id . "' , `customer_id` =  '" . $customer_id . "' , `shipping_method_id` =  '" . $shipping_method_id . "' , `payment_method_id` =  '" . $payment_method_id . "' , `order_date` =  '" . $order_date . "' , `total_price` =  '" . $total_price . "' , `shipping_fee` =  '" . $shipping_fee . "' , `total_bill` =  '" . $total_bill . "' , `shipToName` =  '" . $shipToName . "' , `shipToPhone` =  '" . $shipToPhone . "' , `shipToAddress` =  '" . $shipToAddress . "' , `shipToEmail` =  '" . $shipToEmail . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		//first, delete item from table order_detail
		mysqli_query($link, "DELETE FROM `order_detail` WHERE orders_id = '" . $id_get . "' ");
		//then, delete order
		mysqli_query($link, "DELETE FROM `orders` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "orders.php");
}

if ($cat == "payment_method" || $cat_get == "payment_method") {
	$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));
	$status = addslashes(htmlentities($_POST["status"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `payment_method` (  `description` , `status` ) VALUES ( '" . $description . "' , '" . $status . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `payment_method` SET  `description` =  '" . $description . "' , `status` =  '" . $status . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `payment_method` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "payment_method.php");
}

if ($cat == "publisher" || $cat_get == "publisher") {
	$publisher_name = addslashes(htmlentities($_POST["publisher_name"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `publisher` (  `publisher_name` ) VALUES ( '" . $publisher_name . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `publisher` SET  `publisher_name` =  '" . $publisher_name . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `publisher` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "publisher.php");
}

if ($cat == "shipping_method" || $cat_get == "shipping_method") {
	$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));
	$shipping_fee = addslashes(htmlentities($_POST["shipping_fee"], ENT_QUOTES));
	$status = addslashes(htmlentities($_POST["status"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `shipping_method` (  `description` , `shipping_fee` , `status` ) VALUES ( '" . $description . "' , '" . $shipping_fee . "' , '" . $status . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `shipping_method` SET  `description` =  '" . $description . "' , `shipping_fee` =  '" . $shipping_fee . "' , `status` =  '" . $status . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `shipping_method` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "shipping_method.php");
}
//Process action from ./edit-users.php
if ($cat == "users" || $cat_get == "users") {
	$username = addslashes(htmlentities($_POST["username"], ENT_QUOTES));
	$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
	$fullname = addslashes(htmlentities($_POST["fullname"], ENT_QUOTES));
	$phone = addslashes(htmlentities($_POST["phone"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$status = addslashes(htmlentities($_POST["status"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `users` (  `username` , `password` , `fullname` , `phone` , `email` , `status` ) VALUES ( '" . $username . "' , '" . md5($password) . "', '" . $fullname . "' , '" . $phone . "' , '" . $email . "' , '" . $status . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `users` SET  `username` =  '" . $username . "' , `password` =  '" . md5($password) . "' , `fullname` =  '" . $fullname . "' , `phone` =  '" . $phone . "' , `email` =  '" . $email . "' , `status` =  '" . $status . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		//if there is only one user, can't delete
		if ((counting("users", "id") == 1) || $id_get == $_COOKIE['admin_id']) {
			echo "Can not delete the last admin user or delete your self";
		} else {
			//else there are more than 2 users then can delete
			mysqli_query($link, "DELETE FROM `users` WHERE id = '" . $id_get . "' ");
		}
	}
	header("location:" . "users.php");
}