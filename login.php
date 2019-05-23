<?php require_once 'init.php'; ?>
<?php
if($session->is_signed_in()){

    redirect('index.php');
}

if(isset($_POST['submit'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    //method to check database User 

    $user_found = User::verify_user($username, $password);


    if($user_found){
        $session->login($user_found);
        redirect('admin.php');


    }else{
        $message = 'Passage or username incorrect';
    }
}

// if nothing is typed include 

else{

    $message = '';
    $username = "";
    $password = "";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>
<body>

<h3>Login</h3>
<div class="form-wrap">

<h4><?php echo $message; ?></h4>

<form action="" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="">
    <label for="password">Password</label>
    <input type="text" name="password">

    <input type="submit" value="Submit" name="submit">



</form>

</div>
    
</body>
</html>