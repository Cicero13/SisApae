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
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h1 class="panel-title">USUÁRIOS CADASTRADOS</h1><br>
									<a href="frmcad.php" class="btn btn-success pull-right">Cadastrar novo &nbsp;<i class="fa fa-plus"></i></a><br>
								</div>
								
								<div class="panel-body">
								<form name="f1" method="POST" action="frmbusca.php">
									<div class="input-group">
										<input type="text" name="texto" id="texto" value="" class="form-control" placeholder="Nome para busca...">
										<span class="input-group-btn"><button type="submit" class="btn btn-primary">Buscar</button></span>
									</div>
									<br>
								</form>	
									<br>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>NOME</th>
												<th>EMAIL</th>
												<th>SENHA</th>
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
												$sql = "select * from tbusu
													where nome like
													'%$texto%'";
										 
									
												$consulta = $conexao->query($sql);
								
							
												if($consulta->num_rows > 0){
													while($linha = $consulta->fetch_array(MYSQLI_ASSOC)){
														echo '<tr>
																<td>'.$linha['id'].'</td>
																<td>'.$linha['nome'].'</td>
																<td>'.$linha['email'].'</td>
																<td>...</td>
																<td>
																	<a title="Alterar" onclick=alterar('.$linha['id'].') href="#" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
																	<a title="Apagar" onclick=alterar('.$linha['id'].') href="#" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
																</td>	
						
															</tr>';
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
	
	
	  <div id="loginOk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="">
                            <center> <h3>Login aprovado! <i class="fa fa-check fa-lg"></i> </h3></center>
                            <center> <h4>Seja Bem-Vindo ao Sistema. Tenha um ótimo dia!</h4></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

<?php
		if(isset($_GET['login'])){
			?><script type="text/javascript">
				$(window).load(function() {
					$('#loginOk').modal('show');
				});
			</script>
		<?php  
		}
?>