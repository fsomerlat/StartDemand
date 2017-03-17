<?php require_once 'header/header.php'; require_once '../core/include.php';
	
	$prep = new PreparaProduto();
	
 if ($_GET["acao"] == "editar"):
		 $acao = "atualizar";
		 $id = (int)$_GET["id"];
 
	    $edit = $prep->listId($id);
 	 	
	 endif;
?>

<div class="col-md-8">
	<div class="panel-group" id="panel-615651">
		<div class="panel panel-default">
			<div class="panel-heading">
				 <div class="panel-title" data-toggle="collapse" data-parent="#panel-615651" href="#panel-element_193158">Criar pedidos</div>
			</div>
			<div id="panel-element_193158" class="panel-collapse collapse">
				<div class="panel-body">
					<form name="formPedido" id="formPedido" action="../controller/Pedido_Controller.php" method="POST">
				
					<input type="hidden" name="id" value="<?php echo (!empty($_GET["id"])) ? $id : "";?>" />
						<div class="col-md-2">
							<div class="form-group">
								<label for="Status">Status</label>
								<select name="cpStatusPedido" id="cpStatusPedido" class="form-control btn btn-success">
									<option value="A" selected>Em andamento</option>
								</select>
							</div>
						</div>					
						<div class="col-md-2">
							<div class="form-group">
							<label for="Tipo do pedido">Tipo do pedido</label>
								<select name="tipoPedido" class="form-control">
									<option value="">Selecione</option>
									<option value="semAcrescimo">Sem acréscimo</option>
									<option value="comAcrescimo">Com acréscimo</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="Produto">Nome do produto</label>
								<select name="tuProduto_idProduto" id="tuProduto_idProduto" class="form-control toClearProduto">
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
									<option value="0">Selecione  <?php echo (!empty($_GET["id"])) ? " | Anterior - ". $edit->cpQtdProduto : "";?></option>
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
						<div class="col-md-2">
							<div class="form-group">
								<label for="Valor base produto">Valor base produto</label>
								<input type="text" name="cpValorBaseProduto" value="<?php echo (!empty($_GET["id"])) ? $edit->cpValorProduto :""; ?>" readonly id="cpValorBaseProduto" class="form-control" />
							</div>
						</div>						
						<div class="col-md-3">
							<div class="form-group">
								<label for="ComplementoUm">1º Complemento</label>
								<select name="cpComplementoUm" id="cpComplementoUm" class="form-control">
									<option value="">Selecione <?php echo (!empty($_GET["id"]))? " | Anterior - ".$edit->cpComplementoUm :"";?></option>
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
								<label for="ComplementoDois">2º Complemento</label>
								<select name="cpComplementoDois" id="cpComplementoDois" class="form-control ">
									<option value="">Selecione <?php echo (!empty($_GET["id"])) ? " | Anterior - ".$edit->cpComplementoDois : ""; ?></option>
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
								<label for="Produto">Valor total produto</label>
								<input type="text" name="cpValorTotalProduto" id="cpValorTotalProduto" value="<?php echo (!empty($_GET["id"])) ? $edit->cpValorTotalProduto : ""; ?>" readonly class="form-control toClearProduto" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="Valor total do pedido">Valor total do pedido</label>
								<input type="text" name="cpValorTotalPedido" id="cpValorTotalPedido" class="form-control valTotalPedidoPagPedido" readonly/>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="Observacao">Observação</label>
								<textarea name="cpObservacaoPedido" rows="2" id="cpObservacaoPedido" class="form-control "><?php echo(!empty($_GET["id"])) ? $edit->cpObservacaoPedido: "";?></textarea>
							</div>
						</div>							
						<div class="col-md-6">
							<div class="form-group">
								<input type="submit" name="acao"  id="btnCadastrarPedido"  value="<?php echo (!empty($_GET["id"])) ? $acao : "gerar pedido"; ?>"  class="btn btn-info form-control" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="reset" class="btn btn-warning form-control" value="limpar" />
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
				 <div class="panel-title tabelaProdutosDisponiveis" data-toggle="collapse" data-parent="#panel-615652" href="#panel-element_193159">Tabela de produtos disponíveis</div>
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
