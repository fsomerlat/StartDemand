<?php require_once 'header/header.php'; ?>

<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				Pesquisa situação dos pedidos
			</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-3">
				<div class="form-group">
					<label for="Tipo Pesquisa">Tipo de pesquisa</label>
					<select name="cpTipoPesquisaPedido" id="cpTipoPesquisaPedido" class=" form-control">
						<option value="">Selecione</option>
						<option value="T">Todos</option>
						<option value="D">Por data</option>
					</select>
				</div>
			</div>
			<div class="col-md-3 isDataPesquisaPedido">
				<div class="form-group">
					<label for="Status">Status</label>
					<select name="cpŚtatusPesqPedido" id="cpŚtatusPesqPedido" class="form-control toClearDataPesqPedido">
						<option value="">Selecione</option>
						<option value="F">Finalizado</option>
						<option value="C">Cancelado</option>
					</select> 
				</div>
			</div>
			<div class="col-md-2 isDataPesquisaPedido">
				<div class="form-group">
					<label for="Data Inicio">De...</label>
					<input type="text" name="cpDataInicioPesqPedido" id="cpDataInicioPesqPedido" readonly class="form-control toClearDataPesqPedido" />
				</div> 
			</div>
			<div class="col-md-2 isDataPesquisaPedido">
				<div class="form-group">
					<label for="Tipo Pesquisa">Até...</label>
					<input type="text" name="cpDataFinalPesqPedido" id="cpDataFinalPesqPedido" readonly class="form-control toClearDataPesqPedido" />
				</div>
			</div>
			<div class="col-md-9 isBtnFltPedido">
				<div class="form-group">
					<button type="button" id="btnFiltroPedido" class="form-control btn btn-warning">gerar</button>
				</div>
			</div>			
		</div>
		<div class="panel-footer">
			<h4 class="msgPreparaPDF"></h4>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="panel-group" id="panel-690639">
		<div class="panel panel-default">
			<div class="panel-heading">
				 <div class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-690639" href="#panel-element_492322">Demonstrativo - Resultado da pesquisa</div>
			</div>
			<div id="panel-element_492322" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="rolagem_colMD_12">
						<table class="table table-hover" id="tablePesquisaPedido">
							<thead>
								<tr class="info">
									<th>Id</th>
									<th>Status</th>
									<th>Produto</th>
									<th>QTDE</th>
									<th>Complemento 1ª</th>
									<th>Complemento 2ª</th>
									<th class="danger">Acŕescimo</th>
									<th class="danger">QTDE</th>
									<th class="danger">Valor base </th>
									<th class="danger">Valor total</th>
									<th>Data / pedido</th>
									<th>ver detalhes</th>
									<th>Bandeira / cartão</th>
									<th>Valor / total</th>
									<th>Valor / líquido</th>
								</tr>
							</thead>
							<tbody>
								<!-- CARREGA VIA AJAX -->
								<div class="msgPesquisaPedido"></div>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer/footer.php'; ?>