<?php
/*
#####################################
Código responsável por receber as
mensagens que chegam do banco de dados
e renderizalas em tela
#####################################
*/
include("chat-conexao.php");
	$sql = $pdo->query("SELECT nomeChat, mensagem, nomeUsuario FROM mensagens");
	foreach ($sql->fetchAll() as $key) {
		if(isset($_GET['nomeChat'])){
			$idChat = $_GET['nomeChat'];
			$idChatmsg = $key['nomeChat'];
			if($idChat == $idChatmsg){
				echo "<label class='nome'>".$key['nomeUsuario']."</label>";
				echo "<p class='textomensagem'>".$key['mensagem']."</p>";
			}
		}
	

}



?>