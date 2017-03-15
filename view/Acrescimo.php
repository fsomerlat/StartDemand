<?php require_once 'header/header.php'; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						Pedir mais acŕescimo (avulso)
					</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST">
						<div class="col-md-3">
							<div class="form-group">
								<label for="tuPedido_cpCodPedido">Código pedido</label>
								<select type="text" name="tuPedido_cpCopPedido" id="tuPedido_cpCopPedido" class="form-control codPedidoAcrescimo">
									<!-- CARREGA JQUERY -->
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="Acrescimo">Acréscimo</label>
								<select name="cpAcrescimo" id="cpAcrescimo" class="form-control">
									<!-- CARREGA VIA AJAX -->
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="Quantidade acrescimo">Quantidade</label>
								<select name="cpQtdAcrescimo" id="cpQtdAcrescimo" class="form-control">
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
								<input name="cpValorBaseAcrescimo" id="cpValorBaseAcrescimo" readonly class="form-control" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="Valor total acréscmo">Valor total</label>
								<input name="cpValorTotalAcrescimo" id="cpValorTotalAcrescimo" readonly class="form-control" />
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
		<div class="col-md-5">
			<div class="panel-group" id="panel-408410">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <div class="panel-title collapsed listaAcrescimos" data-toggle="collapse" data-parent="#panel-408410" href="#panel-element_387270">Lista todos acréscimos</div>
					</div>
					<div id="panel-element_387270" class="panel-collapse collapse">
						<div class="panel-body">
							<table class="table table-hover" id="tableAcrescimo">
								<thead>
									<tr class="info">
										<th>status</th>
										<th>Código pedido</th>
										<th>Acrésimo</th>
										<th>Quantidade</th>
										<th>Observação</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<!-- CARREGA ACRÉSCIMOS VIA AJAX -->
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
