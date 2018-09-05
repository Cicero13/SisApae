<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$codpac = $_POST['codpac'];
	
	// Criar O Delete
	$sql = "delete from tbpac
					   where codpac = $codpac";
	//Executando O Comando				   
	$delete = $conexao->query($sql);
	
	if($delete==true){
		header('Location: frmbusca.php?delete=ok');
	}else{
		header('Location: frmbusca.php?delete=erro');
	}
	
?>