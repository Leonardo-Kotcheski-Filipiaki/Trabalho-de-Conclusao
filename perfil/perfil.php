<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include '../config.php';
include '../conexao.php';

if(isset($_SESSION['userName'])){
}else{
    Header("Location:".URL_BASE."/login/loginPage.php");
}
include TEMPLATE_BASE.'/head.php';
include TEMPLATE_BASE.'/nav.php';



$user = $_SESSION['userName']; 
//chama imagem do usuario logado com TGE
if($_SESSION['sessionType'] == "LoginWithTGE"){
 $query = "select * from usuariostge where usuario = '$user'";
 //envia os dados e compara no banco
 $result = mysqli_query($conexao, $query);
 $row = mysqli_num_rows($result);
 if($row == 1){
     $dados = mysqli_fetch_assoc($result);
     $SessionUser = $dados;
     $_SESSION['userName'] = $SessionUser['usuario'];
     $user = $_SESSION['userName'];
     $_SESSION['imgPerf'] = $SessionUser['imgPerf'];
     $imgPerf = $_SESSION['imgPerf'];
     if($dados['descricao'] != null){
        $_SESSION['descricao'] = $dados['descricao'];
        $description = $_SESSION['descricao'];
        }else{
            $description = "Para modificar sua descrição, vá em editar perfil na aba ao lado";
        }
        if($dados['jogofav1'] != null){
            $_SESSION['jogofav1'] = $dados['jogofav1'];
            $jogofavorito = $_SESSION['jogofav1'];

            }else{
                 $jogofavorito = "templatejogo.png";
            }
            if($dados['jogofav2'] != null){
                $_SESSION['jogofav2'] = $dados['jogofav2'];
                $jogofavorito2 = $_SESSION['jogofav2'];
    
                }else{
                     $jogofavorito2 = "templatejogo.png";
                }
                if($dados['jogofav3'] != null){
                    $_SESSION['jogofav3'] = $dados['jogofav3'];
                    $jogofavorito3 = $_SESSION['jogofav3'];
        
                    }else{
                         $jogofavorito3 = "templatejogo.png";
                    }

    }
 }
 //chama img do usuario do Discord ou do banco ou do link disponibilizado do discord
else if($_SESSION['sessionType'] == "LoginWithDiscord"){
$discord_id = $_SESSION['id'];
//QUERY QUE PUXA AS INFOS DO USUARIO
$query = "SELECT * FROM usuariosdiscord WHERE idDiscord = '$discord_id'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
if($row == 1){
   $dados = mysqli_fetch_assoc($result);
    $_SESSION['userName'] = $dados['nomeUser'];
    if($dados['imgPerf'] != null){
        $_SESSION['imgPerf'] = $dados['imgPerf'];
        $imgPerf = $_SESSION['imgPerf'];
    }else{
        $avatar_discord = $_SESSION['imgPerf'];
        $imgPerf = "https://cdn.discordapp.com/avatars/$discord_id/$avatar_discord.jpg?size=256";
    }
    if($dados['descricao'] != null){
        $_SESSION['descricao'] = $dados['descricao'];
        $description = $_SESSION['descricao'];
        }else{
            $description = "Para modificar sua descrição, vá em editar perfil na aba ao lado";
        }
        if($dados['jogofav1'] != null){
            $_SESSION['jogofav1'] = $dados['jogofav1'];
            $jogofavorito = $_SESSION['jogofav1'];

            }else{
                 $jogofavorito = "templatejogo.png";
            }
            if($dados['jogofav2'] != null){
                $_SESSION['jogofav2'] = $dados['jogofav2'];
                $jogofavorito2 = $_SESSION['jogofav2'];
    
                }else{
                     $jogofavorito2 = "templatejogo.png";
                }
                if($dados['jogofav3'] != null){
                    $_SESSION['jogofav3'] = $dados['jogofav3'];
                    $jogofavorito3 = $_SESSION['jogofav3'];
        
                    }else{
                         $jogofavorito3 = "templatejogo.png";
                    }

    }

}
//chama img do usuario do google
else if($_SESSION['sessionType'] == "LoginWithGoogle"){
    $Google_id = $_SESSION['id'];
    //QUERY QUE PUXA AS INFOS DO USUARIO
    $query = "SELECT * FROM usuariosgoogle WHERE idGoogle = '$Google_id'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row == 1){
    $dados = mysqli_fetch_assoc($result);
    $imgPerf = $dados['imgPerf'];
    if($dados['descricao'] != null){
        $_SESSION['descricao'] = $dados['descricao'];
        $description = $_SESSION['descricao'];
        }else{
            $description = "Para modificar sua descrição, vá em editar perfil na aba ao lado";
        }
        if($dados['jogofav1'] != null){
            $_SESSION['jogofav1'] = $dados['jogofav1'];
            $jogofavorito = $_SESSION['jogofav1'];

            }else{
                 $jogofavorito = "templatejogo.png";
            }
            if($dados['jogofav2'] != null){
                $_SESSION['jogofav2'] = $dados['jogofav2'];
                $jogofavorito2 = $_SESSION['jogofav2'];
    
                }else{
                     $jogofavorito2 = "templatejogo.png";
                }
                if($dados['jogofav3'] != null){
                    $_SESSION['jogofav3'] = $dados['jogofav3'];
                    $jogofavorito3 = $_SESSION['jogofav3'];
        
                    }else{
                         $jogofavorito3 = "templatejogo.png";
                    }

    }

}else if($_SESSION['sessionType'] == "LoginWithSteam"){
    $Steam_id = $_SESSION['id'];
    $query = "SELECT * FROM usuariossteam WHERE idSteam = '$Steam_id'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row == 1){
        $dados = mysqli_fetch_assoc($result);
        $imgPerf = $dados['imgPerf'];
        if($dados['descricao'] != null){
        $_SESSION['descricao'] = $dados['descricao'];
        $description = $_SESSION['descricao'];
        }else{
            $description = "Para modificar sua descrição, vá em editar perfil na aba ao lado";
        }
        if($dados['jogofav1'] != null){
            $_SESSION['jogofav1'] = $dados['jogofav1'];
            $jogofavorito = $_SESSION['jogofav1'];

            }else{
                 $jogofavorito = "templatejogo.png";
            }
            if($dados['jogofav2'] != null){
                $_SESSION['jogofav2'] = $dados['jogofav2'];
                $jogofavorito2 = $_SESSION['jogofav2'];
    
                }else{
                     $jogofavorito2 = "templatejogo.png";
                }
                if($dados['jogofav3'] != null){
                    $_SESSION['jogofav3'] = $dados['jogofav3'];
                    $jogofavorito3 = $_SESSION['jogofav3'];
        
                    }else{
                         $jogofavorito3 = "templatejogo.png";
                    }

    }
}

