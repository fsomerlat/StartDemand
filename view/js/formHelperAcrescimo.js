var FormHelperAcrescimo = (function(){
	
	var option =  function(){
		
		var options = "";
			options += "<option value='0'>Selecione</option>";
			for(var i=1;i < 101; i++) {
				
				options += "<option value="+i+">"+i+"</option>";
			}
		return options;
	}
	
	var preencheComboCodPedido = function(){
		
		$(".codPedidoAcrescimo").html(option());
	}
	
	var bindEvents = function(){
		
		preencheComboCodPedido();
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();