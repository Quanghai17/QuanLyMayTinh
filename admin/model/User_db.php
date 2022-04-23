<?php 
	require_once("../autoload/autoload.php");
	class User extends DB_business
	{
		public function __construct()
		{
			$this->_table = '`user`';		
			$this->_key  = '`userID`';
			$this->_key3 = '`email`';
			parent::__construct();
		}
	}

 ?>