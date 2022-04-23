<?php 
require_once("../autoload/autoload.php");
class Category extends DB_business{
	public function __construct(){
		$this->_table='`category`';
		$this->_table2='`product`';
		$this->_key='categoryID';
		$this->_key3='categoryName';
		parent::__construct();
	}
}
 ?>