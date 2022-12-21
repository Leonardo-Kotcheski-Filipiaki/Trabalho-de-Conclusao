<div class="row">
<?php
if(isset($_GET['nomeChat'])){
  echo '<div class="divs col l3 hide-on-med-and-down centralizar" id="left" >


<a class="waves-effect waves-light btn red" style="margin-top:1vh;margin-bottom:1vh;" href="index.php"><p>Sair do chat!</p></a>';

}


if(!isset($_GET['nomeChat'])){
  echo '<div class="divs col s12 m12 l3 centralizar" id="left" >
<a class="waves-effect waves-light btn modal-trigger blue col s4 m4 offset-s4 offset-m4" style="margin-top:1vh;margin-bottom:1vh;" href="#modal1">Novo chat</a>';
}
?>
<div id="modal1" class="modal blue lighten-3 " >
<div class="modal-content">
<form action="criarChats.php" method="POST">
    <?php
    if(isset($_GET['code'])){
      $codigoErro = $_GET['code'];
      if($codigoErro == '3099'){
        echo "<p>Campos obrigatórios não preenchidos</p>";
      }else if($codigoErro == '2813'){
        echo "<p>Nome para o chat já utilizado!</p>";

      }
    }
    ?>
    <input class="col s8 offset-l2 place" type="text" name="nomeChat" required data-ls-module="charCounter" minLength="5" maxLength="25" placeholder="Nome do chat"></input>
    <input class="col s8 offset-l2 place" type="text" name="temaChat" required data-ls-module="charCounter" minLength="5" maxLength="25" placeholder="Tema do chat"></input>
    
    <button class="col s2 offset-l5 waves-effect waves-light btn blue" style="margin-bottom:2vh; margin-top:1vh;" type="submit">Criar chat</button>

    </form>

    </div>
  </div>

  <script>
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
  </script>
    <?php
    if(isset($_GET['code'])){
      $codigoErro = $_GET['code'];
      if($codigoErro == '2313'){
      echo "<p class='col s6 offset-s3 green-text'><strong>Chat criado com Sucesso!</strong></p>";
    }
  }
  ?>


  <div class="row col s12 l10 offset-l1" >
<div class="col col s12 l12 bordinha " style="max-height:93vh; overflow-y: auto;">
<div class="grey darken-4">

<?php
	include '../conexao.php';
  $sql="SELECT * FROM chats";
  $request = mysqli_query($conexao, $sql);
  $row = $request;
  if($row >=1){
    foreach($row -> fetch_all(MYSQLI_ASSOC) as $chats ){
      $nomeChat = $chats['nomeChat'];
      $temaChat = $chats['TemadoChat'];
      echo "<div class='grey col s8 m8 offset-s2 offset-m2 l10 offset-l1' style='margin-top:1vh;margin-bottom:1vh; word-wrap: break-word; border:2px black solid' >";
      echo "<p class='flow-text'><strong>$nomeChat</strong></p>";
      echo "<p class='red-text text-darken-4 flow-text'><strong>$temaChat</strong></p>";
      echo "<a  href='".URL_BASE."/chat/index.php?nomeChat=".$nomeChat."'><button class='waves-effect waves-light btn green' style='margin-top:1vh;margin-bottom:1vh;'>Entrar!</button></a>";
      echo "</div>";
    }


  }
?>

</div>
  </div>
  </div> 
</div>

<ul id='dropdown2' class='dropdown-content'>
<li><a href="#!" class="centralizar lobby">Lobby 1</a></li>
<li><a href="#!" class="centralizar lobby">Lobby 2</a></li>
<li><a href="#!" class="centralizar lobby">Lobby 3</a></li>
<li><a href="#!" class="centralizar lobby">Lobby 4</a></li>
<li><a href="#!" class="centralizar lobby">Lobby 5</a></li>
</ul>
<script>


document.addEventListener('DOMContentLoaded',function drop() {
var elems = document.querySelectorAll('.dropdown-trigger');
var instances = M.Dropdown.init(elems);
}


);</script>
				