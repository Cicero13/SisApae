<!doctype html>
<html lang="pt-br" class="fullscreen-bg">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/apae1.jpg" alt="Klorofil Logo"></div>
								<p class="lead">Informe seus dados de acesso</p>
							</div>
							<form class="form-auth-small" action="login.php" method="POST">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Informe seu Email" required="">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Senha</label>
									<input type="password" class="form-control" id="senha" name="senha" placeholder="Informe sua Senha" required="">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Lembrar-me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">ENTRAR</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Esqueceu sua Senha?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">APAE - SOBRAL</h1>
							<p>Acesso à área administrativa</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
  </div>
	<!-- END WRAPPER -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/toastr/toastr.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	
	
	
			 <div id="loginErro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<br />
						<center> <h4><b>Usuário ou senha incorretos!</b></h4></center>
						<br />
					</div>
				</div>
				</div>
			</div>
			
			<div id="logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<br />
							<center> <h4><b>Saída do sistema realizado com sucesso!</b></h4></center>
							<br />
						</div>
					</div>
				</div>
			</div>

			<div id="sessaoErro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<br />
							<center> <h4><b>Sessão Expirada! Faça login novamente!</b></h4></center>
							<br />
						</div>
					</div>
				</div>
			</div>

<?php
		if(isset($_GET['login'])){
			?><script type="text/javascript">
				$(window).load(function() {
					$('#loginErro').modal('show');
				});
			</script>
		<?php  
		}
		if(isset($_GET['sessao'])){
			?><script type="text/javascript">
				$(window).load(function() {
					$('#sessaoErro').modal('show');
				});
			</script>
		<?php  
		}
		if(isset($_GET['logout'])){
			?><script type="text/javascript">
				$(window).load(function() {
					$('#logout').modal('show');
				});
			</script>
		<?php  
		}
?>
</body>
</html>

	
