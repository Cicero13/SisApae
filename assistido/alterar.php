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
	
	
	
	//Criar o Update
	$sql = "update tbpac set
					   nome = '$nome',
					   cns = '$cns',
					   nascimento = '$nascimento',
					   sexo = '$sexo',
					   endereco = '$endereco',
					   bairro = '$bairro',
					   cidade = '$cidade',
					   cep = '$cep',
					   uf = '$uf',
					   raca_cor = '$raca_cor',
					   pai = '$pai',
					   mae = '$mae',
					   fone = '$fone',
					   fone_resp = '$fone_resp',
					   deficiencia = '$deficiencia',
					   diagnostico = '$diagnostico',
					   cid = '$cid',
					   ibge = '$ibge',
					   gaveta = '$gaveta'
					   where codpac = '$codpac'";
		
	//Executo o comando
	$alterar = $conexao->query($sql);
	
	if($alterar == true){
		header('Location: frmbusca.php?update=ok');
	}else{
		header('Location: frmbusca.php?update=erro');
	}
	
?>