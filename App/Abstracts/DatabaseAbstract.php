<?php

namespace App\Abstracts;


abstract class DatabaseAbstract {

    protected $dbname;

    protected $username;

    protected $password;

    protected $servername;

    protected $connection;

    protected $result;

    protected $query;


    abstract public function connect();

    abstract public function query($sql);

    abstract public function findAll();

    abstract public function findById($id);

    abstract public function deleteById($id);



}
