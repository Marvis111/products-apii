<?php

include '../../models/Products.php';

$products = new Products();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $title = $_POST['title'];
     $price = $_POST['price'];
    $special = $_POST['specialName'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
     $productType = $_POST['productType'];
   //  $data = json_decode($_POST);
    $productTypeDetails = json_encode($_POST['productTypeDetails']);
   $sql = "INSERT INTO products (title,price,special_name,size,quantity,productType,productTypeDetails)
     VALUES('$title','$price','$special','$size','$quantity','$productType','$productTypeDetails')
    ";
   if( $products->query($sql) )
       echo json_encode(['success' => true]);
       else
        echo json_encode(['success' => false]);
}
else {
    echo json_encode(['success' => false]);
}