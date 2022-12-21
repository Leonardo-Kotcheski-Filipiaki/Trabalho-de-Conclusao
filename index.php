<?php
session_start();
error_reporting(E_WARNING);
include 'config.php';

include TEMPLATE_BASE.'/head.php';
include TEMPLATE_BASE.'/nav.php';

?>
</head>
<body>

        <div class="black" id="rainbow" >
            <div class="col s5">
            <span id="bemvindo" class="flow-text center-align" >Seja bem vindo à nossa comunidade!</span>
            </div>
        </div>
 <?php
   if(!isset($_SESSION['userName'])){
   echo '<div class="row">
        <div class="col s12 ">
        <h3 class="flow-text center-align" id="regist" >Ainda não possui uma conta?</h3>
        </div>
 
   

    <div id="div_registro" class="row">
        <div class="col s6 m4 l2 offset-s3 offset-m4 offset-l5 light-green accent-4 pulse" id="registrar"> 
            <a href="'.URL_BASE.'/Registro/registroPage.php">
           <h2 class="flow-text center-align" id="btnreg">Crie uma!</h2>
           </a>
        </div>
    </div>';
   }else{
    echo '<div class="container" style="margin-top:10vh;">
        <div class="col s12 ">
        <h3 class="flow-text center-align" id="regist" >Escolha seu chat!</h3>
        </div>
        </div>
   ';}
?>

        <div class="row" id="carossel"  >
        <div class="col s12" style="text-align:center;">
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/apex.jpg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/codwz.jpg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/csgo.jpeg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/dk3.jpg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/roblox.jpg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/eldenring.jpg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/fortnite.jpg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/lol.jpg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/minecraft.jpg " alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/genshin.jpg" alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" img responsive-img" src="<?php echo URL_BASE?>/imagens/jogos/valorant.jpg" alt=""></a>
        <a href="<?php if(isset($_SESSION['userName'])){
            echo URL_BASE."/chat\index.php";
        }else{
            echo URL_BASE."/login/loginPage.php";

        }?>" class="imagem"><img  class=" responsive-img img" src="<?php echo URL_BASE?>/imagens/jogos/wow.jpg" alt=""></a>
      

        
        </div>
        </div>
      
        
    
    
</body>
