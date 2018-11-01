<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	//Recebendo Variaveis
	$id = $_POST['id'];
	// Criar O Delete
	$sql = "delete from tbatend where codatend = $id";
	//Executando O Comando				   
	$delete = $conexao->query($sql);
	
	if($delete==true){
		echo true;
	}else{
		echo false;
	}
	
?>