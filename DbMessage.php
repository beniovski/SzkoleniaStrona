<?php

class DbConnection
{
	private $adress  = "sql.opole.nazwa.pl";
	private $login = "opole_33";
	private $dbName= "opole_33";
	private $pass ="9obICdMLXh";
	
	public $con;
	
	function __construct()
	{
		$this->con = new mysqli($this->adress,$this->login,$this->pass,$this->dbName);
		$this->DbConectionError($this->con);
				
	}	
	private function DbConectionError($con)
	{
		if($con->connect_error)
			die("conection failed");		
	}
	
	public function GetConString()
	{
		return  $this->con;
	}
	
}

class DbOperation
{
	private $dbInstance;
	private $table = "Message";

	
	function __construct()
	{
		$this->dbInstance = new DbConnection();
	}
	
	public function insert($name, $lastname, $phone, $email, $message)
	{
		$sql = "INSERT INTO Message(Name, LastName, Email, Phone, Message)VALUES('$name','$lastname','$phone','$email', '$message')";
		$func = $this->dbInstance->GetConString()->query($sql);			
		
	}
	
	
	
}
