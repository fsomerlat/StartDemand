 document.getElementById("btnFiltrarFinanceiro").onclick = function() {
		 
	 var Errors = [],
	 	 msg = '';
	  
	 var valida = function(campo,msg) {
		 
		 if(returnId(campo) == "") {
			 
			 Errors.push(msg);
		 }
	 }
	 
	 var validaPaiFilho = function(campo) {
		 
		 if(returnId(campo)=="D") {
			 
			 valida("cpDataInicio","Preencha o campo [ De... ] !");
			 valida("cpDataFinal","Preencha o campo [ Até... ] !");
		 }
	 }
	 
	 var returnId = function(Nids) {
		 
		 return document.getElementById(Nids).value;
	 }
	
	valida("cpTipoPesquisa","Selecione o campo [ TIPO DE PESQUISA ] !");	 
	validaPaiFilho("cpTipoPesquisa");
	
	if(Errors.length > 0){
		
		var msg = Errors.reduce(function(a,b){
			
			return a + b + "\n";
			
		},'Pro favor,\n\n');
		
		window.alert(msg); return false;
	}
	
 }