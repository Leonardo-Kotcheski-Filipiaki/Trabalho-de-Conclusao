<?php
include "../config.php";
include "../conexao.php";
if(empty($_POST['nome_usuario']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['senha_repeat'])){
    header('location: registroPage.php');
    exit();
}//se existir campos vazios nos Inputs do registro ele retorna para a pagina.


    $usuario = $_POST['nome_usuario'];
    $email = $_POST['email']; //coleta os dados dos inputs e recebe em variaveis
    $senha = $_POST['senha']; 
    $senha_repeat = $_POST['senha_repeat'];
    
    $queryConfirmUsername = "select * from usuariostge where usuario = '{$usuario}'";
    $result = mysqli_query($conexao, $queryConfirmUsername);
    $row = mysqli_num_rows($result);    
    if($row==1){
        header('location: registroPage.php');
        exit();
        //se o usuario digitado já existir ele cancela a operação, não envia os valores digitados, e repassa o erro ao usuario
    }else{
        $queryConfirmEmail = "select * from usuariostge where email = '{$email}'";
        $result = mysqli_query($conexao, $queryConfirmEmail);
        $row = mysqli_num_rows($result);
        
            if($row == 1){
            header('location: registroPage.php');
            //se o email já existir no banco ele não envia os dados digitados e retorna a pagina de registro.
            }else{

                if($senha != $senha_repeat){

                    echo "Senhas não coerentes";
                    die();
                //se as senhas não forem coerentes ele para a operação e não envia os dados ao servidor
                }else{
                $result = mysqli_query($conexao, "INSERT INTO usuariostge(usuario, email, senha, imgPerf) VALUES ('$usuario', '$email', md5('$senha'), 'icon.png' )");
                    header('location:'.URL_BASE.'/login/loginPage.php');
                //caso passe por todas as verificações e não tenha erro, envia os dados ao banco, e agora o usuario está registrado
                    
        }
    }
}

?>