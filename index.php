<?php 
    require './env/Consts.php';
    require './class/Posts.php';
    session_start();
    $post = new Post();
    var_dump($post -> index());
?>