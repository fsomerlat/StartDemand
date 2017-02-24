<?php  require_once 'header/header.php'; require_once '../core/include.php'; 
		
        $prod = new Produto();
        
		if($_GET["acao"]=="editar"):
			$acao="atualizar";
		    $id=(int)$_GET["id"];
		    
		    $edit = $prod->listId($id);
		    
		    
		    else:
		    	
		    	$_GET["acao"] = "";
;		endif;
?>

<div class="row">
	<div class="col-md-5">
		<div class="panel-group" id="panel-615651">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <div class="panel-title" data-toggle="collapse" data-parent="#panel-615651" href="#panel-element_193157">Cadastrar produto</div>
				</div>
				<div id="panel-element_193157" class="panel-collapse collapse">
					<div class="panel-body">
						<form name="formProduto" id="formProduto" action="../controller/Produto_Controller.php" method="GET">
							<div class="col-md-4">
								<div class="form-group">
									<label for="Produto">Nome produto</label>
									<input type="text" name="cpNomeProduto" value="<?php echo (isset($_GET["id"])) ? $edit->cpNomeProduto : "";?>" id="cpNomeProduto" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Produto">Quantidade produto</label>
									<input type="text" name="cpQtdProduto" value="<?php echo (isset($_GET["id"])) ? $edit->cpQtdProduto :""; ?>" id="cpQtdProduto" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Produto">Tipo produto</label>
									<select name="cpTipoProduto" id="cpTipoProduto" class="form-control" >
										<option value=""><?php echo (isset($_GET["id"])) ? $edit->cpTipoProduto : "selecione";?></option>
										<option value="Industrializado">Industrializado</option>
										<option value="Caseiro">Caseiro</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="valor estimado">Selecione um valor estimado</label>
									<select name="cpValorEstimado" id="cpValorEstimado"  class="form-control">
										<option value="0">Selecione</option>
										<option value="1">Até 99.00</option>
										<option value="2">Acima de 100</option> 
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Produto">Valor produto</label>
									<input type="text" name="cpValorProduto" maxlength="5" value="<?php echo (isset($_GET["id"])) ? $edit->cpValorProduto : ""; ?>" id="cpValorProduto" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Tipo de Observacao">Tipo de observação</label>
									<select name="cpTipoObservacao" id="cpTipoObservacao" class="form-control">
										<option value="">Selecione</option>
										<option value="Produto">Produto</option>
										<option value="Acrescimo">Acrescimo</option> 
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								<label for="Observacao">Observação <tipoObs></tipoObs></label>
									<textarea name="cpObservacaoProduto" id="cpObservacaoProduto" class="form-control"><?php echo (isset($_GET["id"])) ? $edit->cpObservacaoProduto : ""; ?></textarea>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo (isset($_GET["id"])) ? $id : ""; ?>" />
									<input type="submit" name="acao" value="<?php echo (isset($_GET["id"])) ? $acao : "cadastrar";?>" id="btnCadastrarProduto" class="btn btn-info form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="reset" class="btn btn-warning form-control" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="panel-group" id="panel-754764">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <div class="panel-title" data-toggle="collapse" data-parent="#panel-754764" href="#panel-element_571586">Listar produtos</div>
				</div>
				<div id="panel-element_571586" class="panel-collapse collapse">
					<div class="panel-body">
					<h4 class="listaProdutos"></h4>
						<table class="table table-hover" id="tableProduto">
							<thead>
								<tr class="warning">
									<th>Id</th>
									<th>Nome</th>
									<th>Quantidade</th>
									<th>Tipo</th>
									<th>Valor</th>
									<th>Tipo Observacao</th>
									<th>Observação</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							
							<tbody>
							 	<!-- CARREGA LISTA DE PRODUTOS VIA AJAX -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php require_once 'footer/footer.php'; ?>