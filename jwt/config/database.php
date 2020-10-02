<?php
class Database{
	
	private $hostname;
	private $dbname;
	private $username;
	private $password;
	private $conn;
	
	public function connect(){
			$this->hostname = "localhost";
			$this->dbname = "demo";
			$this->username = "proiso";
			$this->password = "ra11-19";
		
	}
	
}


?>