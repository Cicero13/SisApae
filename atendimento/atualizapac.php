<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$id = $_POST['id'];
	$cod_apac = $_POST['cod_apac'];

	$sql = "update tbatend set cod_aut = '$cod_apac' where codatend = $id";
	
	//echo $sql;
                                
					   
	$update = $conexao->query($sql);
	
	if($update==true){
		echo true;
		
	}else{
		echo false;
	}
	
?>