<?php

class Database{

  // variable declaration
  private $hostname;
  private $dbname;
  private $username;
  private $password;
  private $conn;

  public function connect(){
     // variable initialization
    	 
	 $this->hostname = "localhost";
	 $this->dbname = "demo";
	 $this->username = "proiso";
	 $this->password = "ra11-19";

     $this->conn = new mysqli($this->hostname, $this->username,  $this->password, $this->dbname);
     if($this->conn->connect_errno){
       // true => it means that it has some error
       print_r($this->conn->connect_error);
       exit;
     }else{
       // false => it means no error in connection details
       return $this->conn;
       //echo "--successful connection--";
       //print_r($this->conn);
     }
  }
}

//$db = new Database();
//$db->connect();

 ?>
