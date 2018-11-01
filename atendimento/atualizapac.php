<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$id = $_POST['id'];
	$cod_apac = $_POST['cod_apac'];

	$sql = "update tbatend set cod_aut = $cod_apac where codatend = $id";
                                
					   
	$update = $conexao->query($sql);
	
	if($update==true){
		//header('Location: frmbusca.php?insert=ok');
		echo true;
		//echo $sql;
	}else{
		//header('Location: frmbusca.php?insert=erro');
		echo false;
	}
	
?>