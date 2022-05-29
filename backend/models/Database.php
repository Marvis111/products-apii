<?php

class Database {

  //  protected $db = 'products';

    protected $dbname = 'products';

    protected $username = 'root';

    protected $password ='';

    protected $servername = 'localhost';

    protected $connection;

    protected $result;

    protected $query;


  public function connect(){

    $conn = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);

    if (!$conn) {

      die("Connection failed: " . mysqli_connect_error());

    }

      $this->connection = $conn;

  }

  public function query($sql){
    $query = mysqli_query($this->connection,$sql);
   return  $this->loadResult($query);
  
}

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
    $sql = "DELETE * FROM $this->table WHERE id ='$id' ";
    $query = mysqli_query($this->connection,$sql);
    if ($query) {
        return true;
    }else{
        return false;
    }
}




}