<!doctype html>
<html lang="pt-br">
	<?php
		include '../sessao.php';
	?>
<head>
	<?php
	include"cabecalho.php";
	?>
	<script>
			function validar(){
				if(confirm("Deseja Cadastrar esse Assistido ?")){
			
			
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
									<center><h3 class="panel-title">Cadastro de Assistidos</h3></center>
									<br>
									<form name="f1" onsubmit="return validar();" method="POST" action="salvar.php">
										<div class="form-group">
											<label for="exampleInputEmail1">Nome <font color="red"></font>:</label>
											<input type="text" class="form-control" maxlength="50"  name="nome" aria-describedby="emailHelp" placeholder="Informe o Nome do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Necessidade Especial <font color="red"></font>:</label>
											<input type="text" class="form-control" maxlength="50"  name="deficiencia" aria-describedby="emailHelp" placeholder="Informe a Necessidade Especial do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">CNS <font color="red"></font>:</label>
											<input type="text" class="form-control" maxlength="18" name="cns" placeholder="Informe o CNS" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">CID <font color="red"></font>:</label>
											<input type="text" class="form-control" maxlength="20" name="cid" placeholder="Informe o CID" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">IBGE <font color="red"></font>:</label>
											<input type="text" class="form-control"  maxlength="10" name="ibge" placeholder="Informe o IBGE" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Pai <font color="red"></font>:</label>
											<input type="text" class="form-control" maxlength="50" name="pai" placeholder="Informe o Nome do Pai do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Mãe <font color="red"></font>:</label>
											<input type="text" class="form-control" maxlength="50" name="mae" placeholder="Informe o Nome da Mãe do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Endereço <font color="red"></font>:</label>
											<input style="width: 400px" type="text" maxlength="50" class="form-control"  name="endereco" placeholder="Informe o Endereço do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Bairro <font color="red"></font>:</label>
											<input style="width: 400px" type="text" maxlength="50"class="form-control"  name="bairro" placeholder="Informe o Bairro do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">CEP <font color="red"></font>:</label>
											<input style="width: 300px" type="text"maxlength="10" class="form-control"  name="cep" placeholder="Informe o CEP do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Estado <font color="red"></font><font color="grey">: (Ex.: CE)</font></label>
											<input style="width: 300px" type="text" maxlength="2" class="form-control"  name="uf" placeholder="Informe o Estado do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Cidade <font color="red"></font>:</label>
											<input style="width: 300px" type="text"maxlength="40" class="form-control"  name="cidade" placeholder="Informe a Cidade do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Data de Nascimento <font color="red"></font>:</label>
											<input title="Selecione a Data do Nascimento do Assistido" style="width: 300px" type="date" class="form-control"  name="nascimento"  required="">
										</div>
										<div class="form-group" >
											<label>Sexo<font color="red"></font>:</label>
											<select name="sexo" title="Selecione o Sexo do Assistido" class="form-control" style="width: 300px">
												<option value="m">Masculino</option>
												<option value="f">Feminino</option>
											</select>
										</div>
										<label>Raça/Cor<font color="red"></font>:</label>
										<div class="form-group" >
											<select name="raca_cor" title="Selecione a Raça ou Cor do Assistido" class="form-control" style="width: 300px">
												<option value="branco">Branco</option>
												<option value="pardo">Pardo</option>
												<option value="negro">Negro</option>
												<option value="indio">Índio</option>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Telefone(Assistido):</label>
											<input style="width: 300px" type="text" maxlength="14" class="form-control" id="fone" name="fone" placeholder="Informe o Telefone do Assistido">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Telefone(Responsável):</label>
											<input style="width: 300px" type="text" maxlength="14" class="form-control" id="fone_resp" name="fone_resp" placeholder="Informe o Telefone do Responsável">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Diagnóstico <font color="red"></font>:</label>
											<input style="width: 300px" type="textarea"  maxlength="400"class="form-control" name="diagnostico" placeholder="Informe o Diagnóstico do Assistido" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Gaveta da Documentação <font color="red"></font>:</label>
											<input style="width: 300px" type="text" maxlength="10"class="form-control" name="gaveta" placeholder="Informe a Gaveta onde se encontra a documentação" required="">
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
			$("#fone_resp").mask("(99)99999-9999")
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

