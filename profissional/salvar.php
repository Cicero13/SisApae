<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$especialidade = $_POST['especialidade'];
	$conselho = $_POST['conselho'];
	$cbo = $_POST['cbo'];
	$fone = $_POST['fone'];
	$cns = $_POST['cns'];
	
	$sql = "insert into tbprof(codprof,nome,sexo,especialidade,conselho,cbo,fone,cns)
					   values(null,'$nome','$sexo','$especialidade','$conselho','$cbo','$fone','$cns')";
					   
	$inserir = $conexao->query($sql);
	
	if($inserir==true){
		header('Location: frmbusca.php?insert=ok');
	}else{
		header('Location: frmcad.php?insert=erro');
	}
	
?>