?>
<link rel="stylesheet" href="<?php echo URL_BASE?>/csspaginas/perfil.css" alt="">




<body>
    

<div class="row col s12">
<?php  include TEMPLATE_BASE.'/opcoes.php';?> 
<div class="col s12 m12 l3 offset-col l9" style="margin-top:4vh;">
 
   
    <div id="usuariosAvat">
 <?php
 
if($_SESSION['sessionType'] == "LoginWithTGE"){
    if($imgPerf == "icon.png"){
        echo "<img class = 'circle responsive-img' src='../profilePics/$imgPerf' alt=''/>";
    }else{
        echo "<img class = 'circle responsive-img' src='../profilePics/$imgPerf' alt=''/>";
    }
    
}else if($_SESSION['sessionType'] == "LoginWithDiscord"){
    echo "<img class = 'circle responsive-img' id='imgUsuario' src='$imgPerf' alt=''/>";
}else if($_SESSION['sessionType'] == "LoginWithGoogle"){
    echo "<img class = 'circle responsive-img' id='imgUsuario' src='$imgPerf' alt=''/>";
}else if($_SESSION['sessionType'] == "LoginWithSteam"){
    echo "<img class = 'circle responsive-img' id='imgUsuario' src='$imgPerf' alt=''/>";
}
?>
        <h1 class="flow-text " id="nomePerfil"><?php echo $name;?></h1>

</div>
<div class="col l5 m9 s9" id="descrip">
        <h2 class="flow-text" id="tituloDescr">Descrição</h2>
        <p  id="descrition"><?php echo $description; ?>  </div>
        




</div>
<div class="col l10 m12 s12" id="jogosFav">
    <h1 class="flow-text">Jogos favoritos</h1>
    <div class="col s10 offset-s1">
        <img src="<?php echo URL_BASE?>\imagens\jogos\<?php echo $jogofavorito ?>" class="responsive-img imgFav"  alt="">
        <img src="<?php echo URL_BASE?>\imagens\jogos\<?php echo $jogofavorito2 ?>" class="responsive-img imgFav"  alt="">
        <img src="<?php echo URL_BASE?>\imagens\jogos\<?php echo $jogofavorito3 ?>" class="responsive-img imgFav"  alt="">
        
    </div>
</div>
</div>
</div>


</body>
</html>