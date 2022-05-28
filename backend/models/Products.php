<?php

include_once 'Database.php';

class Products extends Database

{
    protected $table = 'products';
    
    function __construct(){

        parent::connect();

        return $this;

    }



}
