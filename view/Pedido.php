<?php require_once 'header/header.php';?>

	<div class="col-md-8">
	
		<div class="form-group">
			<ul class="nav nav-pills">
				<li class="active">
					 <a href="#"> <span class="badge pull-right">16</span>Pedidos de hoje</a>
				</li>
				<li class="active">
					 <a href="#"> <span class="badge pull-right">16</span>Pedidos finalizados</a>
				</li>
				<li class="active">
					 <a href="#"> <span class="badge pull-right">16</span>Pedidos baixados</a>
				</li>
			</ul>
		</div>	
	
		<div class="panel-group" id="panel-615651">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <div class="panel-title" data-toggle="collapse" data-parent="#panel-615651" href="#panel-element_193158">Gerar pedidos</div>
				</div>
				<div id="panel-element_193158" class="panel-collapse collapse">
					<div class="panel-body">
						<form name="formProduto" id="formProduto" action="../controller/Pedido_Controller.php" method="POST">
						<div class="col-md-2">
							<div class="form-group">
								<label for="Status">Status</label>
								<select name="cpStatusPedido" id="cpStatusPedido" class="form-control btn btn-success">
									<option value="">Selecione</option>
									<option value="A" selected>Em andamento</option>
									<option value="C">Cancelado</option>
								</select>
							</div>
						</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="Produto">Nome do produto</label>
									<select name="cptuProduto_idProduto" id="cptuProduto_idProduto" class="form-control toClearProduto">
										<!-- LISTA PRODUTOS VIA AJAX -->
									</select>
									
									<msgErroProdutoPedido></msgErroProdutoPedido>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="Valor base produto">Valor base produto</label>
									<input type="text" name="cpValorBaseProduto" readonly id="cpValorBaseProduto" class="form-control" />
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="Produto">Quantidade produto</label>
									<select name="cpQtdProduto" id="cpQtdProduto" class="form-control">
										<option value="0">Selecione</option>
										<option valur="1">1</option>
										<option valur="2">2</option>
										<option valur="3">3</option>
										<option valur="4">4</option>
										<option valur="5">5</option>
										<option valur="6">6</option>
										<option valur="7">7</option>
										<option valur="8">8</option>
										<option valur="9">9</option>
										<option valur="10">10</option>
										<option valur="11">11</option>
										<option valur="12">12</option>
										<option valur="13">13</option>
										<option valur="14">14</option>
										<option valur="15">15</option>
										<option valur="16">16</option>
										<option valur="17">17</option>
										<option valur="18">18</option>
										<option valur="19">19</option>
										<option valur="20">20</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="ComplementoUm">1º Complemento</label>
									<select name="cpComplementoUm" id="cpComplementoUm" class="form-control " >
										<option value="">Selecione</option>
										<optgroup label="Frutas">
											<option value="Banana">Banana</option>
											<option value="Morando">Morango</option>
											<option value="Pessego">Pêssego</option>
											<option value="Kiwi">Kiwi</option>
											<option value="Mamao">Mamão</option>									
										</optgroup>
										
										<optgroup label="Doces">
											<option value="leite condensado">Leite condensado</option>
											<option value="Chocolate branco">Chocolate branco</option>
											<option value="Chocolate preto">Chocolate preto</option>
											<option value="Creme de avela">Creme de avelâ</option>
											<option value="Bombom branco">Bombom branco</option>
											<option value="Bombom preto">Bombom preto</option>
										</optgroup>
										
										<optgroup label="Em pó">
												<option value="Ovo maltine">Ovo maltine</option>
												<option value="Leite em pó">Leite em pó</option>
												<option value="Achocolatado">Achocolatado</option>												
										</optgroup>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="ComplementoDois">2º Complemento</label>
									<select name="cpComplementoDois" id="cpComplementoDois" class="form-control ">
										<option value="">Selecione</option>
										<optgroup label="Frutas">
											<option value="Banana">Banana</option>
											<option value="Morando">Morango</option>
											<option value="Pessego">Pêssego</option>
											<option value="Kiwi">Kiwi</option>
											<option value="Mamao">Mamão</option>									
										</optgroup>
										
										<optgroup label="Doces">
											<option value="leite condensado">Leite condensado</option>
											<option value="Chocolate branco">Chocolate branco</option>
											<option value="Chocolate preto">Chocolate preto</option>
											<option value="Creme de avela">Creme de avelâ</option>
											<option value="Bombom branco">Bombom branco</option>
											<option value="Bombom preto">Bombom preto</option>
										</optgroup>
										
										<optgroup label="Em pó">
												<option value="Ovo maltine">Ovo maltine</option>
												<option value="Leite em pó">Leite em pó</option>
												<option value="Achocolatado">Achocolatado</option>												
										</optgroup>
									</select>
								</div>
							</div>		
							<div class="col-md-12 successAddAcrescimo">
							
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="Complemento">Acréscimo</label>
									<select name="cpAcrescimo" id="cpAcrescimo" class="form-control toClearAcrescimo">
											<!-- CARREGA VIA AJAX -->
									</select>
									<msgErroAcrescimo></msgErroAcrescimo>
								</div>
							</div>	
							<div class="col-md-2">
								<div class="form-group">
									<label for="Valor base acrescimo">Valor base acréscimo</label>
									<input type="text" name="cpValorBaseAcrescimo" id="cpValorBaseAcrescimo" readonly class="form-control"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="Quantidade Acrescimo">Quantidade Acréscimo</label>
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
									<label for="Valor acrescimo">Valor total acréscimo</label>
									<input type="text" name="cpValorTotalAcrescimo" id="cpValorTotalAcrescimo" readonly class="form-control toClearAcrescimo" />
								</div>
							</div>	
							<div class="col-md-3">
								<div class="form-group">
									<input type="button" name="acao" value="adicionar acréscimo" id="btnAddAcrescimo" class="form-control btn btn-info btnAcrescimo" />
								<hr/>	
								</div>
							</div>									
							<div class="col-md-6">
								<div class="form-group">
									<label for="Produto">Valor total produto</label>
									<input type="text" name="cpValorProduto" id="cpValorProduto" readonly class="form-control toClearProduto" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Valor total">Valor total pedido</label>
									<input type="text" name="cpValorTotalPedido" id="cpValorTotalPedido" readonly class="form-control"/>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								<label for="Observacao">Observação</label>
									<textarea name="cpObservacaoPedido" rows="2" id="cpObservacaoPedido" class="form-control "></textarea>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input type="submit" name="acao" value="gerar pedido" id="btnCadastrarProduto" value="enviar" class="btn btn-info form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="reset" class="btn btn-warning form-control " value="limpar" />
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
					 <div class="panel-title" data-toggle="collapse" data-parent="#panel-402239" href="#panel-element_655955">Acréscimo a ser incluído</div>
				</div>
				<div id="panel-element_655955" class="panel-collapse collapse">
					<div class="panel-body">
						<table class="table table-hover">
							<tr class="warning">
								<th>Nome acréscimo</th>
								<th>QTDA</th>
								<th>Valor total</th>
								<th>Valor</th>
							</tr>
						</table>
						<tbody>
							<!-- LISTA ACRÉSCIMOS VIA AJAX -->
						</tbody>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel-group" id="panel-615652">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <div class="panel-title" data-toggle="collapse" data-parent="#panel-615652" href="#panel-element_193159">Tabela de produtos disponíveis</div>
				</div>
				<div id="panel-element_193159" class="panel-collapse collapse in">
					<div class="panel-body">
						<h4 class="ProdutosDisponiveisPedido"></h4>
						<table class="table table-hover" id="tableProdutosDisponiveisPedido">
							<thead>
								<tr class="warning">
									<th>Produto</th>
									<th>Tipo</th>
									<th>Valor</th>
									<th>Observação</th>
								</tr>
							</thead>
							<tbody>
								<!-- CARREGA VIA AJAX -->
							</tbody>
						</table>
					</div><!-- FIM PANEL-BODY -->
				</div><!-- FIM PANEL-COLLAPSE -->
			</div><!-- FIM PANEL DEFAULT -->
		</div><!-- FIM PANEL-GROUP -->
	</div>	


<?php require_once 'footer/footer.php';?>
