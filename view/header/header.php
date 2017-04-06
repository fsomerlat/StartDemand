<?php  require_once 'blocksUrlAction.php'; $nome =  (isset($_SESSION["cpNome"])) ? $_SESSION["cpNome"] : ""; ?>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link type="text/css" rel="stylesheet" href="css/jquery-ui.css" />
		<link type="text/css" rel="stylesheet" href="css/datepicker.css"/>
		<link type="text/css" rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />	
	
	</head>
	
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
		<div class="form-group">
				<ul class="breadcrumb">
					<li>
						<b>Bem vindo <?php echo  $nome." !";?></b> 
					</li>
					<li>
						Hoje é dia - <b class="dataHoje"></b>
					</li>
				</ul>
				<div class="page-header">
					<h4>
						StartDemand - <small>Sistema para gestão de demandas !</small>
					</h4>
				</div>
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
						<ul class="nav navbar-nav">
							<li class="dropdown">
								 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Finaceiro<strong class="caret"></strong></a>
								<ul class="dropdown-menu">
									<li>
										<a href="Contas.php">Lançar contas</a>
									</li>
									<li>
										<a href="Financeiro.php">Listar</a>
									</li>
									<li class="divider">
									</li>
									<li>
										<a href="Taxas.php">Taxas</a>
									</li>									
									<li>
										<a href="#">relatórios</a>
									</li>
								</ul>
							</li>
						</ul>						
						<ul class="nav navbar-nav">
							<li class="dropdown">
								 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuário<strong class="caret"></strong></a>
								<ul class="dropdown-menu">
									<li>
										<a href="Usuario.php?panel=">Cadastrar</a>
									</li>
									<li>
										<a href="Usuario.php?panel=">Listar</a>
									</li>
									<li class="divider">
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
			<div class="col-md-7">
				<div class="form-group">
					<div>
						<ul class="nav nav-tabs nav-hover subMenuPedido">
							<li class="active">
								<a href="Pedido.php?panel=193158" >Criar pedido</a>
							</li>
							<li class="default menuPedidoComAcrescimo">
								<a href="PreparaPedidoAcrescimo.php?panel=655955" class="menuPedidoComAcrescimo">Pedido com acréscimo</a>
 							</li>
							<li class="acitve">
								<a href="Acrescimo.php?panel=387270"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> acréscimo</a>
 							</li>
 							<li class="acitve">
								<a href="PainelDePedidos.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> painel de pedidos</a>
 							</li>	 							
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				 <div class="form-group">
					<ul class="nav nav-pills">
						<li class="active">
							 <a href="#"> <span class="badge pull-right"></span><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pedidos <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
						</li>
						<li class="active">
							 <a href="#"> <span class="badge pull-right"><i class="pedidosDeHoje"></i></span><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Dia atual</a>
						</li>						
						<li class="active">
							<a href="#"><span class="badge pull-right"><i class="pedidoEmAndamento"></i></span><span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span> Andamento</a>
						</li>
						<li class="active">
							 <a href="#"> <span class="badge pull-right"><i class="pedidosFinalizados"></i></span><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Finalizados</a>
						</li>
						<li class="active">
							 <a href="#"> <span class="badge pull-right"><i class="pedidosCancelados"></i></span><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelados</a>
						</li>
					</ul>
				</div>
			</div>
		<div class="col-md-12">
	<div class="form-group msgPedido"></div>
</div>
		
					