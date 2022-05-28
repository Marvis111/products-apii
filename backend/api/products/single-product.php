<?php


include '../../models/Products.php';

$products = new Products();

$productId = $_REQUEST['productId'] ?? null ;

if ($productId != null){
echo json_encode($products->findById($productId)->getResult());
} else {
echo json_encode(['success' => false]);
 }