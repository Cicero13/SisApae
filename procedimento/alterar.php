<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$codigo = $_POST['codproc'];
	$descricao = $_POST['descricao'];
	$num_proc = $_POST['num_proc'];
	
	//Criar o Update
	$sql = "update tbproc set
					   descricao = '$descricao',
					   num_proc  = '$num_proc'
					   where codproc = '$codigo'";
		
	//Executo o comando
	$alterar = $conexao->query($sql);
	
	if($alterar == true){
		
		header('Location: frmbusca.php?update=ok');
	}else{
		header('Location: frmbusca.php?update=erro');
	}
	
?>