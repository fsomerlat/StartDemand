<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div class="container-fluid">
		<div class="col-md-12 login">
		<div class="page">
			<h4>
				Login - <small> StartDemand</small>
			</h4>
		</div>
		</div>
			<div class="row">
				<div class="col-md-4"></div>
				<form name="formLogin" class="formLogin" id="formLogin" action="../controller/ControleDeAcesso_Controller.php" method="POST">
					<div class="col-md-4">
						<div class="form-group">
							<label for="Nome">Usuário</label>
							<input type="text" name="cpNome" id="cpNome" class="form-control" />
							<msgNome></msgNome>
						</div>
						
						<div class="form-group">
							<label for="Senha">Senha</label>
							<input type="password" name="cpSenha" maxlength="4" id="cpSenha" class="form-control" />
							<msgSenha></msgSenha>
						</div>
						
						<div class="form-group">
							<div class="col-md-6">
								<div class="form-group">
									<input type="submit" id="btnLogin" name="acao" value="entrar" class="btn btn-info form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<button type="reset"  class="btn btn-warning form-control">limpar</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/validateFormLogin.js"></script>
	</body>
</html>