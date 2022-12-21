
<div id="opcoesDiv" >
<ul id="aba_perfil">
    <div>
    <h1 id="opcoesperfil" >Opções</h1>
    </div>

    <div class="perfilitem" id="perfil_perfil">
    <li ><a class="perfilLinks" href=" <?php echo URL_BASE;?>/perfil/perfil.php">Perfil</a></li>
    </div>

    <div class="perfilitem" id="perfil_Editperfil">
    <li ><a class="perfilLinks" href="http://localhost/TGE/perfil/modificarPerfil.php">Editar perfil</a></li>
    </div>
   <?php if($_SESSION['sessionType'] == "LoginWithTGE"){

    echo '<div class="perfilitem" id="perfil_seguranca">
    <li ><a class="perfilLinks" href="'.URL_BASE.'/perfil/seguranca.php">Segurança</a></li>
    </div>';
    
   }
   ?>
   <div class="perfilitem" id="sair">
    <li ><a style="color:red;" href="<?php echo URL_BASE;?>/logout.php">Sair</a></li>
    </div>
</ul>    
</div>
