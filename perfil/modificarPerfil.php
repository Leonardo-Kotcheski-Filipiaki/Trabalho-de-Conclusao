<?php
session_start();
include '../conexao.php';
include '../config.php';
if(isset($_SESSION['userName'])){
}else{
    Header("Location:".URL_BASE."/login/loginPage.php");
}
include TEMPLATE_BASE.'/head.php';

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
     $_SESSION['description'] = $SessionUser['descricao'];
     $descricao = $_SESSION['description'];
 }
 //chama img do usuario do Discord ou do banco ou do link disponibilizado do discord
}else if($_SESSION['sessionType'] == "LoginWithDiscord"){
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

}
//chama img do usuario do google
}else if($_SESSION['sessionType'] == "LoginWithGoogle"){
    $Google_id = $_SESSION['id'];
    //QUERY QUE PUXA AS INFOS DO USUARIO
    $query = "SELECT * FROM usuariosgoogle WHERE idGoogle = '$Google_id'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row == 1){
    $dados = mysqli_fetch_assoc($result);
    $imgPerf = $dados['imgPerf'];
}}else if($_SESSION['sessionType'] == "LoginWithSteam"){
    $Steam_id = $_SESSION['id'];
    $query = "SELECT * FROM usuariossteam WHERE idSteam = '$Steam_id'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row == 1){
        $dados = mysqli_fetch_assoc($result);
        $imgPerf = $dados['imgPerf'];
    }
}

?>

 <script src="jquery.min.js"></script>  
  <script src="bootstrap.min.js"></script>
  <script src="croppie.js"></script>
  <link rel="stylesheet" href="croppie.css" />
  <!-- <link rel="stylesheet" href="bootstrap.min.css"/> -->

</head>

<?php

include TEMPLATE_BASE.'/nav.php';

include TEMPLATE_BASE.'/opcoes.php';

?>
   <link rel="stylesheet" href="<?php echo URL_BASE?>/csspaginas/editarperfil.css" alt=""/>

  
 
 
 <body>  
<div class="row">

<ul class="col s10 m8 l6 offset-s1 offset-m2 offset-l2 collapsible">

<li>
<div class="collapsible-header">
  <p class="editPerf" >Alterar nome<p>
</div>
<div class="collapsible-body"> 
<form action="upload.php" method="post">
<h3 class="flow-text" >Alterar nome:</h3>
<input name="alterarNome" class="inputModif" data-ls-module="charCounter" minLength="4" maxLength="16"></input>
<button class="btnSub" type="submit">Confirmar</button>
</form>
</div>
</li>

<li>
<div class="collapsible-header">
  <p class="editPerf" >Editar descricão<p>
</div>

<div class="collapsible-body">

<form action="upload.php" method="post">
  <h3 class="flow-text" id="tituDesc" >Alterar descrição:</h3>
<textarea name="descriptionChange"  id="textDescr" minLength="1" maxLength="1000" style="resize: none; height:22vh; color:black; padding:4px 4px 4px 4px; background-color:aliceblue;"></textarea>
<button class="btnSub" type="submit">Confirmar</button>
</form>

</div>
</li>
<li>
<div class="collapsible-header">
  <p class="editPerf" >Mudar jogos favoritos<p>
</div>
<div class="collapsible-body">

<form action="upload.php" method="post">
  <h3 class="flow-text" id="tituDesc" >Escolha seu jogo favorito!</h3>


  <div class="col s12 m11">


<div class="col s12 m3 offset-m1">
<select name="jogosFav" class="jogosFav">
  <option value="" disabled selected>Jogo favorito</option>

  <option data-icon="<?php echo URL_BASE?>\imagens\jogos\valorant.jpg" class="left" value="valorant.jpg">Valorant</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\minecraft.jpg" class="left" value="minecraft.jpg">Minecraft</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\gtav.jpg" class="left" value="gtav.jpg">Grand Theft Auto V</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\csgo.jpeg" class="left" value="csgo.jpeg">CS:GO</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\dk3.jpg" class="left" value="dk3.jpg">Dark Souls 3</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\genshin.jpg" class="left" value="genshin.jpg">Genshin Impact</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\lol.jpg" class="left" value="lol.jpg">League of Legends</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\tft.jpg" class="left" value="tft.jpg">Teamfight Tactics</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\mk11.jpg" class="left" value="mk11.jpg">Mortal Kombat 11</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\fortnite.jpg" class="left" value="fortnite.jpg">Fortnite</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\eldenring.jpg" class="left" value="eldenring.jpg">Elden Ring</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\apex.jpg" class="left" value="apex.jpg">Apex Legends</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\wow.jpg" class="left" value="wow.jpg">World of Warcraft</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\codwz.jpg" class="left" value="codwz.jpg">Call of Duty: Warzone</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\roblox.jpg" class="left" value="roblox.jpg">Roblox</option>

  </select>

