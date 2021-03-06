<?php require_once 'header/header.php'; ?>

<html>
	<head>
		<meta http-equiv="refresh" content="30">
	</head>
</html>
<div class="col-md-12"><h3 class="painelDeControle">Painel de controle</h3></div>
<div class="col-md-6">
	<h4 class="painelPedidos">Principal</h4>
	<div class="rolagem">
	<table class='table table-hover' id="painelPedidosProdutos">
		<thead>
			<tr class="warning">
				<th>Status</th>
				<th class="danger">Id</th>
				<th>Produto</th>
				<th>Código</th>
				<th>Data criação</th>
				<th>Quantidade</th>
				<th>Valor base</th>
				<th>Total</th>
				<th>Observacao</th>
				<th></th>
				<th></th>
			<tr>
		</thead>
		<tbody>
			<!-- CARREGA VIA AJAX -->
		</tbody>
	</table>
	</div>
</div>
<div class="col-md-6">
	<h4 class="painelAcrescimoPedidos">Acréscimos / principal</h4>
	<div class="rolagem">
	<table class="table table-hover" id="painelAcrescimosPedidos">
		<thead>
			<tr class="warning">
				<th>Status</th>
				<th class="danger">Id</th>
				<th>Código</th>
				<th>Tipo</th>
				<th>Acréscimo</th>
				<th>Quantidade</th>
				<th>Valor base</th>
				<th>Total</th>
				<th>Observaçao</th>
			</tr>
		</thead>
		<tbody>
			<!-- CARREGA VIA AJAX -->
		</tbody>	
	</table>
	</div>
	<h4 class="painelAcrescimoPedidos">Acréscimos / Avulso</h4>
	<div class="rolagem">
	<table class="table table-hover" id="painelAcrescimosAvulso">
		<thead>
			<tr class="info">
				<th>Status</th>
				<th>Código</th>
				<th>Acréscimo</th>
				<th>Tipo</th>
				<th>Quantidade</th>
				<th>Valor base</th>
				<th>Total</th>
				<th>Observaçao</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<!-- CARREGA VIA AJAX -->
		</tbody>
	</table>
	</div>
</div>

<br/><br/><br/><br/>
	
<?php require_once 'footer/footer.php'; ?>
