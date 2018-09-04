<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	$sql = "insert into tbusu(id,nome,senha,email,data_cadastro)
					   values(null,'$nome','$senha','$email', NOW())";
					   
	$inserir = $conexao->query($sql);
	
	if($inserir==true){
		header('Location: frmbusca.php?insert=ok');
	}else{
		header('Location: frmcad.php?insert=erro');
	}
	
?>