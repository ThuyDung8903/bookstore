<?php
//define path to upload images of product
define('UPLOAD_PATH', '../uploads/');
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);

function mysqli_result($res, $row = 0, $col = 0)
{
	$numrows = mysqli_num_rows($res);
	if ($numrows && $row <= ($numrows - 1) && $row >= 0) {
		mysqli_data_seek($res, $row);
		$response_row = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
		if (isset($response_row[$col])) {
			return $response_row[$col];
		}
	}
	return false;
}

function qSELECT($query, $object = NULL)
{
	global $link;
	$result = mysqli_query($link, $query);
	$return = [];
	if ($result) {
		$num = mysqli_num_rows($result);
		for ($i = 0; $i < $num; $i++) {
			if (!is_null($object)) {
				$row = mysqli_fetch_object($result, MYSQLI_ASSOC);
			} else {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			}
			$return[$i] = $row;
		}
	}
	return $return;
}

function counting($table, $what)
{
	global $link;
	$query = "SELECT COUNT(1) FROM " . $table;
	$result = mysqli_query($link, $query);
	$num = mysqli_result($result, 0, 0);
	return $num;
}

function getById($table, $id)
{
	$query = "SELECT * FROM " . $table . " WHERE id=" . $id . " ";
	$result = qSELECT($query);
	if ($result) return $result[0];
	else return $result;
}

function getAll($table)
{
	$query = "SELECT * FROM " . $table;
	$result = qSELECT($query);
	return $result;
}

function queryToSelect($table, $where, $operator, $zero_value, $key, $value, $key_selected)
{
	$ul = '<option value="' . $zero_value . '">Please select</option>';

	$query = "SELECT * FROM " . $table . " WHERE " . $where . $operator;
	echo $query;
	$result = qSELECT($query);
	foreach ($result as $row) {
		$ul .= '<option value="' . $row[$key] . '" ';
		$ul .= $key_selected == $row[$key] ? "selected" : "";
		$ul .= '>' . $row[$value] . '</option>';
	}
	return $ul;
}

//function to select all from a table and convert to html select, option
function queryAllToSelect($table, $zero_value, $key, $value, $key_selected)
{
	$ul = '<option value="' . $zero_value . '">Please select</option>';

	$query = "SELECT * FROM " . $table;
	echo $query;
	$result = qSELECT($query);
	foreach ($result as $row) {
		$ul .= '<option value="' . $row[$key] . '" ';
		$ul .= $key_selected == $row[$key] ? "selected" : "";
		$ul .= '>' . $row[$value] . '</option>';
	}
	return $ul;
}

//function to get all orders info, join multi table
function getAllOrders()
{
	$query = "SELECT orders.*, customer.username, shipping_method.description as shipping_method, shipping_method.shipping_fee, payment_method.description as payment_method, order_status.description as order_status FROM orders"

		. " INNER JOIN customer ON customer.id = orders.customer_id"

		. " INNER JOIN shipping_method ON shipping_method.id = orders.shipping_method_id"

		. " INNER JOIN payment_method ON payment_method.id = orders.payment_method_id"

		. " INNER JOIN order_status ON order_status.id = orders.order_status_id"

		. " ORDER BY orders.id DESC;";
	$result = qSELECT($query);
	return $result;
}

//function get a order by id
function getOrderById($id)
{
	$orders = getAllOrders();
	foreach ($orders as $order) {
		if ($order['id'] == $id) return $order;
	}
	return null;
}

//function to get orders detail by id
function getOrdersDetail($order_id)
{
	$query = "SELECT * FROM order_detail WHERE orders_id = $order_id";
	$result = qSELECT($query);
	return $result;
}

function upload_image()
{
	// Get reference to uploaded image
	$image_file = $_FILES["book_image"]['name'];
	$file_tmp = $_FILES["book_image"]["tmp_name"];
	if ($image_file != '') {
		$image_type = exif_imagetype($file_tmp);
		// Get file extension based on file type, to prepend a dot we pass true as the second parameter
		$image_extension = image_type_to_extension($image_type, true);
		// Create a unique image name
		$image_name = bin2hex(random_bytes(16)) . $image_extension;
	}
	move_uploaded_file(
		// Temp image location
		$file_tmp,
		// New image location
		UPLOAD_PATH . $image_name
	);
	return $image_name;
}

function redirect($url, $message)
{
	$_SESSION['message'] = $message;
	header("Location: " . $url);
	exit(0);
}