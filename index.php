<?php ob_start();?>
<?php require_once 'init.php';?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>CMS</title>

</head>
<body>
<header>
        <div class="logo">LOGO</div>

        <nav class="nav">
                <ul>

                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="admin.php">Admin</a></li>                     
                    </ul>
        </nav>

         </header>


<h3> ADMIN</h3>


<th>
    <?php
    
  /*  $sql = " SELECT * FROM user";
    $result = $db->query($sql);
    while($row =  $row = mysqli_fetch_array($result) ){
        echo $row['password'] .'<br>';

    } */

        $users = User::get_all_users();
        foreach($users as $user){
            $user_object = json_decode(json_encode($user));
            echo $user_object->task .'<br>';
            // echo $user->task .'<br>';
//
        } 






        // instantiating User / insert

/*$user = new User();

$user->username = 'Brandon';
$user->password = '98q7y';
$user->first_name = 'Gimlek';
$user->last_name = 'Jonhy';

$user->create(); 

*/




     ?>



<tr>

</tr>

</th>



<?php


?>

</body>
</html>