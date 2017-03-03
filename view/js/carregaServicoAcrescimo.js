var Service_Acrescimo = (function() {
	
	var mySet = new Set();
	
	var postAcaoExcluir = function(url,id) {
		
		var acao = "deletar";
		var submeter = $.post(url,{acao: acao,id: id},function(retorno) {
			
			$(".listaAcrescimo").html(retorno);
		});
		
		return submeter;
	}
	
	var carregaInfoAcrescimo = function(url) {
		
		var itens = "";
		$.ajax({
			
			url:url,
			cache:false,
			dataType:"json",
			beforeSend: function(){
				
				$(".listaAcrescimo").html("Carregando lista de acréscimos...");
			},
			error: function() {
			
				$(".listaAcrescimo").html("Houve algum erro com a fonte de i !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$(".listaAcrescimo").html(retorno[0].erro);
				
				}else{
				
				setTimeout(function() {
					
				retorno.map(function(dados) {
							
	
							itens += "<tr>";
							itens += "<td>"+dados.idAcrescimo+"</td>";
							itens += "<td>"+dados.cpAcrescimo+"</td>";
							itens += "<td>"+dados.cpQtdAcrescimo+"</td>";
							itens += "<td>"+dados.cpValorBaseAcrescimo+"</td>";
							itens += "<td>"+dados.cpValorTotalAcrescimo+"</td>";
							itens += "<td><a href='#?id="+dados.idAcrescimo+"'><span class='glyphicon glyphicon-pencil super'  aria-hidden='true'></span></a></td>";
							itens += "<td><a hre='#?id="+dados.idAcrescimo+"'><span class='glyphicon glyphicon-trash super excluirAcrescimo' aria-hidden='true'></span></a></td>";
							itens += "</tr>";	
							
						});
							$("#tableAcrescimo tbody").html(itens);
							$(".listaAcrescimo").html("");
					},1500);
				}
			}
		});
	}
	
	var carregaInfoAcrescimoDB = function() {
		
		carregaInfoAcrescimo("http://localhost/startDemand/service/Service_Acrescimo.php");
	}
	
	var bindEvents = function(){
		
		carregaInfoAcrescimoDB();
		
		$(document).on("click",".excluirAcrescimo", function() {
			
			postAcaoExcluir();
		});
	}
	
	return {
		
		bindEvents: bindEvents
	}
})(); 