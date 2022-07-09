<?php

namespace App\Controller;

use App\Model\Product;


class ProductController  {

    public function index(){
        include __DIR__."/../views/index.php";
    }

    public function add(){

        include __DIR__."/../views/add-product.php";


    }
    public function all(){
        $products = new Product();
        
        return $products->findAll()->getResult();
    }

    public function new(){

        $products = new Product();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $_POST['productTypeDetails'] = json_encode($_POST['productTypeDetails']);

            if($products->insert($_POST)){
                return [
                    "success" => true
                ];
            }else{
                return [
                    "success" => FALSE
                ];
            }

    }

    }
    public function delete(){
        $products = new Product();

        $productIds = $_POST['productIDs'];

        $tracts = false;

        foreach ($productIds as $productId) {
            
            if($products->deleteById($productId))
                $tracts = true;
            else
                $tracts = false;
        };

        if ($tracts) {
    return json_encode(['success' => true]);
        }else{
    return json_encode(['success' => false]);
        }


    }

}