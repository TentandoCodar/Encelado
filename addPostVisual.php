<?php 
    session_start();
    if(!$_SESSION['user']) {
        header('Location: login.html');
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
    <form action="addPost.php" method="POST">
        <label for="">Titulo</label>
        <input name="title">
        <label for="">Descrição</label>
        <input name="description">
        <label for="">Assunto</label>
        <input name="subject">
        <label for="">Professor</label>
        <input name="teacher">
        <label for="">URL</label>
        <input name="URL">
        <label for="">Sala</label>
        <input name="class">
        <button type="submit" class="LoginButton">Adicionar</button>
    </form>
</body>
</html>