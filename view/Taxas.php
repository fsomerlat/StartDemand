<?php require_once 'header/header.php'; require_once '../model/TaxaJuros.php';
	
	$taxa = new TaxaJuros();
	
	if($_GET["acao"] == "editar"):
		
		$acao = "atualizar";
		
		$id = (int) $_GET["id"];
		$getInfoTaxa = $taxa->getId($id);
		
		$formaPagamento = "";
		
		($getInfoTaxa->cpFormaPagamentoTaxa == "PS") ? $formaPagamento = "PagSeguro" : "";
		($getInfoTaxa->cpFormaPagamentoTaxa == "CC") ? $formaPagamento = "Cartão crédito" : "";
		($getInfoTaxa->cpFormaPagamentoTaxa == "CD") ? $formaPagamento = "Cartão débito" : "";
	
	endif;
?>
 
<div class="col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				Cadastrar taxa
			</h3>
		</div>
		<div class="panel-body">
			<form action="../controller/Taxa_Juros_Controller.php" method="GET">
				<div class="col-md-4">
					<div class="form-group">
						<label for="Forma pagamento">Forma / pagamento</label>
						<select name="cpFormaPagamentoTaxa" id="cpFormaPagamentoTaxa" class="form-control">
							<option value="">Selecione  <?php echo (!empty($_GET["id"])) ? " - " .$formaPagamento : ""; ?> </option>
							<option value="PS">PagSeguro</option>
							<option value="CD">Cartão / dédito</option> 
							<option value="CC">Cartão / crédito</option>  
						</select>
					</div>
				</div>
				<div class="col-md-6 isPagaSeguro">
					<div class="form-group">
						<label for="Plano pagseguro">Plano / PagSeguro</label>
				        <input type="text" name="cpPlanoPagSeguro" maxlength="2" placeholder="Receber em quantos dias do PagSeguro ?" value="<?php echo (!empty($_GET["id"])) ? $getInfoTaxa->cpPlanoPagSeguro : ""; ?>" id="cpPlanoPagSeguro" class="form-control" />
					</div>
				</div> 
				<div class="col-md-2">
					<div class="form-group">
						<label for="Porcentagem taxa">% taxa</label>
				        <input type="text" name="cpPorcentagemTaxa" value="<?php echo (!empty($_GET["id"])) ? $getInfoTaxa->cpPorcentagemTaxa : ""; ?>" id="cpPorcentagemTaxa" class="form-control" />
					</div>
				</div>
				<div class="col-md-6 isBandeiraCartaoPagTaxa">
					<div class="form-group">
						<label for="Bandeira cartão">Bandeira / cartão</label>
						<select name="cpBandeiraCartaoTaxa" id="cpBandeiraCartaoTaxa"class="form-control">
							<option value="">Selecione<?php echo (!empty($_GET["id"]) && $formaPagamento != "PagSeguro") ? " - ".$getInfoTaxa->cpBandeiraCartaoTaxa : ""; ?></option>
							<option value="Visa">Visa</option>
							<option value="Master">Master</option>
							<option value="Cielo">Cielo</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo (!empty($_GET["id"])) ? $id : ""; ?>" />
						<input type="submit" name="acao" id="btnCadastrarTaxa" value="<?php echo (!empty($_GET["id"])) ? $acao : "cadastrar"; ?>" class="form-control btn btn-info"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="reset" value="limpar" class="form-control btn btn-warning"/>
					</div>
				</div>				
			</form>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				Lista de taxas cadastradas
			</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover" id="tableTaxa">
				<thead>
					<tr class="danger">
						<th>Id</th>
						<th>Forma / Pagamento</th>
						<th>Plano / PagSeguro - Receber em X dias</th>
						<th>Bandeira / Cartao</th>
						<th>% taxa</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<!-- CARREGA VIA AJAX -->
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div> 
 
 <?php require_once 'footer/footer.php'; ?>