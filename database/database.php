<?php

class Database{
    private $severName= "localhost";
    private $userName ="root";
    private $password = "1234";
    private $dbName ="blog2";

    private $mysqli = "";
    private $result =array();
    private $conn = false;

    public function __construct(){
        if(!($this->conn)){
            $this->mysqli = new mysqli($this->severName, $this->userName, $this->password, $this->dbName);
            $this->conn = true;
            if($this->mysqli->connect_error){
                array_push($this->result, $this->connect_error);
                return false;
            }
        }else {
            return true;
        }
    }
    // data security purpose
    public function get_safe_string($str){ // user function for data security
        if($str != ''){
            return mysqli_real_escape_string($this->mysqli, $str);
        }
    }
    // select function 
    public function select($table, $rows = "*", $join=null, $where=null, $order='DESC', $limit = null ){
        if($this->tableExists($table)){
            $sql = " SELECT $rows FROM $table ";
            if($join != null){
                $sql .= " JOIN $join ";
            }
            if($where != null){
                $sql .= " WHERE $where ";
            }
            if($order != null){
                $sql .= " ORDER BY $order ";
            }
            if($limit != null){
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start, $limit "; // for limit function and pagination
            }
            // echo $sql ;
            $query = $this->mysqli->query($sql);
            if($query){
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            }else {
                array_push($result, $this->mysqli->error);
                return false;
            }
        }
    }
    // for pagination
    public function pagination($table, $join=null, $where=null, $limit=null){
        if($this->tableExists($table)){
            $sql = " SELECT count(*) FROM $table ";
            if($join != null){
                $sql .= " JOIN $join ";
            }
            if($where != null){
                $sql .= " WHERE $where ";
            }
            $query = $this->mysqli->query($sql);

            $total_record = $query->fetch_array(); // fetch count how much array items
            $total_record = $total_record[0]; // array to normal number
            $total_page = ceil($total_record/$limit );  // fetch how many page

            $url = basename($_SERVER['PHP_SELF']);

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $output = "<nav aria-label='Page navigation example'> ";
            $output .= "<ul class='pagination justify-content-center'> ";
                // previous page
                if($page > 1){
                    $output .= "<li class='page-item' ><a class='page-link' href = '$url?page=".($page-1)." ' >Previous</a></li>";
                }
                // middle page
                if($total_record> $limit){ // if total record is bigger then limit value
                    for($i=1; $i <= 2; $i++){
                        if($i == $page){
                            $cls = 'active';
                        }else{
                            $cls = " ";
                    }
                    $output .= "<li class='page-item'><a class='page-link $cls'  href='$url?page=$i'>$i</a></li>";
                    }
                }
                // next page 
                if($page < $total_page){
                    $output .= "<li class='page-item'><a class='page-link' href = '$url?page=".($page+1)." ' >Next</a></li>";
                }

                $output .= "</ul>";
                $output .= " </nav>";
                return $output;
        } else {
            return false;
        }
    }

