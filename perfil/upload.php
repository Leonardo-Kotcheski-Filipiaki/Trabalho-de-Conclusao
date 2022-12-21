<?php
session_start();
$user = $_SESSION['userName'];
$id = $_SESSION['id'];
include '../conexao.php';
include '../config.php';
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST["descriptionChange"])){
    $descricao = $_POST["descriptionChange"];
    if($descricao != "" || $descricao != null){
        if($_SESSION['sessionType'] == 'LoginWithTGE'){
            $query = "UPDATE usuariostge SET descricao = '$descricao' where usuario = '$user'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == 'LoginWithDiscord'){
            $query = "UPDATE usuariosdiscord SET descricao = '$descricao' where idDiscord = '$id'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == 'LoginWithGoogle'){
            $query = "UPDATE usuariosgoogle SET descricao = '$descricao' where idGoogle = '$id'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == 'LoginWithSteam'){
            $query = "UPDATE usuariossteam SET descricao = '$descricao' where idSteam = '$id'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else{
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }
    }   
}

if(isset($_POST["alterarSenha"])){
    $senha = $_POST["alterarSenha"];
    if($senha != "" || $senha != null){
        if($_SESSION['sessionType'] == 'LoginWithTGE'){
            $query = "UPDATE usuariostge SET senha = md5('$senha') where usuario = '$user'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == 'LoginWithDiscord'){
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }
    }
}

if(isset($_POST["alterarNome"])){
    $nome = $_POST["alterarNome"];
    if($nome != "" || $nome != null){
        if($_SESSION['sessionType'] == 'LoginWithTGE'){
            $query = "UPDATE usuariostge SET usuario = '$nome' where usuario = '$user'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
            $_SESSION['userName'] = $nome;
            $user = $nome;
        }else if($_SESSION['sessionType'] == 'LoginWithDiscord'){
            $query = "UPDATE usuariosdiscord SET nomeUser = '$nome' where idDiscord = '$id'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
            $_SESSION['userName'] = $nome;
        $user = $nome;
        }else if($_SESSION['sessionType'] == 'LoginWithGoogle'){
            $query = "UPDATE usuariosgoogle SET nomeUser = '$nome' where idGoogle = '$id'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
            $_SESSION['userName'] = $nome;
        $user = $nome;
        }else if($_SESSION['sessionType'] == 'LoginWithSteam'){
            $query = "UPDATE usuariossteam SET nomeUser = '$nome' where idSteam = '$id'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
            $_SESSION['userName'] = $nome;
        $user = $nome;
        }else{
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }
    }
}

if(isset($_POST["alterarEmail"])){
    $email = $_POST["alterarEmail"];
    
    if($email != "" || $email != null){
        if($_SESSION['sessionType'] == 'LoginWithTGE'){
            $query = "UPDATE usuariostge SET email = '$email' where usuario = '$user'";
            mysqli_query($conexao, $query);
            header("Location:".URL_BASE."/perfil/seguranca.php");
       
    }
}
else{
    header("Location:".URL_BASE."/perfil/modificarPerfil.php?=2");
}
}
if(isset($_POST{"jogosFav"})){
    $imageName = $_POST["jogosFav"];

    if($_SESSION['sessionType'] == "LoginWithTGE"){
        $sql_code = "UPDATE usuariostge SET jogofav1 = '$imageName' WHERE usuario = '$user'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == "LoginWithDiscord"){
        $sql_code = "UPDATE usuariosdiscord SET jogofav1 = '$imageName' WHERE idDiscord = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == "LoginWithGoogle"){
        $sql_code = "UPDATE usuariosgoogle SET jogofav1 = '$imageName' WHERE idGoogle = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == 'LoginWithSteam'){
        $sql_code = "UPDATE usuariossteam SET jogofav1 = '$imageName' WHERE idSteam = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }
        else{
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }



}
if(isset($_POST{"jogosFav2"})){
    $imageName = $_POST["jogosFav2"];
    if($_SESSION['sessionType'] == "LoginWithTGE"){
        $sql_code = "UPDATE usuariostge SET jogofav2 = '$imageName' WHERE usuario = '$user'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == "LoginWithDiscord"){
        $sql_code = "UPDATE usuariosdiscord SET jogofav2 = '$imageName' WHERE idDiscord = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == "LoginWithGoogle"){
        $sql_code = "UPDATE usuariosgoogle SET jogofav2 = '$imageName' WHERE idGoogle = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == 'LoginWithSteam'){
        $sql_code = "UPDATE usuariossteam SET jogofav2 = '$imageName' WHERE idSteam = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }
        else{
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }
}
if(isset($_POST{"jogosFav3"})){
    $imageName = $_POST["jogosFav3"];
    if($_SESSION['sessionType'] == "LoginWithTGE"){
        $sql_code = "UPDATE usuariostge SET jogofav3 = '$imageName' WHERE usuario = '$user'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == "LoginWithDiscord"){
        $sql_code = "UPDATE usuariosdiscord SET jogofav3 = '$imageName' WHERE idDiscord = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == "LoginWithGoogle"){
        $sql_code = "UPDATE usuariosgoogle SET jogofav3 = '$imageName' WHERE idGoogle = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }else if($_SESSION['sessionType'] == 'LoginWithSteam'){
        $sql_code = "UPDATE usuariossteam SET jogofav3 = '$imageName' WHERE idSteam = '$id'";
        mysqli_query($conexao, $sql_code);
        header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }
        else{
            header("Location:".URL_BASE."/perfil/modificarPerfil.php");
        }
}
?>
