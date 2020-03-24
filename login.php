<?php 
    require 'class/User.php';
    require 'env/Consts.php';
    session_start();
    if(
        isset($_POST['email']) && 
        isset($_POST['password']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password'])
    ) {
        $user = new User();
        $compare = $user -> login($_POST['email'],$_POST['password']);
        if($compare) {
            $_SESSION['user'] = true;
            header('Location: posts.php');
        }
        else {
            header('Location: error.php');
        }
    }
    else {
        header('Location: error.php');
    }
?>