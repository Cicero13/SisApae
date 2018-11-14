<?php

	//Conexão com o Banco de Dados

	include('../banco.php');

	

	//Recebendo Variaveis

	$datai = $_POST['d1'];

	$dataf = $_POST['d2'];
	
	$prof = $_POST['prof'];
	
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
												
												
												
												
	if($consulta){
		if($consulta->num_rows > 0){
				while($linha = $consulta->fetch_array(MYSQLI_ASSOC)){

					echo '<tr>
							<td>'.$linha['codigo'].'</td>
							<td>'.$linha['cbo'].'</td>
							<td>'.$linha['idade'].'</td>
							<td>'.$linha['qtd'].'</td>
						</tr>';
		    }//final do while
		}else{//final do if de qtd de registros
		    echo "<tr><td colspan=5><div class='alert alert-danger'>Não foram encontrados registros de atendimento</div></td></tr>";  
		}

	}else{
        //echo $sql;
		echo "<tr><td colspan=5><div class='alert alert-danger'>Não foram encontrados registros de atendimento</div></td></tr>";  

	}												
												
	
    

					   

	

	

	

	

?>