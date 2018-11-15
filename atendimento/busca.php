<?php

	//Conexão com o Banco de Dados

	include('../banco.php');

	

	//Recebendo Variaveis

	$datai = $_POST['d1'];

	$dataf = $_POST['d2'];
	
	$prof = $_POST['prof'];
	
	$sql = "select tbatend.codatend as codatend,DATE_FORMAT( tbatend.data,  '%d-%m-%Y' ) AS data, tbproc.num_proc as codigo, tbproc.descricao as proc,tbpac.nome as pac,tbprof.codprof as codprof, tbprof.nome as prof from tbatend	
                    inner join tbproc on (tbproc.codproc=tbatend.codproc)
                    inner join tbpac on (tbpac.codpac=tbatend.codpac)
                    inner join tbprof on (tbprof.codprof=tbatend.codprof)
                where tbatend.data between '$datai' and '$dataf' and tbatend.codprof = '$prof' limit 30";
											
	$consulta = $conexao->query($sql);
												
												
	if($consulta){
		if($consulta->num_rows > 0){
                    while($linha = $consulta->fetch_array(MYSQLI_ASSOC)){

			echo '<tr>
				<td>'.$linha['data'].'</td>
				<td>'.$linha['proc'].'</td>
                                <td>'.$linha['codigo'].'</td>
				<td>'.$linha['pac'].'</td>
				<td>
                                    <a title="Excluir Atendimento"  id="E|'.$linha['codatend'].'" class="btn btn-danger" href="#">
                                         <i class="fa fa-trash" style="color: white;"></i><span class="icon-name"></span>
                                    </a>
				</td>
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