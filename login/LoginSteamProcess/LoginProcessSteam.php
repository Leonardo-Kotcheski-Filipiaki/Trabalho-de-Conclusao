<?php
session_start();
include '../config.php';
include DIR_PATH.'/conexao.php';
$params = [
    'openid.assoc_handle' => $_GET['openid_assoc_handle'],
    'openid.signed'       => $_GET['openid_signed'],
    'openid.sig'          => $_GET['openid_sig'],
    'openid.ns'           => 'http://specs.openid.net/auth/2.0',
    'openid.mode'         => 'check_authentication',
];

$signed = explode(',', $_GET['openid_signed']);
    
foreach ($signed as $item) {
    $val = $_GET['openid_'.str_replace('.', '_', $item)];
    $params['openid.'.$item] = stripslashes($val);
}

$data = http_build_query($params);
//data prep
$context = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "Accept-language: en\r\n".
        "Content-type: application/x-www-form-urlencoded\r\n".
        'Content-Length: '.strlen($data)."\r\n",
        'content' => $data,
    ],
]);

//get the data
$result = file_get_contents('https://steamcommunity.com/openid/login', false, $context);
if(preg_match("#is_valid\s*:\s*true#i", $result)){
    preg_match('#^https://steamcommunity.com/openid/id/([0-9]{17,25})#', $_GET['openid_claimed_id'], $matches);
    $steamID64 = is_numeric($matches[1]) ? $matches[1] : 0;
    echo 'request has been validated by open id, returning the client id (steam id) of: ' . $steamID64;    

}else{
    echo 'error: unable to validate your request';
    exit();
}

$steam_api_key = '67A4E531048989EBF4716C0F6ADE8FD6';


$response = file_get_contents('https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.$steam_api_key.'&steamids='.$steamID64);
$response = json_decode($response,true);


print_r($response) ;

$userData = $response['response']['players'][0];
$_SESSION['sessionType'] = "LoginWithSteam";
$_SESSION['id'] = $userData['steamid'];
$_SESSION['userName'] =$userData['personaname'];
$_SESSION['imgPerf'] = $userData['avatarfull'];


$id = $_SESSION['id'];
$picture = $_SESSION['imgPerf'];
$name = $_SESSION['userName'];
//CONFIRMA ID STEAM EXISTENTE NO BANCO
$queryConfirmIdExists = "SELECT * FROM usuariossteam WHERE idSteam = '$id'";
$result = mysqli_query($conexao, $queryConfirmIdExists);
$row = mysqli_num_rows($result);
if($row == 1){
    $_SESSION['jogofav1'] = $dados['jogofav1'];
    $_SESSION['jogofav2'] = $dados['jogofav2'];
    $_SESSION['jogofav3'] = $dados['jogofav3'];
//CASO O ID STEAM EXISTA NO BANCO, ELE PASSA OS DADOS DE NOME E IMAGEM DE PERFIL DO BANCO PARA A SESSÃO
$dados = mysqli_fetch_assoc($result);
$_SESSION['userName'] = $dados['nomeUser'];
if($dados['imgPerf'] != null){
    $_SESSION['imgPerf'] = $dados['imgPerf'];

}
header("Location:".URL_BASE);
exit();
}else{
    //CASO O ID STEAM NÃO EXISTA NO BANCO, ELE INSERE O USUARIO NO BANCO
    $query = "INSERT INTO usuariossteam(idSteam, nomeUser, imgPerf)VALUE('$id', '$name', '$picture')";
    mysqli_query($conexao, $query);
    header("Location:".URL_BASE);
    exit();
}
