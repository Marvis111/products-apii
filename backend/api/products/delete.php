<?php


include '../../models/Products.php';

$products = new Products();

$productIds = $_POST['productIDs'];

$tracts = false;

foreach ($productIds as $productId) {
    echo $productId;
    if($products->deleteById($productId))
        $tracts = true;
    else
        $tracts = false;
};

if ($tracts) {
    echo json_encode(['success' => true]);
}else{
    echo json_encode(['success' => false]);
}

