<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$prof = $_POST['prof'];
	$pac = $_POST['pac'];
	$proc = $_POST['proc'];
        $data = $_POST['data'];
		$hora = $_POST['hora'];
		$apac = $_POST['apac'];
		
		session_start();
	$usu =  $_SESSION['id'];
        
	$sql = "insert into tbatend(codatend,codpac,codproc,codprof,codusu,data, hora, cod_aut)
                                values(null,'$pac','$proc','$prof','$usu','$data','$hora','$apac')";
					   
	$inserir = $conexao->query($sql);
	
	if($inserir==true){
		//header('Location: frmbusca.php?insert=ok');
		echo true;
		//echo $sql;
	}else{
		//header('Location: frmbusca.php?insert=erro');
		echo false;
	}
	
?>