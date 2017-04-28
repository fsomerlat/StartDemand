<?php session_start(); ?>

<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link type="text/css" rel="stylesheet" href="css/jquery-ui.css" />
		<link type="text/css" rel="stylesheet" href="css/datepicker.css"/>
		<link type="text/css" rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />	
	
	</head>
	
<body>
<div class="container-fluid">
	<div class="row">
	
		<div class="col-md-12">
			<div class="form-group">
				<div class="alert alert-info alert-dismissable"> 
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
						×
					</button>
					<h4>
						Criar pedidos !
					</h4> <strong>Olá <?php echo $_SESSION["cpNome"]; ?> !</strong> Escolha ao lado esquerdo os produtos.Ao lado direito, selecione para confirmar o pedido e logo após, GERAR PEDIDO !<br/> Ir para <a href="Pedido.php" class="alert-link">sistema</a>
				</div>
			</div>
		</div>	
	    <div class="col-md-3">
		    <div class="form-group">
		    <label for="Principal">Principal</label>
		        <select name="cpCriandoProduto[]" id="selectMobileProduto" class="js-multiselect form-control" size="7" multiple="multiple">
				 	<div class="prodPrincipal"></div>
		        </select>
		    </div>
	    </div>
	    <div class="col-md-3">
		    <div class="form-group">
		    <label for="Acrescimo">Acréscimo</label>
		        <select name="cpCriandoAcrescimo[]" id="selectMobileAcrescimo" class="js-multiselect form-control" size="7" multiple="multiple">
				    	<div class="prodAcrescimo"></div>
		        </select>
		    </div>
	    </div> 	      
	    <div class="col-md-2">
		    <div class="form-group">
		        <button type="button" id="js_right_All_1" class="btn btn-lg btn-block btn-warning">Todos <i class="glyphicon glyphicon-forward"></i></button>
		        <button type="button" id="js_right_Selected_1" class="btn btn-lg btn-block btn-info"><i class="glyphicon glyphicon-chevron-right"></i></button>
		        <button type="button" id="js_left_Selected_1" class="btn btn-lg btn-block btn-danger isBtnRetroceder"><i class="glyphicon glyphicon-chevron-left"></i></button>
		        <button type="button" id="js_left_All_1" class="btn btn-lg btn-block btn-warning isBtnRetroceder"><i class="glyphicon glyphicon-backward"> Todos</i></button>
		        <button type="button" id="selecioneTudo" class="btn btn-lg btn-block btn-warning isConfirmaPedido">confirmar lista</i></button>
		    </div>
	    </div>
	    <form action="../controller/Mobile_Controller.php"  id="formMobile" method="GET">
	      	
	      	<input type="hidden" name="valBaseProduto[]" 	id="valBaseProduto"/>
	      	<input type="hidden" name="valBaseAcrescimo[]" id="valBaseAcrescimo"/>
	      	
			<div class="isItensFormMobile">
				<!-- CRIAR INPUT HIDDEN -->
			</div>	    
	    
		    <div class="col-md-4">
		    	<div class="form-group">
		        	<select name="tuProduto_idProduto[]" id="js_multiselect_to_1" class="form-control isSelectPedidosMobile" size="10" multiple="multiple">
		        		
		        	</select>
		    	</div>
		    </div>
		    <div class="col-md-8">	    
			    <div class="form-group">
					<div class="page-header">
						<h1>
							Soma pedido atual : <div id="isValorTotalPedido"></div>
						</h1>
					</div>
				    
<!-- 					<textarea  name="cpValorTotalPedido" id="cpValorTotalPedido" class="form-control isValorTotalPedido" rows="4" readonly cols=""></textarea> -->
			    </div>
		    </div> 
		 	<div class="col-md-4">
		 		<div class="form-group">
		 			<input type="submit" name="acao" class="btn btn-lg btn-block btn-success" id="btnGerarPedidoMobile" value="gerar pedido"/>
		 		</div>
		 	</div>
	    </form>	
	</div>
</div>

<br/><br/>

<?php require_once 'footer/footer.php';?>
	