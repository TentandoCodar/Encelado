<?php 
    session_start();
    if(!$_SESSION['user']) {
        header('Location: login.html');
    }
    require_once 'Env/Consts.php';
    require_once 'class/Posts.php';
    $post = new Post();
    $posts = [];
    if(empty($_GET['Search'])) {
        $posts = $post -> index();
    }
    else {
        $posts = $post -> search($_GET['SearchOption'], $_GET['Search']);
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Posts</h1>
    <form action="posts.php" method="get">
        <label>Pesquise:</label>
        <input name="Search">
        <select  name="SearchOption">
            <option value="title">Titulo</option>
            <option value="subjects">Assunto</option>
            <option value="teacher">Professor</option>
        </select>
        <button>Pesquisar</button>
    </form>
    <?php 
        if(!$posts): 
            echo "Nao tem conteudo";
        else:
            foreach ($posts as $post): 

    ?>
    <div>
        <h1><?php echo $post['title'];?></h1>
    </div>
    <?php
        endforeach;
        endif;
    ?>
</body>
</html>