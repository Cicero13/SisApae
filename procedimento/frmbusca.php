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
									<center><h3 class="panel-title">Procedimentos Cadastrados </h3></center>
								</div>
								<div class="panel-body">
									<a href="frmcad.php" class="btn btn-md btn-success pull-right">Cadastrar novo</a>
									<br>
								<form name="f1" method="POST" action="frmbusca.php"><br>
									<div class="input-group text-left">
										<input class="form-control" type="text" name="texto" placeholder="Texto para busca aqui">
										<span class="input-group-btn">
										<button class="btn btn-md btn-primary"><i class="fa fa-search"></i> Buscar</button>
										</span>   
									</div>
								</form>	
								<br>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>DESCRIÇÃO</th>
												<th>Nº DO PROCEDIMENTO</th>
												<th>OPÇÕES</th>
											</tr>
										</thead>
										<tbody>
										   <?php
											if(isset($_POST['texto'])){
												//Recebendo Valor do Campo Busca
												$texto = $_POST['texto'];
												
												//Acesso ao Banco
												include('../banco.php');
												
												//Criando a Consulta
												$sql = "select * from tbproc 	
														 where descricao like
														 '%$texto%'";
														 
													
												$consulta = $conexao->query($sql);
												
											
												if($consulta->num_rows > 0){
													while($linha = $consulta->fetch_array(MYSQLI_ASSOC)){
														?>
														<tr>
															<td><?php echo $linha['descricao'] ?></td>
															<td><?php echo $linha['num_proc'] ?></td>
															<td>
																<a title="Alterar" data-toggle="modal" data-target="#alterar<?php echo $linha['codproc'] ?>" class="btn btn-info" href="#">
																	<i class="fa fa-edit" style="color: white;"></i><span class="icon-name"></span>
																</a>
																<a title="Excluir" data-toggle="modal" data-target="#deletar<?php echo $linha['codproc'] ?>" class="btn btn-danger" href="#">
																	<i class="fa fa-trash" style="color: white;"></i><span class="icon-name"></span>
																</a>
																
																<div id="alterar<?php echo $linha['codproc']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form name="f1" method="POST" action="frmcadaltera.php">
																				 <input type="hidden" id="id" name="id" value="<?php echo $linha['codproc']; ?>">
																					<div class="modal-body">
																						<div>
																							<center><h3>Deseja alterar este procedimento?</h3></center>
																						</div>
																					</div>
																					<div class="modal-footer">
																						<div class="center">
																							<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Confirmar</button>
																							<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
																						</div>
																					</div>
																			</form>
																		</div>
																	</div>
																</div>
																<div id="deletar<?php echo $linha['codproc'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																		<form name="f1" method="POST" action="delete.php">
																			<input type="hidden" id="id" name="id" value="<?php echo $linha['codproc']; ?>">
																				<div class="modal-body">
																					<div>
																						<center><h3>Deseja excluir este procedimento?</h3></center>
																					</div>
																				</div>
																		<div class="modal-footer">
																			<div class="center">
																				<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Confirmar</button>
																				<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
																			</div>
																		</div>
																		</form>
																		</div>
																	</div>
																</div>
															</td>
														</tr>
														<?php
													}
												} else {
													echo 'Cosulta vazia';
												}
														
											}
											
										?>	           
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
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
</body>
</html>
