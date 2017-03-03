<?php require_once 'header/header.php';?>

	<div class="col-md-8">
	
		<div class="panel-group" id="panel-615651">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <div class="panel-title" data-toggle="collapse" data-parent="#panel-615651" href="#panel-element_193158">Criar pedidos</div>
				</div>
				<div id="panel-element_193158" class="panel-collapse collapse">
					<div class="panel-body">
						<form name="formProduto" id="formProduto" action="../controller/Pedido_Controller.php" method="GET">
						
						<input type="hidden" name="cpValorTotalPedido" value="0" />
						<input type="hidden" name="cptuAcrescimo_idAcrescimo" value="0" /> 
						<input type="hidden" name="cpValorTotalAcrescimo" value="0" />
						
						
						
						<div class="col-md-12">
							<div class="form-group">
								Pedido sem acréscimo <input type="radio" name="tipoPedido" value="semAcrescimo" checked/>
								Pedido com acréscimo <input type="radio" name="tipoPedido" value="comAcrescimo" />
								<hr/>
							</div>
						</div>
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
							<div class="col-md-3">
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
								<label for="Codigo pedido">Còdigo pedido</label>
									<select name="cpCodPedido" id="cpCodPedido" class="form-control">
										<!-- CARREGA VIA JQUERY DE 1 A 100 -->
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="Produto">Quantidade produto</label>
									<select name="cpQtdProduto" id="cpQtdProduto" class="form-control">
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
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="Valor base produto">Valor base produto</label>
									<input type="text" name="cpValorBaseProduto" readonly id="cpValorBaseProduto" class="form-control" />
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
							<div class="col-md-3">
								<div class="form-group">
									<label for="Produto">Valor total produto</label>
									<input type="text" name="cpValorTotalProduto" id="cpValorTotalProduto" readonly class="form-control toClearProduto" />
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
								<label for="Observacao">Observação</label>
									<textarea name="cpObservacaoPedido" rows="2" id="cpObservacaoPedido" class="form-control "></textarea>
								</div>
							</div>							
							<div class="col-md-6">
								<div class="form-group">
									<input type="submit" name="acao" value="gerar pedido" id="btnCadastrarPedido" value="enviar" class="btn btn-info form-control" />
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