</div>
<div class="col s12 m3 offset-m1" id="meioFav">
  <select name="jogosFav2" class="jogosFav">
  <option value="" disabled selected>Jogo favorito</option>
  
  
  <option data-icon="<?php echo URL_BASE?>\imagens\jogos\valorant.jpg" class="left" value="valorant.jpg">Valorant</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\minecraft.jpg" class="left" value="minecraft.jpg">Minecraft</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\gtav.jpg" class="left" value="gtav.jpg">Grand Theft Auto V</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\csgo.jpeg" class="left" value="csgo.jpeg">CS:GO</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\dk3.jpg" class="left" value="dk3.jpg">Dark Souls 3</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\genshin.jpg" class="left" value="genshin.jpg">Genshin Impact</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\lol.jpg" class="left" value="lol.jpg">League of Legends</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\tft.jpg" class="left" value="tft.jpg">Teamfight Tactics</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\mk11.jpg" class="left" value="mk11.jpg">Mortal Kombat 11</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\fortnite.jpg" class="left" value="fortnite.jpg">Fortnite</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\eldenring.jpg" class="left" value="eldenring.jpg">Elden Ring</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\apex.jpg" class="left" value="apex.jpg">Apex Legends</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\wow.jpg" class="left" value="wow.jpg">World of Warcraft</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\codwz.jpg" class="left" value="codwz.jpg">Call of Duty: Warzone</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\roblox.jpg" class="left" value="roblox.jpg">Roblox</option>

  </select>
  </div>
  <div class="col s12 m3 offset-m1">
  <select name="jogosFav3" class="jogosFav">
  <option value="" disabled selected>Jogo favorito</option>
  
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\valorant.jpg" class="left" value="valorant.jpg">Valorant</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\minecraft.jpg" class="left" value="minecraft.jpg">Minecraft</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\gtav.jpg" class="left" value="gtav.jpg">Grand Theft Auto V</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\csgo.jpeg" class="left" value="csgo.jpeg">CS:GO</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\dk3.jpg" class="left" value="dk3.jpg">Dark Souls 3</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\genshin.jpg" class="left" value="genshin.jpg">Genshin Impact</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\lol.jpg" class="left" value="lol.jpg">League of Legends</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\tft.jpg" class="left" value="tft.jpg">Teamfight Tactics</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\mk11.jpg" class="left" value="mk11.jpg">Mortal Kombat 11</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\fortnite.jpg" class="left" value="fortnite.jpg">Fortnite</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\eldenring.jpg" class="left" value="eldenring.jpg">Elden Ring</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\apex.jpg" class="left" value="apex.jpg">Apex Legends</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\wow.jpg" class="left" value="wow.jpg">World of Warcraft</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\codwz.jpg" class="left" value="codwz.jpg">Call of Duty: Warzone</option>
    <option data-icon="<?php echo URL_BASE?>\imagens\jogos\roblox.jpg" class="left" value="roblox.jpg">Roblox</option>
  </select>
  </div>
</div>
 
<button class="btnSub" type="submit">Confirmar</button>
</form>

</div>
</li>
</ul>

<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
        <button class="btn btn-success crop_image">Crop & Upload Image</button>
     </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
    </div>
</div>
</div>
<script>  
  $(document).ready(function(){
    $('select').formSelect();
  });


$(document).ready(function(){
 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'circle' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });
 
  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });
 
  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });
 
});  
</script>

<script>
$(document).ready(function(){

$('.collapsible').collapsible();
})
</script>





</body> 
