<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$codigo = $_POST['codusu'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	//Criar o Update
	$sql = "update tbusuario set
					   nome = '$nome',
					   email = '$email',
					   senha = '$senha'
					   where codusu = $codigo";
		
	//Executo o comando
	$alterar = $conexao->query($sql);
	
	if($alterar == true){
		header('Location: frmbusca.php?update=ok');
	}else{
		header('Location: frmbusca.php?update=erro');
	}
	
?>