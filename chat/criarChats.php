<?php
    session_start();
    include "../conexao.php";
    include "../config.php";
    $idUsuario = $_SESSION['id'];
    $nomeUsuario = $_SESSION['nomeUser'];
    
    if($_POST["nomeChat"] == "" || null && $_POST['temaChat'] == "" || null ){
        header("Location: index.php?code=3099");
        session_destroy();
        exit();
    }
    $nomeChat = $_POST['nomeChat'];
    $temaChat = $_POST['temaChat'];
    $sql = "SELECT * FROM chats WHERE nomeChat = '$nomeChat';";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($result); 
    if($row>=1){
        header("Location: index.php?code=2813");
        exit();
    }else{
        $sql="INSERT INTO chats(idCriador, nomeChat, TemadoChat)VALUE('$idUsuario', '$nomeChat', '$temaChat')";
        $result = mysqli_query($conexao, $sql);
        header("Location: index.php?code=2313");
        exit();

    }


?>