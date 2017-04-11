<?php require_once 'header/header.php'; require_once '../core/include.php';
	
	$usuario = new Usuario();
	
	if($_GET["acao"]=="editar"):
		
		$acao = "atualizar";
	
		$id = addslashes((int)$_GET["id"]);	
		$getInfoUsuario = $usuario->listId($id);
		
	endif;
?>

<div class="col-md-6">
	<div class="panel-group" id="panel-209219">
		<div class="panel panel-primary">
			<div class="panel-heading">
				 <div class="panel-title" data-toggle="collapse" data-parent="#panel-209219" href="#panel-element_767438">Cadastrar usuário</div>
			</div>
			<div id="panel-element_767438" class="panel-collapse collapse">
				<div class="panel-body">
					<form action="../controller/Usuario_Controller.php" method="POST">
					
					<input type="hidden" name="id" value="<?php echo (!empty($_GET["id"])) ? $id : ""; ?>" />
					
						<div class="col-md-3">
							<div class="fprm-group">
								<label for="Usuario">Usuário</label>
								<input type="text" name="cpNome" value="<?php echo (!empty($_GET["id"])) ? $getInfoUsuario->cpNome : ""; ?>" id="cpNome"class="form-control" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="Senha">Senha</label>
								<input type="password" name="cpSenha" id="cpSenha"  class="form-control" />
							</div>
						</div>
						<div class="col-md-1 topVizualizaSenha">
							<div class="form-group">
								<a href="#"><span class="glyphicon glyphicon-eye-open vizualizaSenha" title="visualizar senha" aria-hidden="true"></span></a>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="Status">Status</label>
								<select name="cpStatus" id="cpStatus" class="form-control">
									<option value="">Selecione <?php echo (!empty($_GET["id"])) ? " - ". $getInfoUsuario->cpStatus : ""; ?></option>
									<option value="A">Ativo</option>
									<option value="B">Bloqueado</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<label for="Nivel acesso">Nível de acesso</label>
								<select name="cpNivelAcesso" id="cpNivelAcesso" class="form-control">
									<option value="">Selecione <?php echo (!empty($_GET["id"])) ? " - ".$getInfoUsuario->cpNivelAcesso : ""; ?></option>
									<option value="C">Comum</opton>
									<option value="S">Super</option>
									<option value="A">Administrador</option>
								</select>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="submit" name="acao" id="btnCadastrarUsuario"  value="<?php echo (!empty($_GET["id"])) ? $acao : "cadastrar"; ?>" class="form-control btn btn-info"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="reset"  id="btnCadastrar"  value="limpar" class="form-control btn btn-warning"/>
							</div>
						</div>					
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel-group" id="panel-869884">
		<div class="panel panel-success">
			<div class="panel-heading">
				 <div class="panel-title" data-toggle="collapse" data-parent="#panel-869884" href="#panel-element_11508">Listar usuário</div>
			</div>
			<div id="panel-element_11508" class="panel-collapse collapse">
				<div class="panel-body">
				<h4 class="carregaUsuario"></h4>
					<table class="table table-hover" id="tableUsuarios">
						<thead>
							<tr class="info">
								<th>Id</th>
								<th>Usuário</th>
								<th>Status</th>
								<th>Nível de acesso</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<msgUsuarioVazio><h4  class="msgUsuarioVazio"></h4></msgUsuarioVazio>
							<!-- CARREGA VIA AJAX -->
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<br/><br/><br/><br/>
	
<?php require_once 'footer/footer.php'; ?>