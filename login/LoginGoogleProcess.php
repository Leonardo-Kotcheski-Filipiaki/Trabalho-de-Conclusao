<?php
require_once "LoginGoogleContents/vendor/autoload.php";
include "../config.php";
include "../conexao.php";
session_start();
        $clientID = '1087252219528-jfpv7su54umu296veg1em8honkvu8pb3.apps.googleusercontent.com';
          $clientSecret= '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';
          $RedirectUri = 'http://localhost/TGE/login/LoginGoogleProcess.php';
          //Criando request para o google
          $client = new Google_Client();
          $client->setClientId($clientID);
          $client->setClientSecret($clientSecret);
          $client->setRedirectUri($RedirectUri);
          $client->addScope('profile');
          
if(isset($_GET['code'])){
          $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
          $client->setAccessToken($token['access_token']);
          
          //Recebendo usuario perfil
          $gauth = new Google_Service_Oauth2($client);
          $google_info = $gauth->userinfo->get();
          $name = $google_info->name;
          $access_token = $token['access_token'];
          $picture = $google_info->picture;
          $id = $google_info->id;
          
          //$id = $google_info->id;
          $_SESSION['sessionType'] = "LoginWithGoogle";
          $_SESSION['access_token'] = $access_token;
          $_SESSION['id'] = $id;
          $_SESSION['userName'] = $name;
          $_SESSION['imgPerf'] = "../profilePics/icon.png";

          //CONFIRMA ID GOOGLE EXISTENTE NO BANCO
          $queryConfirmIdExists = "SELECT * FROM usuariosgoogle WHERE idGoogle = '$id'";
          $result = mysqli_query($conexao, $queryConfirmIdExists);
          $row = mysqli_num_rows($result);
          if($row == 1){
          //CASO O ID GOOGLE EXISTA NO BANCO, ELE PASSA OS DADOS DE NOME E IMAGEM DE PERFIL DO BANCO PARA A SESSÃO
          $_SESSION['jogofav1'] = $dados['jogofav1'];
          $_SESSION['jogofav2'] = $dados['jogofav2'];
          $_SESSION['jogofav3'] = $dados['jogofav3'];
          $dados = mysqli_fetch_assoc($result);
          $_SESSION['userName'] = $dados['nomeUser'];
          if($dados['imgPerf'] != null){
              $_SESSION['imgPerf'] = $dados['imgPerf'];
          }
          header("Location:".URL_BASE);
          exit();
          }else{
              //CASO O ID DISCORD NÃO EXISTA NO BANCO, ELE INSERE O USUARIO NO BANCO
              $query = "INSERT INTO usuariosgoogle(idGoogle, nomeUser, imgPerf)VALUE('$id', '$name', '../profilePics/icon.png')";
              mysqli_query($conexao, $query);
              header("Location:".URL_BASE);
              exit();
          }}