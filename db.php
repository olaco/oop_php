<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'todo');

class Database{

    public $conn;

    function __construct(){
        $this->db_conn();
    }

    public function db_conn(){
        
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(!$this->conn){
            echo 'Unable to reach database'. mysqli_error($this->conn);
        }else{
            // echo 'db Connected';
        }


    }

    // query

    public function query($sql){
        $result = mysqli_query($this->conn, $sql);

        $this->confirm_query($result);

        return $result;

    }


    // confirm query

    private function confirm_query($result){
        if(!$result){
            die('Query Failed');
        }

    }

    // escpae string

    public function escpae_string($string){
        $escaped = mysqli_escape_string($this->conn, $string);

        return $escaped;
    }


    // insert id
    public function insert_id()
    {
        return mysqli_insert_id($this->conn);
    }



    // END CLASS 
    
}



$db = new Database(); 
// $db->db_conn();
// $conn = mysqli_connect('localhost', 'root', '', 'todo');

// if(!$conn){
//     echo die('database not connected'). mysqli_error($conn);
// }else{
//     echo 'database connected';
// }


?> 