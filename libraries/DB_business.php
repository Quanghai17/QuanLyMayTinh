<?php 
//require "DB_driver.php";
class DB_business extends DB_driver{
	protected $_table='';
	protected $_table2='';
	protected $_key='';
	protected $_key2 = '';
	protected $_key3 = '';
	public function __construct(){
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	//insert
	public function add($data){
		return parent::insert($this->_table,$data);
	}
	public function edit($data,$id){
		return parent::update($this->_table,$data,$this->_key."="."'".$id."'");
	}
	public function list(){
		return parent::select($this->_table);
	}
	public function list_id($id){
		return parent::select_id($this->_table,$this->_key."="."'".$id."'");
	}
	public function del($id)
	{
		return parent::delete($this->_table,$this->_key."="."'".$id."'");
	}
	public function limit($name)
	{
		return parent::fetchOne($this->_table,$this->_key3."="."'".$name."'");
	}
	public function limit2($name)
	{
		return parent::fetchOne($this->_table2,$this->_key."="."'".$name."'");
	}
	public function list_join(){
		return parent::select_join2($this->_table,$this->_table2,$this->_table.'.'.$this->_key2."=".$this->_table2.'.'.$this->_key2);
	}
	// public function paging($id,$total,$page,$row ,$pagi)
	// {
	// 	return parent::fetchJones($this->_table,$this->_key2."="."'".$id."'",$total,$page,$row ,$pagi);
	// }
}
//$db=new DB_business;
//$db->add(array('`categoryID`'=>'','`categoryName`'=>"Apple"));
 ?>