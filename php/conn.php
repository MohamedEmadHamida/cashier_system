<?php
// Open a new connection to the MySQL server
$mysqli = mysqli_connect('localhost', 'root', '', 'CoffeeShopDB');


if ($mysqli) {
    //    echo "Connection successfully";

} else {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}