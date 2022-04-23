<?php 
    require_once("Database.php");
    class DB_driver extends Database
    {         
            
        public function insert($table, array $data)
        {
            //code
            $sql = "INSERT INTO {$table} ";
            $columns = implode(',', array_keys($data));
            $values  = "";
            $sql .= '(' . $columns . ')';
            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $values .= "'". mysqli_real_escape_string($this->__conn,$value) ."',";
                } else {
                    $values .= mysqli_real_escape_string($this->__conn,$value) . ',';
                }
            }
            $values = substr($values, 0, -1);
            $sql .= " VALUES (" . $values . ')';
            // _debug($sql);die;
            mysqli_query($this->__conn, $sql) or die("Lỗi  query  insert ----" .mysqli_error($this->__conn));
            return mysqli_insert_id($this->__conn);
        }

        public function update($table,$data,$where)
        {
            $sql='';
            foreach ($data as $key =>$value){
                $sql .="$key ='".$value."',";
            }
            $sql='Update '.$table. ' Set '.trim($sql,','). ' Where '.$where;

            if ($this->__conn->query($sql) === TRUE)
            {
                    return $this->__conn;
                
            } else 
            {
                echo $this->__conn->error;
            }
        }
        //Xóa 1 vs đk where
        public function delete ($table ,  $Where )
        {
            $sql = "DELETE FROM {$table} WHERE {$Where} ";

            mysqli_query($this->__conn,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->__conn));
            return mysqli_affected_rows($this->__conn);
        }
        
        //Xóa nhiều pt trong mảng vs đk where
        public function deletewhere($table,$data = array())
        {
            foreach ($data as $id)
            {
                $id = intval($id);
                $sql = "DELETE FROM {$table} WHERE id = $id ";
                mysqli_query($this->__conn,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->__conn));
            }
            return true;
        }

        //Thực thi truy vấn sql
        public function fetchsql( $sql )
        {
            $result = mysqli_query($this->__conn,$sql) or die("Lỗi  truy vấn sql " .mysqli_error($this->__conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        } 

        //Thực thi truy vấn sql 
        public function fetchsql_2( $sql )
        {
            // $result = mysqli_query($this->__conn,$sql) or die("Lỗi  truy vấn sql " .mysqli_error($this->__conn));
            if ($this->__conn->query($sql) === TRUE)
            {
                    return $this->__conn;
                
            } else 
            {
                echo $this->__conn->error;
            }
        } 

        public function select_id($table , $where )
        {
            $sql = "SELECT * FROM {$table} WHERE $where";
            $result = mysqli_query($this->__conn,$sql) or die("Lỗi  truy vấn fetchID " .mysqli_error($this->__conn));
            return mysqli_fetch_assoc($result);
        }
        //hàm kiểm tra có tồn tại không
        public function fetchOne($table , $query)
        {
            $sql  = "SELECT * FROM {$table} WHERE ";
            $sql .= $query;
            $sql .= "LIMIT 1";
            $result = mysqli_query($this->__conn,$sql) or die("Lỗi  truy vấn fetchOne " .mysqli_error($this->__conn));
            return mysqli_fetch_assoc($result);
        }
        public function ckeckIsset($sql)
        {
            $result = mysqli_query($this->__conn,$sql) or die("Lỗi  truy vấn fetchOne " .mysqli_error($this->__conn));
            return mysqli_fetch_assoc($result);
        }

        public function deletesql($table ,$sql)
        {
            $sql = "DELETE FROM {$table} WHERE " .$sql;
            // _debug($sql);die;
            mysqli_query($this->__conn,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->__conn));
            return mysqli_affected_rows($this->__conn);
        }  

         public function select($table)
        {
            $sql = "SELECT * FROM $table WHERE 1" ;
            $result = mysqli_query($this->__conn,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->__conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        public function select_join2($table1,$table2,$where)
        {
            //SELECT * FROM `products` JOIN `categories` ON `products`.`categoryID`=`categories`.`categoryID`
            $sql = 'Select * From '.$table1.' Join '.$table2. ' on '.$where;
            //echo $sql;
            $this->__result=$this->__conn->query($sql);//cau lenh phai nho
            if($this->__result->num_rows==0)
            {
                $data=0;
            }else{
                while($row=$this->__result->fetch_assoc()){
                    $data[]=$row;
                }
            }
            return $data;
        }

        public function sort_desc_limit($table, $where, $field, $number)
        {
            $sql = "SELECT * FROM $table WHERE $where ORDER BY $field DESC LIMIT $number";
            $result = mysqli_query($this->__conn,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->__conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }
        //  public  function fetchJones($table,$where,$total = 1,$page,$row ,$pagi = true )
        // {
        //     //table: Bảng muốn phân trang
        //     //sql: Câu truy vấn sql
        //     //total: Tổng số bản ghi(sản phẩm)
        //     //page: Tên số trang trong phần di chuyển trang
        //     //row: Số bản ghi(sản phẩm) trong 1 trang
        //     //pagi: Có muốn phân trang hay không
        //     $sql = "SELECT * FROM {$table} WHERE $where";
        //     $total = count(fetchsql($sql));
        //     $data = [];

        //     if ($pagi == true )
        //     {
        //         $sotrang = ceil($total / $row);
        //         $start = ($page - 1 ) * $row ;
        //         $sql .= " LIMIT $start,$row ";
        //         $data = [ "page" => $sotrang];
              
               
        //         $result = mysqli_query($this->__conn,$sql) or die("Lỗi truy vấn fetchJone ---- " .mysqli_error($this->__conn));
        //     }
        //     else
        //     {
        //         $result = mysqli_query($this->__conn,$sql) or die("Lỗi truy vấn fetchJone ---- " .mysqli_error($this->__conn));
        //     }
            
        //     if( $result)
        //     {
        //         while ($num = mysqli_fetch_assoc($result))
        //         {
        //             $data[] = $num;
        //         }
        //     }
            
        //     return $data;
        // }

    }
   
?>