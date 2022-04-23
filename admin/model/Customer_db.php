<?php
	require_once("../autoload/autoload.php");
	class Customer extends DB_business
	{
		public function __construct()
		{
			$this->_table = '`customer`';
			$this->_key  = '`customer_id`';
			parent::__construct();
		}
	}

 ?>