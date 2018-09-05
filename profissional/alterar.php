<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	$codigo = $_POST['id'];
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$especialidade = $_POST['especialidade'];
	$conselho = $_POST['conselho'];
	$cbo = $_POST['cbo'];
	$fone = $_POST['fone'];
	$cns = $_POST['cns'];
	
	//Criar o Update
	$sql = "update tbprof set
					   nome = '$nome',
					   sexo = '$sexo',
					   especialidade = '$especialidade',
					   conselho = '$conselho',
					   cbo = '$cbo',
					   fone = '$fone',
					   cns = '$cns'
					   where codprof = '$codigo'";
		
	//Executo o comando
	$alterar = $conexao->query($sql);
	
	if($alterar == true){
		header('Location: frmbusca.php?update=ok');
	}else{
		header('Location: frmbusca.php?update=erro');
	}
	
?>