    // sql regular method
    public function sql($sql){
        $query= $this->mysqli->query($sql);
        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($result, $this->mysqli->error);
            return false ;
        }
    }

    //count total rows
    public function getRowsNumber($table, $join=null, $where=null, $order=null){
        if($this->tableExists($table)){
            $sql = "SELECT * FROM $table ";

            if($join != null){
                $sql .= " JOIN $join ";
            }
            if($where != null){
                $sql .= " WHERE $where ";
            }
            if($order != null){
                $sql .= " ORDER BY $order ";
            }
            $result = $this->mysqli->query($sql);
            $numRows = $result->num_rows;
            if($numRows > 0){
                while($row = $result->fetch_assoc()) 
                { 
                $data[] = $row; //incrementing by one each time 
                } 
                $i=0;
                foreach($data as $value){
                    $i++;
                }
                $this->result = $i;
            }else {
                array_push($result, $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }








    public function insert($table, $params=array(), $file_column = null, $file = null){

        if($this->tableExists($table)){
            if($file != null){
                $fileName = $file['name'];
                $fileSize =$file['size'];
                $fileTam = $file['tmp_name'];
                $allow = array("jpeg","jpg","png","svg","webp");
                $extension = explode('.',$fileName);
                $fileActExt = strtolower(end($extension));
                $fileNew = rand(). ".". $fileActExt; // rand function create  random image name
                $filePath ='uploads/'.$fileNew;
                if(in_array($fileActExt, $allow)){
                    if($file['size'] > 0 && $file['size'] < 5000000 && $file['error'] == 0){
                        move_uploaded_file($fileTam, $filePath);
                    }
                }
            }
            $table_columns = implode(', ', array_keys($params));
            $table_values = implode("', '", $params);
            // if have not upload image then work
            if($file_column == null && $file == null){
                $sql = "INSERT INTO $table ($table_columns) VALUES('$table_values')";

            }
            // if have upload image file then work
            if($file_column != null && $file !=null){
                $sql = "INSERT INTO $table ($table_columns, $file_column ) VALUES('$table_values', '$fileNew')";

            }
            // echo $sql;
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }

    }











    // Function to update row in database 
    public function update($table, $params=array() ,$where=null, $file_column = null, $file = null){
        if($this->tableExists($table)){
            if($file['name'] != null){
                $fileName = $file['name'];
                $fileSize =$file['size'];
                $fileTam = $file['tmp_name'];
                $allow = array("jpeg","jpg","png","svg","webp");
                $extension = explode('.',$fileName);
                $fileActExt = strtolower(end($extension));
                $fileNew = rand(). ".". $fileActExt; // rand function create  random image name
                $filePath ='uploads/'.$fileNew;
                if(in_array($fileActExt, $allow)){
                    if($file['size'] > 0 && $file['size'] < 5000000 && $file['error'] == 0){
                        move_uploaded_file($fileTam, $filePath);
                    }
                }
                $status = false;
            }
            $args = array();
            foreach($params as $key => $value){
                $args[] = "$key ='$value' "; // set $key ='$value' as a array
            }        
            $value = implode(', ', $args); // $value is a string // echo $value; for check purpose
      
            // print_r($file);
            if($file['name'] != null){
                $file_upload = "$file_column = '$fileNew' ";
                $sql = "UPDATE $table SET $value, $file_upload "; 
            }else{
            $sql = "UPDATE $table SET $value";               
            }
            if($where != null){
                $sql .= " WHERE $where ";
            }        
            // echo $sql;
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }

    // delete function
    public function delete($table, $where="null"){
        if($this->tableExists($table)){
            $sql = "DELETE FROM $table";
            if($where != null){
                $sql .= " WHERE $where";
            }
            // echo $sql;
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }

    // logout function
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
    }

    // database table check function
    public function tableExists($table){
        $sql = " SHOW TABLES FROM  $this->dbName LIKE '$table' "; // sql quarry
        $tableInDb = $this->mysqli->query($sql);
        if($tableInDb){
            if($tableInDb->num_rows == 1){ // if have one row in database  table 
               return true;
            }else{
                array_push($this->result, $table. "dose not exists in this database");
            }
        } 
    }
    // getResult method
    public function getResult(){
        $val = $this->result; // result is a array value
        $this->result = array();  //  result array is clean now
        return $val ;  // result  value send as a $val variable
    }
    // get Status massage
    public function getStatus($statusCode = 0){
        $status = [
            '0'=>'',
            '1'=>'Data Submission Successful',
            '2'=>'Data Delete Successful',
            '3'=>'Data Update Successful',
            '4'=>'Data Edit Successful',
            '5'=> 'User SignIn Successfully',
            '6'=> 'Username and password did not  match',
            '7'=> 'Username does not  match',
            '8'=>'Get Something Error'
        ];
        return $status[$statusCode];
    } 
    // close connection
    public function _destruct(){
        if($this->conn){ // if conn is true then it's mean query is run and now need to close this connection 
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }
        }else{
            return false;
        }
    }
}