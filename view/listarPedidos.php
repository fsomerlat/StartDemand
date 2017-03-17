<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />	
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
<body>
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
			<h3 class="listaPedidoProduto"><b class="h3listaPedidoProduto"></b></h3>
				<table class="table table-hover" id="tablePedidoProdutos">
					<thead>
						<tr class="success">
							<th>Status</th>
							<th class="info">Id</th>
							<th class="danger">Códido</th>
							<th class="info">Produto</th>
							<th class="danger">QTDE</th>
							<th class="warning">1º complemento</th>
							<th class="success">2ª complemento</th>
							<th class="danger">Hora criação</th>
							<th class="success">Observação pedido</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!-- CARREGA PRODUTOS VIA AJAX -->
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<h3 class="listaPedidoAcrescimo"><b class="h3listaPedidoAcrescimo"></b></h3>
				<table class="table table-hover" id="tablePedidoAcrescimo">
					<thead>
						<tr>
							<th class="success">Status</th>
							<th class="info">Id</th>
							<th class="warning">Tipo</th>
							<th class="danger">Código</th>
							<th class="info">Acréscimo</th>
							<th class="danger">Quantidade acréscimo</th>
							<th class="success">Observação</th>
						</tr>
					</thead>
					<tbody>
						<!-- CARREGA ACRÉSCIMOS VIA AJAX -->
					</tbody>
				</table>			
			</div>
			<div class="col-md-6">
				<h3 class="listaAcrescimosAvulso"><b class="h3listaAcrescimoAvulso"></b></h3>
				<table class="table table-hover" id="tableAcrescimosAvulsoTelaPedido">
					<thead>
						<tr>
							<th class="success">Status</th>
							<th class="info">código</th>
							<th class="danger">Acréscimo</th>
							<th class="warning">Tipo</th>
							<th class="danger">Quantidade</th>
							<th class="success">Observação</th>
							<th class="success"></th>
						</tr>
					</thead>
					<tbody>
						<!-- CARREGA ACRÉSCIMOS VIA AJAX -->
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
	<br/><br/><br/><br/>

<?php require_once 'footer/footer.php'; ?>
