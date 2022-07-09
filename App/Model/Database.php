<?php

namespace App\Model;

use App\Abstracts\DatabaseAbstract;

class Database extends DatabaseAbstract {

    protected $connection;

    protected $result;

    protected function createTable(){
        $sql = "CREATE TABLE IF NOT EXISTS $this->table (";
        if ($this->initId) {
            $sql .= "id int(250) auto_increment primary key not null ,";
        }
        foreach ($this->columns as $column => $properties) {
            $sql .= $column." varchar(50) ".$properties.",";
        }
        $sql .="created_at date )";
        try {
            $query = mysqli_query($this->connection, $sql);
             return $query ? true : false;
        } catch (Exception $e) {
            print_r($e);
            return null;
        }
        }

    public function connect(){
        $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }else {
            $this->connection = $conn;    
            $this->createTable();    
        }
      }
    
      public function query($sql){
        $query = mysqli_query($this->connection,$sql);
       return  $this->loadResult($query);
      
    }
    #setter - setter function to set result of query
    private function loadResult($query){
        if ($query) {
            $this->result = $query;
            return $this;
        }else{
            $this->result = null;
            return false;
        }
    }
    
    public function findAll(){
        $sql = "SELECT * FROM ".$this->table;
        $query = mysqli_query($this->connection,$sql);
        return $this->loadResult($query);
    }  
    #getter function to retrieve data 
    public function getResult(){
        $result=[];
       if ($this->result != null) {
           # code...
           while ($row = mysqli_fetch_assoc($this->result)) {
                    array_push($result, $row);
           }
           return $result;
       }else{
           return false;
       }
    }
    
    public function findById($id){
        $sql = "SELECT * FROM $this->table WHERE id = '$id' ";
        $query = mysqli_query($this->connection,$sql);
        return $this->loadResult($query);
    }
    
    public function deleteById($id){
        $sql = "DELETE FROM $this->table WHERE id ='$id' ";
        $query = mysqli_query($this->connection,$sql);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }

    public function insert(Array $postDataArray){
        $data = "";
        foreach ($postDataArray as $d) {
            $data .= "'$d',";
        }
        $currentTime = date("Y-M-D h:m:a");
        $data .= "'$currentTime'";
        $colums =  $this->loadcolumns();
        $sql = "INSERT INTO $this->table ($colums)
        VALUES ($data)
         ";
         
         return $this->query($sql);
        
    }
    protected function loadcolumns(){
        $cols= "";
        foreach ($this->columns as $col => $props) {
            $cols .= $col.",";
        }
        $cols .="created_at";

        return $cols;

    }
    
}
