<?php require_once 'header/header.php'; ?>

<div class="col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				Pesquisar situação financeira
			</h3>
		</div>
		<div class="panel-body">
				<div class="col-md-3">
					<div class="form-group">
						<label for="Tipo de conta">Tipo de pesquisa</label>
							<select name="cpTipoPesquisa" id="cpTipoPesquisa" class="form-control">
							<option value="">Selecione</option>
							<option value="T">Todos</option>
							<option value="D">Por data</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 isFltDataFinanceiro">
					<div class="form-group">
						<label for="Status financeiro">Status</label>
						<select name="cpStatusFinanceiro" id="cpStatusFinanceiro" class="form-control toClearDataFinanceiro">
							<option value="">Selecione</option>
							<option value="F">Finalizado</option>
							<option value="C">Cancelado</option>
						</select>
					</div>
				</div>
				<div class="col-md-2 isFltDataFinanceiro">
					<div class="form-group">
						<label for="Data de vencimento">De...</label>
						<input type="text" name="cpDataInicio" id="cpDataInicio" readonly class="form-control toClearDataFinanceiro" />
					</div>
				</div>
				<div class="col-md-2 isFltDataFinanceiro">
					<div class="form-group">
						<label for="Data final">Até...</label>
						<input type="text" name="cpDataFinal" id="cpDataFinal" readonly class="form-control toClearDataFinanceiro" />
					</div>
				</div>
				<div class="col-md-9 isBtnFiltrarFinanceiro">
					<div class="form-group">
						<input type="submit" name="acao" id="btnFiltrarFinanceiro" value="gerar" class="form-control btn btn-info btnFltFinanceiro" />
					</div> 
				</div>
				
		</div>
		<div class="panel-footer">
			<input type="button" id="btnPrintFinanceiro" class="form-control btn btn-warning" value="printa tela"/>
			<h4 class="msgRelatorioFinanceiro"></h4>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				Demonstrativo - Resultado da pesquisa
			</h3>
		</div>
		<div class="rolagem">
		<div class="panel-body">
			<table class="table table-hover" id="tablePesquisaFinancerio">
				<thead>
					<tr class="info">
						<th>Status</th>
						<th>Data / compra</th>
						<th>Valor / total</th>
						<th>Valor / líquido</th>
						<th>Data /  fechamento</th>
					</tr>
				</thead>
				<tbody>
					<!-- CARREGA VIA AJAXs -->
				</tbody>
			</table>	
		</div>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>

<br/><br/><br/><br/>

<?php require_once 'footer/footer.php'; ?>
