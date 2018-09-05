<!doctype html>
<html lang="pt-br">
	<?php
		include '../sessao.php';
	?>
<head>
	<?php
	include"cabecalho.php";
	
	?>
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="../principal.php"><img src="../assets/img/apae.png" alt="Apae Logo" class="img-responsive logo"></a>
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
									<center><h3 class="panel-title">Cadastro de Assistidos</h3></center>
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
												<th>Nome</th>
												<th>Deficiência</th>
												<th>CNS</th>
												<th>Nascimento</th>
												<th>Fone</th>
												<th>Fone do Responsável</th>
												<th>Sexo</th>
												<th>Opções</th>
												</tr>
										</thead>
										<tbody>
											 <?php
												if(isset($_POST['texto'])){
													
													$texto = $_POST['texto'];
													
													include"../banco.php";
													
													$sql=" select codpac,nome,deficiencia,cns,lpad(day(nascimento),2,'0') as dia,lpad(month(nascimento),2,'0') as mes,lpad(year(nascimento),4,'0') as ano,fone,fone_resp,sexo from tbpac
															where nome like '%$texto%'";
													
													$consulta = $conexao->query($sql);
													
													if($consulta->num_rows > 0){
														
														echo '<center><span class="label label-info">RESULTADOS</span></center>';
														
														while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
															   if($linha['sexo']=='m'){
																   echo '<tr>
																		<td>'.$linha['nome'].'</td>
																		<td>'.$linha['deficiencia'].'</td>
																		<td>'.$linha['cns'].'</td>
																		<td>'.$linha['dia'].'/'.$linha['mes'].'/'.$linha['ano'].'</td>
																		<td>'.$linha['fone'].'</td>
																		<td>'.$linha['fone_resp'].'</td>
																		<td><i class="fa fa-male"></i></td>
																		<td><a style="width:50px" title="Alterar" data-toggle="modal" data-target="#alterar'.$linha['codpac'].'" class="btn btn-info btn-sm" href="#">
																	<i class="fa fa-edit" style="color: white;"></i><span class="icon-name"></span>
																</a>
																<a style="width:50px" title="Excluir" data-toggle="modal" data-target="#deletar'.$linha['codpac'].'" class="btn btn-danger btn-sm" href="#">
																	<i class="fa fa-trash" style="color: white;"></i><span class="icon-name"></span>
																</a>
																
																<div id="alterar'.$linha['codpac'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form name="f1" method="POST" action="frmcadaltera.php">
																				 <input type="hidden" id="codpac" name="codpac" value="',$linha['codpac'].'">
																					<div class="modal-body">
																						<div>
																							<center><h3>Deseja alterar este usuário?</h3></center>
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
																<div id="deletar'.$linha['codpac'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																		<form name="f1" method="POST" action="delete.php">
																			<input type="hidden" id="codpac" name="codpac" value="'.$linha['codpac'].'">
																				<div class="modal-body">
																					<div>
																						<center><h3>Deseja excluir este usuário?</h3></center>
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
																</div></td>
															   </tr>';
															   }else{
																   echo '<tr>
																		<td>'.$linha['nome'].'</td>
																		<td>'.$linha['deficiencia'].'</td>
																		<td>'.$linha['cns'].'</td>
																		<td>'.$linha['dia'].'/'.$linha['mes'].'/'.$linha['ano'].'</td>
																		<td>'.$linha['fone'].'</td>
																		<td>'.$linha['fone_resp'].'</td>
																		<td><i class="fa fa-female"></i></td>
																		<td><a style="width:50px" title="Alterar" data-toggle="modal" data-target="#alterar'.$linha['codpac'].'" class="btn btn-info btn-sm" href="#">
																	<i class="fa fa-edit" style="color: white;"></i><span class="icon-name"></span>
																</a>
																<a style="width:50px" title="Excluir" data-toggle="modal" data-target="#deletar'.$linha['codpac'].'" class="btn btn-danger btn-sm" href="#">
																	<i class="fa fa-trash" style="color: white;"></i><span class="icon-name"></span>
																</a>
																
																<div id="alterar'.$linha['codpac'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form name="f1" method="POST" action="frmcadaltera.php">
																				 <input type="hidden" id="codpac" name="codpac" value="',$linha['codpac'].'">
																					<div class="modal-body">
																						<div>
																							<center><h3>Deseja alterar este usuário?</h3></center>
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
																<div id="deletar'.$linha['codpac'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																		<form name="f1" method="POST" action="delete.php">
																			<input type="hidden" id="codpac" name="codpac" value="'.$linha['codpac'].'">
																				<div class="modal-body">
																					<div>
																						<center><h3>Deseja excluir este usuário?</h3></center>
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
																</div></td>
															   </tr>';
															   }
														}
														
													}else{
														
														echo '<center><span class="label label-danger">CONSULTA VAZIA</span></center>';
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
