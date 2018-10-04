<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$codigo = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	//Criar o Update
	$sql = "update tbusu set
					   nome = '$nome',
					   email = '$email',
					   senha = '$senha'
					   where id = $codigo";
		
	//Executo o comando
	$alterar = $conexao->query($sql);
	
	if($alterar == true){
		header('Location: frmbusca.php?update=ok');
	}else{
		header('Location: frmbusca.php?update=erro');
	}
	
?>