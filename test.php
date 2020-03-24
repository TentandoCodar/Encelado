<?php 
    require_once './env/Consts.php';
    $pdo = new PDO(DBCON, DBUSER, DBPASS);
    $password = "eusouumaluno";
    $email = "gustavosjn2013@gmail.com";

    $hashed_password = crypt($password, '$2a$07$usesomesillystringforsalt$');

    $prepare = $pdo -> prepare("INSERT INTO users set email=?, password=?, is_admin=?");

    $args = [$email, $hashed_password, false];

    $prepare -> execute($args);
?>