<?php 
require_once("../autoload/autoload.php");
	class Product extends DB_business
	{
		public function __construct()
		{
			$this->_table = '`product`';
			$this->_table2 = '`category`';
			$this->_key = '`productID`';		
			$this->_key2  = '`categoryID`';
			$this->_key3 = '`productCode`';

			parent::__construct();
		}
	}

 ?>