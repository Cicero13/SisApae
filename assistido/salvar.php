<?php
	//Conexão com o Banco de Dados
	include('../banco.php');
	
	//Recebendo Variaveis
	$codpac = $_POST['codpac'];
	$nome = $_POST['nome'];
	$cns = $_POST['cns'];
	$nascimento = $_POST['nascimento'];
	$sexo = $_POST['sexo'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	$uf = $_POST['uf'];
	$raca_cor = $_POST['raca_cor'];
	$pai = $_POST['pai'];
	$mae = $_POST['mae'];
	$fone = $_POST['fone'];
	$fone_resp = $_POST['fone_resp'];
	$deficiencia = $_POST['deficiencia'];
	$diagnostico = $_POST['diagnostico'];
	$cid = $_POST['cid'];
	$ibge = $_POST['ibge'];
	$gaveta = $_POST['gaveta'];
	
	$sql = "insert into tbpac(codpac,nome,cns,nascimento,sexo,endereco,bairro,cidade,cep,uf,raca_cor,pai,mae,fone,fone_resp,deficiencia,diagnostico,cid,ibge,gaveta)
					   values(null,'$nome','$cns','$nascimento','$sexo','$endereco','$bairro','$cidade','$cep','$uf','$raca_cor','$pai','$mae','$fone','$fone_resp','$deficiencia','$diagnostico','$cid','$ibge','$gaveta'";
					   
	$inserir = $conexao->query($sql);
	
	if($inserir==true){
		header('Location: frmbusca.php?insert=ok');
	}else{
		header('Location: frmcad.php?insert=erro');
	}
	
?>