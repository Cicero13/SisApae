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
	<script>
			function validar(){
				if(confirm("Deseja Cadastrar esse Usuário ?")){
			
			
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
						<li><a href="frmbusca.php" class=""><i class="lnr lnr-undo"></i> <span>Voltar</span></a></li>
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
									<center><h3 class="panel-title">Profissionais Cadastrados </h3></center>
									<br>
									
									<form name="f1" onsubmit="return validar();" method="POST" action="salvar.php">
										<div class="form-group">
											<label for="exampleInputEmail1">Nome:</label>
											<input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" placeholder="Informe seu Nome" required="">
										</div>
									
									<div class="form-group">
									<label for="exampleInputEmail1">Sexo:</label>
                                    <select name="sexo" id="sexo" class="form-control show-tick">
                                        <option value="m">Masculino</option>
                                        <option value="f">Feminino</option>
                                    </select>
									</div>
                               
										<div class="form-group">
											<label for="exampleInputPassword1">Especialidade:</label>
											<input type="text" class="form-control" id="especialidade" name="especialidade" placeholder="Informe sua Especialidade" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Conselho:</label>
											<input type="text" class="form-control" id="conselho" name="conselho" placeholder="Informe seu Conselho" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">CBO:</label>
											<input type="text" class="form-control" id="cbo" name="cbo" placeholder="Informe seu CBO" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Fone:</label>
											<input type="text" class="form-control" id="fone" name="fone" placeholder="Informe seu Telefone" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">CNS:</label>
											<input type="text" class="form-control" id="cns" name="cns" placeholder="Informe seu CNS" required="">
										</div>
									
								</div>
									<center><button type="submit" class="btn btn-success">Cadastrar</button></center>
									</form>	
								<br>
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
	<script src="../assets/vendor/dist/jquery-confirm.min.js"></script>
	<script type="text/javascript" src="../assets/vendor/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="../assets/vendor/jquery.maskedinput-1.1.4.pack.js"/></script>
	<script type="text/javascript">
									$(document).ready(function(){
											$("#fone").mask("(99)99999-9999")
									})
									</script>
	
	<div id="validar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
						<div>
							<center><h3>Deseja Cadastrar este usuário?</h3></center>
						</div>
						<div class="modal-footer">
							<div class="center">
								<button type="submit" id="sim" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Confirmar</button>
								<button class="btn btn-danger" id="nao" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

