<?php
//  scans the application looking for undeclared object

function classAutoLoader($class){

    $class = strtolower($class);
    
    $the_path = "/{$class}.php";

    if(file_exists($the_path) && !class_exists($class)) {

        include $the_path;

    }else{

        die("The file name {$class}.php was not found");
    }

     

}


spl_autoload_register('classAutoLoader');


// custom function to redirect

 function redirect($location){

    header("Location: $location");
}
?>