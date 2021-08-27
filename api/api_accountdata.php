<?php

include_once '../db.php';

$user_id = $_GET['email'];

$query = "SELECT 
    `orders`.`order_date`,
    `orders`.`total_price`,
    `orders`.`delivery_address`,
    `orders`.`delivery_status`
    FROM orders
    WHERE `orders`.`user_id`='$user_id'";




?>