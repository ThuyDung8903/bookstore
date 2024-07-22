<?php
$localhost = "localhost";
$user = "root";
$password = "";
$database = "bookstore";
$connect = mysqli_connect($localhost, $user, $password, $database);
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
    global $connect;
    $result = mysqli_query($connect, $query);
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
    global $connect;
    $query = "SELECT COUNT(1) FROM " . $table;
    $result = mysqli_query($connect, $query);
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