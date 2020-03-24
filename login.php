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
        $compare = $user -> login($_POST['email'], crypt($_POST['password'],'$2a$07$usesomesillystringforsalt$' ));
        /*if($compare) {
            echo "True";
        }
        else {
            echo "False";
        }*/
        var_dump($compare);
    }
    else {
        header('Location: error.php');
    }
?>