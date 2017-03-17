/**
 * 
 */

var Utils =  (function(){

	var msgSuccess =  function(mensagem) {
		
		var success = '<div class="alert alert-success" role="alert">' + mensagem + '</div>';
		return success;
	}
	
	var msgDanger = function (mensagem) {
		
		var danger = '<div class="alert alert-danger" role="alert">' + mensagem + '</div>';
		return danger;
	}
	
	
	var msgInfo = function(mensagem) {
		
		var msgInfo = '<div class="alert alert-info" role="alert">' +mensagem + '</div>';
		return msgInfo;
	}	
	
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
	}
	
	var getDate = function() {
		
		return new Date();
	}
	
	var setTimeoutReload =  function() {
		
		return setTimeout(function() {
			location.reload();
		},2200);
	}	
	
	var setTimeoutLocation = function(url) {
		
		return setTimeout(function() {
			window.location.href= url;
		},1500);  
	}
	
	var setTimeoutReload500 = function() {
		
		return setTimeout(function() {
			location.reload();
		},500);
	}
	
	var expandePainel = function(idPanel) {
		
		$("#panel-element_" + idPanel).collapse();
	}
	
	var bindEvents = function() {
		
		expandePainel(verificaUrl());
		$('.dataHoje').html(carregaDataDeHoje(getDate()));
	};
	
	return {
		
		setTimeoutLocation: setTimeoutLocation,
		setTimeoutReload500:setTimeoutReload500,
		setTimeoutReload: setTimeoutReload,
		bindEvents: bindEvents,
		msgSuccess: msgSuccess,
		msgDanger: msgDanger,
		msgInfo: msgInfo,
		carregaDataDeHoje:carregaDataDeHoje

	};
	
})();