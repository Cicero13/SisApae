<!doctype html>
<html lang="pt-br">
	<?php
		include '../sessao.php';
	?>
<head>
	<title> || > SisApae < ||</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
	<link rel="stylesheet" href="../assets/css/main.css">
	<link rel="stylesheet" href="../assets/css/demo.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/vendor/dist/jquery-confirm.min.css">
        <link href="../assets/css/select2.min.css" rel="stylesheet" />
        <script>
			function validar(){
				if(confirm("Deseja Cadastrar novo Atendimento ?")){
			
			
				} else {
					return false;
				}
			}
	</script>
      
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="../principal.php"><img src="../assets/img/apae1.jpg" alt="Apae Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['usuario'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>Meu Perfil</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Configurações</span></a></li>
								<li><a href="../sair.php"><i class="lnr lnr-exit"></i> <span>Sair</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="../principal.php" class="active"><i class="lnr lnr-home"></i> <span>Início</span></a></li>
						<li><a href="../principal.php" class=""><i class="lnr lnr-undo"></i> <span>Voltar</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<div class="main-content">
					<div class="col-md-12">
					
					<div class="panel">
								<div class="panel-heading">
									<h1 class="panel-title">Cadastro de Atendimento</h1>
									<div class="form-group">
									   <a href="#" data-toggle="modal"  data-target="#modalNovo" class="btn btn-md btn-success pull-right">Novo Atendimento <i class="fa fa-plus"></i></a>
									</div>
								</div>
								<?php
									date_default_timezone_set('America/Sao_Paulo');
									$data = date('Y-m-d');
									$hora = date('H:m');
									
									$dia = '01';
									$mes = date('m');
									$ano = date('Y'); 
									$di = "$ano-$mes-$dia";
								?>
                                                            <form name="formu" method="POST" action="frmbusca.php"><br>
								<div class="panel-body">
								<div class="col-md-3">
									<div class="form-group">
									<label for="exampleInputPassword1">Data Inicial:</label>
									<input type="date" id="datai" name="datai" class="form-control" placeholder="text field" value="<?php echo $di;?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									<label for="exampleInputPassword1">Data Final:</label>
									<input type="date" id="dataf" name="dataf" class="form-control" placeholder="text field" value="<?php echo date("Y-m-t");?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<label for="exampleInputPassword1">Profissional:</label>
                                                                        <select name="prof" id="prof" class="form-control" required>
											<option value="0">Selecione Aqui</option>	
										
											<?php
												  include '../banco.php';
											
											$sql = "select codprof,nome,especialidade from tbprof";
													
											$consulta = $conexao->query($sql);
											
											if($consulta->num_rows > 0){
											   while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
												   echo '<option value='.$linha['codprof'].'>'.$linha['nome'].' ('.$linha['especialidade'].')</option>';
											   }
											} 
												?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<br>
                                                                            <button type="button" class="btn btn-md btn-primary" style="margin-top:4px" id="mostrar">Mostrar</button> 
									</div>
								</div>
                                                            </form>	
								
								<br>
								<div class="row">
								  
								</div>
								<!-- Input que contém o ultimo id válido-->
							<input type="hidden" id="id_geral" name="id_geral">
									<table class="table table-hover">
										<thead>
											<tr>
                                                                                                <th style="width:125px">DATA</th>
												<th>PROCEDIMENTO</th>
                                                                                                <th>CÓDIGO</th> 
												<th>ASSISTIDO</th>
                                                                                                <th style="width:200px">OPÇÕES</th>
												
											</tr>
										</thead>
										<tbody id="corpo_tab">
										              
										</tbody>
									</table>
							
								
								
									
								</div>
							</div>
					
					
					
					
						
		</div>
		</div>
		</div>
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; <?php echo date('d/m/Y');?> || <a href="https://www.themeineed.com" target="_blank">Theme I Need</a> || Todos os Direitos Reservados.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
	<script src="../assets/vendor/bootstrap-notify/bootstrap-notify.js"></script>
	<script src="../assets/vendor/dist/jquery-confirm.min.js"></script>
	<script src="../assets/scripts/select2.min.js"></script>
        
										
        <div class="modal" id="modalNovo">
            <div class="modal-dialog modal-lg">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><i class="fa fa-file-o text-info"></i>  &nbsp Novo Atendimento</h4>
						</div>
					<div class="modal-body">
                                    <form id="form1" class="form-horizontal"  method="POST" onsubmit="return validar();" action="salvar.php">
						<fieldset>
								<div id="messagenovo"></div>
                             
                                                    <div class="form-group">  
                                                        <div class="col-md-12">   
                                                            <div class="callout callout-warning"> 
                                                                <h4>Profissional do Atendimento:</h4>
                                                                <select class="form-control js-example-basic-single" type="submit" id="selectprof" name="selectprof" required>
                                                                        <option value="">Selecione o Profissional</option>
                                                                            <?php
                                                                                include '../banco.php';

                                                                                $sql = "select codprof,nome,especialidade from tbprof";

                                                                                $consulta = $conexao->query($sql);

                                                                                if($consulta->num_rows > 0){
                                                                                    while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
                                                                                        echo '<option value='.$linha['codprof'].'>'.$linha['nome'].' ('.$linha['especialidade'].')</option>';
                                                                                    }
                                                                                } 
                                                                            ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                                
                                                    <div class="form-group">  
                                                        <div class="col-md-12">   
                                                            <div class="callout callout-warning"> 
                                                                <h4>Paciente do Atendimento:</h4>
                                                                <select class="form-control js-example-basic-single" type="submit" id="selectpac" name="selectpac" required>
                                                                        <option value="">Selecione o Paciente</option>
                                                                            <?php
                                                                                include '../banco.php';

                                                                                $sql1 = "select codpac, nome from tbpac";

                                                                                $consulta1 = $conexao->query($sql1);

                                                                                    if($consulta1->num_rows > 0){
                                                                                    while($linha1=$consulta1->fetch_array(MYSQLI_ASSOC)){
                                                                                        echo '<option value='.$linha1['codpac'].'>'.$linha1['nome'].'</option>';
                                                                                    }
                                                                                } 
                                                                            ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                            
							
                                                <div class="form-group">  
                                                        <div class="col-md-12">   
                                                            <div class="callout callout-warning"> 
                                                                <h4>Procedimento do Atendimento:</h4>
                                                                <select class="form-control js-example-basic-single" type="submit" id="selectproc" name="selectproc" required>
                                                                        <option value="">Selecione o Procedimento</option>
                                                                            <?php
                                                                                include '../banco.php';

                                                                                $sql2 = "select codproc,descricao,num_proc from tbproc";

                                                                                $consulta2 = $conexao->query($sql2);

                                                                                if($consulta2->num_rows > 0){
                                                                                    while($linha2=$consulta2->fetch_array(MYSQLI_ASSOC)){
                                                                                        echo '<option value='.$linha2['codproc'].'>'.$linha2['descricao'].' ('.$linha2['num_proc'].')</option>';
                                                                                    }
                                                                                } 
                                                                            ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
													
                                                    
                                                        <div class="form-group">
														<div class='col-sm-6'>
                                                            <h4>Data:</h4>
                                                            <div class="input-group date">
                                                                <input value="<?php echo $data;?>" type="date" id="datanovo" name="datanovo" class="form-control" required>
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    
													
														<div class='col-sm-6'>
                                                            <h4>Hora:</h4>
                                                            <div class="input-group date">
                                                                <input value="<?php echo $hora;?>" type="time" id="horanovo" name="horanovo" class="form-control" required>
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                 
                                        </div>
				  
					<div class="modal-footer">
						<button type="button" id="novofechar" class="btn btn-default pull-right" data-dismiss="modal">Fechar</button>
                                                <button type="button" class="btn btn-success pull-left" id="btnnovoconfirma">Confirmar</button>
					</div>
                                    </form> 
                                </div>
                        </div>
        </div>
		
	<div id="modalAguarde" class="modal">
            <div class="modal-dialog">
		<div class="modal-content">
                    <div class="modal-body">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div align="center"><i class='glyphicon glyphicon-exclamation-cog'><br><br></i><img src='../assets/img/loader.gif'><br>Aguarde...<br><br><br><i id="messagem"></i></div>
                    </div>
                </div>
            </div>
        </div>
		  
            <div id="modalSalvo" class="modal">
		<div class="modal-dialog">
                    <div class="modal-content">
			<div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div align="center"><i class='glyphicon glyphicon-exclamation-cog'><br><br></i><br>Atendimento salvo com sucesso!<br><br><br></div>
			</div>
                    </div>
		</div>
            </div>
            <div id="modalExcluido" class="modal">
		<div class="modal-dialog">
                    <div class="modal-content">
			<div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div align="center"><i class='glyphicon glyphicon-exclamation-cog'><br><br></i><br>Atendimento Excluído com sucesso!<br><br><br></div>
			</div>
                    </div>
		</div>
            </div>
            <div id="modalAlterado" class="modal">
		<div class="modal-dialog">
                    <div class="modal-content">
			<div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div align="center"><i class='glyphicon glyphicon-exclamation-cog'><br><br></i><br>Atendimento Alterado com sucesso!<br><br><br></div>
			</div>
                    </div>
		</div>
            </div>
        
            <div id="modaldelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
                    <div class="modal-content">
			<form name="f1" method="POST" action="delete.php">
                            <input type="hidden" id="id_delete" name="id_delete">
							
                            <div class="modal-body">
				<div>
                                    <center><h3>Deseja excluir este Atendimento?</h3></center>
				</div>
                            </div>
                            <div class="modal-footer">
                                <div class="center">
                                    <button type="button" id="confirma_delete" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Confirmar</button>
                                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
				</div>
                            </div>
			</form>
                    </div>
		</div>
            </div>									
