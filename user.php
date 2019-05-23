<?php
 
class User {

  //  assign array properties to object

  public $id;
  public $username;
  public $password;
  public $first_name;
  public $last_name;

    //  find all user 
    public static function get_all_users(){
    global $db;
    $result =  $db->query("SELECT * FROM info");
    return $result;

      
    }
     
    public static function get_user_by_id($user_id){

      global $db;
      $result_array = self::find_this_query("SELECT * FROM user WHERE id = $user_id");

      // ternary statement to replace if else

      return !empty($result_array) ? array_shift($result_array) : false;

    }


    // find query

    public static function find_this_query($sql){
      global $db;
      $result = $db->query($sql);
      $the_object_array = array();

      while($row = mysqli_fetch_array($result)){
        $the_object_array[] = self::instantiation($row);
      }

      return $the_object_array;
    }

    // verify user

    public static function verify_user($username, $password){
      global $db;

      $username = $db->escpae_string($username);
      $password = $db->escpae_string($password);

      $sql = "SELECT * FROM user WHERE ";
      $sql .= "username = '$username'";
      $sql .="AND password = '$password'";
      $sql .="LIMIT 1";
      $result_array = self::find_this_query($sql);

      // ternary to replace if else statement
      return !empty($result_array) ? array_shift($result_array) : false;
    }



    // method to use object instead of arrays
    public static function instantiation($the_record){

      $user_object = new self;

      foreach($the_record as $the_attribute => $value){
        if($user_object->has_the_attribute($the_attribute)){
          $user_object->$the_attribute = $value;
        }
      }

      return $user_object;
    }

    private function has_the_attribute($the_attribute){
       $object_properties= get_object_vars($this);

       return array_key_exists($the_attribute, $object_properties);
    }


     // create

     public function create(){
      global $db;
 
      $sql = "INSERT INTO users(username, password, first_name, last_name)";
     //  concatenate string t0 avoid long line of code
 
     $sql .= "VALUES('";
     $sql .= $db->escpae_string($this->username) . "', '";
     $sql .= $db->escpae_string($this->password) . "', '";
     $sql .= $db->escpae_string($this->first_name) . "', '";
     $sql .= $db->escpae_string($this->last_name) . "')";
 
 
     if($db->query($sql)){
         $this->id = $db->insert_id();
          return true;
     }else{
        return false;
     }
     
     }

    //  update 

    public function update(){
      global $db;

      $sql = "UPDATE user SET ";
      // concatenate string to avoid long line of code


      $sql .= "username= '" .$db->escpae_string($this->username) . "' ";
      $sql .= "password= '" .$db->escpae_string($this->password) . "' ";
      $sql .= "first_name= '" . $db->escpae_string($this->first_name) . "', ";
      $sql .= "last_name ='" .$db->escpae_string($this->last_name) ."' ";
      $sql .= " WHERE id= " .$db->escpae_string($this->id);

      $db->query($sql);
      return (mysqli_affected_rows($db->conn) == 1) ? true : false;
    }


    //  END CLASS
}



?>