<?php
class Users{
  
    // database connection and table name
    private $conn;
    private $table_name = "users";
  
    // object properties
    public $id;
    public $username;
    public $password;
    public $email;
  
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	// read products
	function read(){
	  
		// select all query
		$query = "SELECT
					*
				FROM
					" . $this->table_name;
	  
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	  
		// execute query
		$stmt->execute();
	  
		return $stmt;
	}
	function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                username=:username, password=:password, email=:email";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->email=htmlspecialchars(strip_tags($this->email));

  
    // bind values
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":email", $this->email);

  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
}

?>