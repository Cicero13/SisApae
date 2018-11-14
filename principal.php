<!doctype html>
<html lang="pt-br">
	<?php
		include 'sessao.php';
	?>
<head>
	<title> || > SisApae < ||</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<link rel="stylesheet" href="assets/vendor/dist/jquery-confirm.min.css">
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="principal.php"><img src="assets/img/apae1.jpg" alt="Apae Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['usuario'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>Meu Perfil</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Configurações</span></a></li>
								<li><a href="sair.php"><i class="lnr lnr-exit"></i> <span>Sair</span></a></li>
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
						<li><a href="principal.php" class="active"><i class="lnr lnr-home"></i> <span>Início</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-add"></i><span>Gerenciamento</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="usuario/frmbusca.php" class=""><i class="fa fa-user"></i>Usuário</a></li>
									<li><a href="assistido/frmbusca.php" class=""><i class="fa fa-child"></i>Assistido</a></li>
                                                                        <li><a href="profissional/frmbusca.php" class=""><i class="fa fa-user-md"></i>Profissional</a></li>
									<li><a href="procedimento/frmbusca.php" class=""><i class="fa fa-tasks"></i>Procedimentos</a></li>
								</ul>
							</div>
						</li>
                                                <li><a href="atendimento/frmbusca.php" class=""><i class="lnr lnr-dice"></i> <span>Atendimentos</span></a></li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-add"></i><span>Relatórios</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="relatorio/frmbusca.php" class=""><i class="lnr lnr-dice"></i> <span>Contagem Geral</span></a></li>
									<li><a href="relatorio/frmbusca1.php" class=""><i class="lnr lnr-dice"></i> <span>Contagem de Profissional</span></a></li>
                                    <li><a href="relatorio/frmapac.php" class=""><i class="lnr lnr-dice"></i> <span>Contagem APAC</span></a></li>
                                    <li><a href="relatorio/frmbpa.php" class=""><i class="lnr lnr-dice"></i> <span>Contagem BPA</span></a></li>
								</ul>
							</div>
						</li>
									
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<img src="assets/img/principal.png" style="width:100%">
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
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="../assets/vendor/dist/jquery-confirm.min.js"></script>
	
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
</body>

</html>

