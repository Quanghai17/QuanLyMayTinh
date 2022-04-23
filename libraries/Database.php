<?php 
class Database{
    //Khai bao cac thuoc tinh
    private $__servername = "localhost";
    private $__username = "root";
    private $__password = "";
    private $__dbname = "quanlymaytinh";
    public $__conn=NULL;
    //ket noi csdl
    public function __construct(){
        $this->__conn=$this->connect($this->__servername, $this->__username, $this->__password, $this->__dbname);
    }
    private function connect($host,$user,$pass,$db){
        //Create connection
        if(!$this->__conn){
            $this->__conn = new mysqli($host,$user,$pass,$db);
            $this->__conn->set_charset("UTF8");
            $this->__conn->query("SET collation_connection=utf8_unicode_ci");
            // Check connection
            if ($this->__conn->connect_error) {
            throw new Exception("Connection failed: " . $this->__conn->connect_error);
            }
            return $this->__conn;
        }

    }
    //Huy ket noi
    private function disconnect(){
        if($this->__conn){
            $this->__conn->close();
        }
    }
    public function __destruct(){
        $this->disconnect();
    }
}

 ?>