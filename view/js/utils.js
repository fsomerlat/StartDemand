/**
 * 
 */

var Utils =  (function(){
	
	
	var verificaUrl =  function() {
		
		var url = window.location.search.replace("?",""),
			itens = url.split("&");
		
		var getItensUrl = {
				
				"panel" : itens[0]
		}
		
		return getItensUrl.panel.substring(6,12);
	}	
	
	var carregaDataDeHoje = function(objDate) {
		
		var dia = objDate.getDate(),
			mes = objDate.getMonth() + 1,
			ano = objDate.getFullYear();
		
		if(dia < 10) { dia = '0' + dia;}
		if(mes < 10) { mes = '0' + mes; }
		return dia +'/'+mes+'/'+ano;	
	};
	
	var getDate = function() {
		
		return new Date();
	};
	
	var bindEvents = function() {
		
		$('.dataHoje').html(carregaDataDeHoje(getDate()));
	};
	
	return {
		
		bindEvents: bindEvents,
		verificaUrl: verificaUrl
	};
	
})();