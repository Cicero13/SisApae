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
									<h1 class="panel-title">Relatórios</h1>
									<div class="form-group">
									   <a href="#" data-toggle="modal"  data-target="#modalimprime" class="btn btn-md btn-success pull-right"><i class="fa fa-print"></i> Imprimir </a>
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
									<label for="exampleInputPassword1">Profissional</label>
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
								
									<table class="table table-hover">
										<thead>
											<tr>
												<th>CÓDIGO</th>
												<th>PROCEDIMENTO</th>
												<th>QUANTIDADE</th>
											</tr>
										</thead>
										<tbody id="corpo_tab">
										   <?php
											if((isset($_POST['datai']))&&(isset($_POST['dataf']))&&(isset($_POST['prof']))){
												//Recebendo Valor do Campo Busca
												$datai = $_POST['datai'];
												$dataf = $_POST['dataf'];
												$prof = $_POST['prof'];
												
												//Acesso ao Banco
												include('../banco.php');
												
												//Criando a Consulta
												$sql = "select tbatend.codatend as codatend,tbatend.data as data,tbproc.descricao as proc,tbpac.nome as pac,tbprof.codprof as codprof, tbprof.nome as prof from tbatend	
														 inner join tbproc on (tbproc.codproc=tbatend.codproc)
														 inner join tbpac on (tbpac.codpac=tbatend.codpac)
														 inner join tbprof on (tbprof.codprof=tbatend.codprof)
														 where tbatend.data between '$datai' and '$dataf' and tbprof.codprof='$prof' ";
														 
													
												$consulta = $conexao->query($sql);
												
											
												if($consulta->num_rows > 0){
													echo '<center><span class="label label-info">RESULTADOS</span></center>';
													while($linha = $consulta->fetch_array(MYSQLI_ASSOC)){
														?>
														
														<?php
													}
												} else {
													echo '<center><span class="label label-danger">CONSULTA VAZIA</span></center>';
												}
														
											}
											
										?>	           
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
<?php

            if(isset($_GET['insert'])){
                if ($_GET['insert']=="ok") {
                    ?>
                        <script>
                            $(function(){
                                $(window).load(function(){
                                  $.notify({
                                    title: '<strong>FEITO!</strong> <br />',
                                    icon: 'glyphicon glyphicon-ok',
                                    message: "Cadastro realizado com sucesso!"
                                  },{
                                    type: 'success',
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
                              });
                        </script>
                    <?php
                }
			}
			if(isset($_GET['update'])){
				if($_GET['update'] == 'ok'){
                ?>
                    <script>
                        $(function(){
                            $(window).load(function(){
                              $.notify({
                                title: '<strong>FEITO!</strong> <br />',
                                icon: 'glyphicon glyphicon-ok',
                                message: "Dados alterados com sucesso!"
                              },{
                                type: 'info',
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
                          });
                    </script>
                <?php
				}
			}
			if(isset($_GET['delete'])){
				if($_GET['delete'] == 'ok'){
                    ?>
                        <script>
                            $(function(){
                                $(window).load(function(){
                                  $.notify({
                                    title: '<strong>FEITO!</strong> <br />',
                                    icon: 'glyphicon glyphicon-ok',
                                    message: "O usuário foi deletado!"
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
                              });
                        </script>

                    <?php
				}
			}
        ?>
		
		<div id="modalimprime" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div>
                                    <center><h3>Deseja Realizar Impressão?</h3></center>
                                </div>
					<div class="modal-footer">
                                    <div class="center">
						<a href="#" id="bnt_imprimir" class="btn btn-success">
                                            <i class="fa fa-check" ></i>&nbsp;Confirmar
						</a>
					<button class="btn btn-danger" id="nao" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
                                    </div>
				</div>
                            </div>
			</div>
                    </div>
		</div>
										
        <div class="modal fade" id="modalNovo">
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
													
                                                        <div class="form-group">
														<div class='col-sm-5'>
                                                            <h4>APAC</h4>
                                                            <div class="input-group date">
                                                                <input type="text" id="apac" name="apac" class="form-control" required>
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-check"></span>
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
		
		<div id="modalAguarde" class="modal fade">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <!-- dialog body -->
			  <div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div align="center"><i class='glyphicon glyphicon-exclamation-cog'><br><br></i><img src='../assets/img/loader.gif'><br>Aguarde...<br><br><br></div>
			  </div>
			  <!-- dialog buttons 
			  <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>-->
			</div>
		   </div>
          </div>
		  
		  <div id="modalSalvo" class="modal fade">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <!-- dialog body -->
			  <div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div align="center"><i class='glyphicon glyphicon-exclamation-cog'><br><br></i><br>Atendimento salvo com sucesso!<br><br><br></div>
			  </div>
			  
			  <!-- dialog buttons 
			  <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>-->
			</div>
		   </div>
          </div>
		  <div id="modaldelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																		<form name="f1" method="POST" action="delete.php">
																			<input type="hidden" id="id" name="id">
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
																
					<div id="modalapac" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																		<form name="f1" method="POST" action="">
																			<input type="hidden" id="id" name="id">
																				<div class="modal-body">
																					<div>
																						<center><h3>Informe o código APAC</h3></center>
																						<input type="text" id="cod_apac" name="cod_apac" class="form-control">
																					</div>
																				</div>
																		<div class="modal-footer">
																			<div class="center">
																				<button type="button" id="confirma_apac" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Atualizar</button>
																				<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
																			</div>
																		</div>
																		</form>
																		</div>
																	</div>
																</div>
										
										
										
<script>

$(document).ready(function(){ 
$('#modalNovo').on('shown.bs.modal', function () {
           $('.js-example-basic-single').select2();
        });

        $("table").on("click", "a", function(){
        		var id = $(this).attr("id");
				var btn_tipo = id.split('|');
				if (btn_tipo[0] == 'E'){
					$("#modaldelete").modal('show');	
					$("#modaldelete").on("click", "button", function(){
						var id2 = $(this).attr("id");
						
						if(id2=='confirma_delete'){
							$("#modaldelete").modal('hide');			
							$("#modalAguarde").modal('show'); //carregando o modal de processamento de notas
							$.post('delete.php', {id: btn_tipo[1]}, function(resposta) {
							
							 if (resposta != false) {
									//$("#modalAguarde").modal('hide'); 
									$("#mostrar").click(); 
									//$("#modaldelete").modal('hide');
								}
							 });  
						}else{
							
						}
					});
				}
				if (btn_tipo[0] == 'A'){
					$("#modalapac").modal('show');	
					$("#modalapac").on("click", "button", function(){
						var id2 = $(this).attr("id");
						var cod_apac = $('#cod_apac').val();
						if(id2=='confirma_apac'){
							$("#modalapac").modal('hide');			
							$("#modalAguarde").modal('show'); //carregando o modal de processamento de notas
							$.post('atualizapac.php', {id: btn_tipo[1], cod_apac: cod_apac}, function(resposta) {
							
							 if (resposta != false) {
									//$("#modalAguarde").modal('hide'); 
									//alert('iei');
									$("#mostrar").click(); 
									//$("#modaldelete").modal('hide');
								}
							 });  
						}else{
							
						}
					});
				}				
             
	    });

			$("#modalimprime").on("click", "a", function(){
						var id2 = $(this).attr("id");
						
						var datai = $("#datai").val();
						var dataf = $("#dataf").val();
						var prof = $("#prof").children(":selected").attr("value");
						
						
						if(id2=='bnt_imprimir'){
							   if((prof == '') || (datai == '') || (dataf == '')){
								   
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
								//alert("iei");
							$("#modalimprime").modal('hide'); 
						      var url = "report1.php?datai="+datai+"&dataf="+dataf+"&prof="+prof;
							  window.open(url, '_blank');
							  
							}
							
						}
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
		          
			
				$("#modalAguarde").modal('show'); //carregando o modal de processamento de notas
				$.post('busca1.php', {d1: d1, d2: d2, prof: prof}, function(resposta) {
						
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
