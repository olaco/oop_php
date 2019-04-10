<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'todo');

class Database{

    public $conn;

    function __constructor(){
        $this->db_conn();
    }

    public function db_conn(){
        
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(!$this->conn){
            echo 'Unable to reach database'. mysqli_error($conn);
        }else{
            echo 'db Connected';
        }


    }

    
}

$db = new Database();
$db->db_conn();

?> 