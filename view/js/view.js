/**
 * 
 */

$(document).ready(function(){
	
	Utils.bindEvents();
	FormHelperPedido.bindEvents();
	FormHelperProduto.bindEvents();
	FormHelperPedidoAcrescimo.bindEvents();
	FormHelperAcrescimo.bindEvents();
	FormHelperTaxa.bindEvents();
	FormHelperContas.bindEvents();

})

$(document).ready(function(){
	
	try {
		
		Service_Produto.carregaInfoProdutoAjaxDB();
	
	} catch(e) {
		
		console.log(e);
	}	
	try {
		
		Service_Generico.carregaInfoProdutoGenericoAjaxDB();
	
	}catch(e) {
		
		console.log(e);
	}
	try {  
		
		Service_Pedido.carregaInfoProdutosDisponiveisAjaxPedido();
	
	}catch(e) {
		
		console.log(e);
	}
	try {
		
		Service_Pedido.carregaInfoPedidoAjaxDB();
	
	}catch(e) {
		
		console.log(e);
	}
	try {
		
		Service_Acrescimo.carregaInfoAcrescimoAjaxDB();
	
	}catch(e) {
		
		console.log(e);
	}
	try {
		
		Service_Prepara_Pedido.carregaInfoPedidoAjaxDB()
		
	}catch(e) {
		
		console.log(e);
	}
	try {
		
		Service_Taxa.carregaInfoAjaxTaxaDB();
	
	}catch(e){
		
		console.log(e);
	}
	
	try {
		
		Service_Contas.carregaInfoContasAjaxDB();
	
	}catch(e){
		
		console.log(e);
	}
})

