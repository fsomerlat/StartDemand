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
	FormHelperUsuario.bindEvents();
	
	FormHelperRelatorioFinanceiro.bindEvents();
	FormHelperRelatorioPedido.bindEvents();
	FormHelperMobile.bindEvents();	

})


//MOBILE
jQuery(document).ready(function($) {
	
    $('.js-multiselect').multiselect({
        right: '#js_multiselect_to_1',
        rightAll: '#js_right_All_1',
        rightSelected: '#js_right_Selected_1',
        leftSelected: '#js_left_Selected_1',
        leftAll: '#js_left_All_1'
    });
});

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
	
	try{
		
		Service_Usuario.carregaInfoUsuarioDBAjax();
		
	}catch(e){
		
		console.log(e);
	}
})

