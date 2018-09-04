<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	$sql = "insert into tbusuario(codusu,nome,senha,email)
					   values(null,'$nome','$senha','$email')";
					   
	$inserir = $conexao->query($sql);
	
	if($inserir==true){
		header('Location: frmcad.php?insert=ok');
	}else{
		header('Location: frmcad.php?insert=erro');
	}
	
?>