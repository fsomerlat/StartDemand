<?php require_once 'header/header.php'; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						Pedir mais acŕescimo (avulso)
					</h3>
				</div>
				<div class="panel-body">
					<form action="../controller/Acrescimo_Controller.php" method="POST">
						<div class="col-md-3">
							<div class="form-group">
								<label for="tuPedido_cpCodPedido">Código pedido</label>
								<select name="tuPedido_cpCodPedido" id="tuPedido_cpCodPedido" class="form-control codPedidoAcrescimo">
									<!-- CARREGA JQUERY -->
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="Acrescimo">Acréscimo</label>
								<select name="cpAcrescimo" id="cpAcrescimo" class="form-control">
									<!-- CARREGA VIA AJAX -->
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="Quantidade acrescimo">Quantidade</label>
								<select name="cpQtdAcrescimo" id="cpQtdAcrescimo" class="form-control isZero">
									<option value="0">Selecione</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
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
								<input name="cpValorBaseAcrescimo" id="cpValorBaseAcrescimo" readonly class="form-control isPlaceholder" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="Forma de pagamento">Forma de pagamento</label>
								<select name="cpFormaPagamentoAcrescimo" id="cpFormaPagamentoAcrescimo" class="form-control">
									<option value="">Selecione</option>
									<option value="D">Dinheiro</option>
									<option value="CD">Cartão / Débito</option>
									<option value="CC">Cartão / Crédito</option>
								</select>
							</div>
						</div>
						<div class="blocoParcelasAcrescimo">
						<div class="col-md-2">
							<div class="form-group">
								<label for="Quantidade parcelas">QTDE Parcelas</label>
								<select name="cpQtdParcelaAcrescimo" id="cpQtdParcelaAcrescimo" class="form-control isZero">
									<option value="0">Selecione</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="Valor da parcela">Valor / parcela</label>
								<input name="cpValorParcelaAcrescimo" id="cpValorParcelaAcrescimo" readonly class="form-control isPlaceholder" />
							</div>
						</div>
						<!-- div class="col-md-3">
							<div class="form-group">
								<label for="Data vencimento parcela">Data da compra</label>
								<input type="text" name="cpDataCompraAcrescimo" id="cpDataCompraAcrescimo" readonly class="form-control" />
							</div> 
						</div-->
						</div>						
						<div class="col-md-2">
							<div class="form-group">
								<label for="Valor total acréscmo">Valor total</label>
								<input name="cpValorTotalAcrescimo" id="cpValorTotalAcrescimo" readonly class="form-control isPlaceholder" />
							</div>
						</div>						
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="cpObservacaoAcrescimo" placeholder="Observação acréscimo..." id="cpObservacaoAcrescimo" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="submit" name="acao" id="btnCadastarAcrescimo" class="form-control btn btn-info" value="cadastrar"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="reset" class="form-control btn btn-warning" value="limpar"/>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer">
				
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel-group" id="panel-408410">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <div class="panel-title collapsed listaAcrescimos" data-toggle="collapse" data-parent="#panel-408410" href="#panel-element_387270">Lista acréscimos avulso</div>
					</div>
					<div id="panel-element_387270" class="panel-collapse collapse">
						<div class="panel-body">
							<table class="table table-hover" id="tableAcrescimosAvulso">
								<thead>
									<tr class="info">
										<th>Status</th>
										<th>Código pedido</th>
										<th>Acréscimo</th>
										<th>Tipo</th>
										<th>Quantidade</th>
										<th>Valor base</th>
										<th>Total</th>
										<th>Observação</th>
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
				</div>
			</div>
		</div>
	</div>
</div>


<?php require_once 'footer/footer.php'; ?>
