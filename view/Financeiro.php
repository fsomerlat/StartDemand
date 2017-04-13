<?php require_once 'header/header.php'; ?>

<div class="col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				Cadastrar uma conta
			</h3>
		</div>
		<div class="panel-body">
			<form action="" method="">
				<div class="col-md-3">
					<div class="form-group">
						<label for="Tipo de conta">Tipo de pesquisa</label>
							<select name="cpConta" id="cpConta" class="form-control">
							<option value="">Selecione</option>
							<option value="Data">Por data</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="Data de vencimento">De...</label>
						<input type="text" name="cpDataInicio" id="cpDataInicio" readonly class="form-control" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="Data final">Até...</label>
						<input type="text" name="cpDataFinal" id="cpDataFinal" readonly class="form-control" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="submit" name="acaor" id="btnFiltrarFinanceiro" value="filtrar" class="form-control btn btn-info btnFltFinanceiro" />
					</div> 
				</div>
			</form>		
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">
				Lista pesquisa
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