<script>

$(document).ready(function(){ 
        //Adicionando busca no select 
        $('#modalNovo').on('shown.bs.modal', function () {
             $('.js-example-basic-single').select2();
        });

        $("table").on("click", "a", function(){
        var id = $(this).attr("id");
		var btn_tipo = id.split('|');
		if (btn_tipo[0] == 'E'){
                    $("#id_geral").val(btn_tipo[1]);	
					$("#modaldelete").modal('show');	
					
                    
		}
		if (btn_tipo[0] == 'A'){
					$("#id_geral").val(btn_tipo[1]);
                    $("#modalapac").modal('show');	
                   
		}				
             
	});


	 $("#confirma_delete").click(function() {
		
			var id = $("#id_geral").val();
						
			
                            $("#modaldelete").modal('hide');			
                            $("#modalAguarde").modal('show'); //carregando o modal de processamento de notas
                            $.post('delete.php', {id: id}, function(resposta) {
							
                                if(resposta != false) {
                                    //$("#modalAguarde").modal('hide'); 
                                    $("#mostrar").click();
                                    $("#modalExcluido").modal('show');
                                    $("#modaldelete").modal('hide');
                                }
                            });  
		 
	 });



	$("#confirma_apac").click(function() {
		
			var id = $("#id_geral").val();

			var cod_apac = $('#cod_apac').val();

			$("#modalapac").modal('hide');			
			$("#modalAguarde").modal('show'); //carregando o modal de processamento de notas
			//alert(btn_tipo[0]+ " | "+btn_tipo[1]);
			//alert('codapac: '+cod_apac);
			$.post('atualizapac.php', {id: id, cod_apac: cod_apac}, function(resposta) {
			     if (resposta != false) {
					//$("#modalAguarde").html(resposta);
					$("#mostrar").click();
					$("#modalAlterado").modal('show');
					$("#novo").html(resposta);
			}
		});  
						
                     
		 
	 });	 
		
		$("#btnnovoconfirma").click(function() {
			// Colocamos os valores de cada campo em uma v?avel para facilitar a manipula?
		    var prof = $("#selectprof").children(":selected").attr("value");
		    var pac = $("#selectpac").children(":selected").attr("value");
		    var proc = $("#selectproc").children(":selected").attr("value");
			var data = $("#datanovo").val();
			var hora = $("#horanovo").val();
			var apac = $("#apac").val();
			
			
			if((prof == '') || (pac == '') || (proc == '')){
			 $(function(){
                                
                                  $.notify({
                                    title: '<strong>AVISO!</strong> <br />',
                                    icon: 'glyphicon glyphicon-ok',
                                    message: "Informe todos os dados!"
                                  },{
                                    type: 'warning',
                                    delay: 2,
                                    animate: {
                                        enter: 'animated fadeInDown',
                                        exit: 'animated fadeOutRight'
                                    },
                                    placement: {
                                      from: "top",
                                      align: "center"
                                    },
                                    offset: 100,
                                    spacing: 100,
                                    z_index: 9999,
                                  });
                                
                              });
		}else{
		          
			
				$("#modalAguarde").modal('show'); //carregando o modal de processamento de notas
				$.post('salvar.php', {prof: prof, pac: pac, proc: proc, data: data, hora: hora, apac: apac}, function(resposta) {
						
						if (resposta != false) {
						

								
								$("#modalAguarde").modal('hide'); 
								$("#modalNovo").modal('hide'); 
                                                                $("#modalSalvo").modal('show');
								
							}
						
					
				});
		}
			
			
			
			
		});
		
		
	 
	 
	// Quando o formul?o for enviado, essa fun? ?hamada
	$("#mostrar").click(function() {
		
		// Colocamos os valores de cada campo em uma v?avel para facilitar a manipula?
		var d1 = $("#datai").val();
		var d2 = $("#dataf").val();
		var prof = $("#prof").children(":selected").attr("value"); 
		
		//alert(d1+" "+d2+" "+prof);
		
		
		
		if(prof == 0){
			 $(function(){
                                
                                  $.notify({
                                    title: '<strong>AVISO!</strong> <br />',
                                    icon: 'glyphicon glyphicon-ok',
                                    message: "Selecione um profissional!"
                                  },{
                                    type: 'danger',
                                    delay: 2,
                                    animate: {
                                        enter: 'animated fadeInDown',
                                        exit: 'animated fadeOutRight'
                                    },
                                    placement: {
                                      from: "top",
                                      align: "center"
                                    },
                                    offset: 100,
                                    spacing: 100,
                                    z_index: 9999,
                                  });
                                
                              });
		}else{
		          
			
				$("#modalAguarde").modal('show'); //carregando o modal de processamento
				$.post('busca.php', {d1: d1, d2: d2, prof: prof}, function(resposta) {
						
						if (resposta != false) {
						
								$("#corpo_tab").html(resposta);
								$("#modalAguarde").modal('hide'); 
								
							}
						
					
				});
		}
	    });
	
	
       
        
        
});


</script>										
										
</body>
</html>
