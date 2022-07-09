<?php

use App\Controller\ProductController;



switch ($_SERVER['REQUEST_URI']) {
    case URL_ROOT."/":
        return ProductController::index();
        break;
    case URL_ROOT."/add-product":
        return ProductController::add();
        break;
    case URL_ROOT."/new-product":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode(ProductController::new());
        }
        break;
        case URL_ROOT."/all-products":
            echo json_encode(ProductController::all());
            break;
        case URL_ROOT."/delete-product":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo (ProductController::delete());
            }
            break;
    default:
        echo "404";
        break;
}