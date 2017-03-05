<?php require_once 'header/header.php'; ?>
<div class="col-md-8">
<div class="panel-group" id="panel-402239">
	<div class="panel panel-default">
		<div class="panel-heading">
			 <div class="panel-title" data-toggle="collapse" data-parent="#panel-402239" href="#panel-element_655955">Adicionar acréscimos</div>
		</div>
		<div id="panel-element_655955" class="panel-collapse collapse">
			<div class="panel-body">
				<form action="../controller/Prepara_Pedido_Acrescimo_Controller.php" name="formAcrescimo" id="formAcrescimo" method="">
					
				<!-- INSERT TABLE PREPARE PEDIDO -->
					<input type="hidden" name="cptuProduto_idProduto" />
					<input type="hidden" name="cpCodPedido" />
					<input type="hidden" name="cpQtdProduto" />
					<input type="hidden" name="cpValorBaseProduto" />
					<input type="hidden" name="cpComplementoUm" />
					<input type="hidden" name="cpComplementoDois" />
					<input type="hidden" name="cpValorProduto" />
					<input type="hidden" name="cpObservacaoPedido" />
				<!-- INSERT TABLE PREPARE PEDIDO -->
					<div class="col-md-3">
						<div class="form-group">
							<label for="Codifo do pedido">Códido do pedido atual</label>
							<input type="text" name="cptuPedido_cpCodPedido" id="cptuPedido_cpCodPedido" class="form-control" readonly />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="Complemento">Acréscimo</label>
							<select name="cpAcrescimo" id="cpAcrescimo" class="form-control">
									<!-- CARREGA VIA AJAX -->
							</select>
							<msgErroAcrescimo></msgErroAcrescimo>
						</div>
					</div>	
					
					<div class="col-md-2">
						<div class="form-group">
							<label for="Quantidade Acrescimo">Quantidade</label>
							<select name="cpQtdAcrescimo" id="cpQtdAcrescimo" class="form-control ">
								<option value="0">Selecione</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>								
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="Valor base acrescimo">Valor base</label>
							<input type="text" name="cpValorBaseAcrescimo" id="cpValorBaseAcrescimo" value="" readonly class="form-control"/>
						</div>
					</div>							
					<div class="col-md-2">
						<div class="form-group">
							<label for="Valor acrescimo">Valor total</label>
							<input type="text" name="cpValorTotalAcrescimo" id="cpValorTotalAcrescimo" value="" readonly class="form-control" />
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<input type="button" name="acao" value="adicionar" id="btnAddAcrescimo" class="form-control btn btn-info" />
						<hr/>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="reset" value="limpar" class="form-control btn btn-warning" />
						<hr/>	
						</div>
					</div>		
				</form>	
			</div>
		</div>
	</div>
</div>	
<div class="panel-group" id="panel-402239">
	<div class="panel panel-default">
		<div class="panel-heading">
			 <div class="panel-title" data-toggle="collapse" data-parent="#panel-402239" href="#panel-element_655957">Pedido atual</div>
		</div>
		<div id="panel-element_655957" class="panel-collapse collapse in">
			<div class="panel-body">
			<h4 class="listaPreparaPedido"></h4>
				<table class="table table-hover" id="tablePreparaPedido">
				<thead>
					<tr class="warning">
						<th>CodPedido</th>
						<th>QTDA</th>
						<th>Valor</th>
						<th>Total</th>
						<th>Observação</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<!-- LISTA ACRÉSCIMOS VIA AJAX -->
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

<div class="col-md-4">
<div class="panel-group" id="panel-402239">
	<div class="panel panel-default">
		<div class="panel-heading">
			 <div class="panel-title" data-toggle="collapse" data-parent="#panel-402239" href="#panel-element_655956">Acréscimo a ser incluído no pedido atual</div>
		</div>
		<div id="panel-element_655956" class="panel-collapse collapse in">
			<div class="panel-body">
			<h4 class="listaPreparaAcrescimo"></h4>
				<table class="table table-hover" id="tablePreparaAcrescimo">
				<thead>
					<tr class="warning">
						<td>id</td>
						<th>Acréscimo</th>
						<th>QTDA</th>
						<th>Valor</th>
						<th>Total</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<!-- LISTA ACRÉSCIMOS VIA AJAX -->
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
</div>

<?php require_once 'footer/footer.php'; ?>
