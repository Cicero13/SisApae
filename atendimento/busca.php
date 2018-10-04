<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$d1 = $_POST['d1'];
	$d2 = $_POST['d2'];
	
	$sql = "select * from tbatend";
					   
	$cons = $conexao->query($sql);
	
	if($cons){
		echo 'correto';
	}else{
		echo 'erro';
	}
	
?>