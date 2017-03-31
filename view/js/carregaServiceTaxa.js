/**
 * 
 */

var Service_Taxa =  (function() {
	
	var carregaInfoAjaxTaxaDB =  function() {
		
		var itens = "";
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Taxa_Juros.php",
			cache:false,
			dataType:"json",
			success: function(retorno) {
				
				retorno.map(function(dados){
					
				   var formaPagamento = "";
					
				   (dados.cpFormaPagamentoTaxa == "PS") ? formaPagamento += "PagSeguro": false;
				   (dados.cpFormaPagamentoTaxa == "CD") ? formaPagamento += "Cartão crédito": false;
				   (dados.cpFormaPagamentoTaxa == "CC") ? formaPagamento += "Cartão débito": false;
					
					itens +="<tr>";
					itens += "<td>"+dados.idTaxaJuros+"</td>";
					switch(formaPagamento){
						
						case "PagSeguro" : itens += "<td>"+formaPagamento+"</td>"; break;
						case "Cartão crédito": itens += "<td>"+formaPagamento+"</td>"; break;
						case "Cartão débito": itens += "<td>"+formaPagamento+"</td>"; break;
					}
		
					itens += "<td>"+dados.cpPlanoPagSeguro+"</td>";
					itens += "<td>"+dados.cpBandeiraCartao+"</td>";
					itens += "<td>"+dados.cpPorcentagemTaxa+"</td>";
					itens += "<td><a href='Taxas.php?acao=editar&id="+dados.idTaxaJuros+"'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";
					itens += "<td><a href='../controller/Taxa_Juros_Controller.php?acao=deletar&id="+dados.idTaxaJuros+"'><span class='glyphicon glyphicon-remove' id='excluirTaxaJuros' aria-hidden='true'></span></a></td>";
					itens += "</tr>";
				});
				
				$("#tableTaxa tbody").html(itens);
			}
		});
		 	
	}
	
	return {
		
		carregaInfoAjaxTaxaDB: carregaInfoAjaxTaxaDB
	}
	
})();