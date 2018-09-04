<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$cod = $_GET['cod'];
	
	// Criar O Delete
	$sql = "delete from tbusuario 
					   where codusu = $cod";
	//Executando O Comando				   
	$delete = $conexao->query($sql);
	
	if($delete==true){
		header('Location: frmbusca.php?delete=ok');
	}else{
		header('Location: frmbusca.php?delete=erro');
	}
	
?>