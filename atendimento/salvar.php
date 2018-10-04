<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$prof = $_POST['selectprof'];
	$pac = $_POST['selectpac'];
	$proc = $_POST['selectproc'];
        $data = $_POST['dataininovo'];
	$usu =  $_SESSION['id'];
        
	$sql = "insert into tbatend(codatend,codpac,codproc,codprof,codusu,data)
                                values(null,'$pac','$proc','$prof','$usu','$data')";
					   
	$inserir = $conexao->query($sql);
	
	if($inserir==true){
		header('Location: frmbusca.php?insert=ok');
	}else{
		header('Location: frmcad.php?insert=erro');
	}
	
?>