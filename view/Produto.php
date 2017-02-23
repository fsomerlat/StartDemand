<?php  require_once 'header/header.php'; ?>
<div class="row">
	<div class="col-md-5">
		<div class="panel-group" id="panel-615651">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <div class="panel-title" data-toggle="collapse" data-parent="#panel-615651" href="#panel-element_193157">Cadastrar produto</div>
				</div>
				<div id="panel-element_193157" class="panel-collapse collapse">
					<div class="panel-body">
						<form name="formProduto" id="formProduto" action="../controller/Produto_Controller.php" method="POST">
							<div class="col-md-4">
								<div class="form-group">
									<label for="Produto">Nome produto</label>
									<input type="text" name="cpNomeProduto" id="cpNomeProduto" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Produto">Quantidade produto</label>
									<input type="text" name="cpQtdProduto" id="cpQtdProduto" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Produto">Nome produto</label>
									<select name="cpTipoProduto" id="cpTipoProduto" class="form-control" >
										<option value="0">Selecione</option>
										<option value="Industrializado">Industrializado</option>
										<option value="Caseiro">Caseiro</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Produto">Valor produto</label>
									<input type="text" name="cpValorProduto" id="cpValorProduto" class="form-control" />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								<label for="Observacao">Observação</label>
									<textarea name="cpObservacaoProduto" id="cpObservacaoProduto" class="form-control"></textarea>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<input type="submit" name="acao" value="cadastrar" id="btnCadastrarProduto" value="enviar" class="btn btn-info form-control" />
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
	
	<div class="col-md-7">
		<div class="form-group">
			<ul class="nav nav-pills">
				<li class="active">
					 <a href="#"> <span class="badge pull-right">42</span> cadastrados</a>
				</li>
				<li class="active">
					 <a href="#"> <span class="badge pull-right">16</span>Hoje</a>
				</li>
				<li class="active">
					 <a href="#"> <span class="badge pull-right">16</span> finalizados</a>
				</li>
				<li class="active">
					 <a href="#"> <span class="badge pull-right">16</span> baixados</a>
				</li>
			</ul>
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
						<table class="table table-hover">
							<thead>
								<tr class="warning">
									<th>Id</th>
									<th>Nome</th>
									<th>Tipo</th>
									<th>Quantidade</th>
									<th>Valor</th>
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