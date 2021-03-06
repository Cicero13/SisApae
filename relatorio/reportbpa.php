<?php

	include('../banco.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Listagem</title>
<link rel="stylesheet" href="style.css?" type="text/css">	
</head>
<body>

<?php
	if(isset($_GET['prof'])){
			$prof=$_GET['prof']; // pega profissional
			$datai=$_GET['datai']; // pega data inicial
			$dataf=$_GET['dataf']; // pega data final
			  //sql para limpar tabela temp
			  
			 //Criando a Consulta
		if($prof == "todos"){
		//Criando a Consulta
				$sql = "select tbproc.num_proc AS codigo,
						tbproc.descricao as procedimento,  
						tbprof.nome as profissional, 
						tbprof.cbo as cbo,
						tbpac.nome as paciente,
						#max(tbatend.data) as data_ultproced,
						#max(day(tbatend.data)) as dia_ultproced,
						#group_concat(day(tbatend.data) order by tbatend.codatend desc separator '|') as data_proc,
						TIMESTAMPDIFF(YEAR, tbpac.nascimento, CURDATE()) as idade,
						COUNT(tbatend.codatend) as qtd
				from tbatend	
					inner join tbproc on (tbproc.codproc=tbatend.codproc)
					inner join tbpac on (tbpac.codpac=tbatend.codpac)
					inner join tbprof on (tbprof.codprof=tbatend.codprof)

				where tbatend.data between '$datai' and '$dataf' and tbproc.codproc <> 1
					group by idade,tbatend.codproc order by idade";
														 
		$consulta = $conexao->query($sql);
		
	}else {
		$sql = "select tbproc.num_proc AS codigo,
						tbproc.descricao as procedimento,  
						tbprof.nome as profissional, 
						tbprof.especialidade as espec,
						tbprof.cbo as cbo,
						tbpac.nome as paciente,
						#max(tbatend.data) as data_ultproced,
						#max(day(tbatend.data)) as dia_ultproced,
						#group_concat(day(tbatend.data) order by tbatend.codatend desc separator '|') as data_proc,
						TIMESTAMPDIFF(YEAR, tbpac.nascimento, CURDATE()) as idade,
						COUNT(tbatend.codatend) as qtd
				from tbatend	
					inner join tbproc on (tbproc.codproc=tbatend.codproc)
					inner join tbpac on (tbpac.codpac=tbatend.codpac)
					inner join tbprof on (tbprof.codprof=tbatend.codprof)

				where tbatend.data between '$datai' and '$dataf' and tbproc.codproc <> 1 and tbatend.codprof = '$prof'
					group by idade,tbatend.codproc order by idade";
														 
		$consulta = $conexao->query($sql);
	}	
			 
			if($consulta->num_rows > 0) {//se encontrar algum valor
				  
				  //topo do lista do ranking
								 echo '<div>';
									 echo '<center><font face="arial" size="-1">';
									 echo '<img src="../assets/img/apae1.jpg">';
									 echo 	'<br>';
									 echo 	'<br>';
									 echo '</center></face>';
								echo '</div>';
								//abrindo tabela	
								echo '<table width="100%">';
								//pegando o médico
								$linha=$consulta->fetch_array(MYSQLI_ASSOC);
								if($prof == 'todos'){
								echo '<thead>';
								echo		'<tr>
												<th colspan="100%">Profissional: '.$prof.'</th>
											</tr>';
									}else{
										echo '<thead>';
								echo		'<tr>
												<th colspan="100%">Profissional: '.$linha['profissional'].' Especialista em '.$linha['espec'].'</th>
											</tr>';
									}
											$d1 = explode('-',$datai);
											$d2 = explode('-',$dataf);
											
											
								echo		'<tr>
												<th colspan="100%">LISTAGEM DE ATENDIMENTOS POR PROFISSIONAL | Período: '.$d1[2].'/'.$d1[1].'/'.$d1[0].' à '.$d2[2].'/'.$d2[1].'/'.$d2[0].'</th>
											</tr>';
								//dados do aluno
									
								//cabeçalho da tabela de classificação	
								echo '<tr >
										
										<th width="5%" scope="col">Nº</th>
										<th>CÓDIGO</th>
										<th>CBO</th>
										<th>IDADE</th>
										<th>QUANTIDADE</th>	
									 </tr>';
								echo '</thead>';
								//abrindo corpo da tabela
								echo '<tbody>';		
									$cont=1;
									$consulta = $conexao->query($sql);
								while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
									
									echo '<tr>';
									  
										echo '<td>'.$cont.'</td>';
										echo '<td>'.$linha['codigo'].'</td>';
										echo '<td>'.$linha['cbo'].'</td>';
										echo '<td>'.$linha['idade'].'</td>';
										echo '<td>'.$linha['qtd'].'</td>';
									
									  echo '</tr>'; 
									  $cont++;
								}	
					//fechando corpo da tabela
					echo '</tbody>';
						//rodapé da tabela
						echo '<tfoot>
								   <tr>
										<td colspan="100%">
											 &nbsp;<b>Emitido em:</b> '.date('d/m/Y').'
										</td>
								   </tr>
								</tfoot>';
								
								//fechando tabela
								 echo '</table>';					
			}else{
				echo'consulta vazia';
			}
	}
	
?>
</body>
</html>
