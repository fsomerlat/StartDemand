<?php ?>
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
			<h3 class="listaPedidoProduto"></h3>
				<table class="table table-hover" id="tablePedidoProdutos">
					<thead>
						<tr class="success">
							<th>Status</th>
							<th>Id</th>
							<th class="danger">Código pedido</th>
							<th class="info">Produto</th>
							<th class="danger">QTDA</th>
							<th class="warning">1º complemento</th>
							<th class="success">2ª complemento</th>
							<th class="warning">Hora criação</th>
							<th class="success">Observação pedido</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!-- CARREGA PRODUTOS VIA AJAX -->
					</tbody>
				</table>
				<h3 class="listaPedidoAcrescimo"></h3>
				<table class="table table-hover" id="tablePedidoAcrescimo">
					<thead>
						<tr>
							<th class="danger">código pedido</th>
							<th class="info">Acréscimo</th>
							<th class="warning">Quantidade acréscimo</th>
						</tr>
					</thead>
					<tbody>
						<!-- CARREGA ACRÉSCIMOS VIA AJAX -->
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php require_once 'footer/footer.php'; ?>
