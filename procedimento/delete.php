<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$id = $_POST['id'];
	
	// Criar O Delete
	$sql = "delete from tbproc
					   where codproc = $id";
	//Executando O Comando				   
	$delete = $conexao->query($sql);
	
	if($delete==true){
		header('Location: frmbusca.php?delete=ok');
	}else{
		header('Location: frmbusca.php?delete=erro');
	}
	
?>