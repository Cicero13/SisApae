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
			  
			 if($prof == "todos"){
		//Criando a Consulta
		$sql = "select tbproc.num_proc AS codigo,tbproc.descricao as proc,  tbprof.nome as nome,tbprof.especialidade as espec, COUNT(tbatend.codatend) as qtd from tbatend	
			inner join tbproc on (tbproc.codproc=tbatend.codproc)
			inner join tbpac on (tbpac.codpac=tbatend.codpac)
			inner join tbprof on (tbprof.codprof=tbatend.codprof)
			where tbatend.data between '$datai' and '$dataf' GROUP BY(tbprof.codprof)";
														 
		$consulta = $conexao->query($sql);
		
	}else {
		$sql = "select tbproc.num_proc AS codigo,tbproc.descricao as proc,  tbprof.nome as nome,tbprof.especialidade as espec, COUNT(tbatend.codatend) as qtd from tbatend	
			inner join tbproc on (tbproc.codproc=tbatend.codproc)
			inner join tbpac on (tbpac.codpac=tbatend.codpac)
			inner join tbprof on (tbprof.codprof=tbatend.codprof)
			where tbatend.data between '$datai' and '$dataf' and tbatend.codprof = '$prof'";
														 
		$consulta = $conexao->query($sql);
	}	
			 		  
			
			 
			   if ($consulta->num_rows > 0) {//se encontrar algum valor
				  
				  //topo do lista do ranking
								 echo '<div>';
									 echo '<center><font face="arial" size="-1">';
									 echo '<img src="../assets/img/apae1.jpg">';
									 echo 	'<h2>APAE</h2>';
									 echo 	'<h3>LOGRADOURO - BAIRRO - CIDADE-UF</h3>';
									 //echo 	'<p>'.CEP.' - '.CNPJ.'</p>';
									 
									 echo '</center></face>';
								echo '</div>';
								//abrindo tabela	
								echo '<table width="100%">';
								//pegando o médico
								$linha=$consulta->fetch_array(MYSQLI_ASSOC);
								echo '<thead>';
								echo		'<tr>
												<th colspan="100%">Profissional: '.$linha['nome'].' Especialista em '.$linha['espec'].'</th>
											</tr>';
											$d1 = explode('-',$datai);
											$d2 = explode('-',$dataf);
											
											
								echo		'<tr>
												<th colspan="100%">LISTAGEM DE PROFISSIONAL POR ATENDIMENTO| Período: '.$d1[2].'/'.$d1[1].'/'.$d1[0].' à '.$d2[2].'/'.$d2[1].'/'.$d2[0].'</th>
											</tr>';
								//dados do aluno
									
								//cabeçalho da tabela de classificação	
								echo '<tr >
										
										<th width="5%" scope="col">Nº</th>
										<th>PROFISSIONAL</th>
										<th>QUANTIDADE</th>
										
										
									 </tr>';
								echo '</thead>';

								//abrindo corpo da tabela
								echo '<tbody>';		
								$cont=1;
								while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
									
									echo '<tr>';
									  
									  echo '<td>'.$cont.'</td>';
									  echo '<td>'.strtoupper($linha['nome']).'</td>';
									  echo '<td>'.strtoupper($linha['qtd']).'</td>';
									  echo '</tr>'; 
									  $cont++;
									//preenchendo matriz com os resultados da busca sql na ordem
									// array_push($rank,array($linha2['codalu'],$linha2['aluno'],$linha2['media_geral'],$linha2['rank']));
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
			
			//echo 'Turma '.$_GET['turma'].'<br>';
			//echo 'Ano '.$_GET['ano'];
			echo'consulta vazia';
				}
		}

		
		
		
		
?>
</body>
</html>
