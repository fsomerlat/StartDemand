<?php require_once 'header/header.php'; ?>

<div class="col-md-6">
	<h3 class="painelPedidos">Pedidos produtos</h3>
	<table class='table table-hover' id="painelPedidosProdutos">
		<thead>
			<tr class="warning">
				<th>Status</th>
				<th>Produto</th>
				<th>Código</th>
				<th>Hora criação</th>
				<th>Quantidade</th>
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
<div class="col-md-6">
	<h3 class="painelAcrescimo">Pedidos de acréscimos</h3>
	<table class="table table-hover" id="painelAcrescimosPedidos">
		<thead>
			<tr class="warning">
				<th>Status</th>
				<th>Código</th>
				<th>Tipo</th>
				<th>Acréscimo</th>
				<th>Quantidade</th>
				<th>Observaçao</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<!-- CARREGA VIA AJAX -->
		</tbody>	
	</table>
	<table class="table table-hover" id="painelAcrescimosAvulso">
		<thead>
			<tr class="info">
				<th>Status</th>
				<th>Código</th>
				<th>Acréscimo</th>
				<th>Tipo</th>
				<th>Quantidade</th>
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

<?php require_once 'footer/footer.php'; ?>
