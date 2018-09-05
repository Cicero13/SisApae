<!doctype html>
<html lang="pt-br">
	<?php
		include '../sessao.php';
		
		$codpac = $_POST['codpac'];
		
		include '../banco.php';
		
		$sql = "select * from tbpac
					where codpac = '$codpac'";
					
		$consulta = $conexao->query($sql);
		$linha = $consulta->fetch_array(MYSQLI_ASSOC);
	?>
<head>
	<?php
		include"cabecalho.php";
	?>
	<script>
			function validar(){
				if(confirm("Deseja Atualizar os Dados do Assistido ?")){
			
			
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
									<center><h3 class="panel-title">Alteração de Assistido</h3></center>
									<br>
									<form name="f1" onsubmit="return validar();" method="POST" action="alterar.php">
										<div class="form-group">
											<label for="exampleInputEmail1">Código do Assistido:</label>
											<input type="text" class="form-control" id="codpac" name="codpac" aria-describedby="emailHelp" placeholder="Código do Assistido" value="<?php echo $linha['codpac'];?>" readonly="true" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Nome:</label>
											<input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" placeholder="Informe o Nome do Assistido" value="<?php echo $linha['nome'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Necessidade Especial:</label>
											<input type="text" class="form-control" id="deficiencia" name="deficiencia" aria-describedby="emailHelp" placeholder="Informe a Necessidade Especial do Assistido" value="<?php echo $linha['deficiencia'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">CNS:</label>
											<input type="text" class="form-control" id="cns" name="cns" placeholder="Informe o CNS" value="<?php echo $linha['cns'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">CID:</label>
											<input type="text" class="form-control" id="cid" name="cid" placeholder="Informe o CID" value="<?php echo $linha['cid'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">IBGE :</label>
											<input type="text" class="form-control" id="ibge" name="ibge" placeholder="Informe o IBGE" value="<?php echo $linha['ibge'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Pai:</label>
											<input type="text" class="form-control" id="pai" name="pai" placeholder="Informe o Nome do Pai do Assistido" value="<?php echo $linha['pai'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Mãe:</label>
											<input type="text" class="form-control" id="mae" name="mae" placeholder="Informe o Nome da Mãe do Assistido" value="<?php echo $linha['mae'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Endereço :</label>
											<input style="width: 400px" type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe o Endereço do Assistido" value="<?php echo $linha['endereco'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Bairro:</label>
											<input style="width: 400px" type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o Bairro do Assistido" value="<?php echo $linha['bairro'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">CEP :</label>
											<input style="width: 300px" type="text" class="form-control" id="cep" name="cep" placeholder="Informe o CEP do Assistido" value="<?php echo $linha['cep'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Estado:</label>
											<input style="width: 300px" type="text" class="form-control" id="uf" name="uf" placeholder="Informe o Estado do Assistido" value="<?php echo $linha['uf'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Cidade>:</label>
											<input style="width: 300px" type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe a Cidade do Assistido" value="<?php echo $linha['cidade'];?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Data de Nascimento:</label>
											<input title="Selecione a Data do Nascimento do Assistido" style="width: 300px" type="date" class="form-control" id="nascimento" name="nascimento" value="<?php echo $linha['nascimento'];?>" required="">
										</div>
										<div class="form-group" >
											<label>Sexo<font color="red">*</font>:</label>
											<select name="sexo" title="Selecione o Sexo do Assistido" class="form-control" style="width: 300px">
												<?php
													if($linha['sexo']=='m'){
														echo '<option value="m">Masculino</option>';
														echo '<option value="f">Feminino</option>';
													}else{
														echo '<option value="f">Feminino</option>';
														echo '<option value="m">Masculino</option>';
													}
													?>
											</select>
										</div>
										<label>Raça/Cor<font color="red">*</font>:</label>
										<div class="form-group" >
											<select name="raca_cor" title="Selecione a Raça ou Cor do Assistido" class="form-control" style="width: 300px">
												<?php
													if($linha[raca_cor]=='branco'){
														echo '<option value="branco">Branco</option>';
														echo '<option value="pardo">Pardo</option>';
														echo '<option value="negro">Negro</option>';
														echo '<option value="indio">Índio</option>';
													}else if($linha[raca_cor]=='pardo'){
														echo '<option value="pardo">Pardo</option>';
														echo '<option value="branco">Branco</option>';
														echo '<option value="negro">Negro</option>';
														echo '<option value="indio">Índio</option>';
													}else if($linha[raca_cor]=='negro'){
														echo '<option value="negro">Negro</option>';
														echo '<option value="branco">Branco</option>';
														echo '<option value="pardo">Pardo</option>';
														echo '<option value="indio">Índio</option>';
													}else{
														echo '<option value="indio">Índio</option>';
														echo '<option value="branco">Branco</option>';
														echo '<option value="pardo">Pardo</option>';
														echo '<option value="negro">Negro</option>';
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Telefone(Assistido):</label>
											<input style="width: 300px" type="text" class="form-control" id="fone" name="fone" placeholder="Informe o Telefone do Assistido" value="<?php echo $linha['fone']; ?>">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Telefone(Responsável):</label>
											<input style="width: 300px" type="text" class="form-control" id="fone_resp" name="fone_resp" placeholder="Informe o Telefone do Responsável" value="<?php echo $linha['fone_resp']; ?>">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Diagnóstico <font color="red">*</font>:</label>
											<input style="width: 300px" type="textarea" class="form-control" id="diagnostico" name="diagnostico" placeholder="Informe o Diagnóstico do Assistido" value="<?php echo $linha['diagnostico']; ?>" required="">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Gaveta da Documentação <font color="red">*</font>:</label>
											<input style="width: 300px" type="text" class="form-control" id="gaveta" name="gaveta" placeholder="Informe a Gaveta onde se encontra a documentação" value="<?php echo $linha['gaveta']; ?>" required="">
										</div>
									
								</div>
									<center><button type="submit" class="btn btn-success">Alterar</button></center>
									</form>	
								<br>
							</div>
						
					</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<footer>
			<?php include"../rodape.php"; ?>
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
</body>
</html>