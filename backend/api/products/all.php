<?php

include '../../models/Products.php';

$products = new Products();


echo json_encode($products->findAll()->getResult());