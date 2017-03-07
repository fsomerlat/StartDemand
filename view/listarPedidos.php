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
							<th class="danger">Código pedido</th>
							<th class="info">Produto</th>
							<th class="danger">QTDE</th>
							<th class="warning">1º complemento</th>
							<th class="success">2ª complemento</th>
							<th class="warning">Hora criação</th>
							<th class="success">Observação pedido</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!-- CARREGA PRODUTOS VIA AJAX -->
					</tbody>
				</table>
				<h3 class="listaPedidoAcrescimo"><b class="h3listaPedidoAcrescimo"></b></h3>
				<table class="table table-hover" id="tablePedidoAcrescimo">
					<thead>
						<tr>
							<th class="success">Status</th>
							<th class="danger">código pedido</th>
							<th class="info">Acréscimo</th>
							<th class="warning">Quantidade acréscimo</th>
							<th class="success">Observação</th>
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
