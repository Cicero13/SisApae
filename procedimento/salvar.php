<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$descricao = $_POST['descricao'];
	$num_proc = $_POST['num_proc'];
	
	$sql = "insert into tbproc(codproc,descricao,num_proc)
					   values(null,'$descricao','$num_proc')";
					   
					   
	$inserir = $conexao->query($sql);
	
	if($inserir==true){
		header('Location: frmbusca.php?insert=ok');
	}else{
		header('Location: frmcad.php?insert=erro');
	}
	
?>