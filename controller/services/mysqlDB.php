<?php

class MySQLDB{
	protected $servername;
	protected $username;
	protected $password;
	protected $dbname;
	
	protected $db_connection;
	
	public function __construct ($servername,$username,$password,$dbname){
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
	}
	
	public function openConnection(){
		$this->db_connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		
		if ($this->db_connection->connect_error){
			die('Could not connect to '.$this->servername.' server');
		}
	}
	
	public function executeSelectQuery($sql){
		$this->openConnection();
		$query_result = $this->db_connection->query($sql);
		$result = [];
		if($query_result->num_rows > 0){
			while($row = $query_result->fetch_assoc()){
				$result[] = $row;
			}
		}
		$this->closeConnection();
		return $result;
	}
	
	public function executeNonSelectQuery($sql){
		$this->openConnection();
		$query_result = $this->db_connection->query($sql);
		$this->closeConnection();
		return $query_result;
	}
	
	public function closeConnection(){
		$this->db_connection->close();
	}
	
	public function escapeString($input){
		$this->openConnection();
		$result = $this->db_connection->real_escape_string($input);
		$this->closeConnection();
		return $result;
	}
}

$db = new MySQLDB("localhost","root","","ide");
?>