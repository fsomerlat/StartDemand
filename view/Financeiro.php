<?php require_once 'header/header.php'; ?>

<div class="col-md-6">
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">
				Cadastrar uma conta
			</h3>
		</div>
		<div class="panel-body">
			<form action="" method="">
				<div class="col-md-3">
					<div class="form-group">
						<label for="Tipo de conta">Tipo de conta</label>
							<select name="cpConta" id="cpConta" class="form-control">
							<option value="">Selecione</option>
							<option value="Pagar">A pagar</option>
							<option value="Receber">A receber</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="Tipo de conta">Tipo</label>
						<select name="cpTipoConta" id="cpTipoConta" class="form-control">
							<option value="">Selecione</option>
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
						<input type="text" name="cpValorConta" id="cpValorConta" mask="99.99" class="form-control" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="Data de vencimento">Data de vencimento</label>
						<input type="text" name="cpDataVencimentoConta" id="cpDataVencimentoConta" readonly class="form-control" />
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
			Panel content
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
			Panel content
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>

<br/><br/><br/><br/>

<?php require_once 'footer/footer.php'; ?>
