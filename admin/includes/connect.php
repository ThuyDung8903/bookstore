<?php
$localhost = "localhost";
$user = "root";
$password = "";
$link = mysqli_connect($localhost, $user, $password);
mysqli_select_db($link, "bookstore");
mysqli_query($link, "SET CHARACTER SET utf8");