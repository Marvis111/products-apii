<?php

include '../../models/Products.php';

$products = new Products();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $special = $_POST['special_name'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $switch = $_POST['switch'];

   // $errors = [];
   $sql = "INSERT INTO products (title,price,special_name,size,quantity,switch)
    VALUES('$title','$price','$special','$size','$quantity','$switch')
    ";

    if( $products->query($sql) )
    echo json_encode(['success' => true]);
    else
    echo json_encode(['success' => false]);
}
else {
    echo 'not allowed..';
}