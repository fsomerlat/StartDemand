<?php  require_once 'blocksUrlAction.php'; $nome =  (isset($_SESSION["cpNome"])) ? $_SESSION["cpNome"] : ""; ?>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	
	</head>
	
	<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
					<ul class="breadcrumb">
						<li>
							<b>Bem vindo <?php echo  $nome." !";?></b> 
						</li>
						<li>
							Hoje é dia - <b class="dataHoje"></b>
						</li>
					</ul>
					<div class="page-header">
						<h1>
							StartDemand - <small>Sistema para gestão de demandas !</small>
						</h1>
					</div>
				</div>
				<div class="col-md-6">
					<nav class="navbar navbar-default navbar-inverse" role="navigation">
						<div class="navbar-header">
							 
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button> <a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a>
						</div>
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pedidos<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="Pedido.php?panel=193158">Gerar</a>
										</li>
										<li>
											<a href="listarPedidos.php" target="_blank">Listar</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">relatórios</a>
										</li>
									</ul>
								</li>
							</ul>
							
							<ul class="nav navbar-nav">
								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="Produto.php?panel=193157">Cadastrar</a>
										</li>
										<li>
											<a href="Produto.php?panel=571586">Listar</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">relatórios</a>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sair<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">Cadastrar</a>
										</li>
										<li>
											<a href="#">Listar</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="logoutSessao.php?sessao=logout"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> logout</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						
					</nav>
				</div>
			</div>	
							
				