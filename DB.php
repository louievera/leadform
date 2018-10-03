<?php

class DB
{
	private $con;
	public function __construct()
    {
		$host 	= "localhost";
		$dbname = "proj_db";
		$user 	= "root";
		$pass 	= "";
		try
		{
			$this->con = new PDO("mysql:host=;dbname=$dbname", $user, $pass);	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
	}

	
	public function insert($table, $data)
	{
		$columns = implode("," ,array_keys($data));
		$values = implode('","',array_values($data));

		$sql = 'INSERT INTO '.$table.'('.$columns.') 
					VALUES("'.$values.'")';

		try{
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->con->exec($sql);	
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		
	}
	
}
?>
