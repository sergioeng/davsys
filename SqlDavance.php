<?php

include ("Common/SQL/SqlClasses.php");

//------------------------------------------------------------------------
// PEST CLOUD DATABASE INFO
//------------------------------------------------------------------------

class SqlDavanceDbInfo extends SqlDbInfo {
	
	public function __construct()
	{
		$this->HOST_NAME     = 'localhost';
		$this->DATABASE_NAME = 'dermavance';
		$this->DB_USERNAME   = 'root';
		$this->DB_PASSWORD   = 'worp33';
	}
}

//------------------------------------------------------------------------
// PEST CLOUD SQL HELPER
//------------------------------------------------------------------------

class SqlDavanceHelper extends SqlHelper {

	public function __construct()
	{
		parent::__construct(new SqlDavanceDbInfo);
	}
}

?>
