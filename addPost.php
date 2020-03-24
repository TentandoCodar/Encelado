<?php 
    require_once './env/Consts.php';
    require_once 'class/Posts.php';
    session_start();
    if(!$_SESSION['user']) {
        header('Location: login.html');
    }

    if(
        empty($_POST['title']) &&
        empty($_POST['description']) &&
        empty($_POST['subject']) &&
        empty($_POST['teacher']) &&
        empty($_POST['URL']) &&
        empty($_POST['class']) 
    ) {
        header('Location: error.php');
    }

    $post = new Post();
    $title = $_POST['title'];
    $description = $_POST['description'];
    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
    $URL = $_POST['URL'];
    $class = $_POST['class'];
    $data = $post -> create($title, $description, $subject, $teacher, $URL, $class);
    if($data) {
        echo "Tem data";
    }
    else {
        echo "Nao tem data";
    }
