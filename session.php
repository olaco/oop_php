<?php
//  to login, logout and track user session
class Session{

    private $signed_in = false;
    public $user_id;



   function __construct(){
    session_start();
    $this->check_login();
   }

    // getters method   
    public function is_signed_in(){

    return $this->signed_in;
   }

//    function to login user
    public function login($user){
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }

    // logout user
    public function logout(){
        unset($this->user_id );
        unset($_SESSION['user_id']);
        $this->signed_in =false;
    }


   private function check_login(){
       if(isset($_SESSION['user_id'])){
           $this->user_id = $_SESSION['user_id'];
           $this->signed_in = true;
       }else{
           unset($this->user_id);
           $this->signed_in = false;
       }

   }




   

}
// end of class
$session= new Session();




?>