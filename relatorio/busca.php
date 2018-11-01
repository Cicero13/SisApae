<?php

	//Conexão com o Banco de Dados

	include('../banco.php');

	

	//Recebendo Variaveis

	$datai = $_POST['d1'];

	$dataf = $_POST['d2'];
	
	$prof = $_POST['prof'];
	
	if($prof == "todos"){
		//Criando a Consulta
		$sql = "select tbproc.num_proc AS codigo,tbproc.descricao as proc,  tbprof.nome as nome, COUNT(tbatend.codatend) as qtd from tbatend	
			inner join tbproc on (tbproc.codproc=tbatend.codproc)
			inner join tbpac on (tbpac.codpac=tbatend.codpac)
			inner join tbprof on (tbprof.codprof=tbatend.codprof)
			where tbatend.data between '$datai' and '$dataf' GROUP BY(tbprof.codprof)";
														 
		$consulta = $conexao->query($sql);
		
	}else {
		$sql = "select tbproc.num_proc AS codigo,tbproc.descricao as proc,  tbprof.nome as nome, COUNT(tbatend.codatend) as qtd from tbatend	
			inner join tbproc on (tbproc.codproc=tbatend.codproc)
			inner join tbpac on (tbpac.codpac=tbatend.codpac)
			inner join tbprof on (tbprof.codprof=tbatend.codprof)
			where tbatend.data between '$datai' and '$dataf' and tbatend.codprof = '$prof'";
														 
		$consulta = $conexao->query($sql);
	}							
												
												
												
												
	if($consulta){
		if($consulta->num_rows > 0){
				while($linha = $consulta->fetch_array(MYSQLI_ASSOC)){

					echo '<tr>
							
							<td>'.$linha['nome'].'</td>
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