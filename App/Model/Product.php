<?php

namespace App\Model;

use App\Model\Database;

use App\Abstracts\ProductAbstract;

class Product extends Database {

    protected $table = 'product';
    
    protected $initId = true;

    protected $columns = array(
        "title" => "Not null",
        "sku" => "Not null",
        "price" => "Not null",
        "special_name" => "Not null",
        "size" => "Not null",
        "quantity" => "Not null",
        "productType" => "Not null",
        "productTypeDetails" => "Not null"

    );

    function __construct(){

        parent::connect();

        return $this;
    }




}