<?php require_once 'header/header.php'; require_once '../core/include.php'; 

	$contas =  new Contas();
	
	if($_GET["acao"] == "editar"):
		
		$acao = "atualizar";
		$id = (int) addslashes($_GET["id"]);
		
		$getInfoContas = $contas->listId($id);
		
		$tipoConta = "";
		$valorCompleto= "";
		if(strlen($getInfoContas->cpValorConta) == 3){
			$valorCompleto .= $getInfoContas->cpValorConta."00";
		}elseif(strlen($getInfoContas->cpValorConta) == 2){
			
			$valorCompleto = "0".$getInfoContas->cpValorConta."00";	
		}elseif(strlen($getInfoContas->cpValorConta > 3 && strlen($getInfoContas->cpValorConta) < 6)){
		
			$valorCompleto .= $getInfoContas->cpValorConta."0";
		}else{
			$valorCompleto .= $getInfoContas->cpValorConta;
		}
		($getInfoContas->cpTipoConta == "P") ? $tipoConta = "Pagar" : $tipoConta = "Receber";
		

	endif;
?>

<div class="col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				Cadastrar uma conta
			</h3>
		</div>
		<div class="panel-body">
			<form action="../controller/Contas_Controller.php" method="POST">
			
			<input type="hidden" name="id" value="<?php echo (!empty($_GET["id"])) ? $id : ""; ?>" />
			
				<div class="col-md-3">
					<div class="form-group">
						<label for="Tipo de conta">Tipo de conta</label>
							<select name="cpTipoConta" id="cpTipoConta" class="form-control">
							<option value="">Selecione <?php echo (!empty($_GET["id"])) ? " - ".$tipoConta : ""; ?></option>
							<option value="P">A pagar</option>
							<option value="R">A receber</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="Tipo de conta">Classificação</label>
						<select name="cpClassificacaoConta" id="cpClassificacaoConta" class="form-control">
							<option value="">Selecione <?php echo (!empty($_GET["id"])) ? " - ".$getInfoContas->cpClassificacaoConta : ""; ?></option>
							<option value="Luz">Luz</option>
							<option value="Agua">Àgua</option>
							<option value="Internet">Internet</option>
							<option value="Outro">Outro</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="Valor">Valor</label>
						<input type="text" name="cpValorConta" value="<?php echo (!empty($_GET["id"])) ? $valorCompleto : ""; ?>" id="cpValorConta" class="form-control" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="Data de vencimento">Data de vencimento</label>
						<input type="text" name="cpDataVencimentoConta" value="<?php echo(!empty($_GET["id"])) ? $getInfoContas->cpDataVencimentoConta : ""; ?>" id="cpDataVencimentoConta" readonly class="form-control" />
					</div>
				</div>
				<div class="col-md-12">
				<label for="Observacao conta">Observação conta</label>
					<div class="form-group">
						<textarea name="cpObservacaoConta" id="cpObservacaoConta" class="form-control"><?php echo (!empty($_GET["id"])) ? $getInfoContas->cpObservacaoConta : ""; ?></textarea>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					
						<input type="submit" name="acao" value="<?php echo (!empty($_GET["id"])) ? $acao : "cadastrar"; ?>" id="btnCadastrarConta" class="form-control btn btn-info" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="reset" class="form-control btn btn-warning" />
					</div>
				</div>
			</form>		
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">
				Listar contas a ṕagar
			</h3>
		</div>
		<div class="panel-body">
			<h4 class="contas"></h4>
			<table class="table table-hover" id="tableContasPagar">
				<thead>
					<tr class="danger">
						<th>Tipo / conta</th>
						<th>Classificação</th>
						<th>Valor</th>
						<th>ver detalhes</th>
						<th>Data / Vencimento</th>
						<th>Observação</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<!-- CARREGA VIA AJAX -->
					<h4 class="listaContasPagarVazia"></h4>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">
				Listar contas a receber
			</h3>
		</div>
		<div class="panel-body">
			<h4 class="contas"></h4>
			<table class="table table-hover" id="tableContasReceber">
				<thead>
					<tr class="success">
						<th>Tipo / conta</th>
						<th>Classificação</th>
						<th>Valor</th>
						<th>ver detalhes</th>
						<th>Data / Vencimento</th>
						<th>Observação</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<!-- CARREGA VIA AJAX -->
					<h4 class="listaContasReceberVazia"></h4>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>

<br/><br/><br/><br/>

<?php require_once 'footer/footer.php'; ?>
