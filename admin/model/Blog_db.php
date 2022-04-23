<?php
require_once("../autoload/autoload.php");
class Blog extends DB_business{
    public function __construct(){
        $this->_table='`blog`';
        $this->_key='blog_id';
        parent::__construct();
    }
}
?>