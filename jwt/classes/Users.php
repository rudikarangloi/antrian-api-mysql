<?php

class Users{
	
	private $name;
	private $email;
	private $password;
	private $user_id;
	private $project_name;
	private $description;
	private $status;
	
	private $conn;
	private $table_name;
	
	public function __construct($db){
		$this->conn = $db;
		$this->users_tbl = "tbl_users";
		$this->projects_tbl = "tbl_projects";
		
	}
		
	
	
	
	
}





?>