var Service_Contas = (function(){
	
	var carregaInfoContas = function(url) {
		
		var contasPagar = '',
			contasReceber = '',
			msgPagar = '',
			msgReceber = '',
			msgAlteracao = '';
		
		$.ajax({
			
			url: url,
			cache: false,
			dataType:"json",
			beforeSend: function() {
				
				$(".contas").html("Carregando contas...");
			},
			error: function() {
				
				$(".contas").html("Houve um erro na base de  dados !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro){
					
					$(".contas").html(retorno[0].erro);
					
				}else{
					
					
				setTimeout(function(){
					
					retorno.map(function(dados){
						
						var tipoConta = '';
						
						(dados.cpTipoConta == "P") ? tipoConta = "Pagar" : false;
						(dados.cpTipoConta == "R") ? tipoConta = "Receber" : false;
						
						if(tipoConta == "Pagar") {
														
							var objDataCadastroConta  = dados.cpDataCadastroConta;
								
								dataCadastroConta = objDataCadastroConta.substring(0,10).split("-");
							
								diaCad = dataCadastroConta[2];
								mesCad = dataCadastroConta[1];
								anoCad = dataCadastroConta[0];
								
							horaCad = objDataCadastroConta.substring(10,19);
							var dataCadastroConta = diaCad +"/"+mesCad+"/"+anoCad+" às "+horaCad;
							
							if(dados.cpDataUltimaAlteracao != null) {
								
								var objDataUltimaAlteracao = dados.cpDataUltimaAlteracao;
								
								dataUltimaAlteracao = objDataUltimaAlteracao.substring(0,10).split("-");
									
									diaAlt = dataUltimaAlteracao[2],
									mesAlt = dataUltimaAlteracao[1];
									anoAlt = dataUltimaAlteracao[0];
								
								horaAlt = objDataUltimaAlteracao.substring(10,19);
								var dataAlteracao = diaAlt+"/"+mesAlt+"/"+ano;
								
								usuario = dados.cpAlteracaoUltimoUsuario;
								
								msgAlteracao = usuario +" no dia "+ dataAlteracao+" às "+horaAlt;
							
							} else {
								
								msgAlteracao = "Não há alteração no momento !";
							}
						
							contasPagar += "<tr>";
							contasPagar +="<td>"+tipoConta+"</td>";
							contasPagar +="<td>"+dados.cpClassificacaoConta+"</td>";
							contasPagar +="<td>R$ "+dados.cpValorConta+"</td>";
							contasPagar +="<td><a href='#' title='Cadastrado por: "+dados.cpUsuario+" no dia "+dataCadastroConta+ " Ùltima Alteração: "+msgAlteracao+"'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a></td>"; 
							contasPagar +="<td>"+dados.cpDataVencimentoConta+"</td>";
							contasPagar +="<td>"+dados.cpObservacaoConta+"</td>";
							contasPagar += "<td><a href='Contas.php?acao=editar&id="+dados.idContas+"'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";
							contasPagar += "<td><a href='../controller/Contas_Controller.php?acao=deletar&id="+dados.idContas+"'><span class='glyphicon glyphicon-remove' id='exluirConta' aria-hidden='true'></span></a></td>";
							contasPagar +="</tr>";
							
							msgPagar += dados.idContas;
							
						}else if(tipoConta == "Receber") {
							
							var objDataCadastroConta  = dados.cpDataCadastroConta,
								dataAlteracao = '';
							
								dataCadastroConta = objDataCadastroConta.substring(0,10).split("-");
								
								diaCad = dataCadastroConta[2];
								mesCad = dataCadastroConta[1];
								anoCad = dataCadastroConta[0];
							
								horaCad = objDataCadastroConta.substring(10,19);
								var dataCadastroConta = diaCad +"/"+mesCad+"/"+anoCad;
								
							if(dados.cpDataUltimaAlteracao != null) {
								
								var	objDataUltimaAlteracao = dados.cpDataUltimaAlteracao;
								
								dataUltimaAlteracao = objDataUltimaAlteracao.substring(0,10).split("-");
			
								diaAlt = dataUltimaAlteracao[2],
								mesAlt = dataUltimaAlteracao[1];
								anoAlt = dataUltimaAlteracao[0];
								
								horaAlt = objDataUltimaAlteracao.substring(10,19);
								var dataAlteracao = diaAlt+"/"+mesAlt+"/"+ano;
								
								usuario = dados.cpUsuario;
								
								msgAlteracao = usuario +" no dia "+dataAlteracao+" às "+horaAlt;
								
							}else{
								
								msgAlteracao = "Não há alteração no momento !";								
							}
							contasReceber += "<tr>";
							contasReceber +="<td>"+tipoConta+"</td>";
							contasReceber +="<td>"+dados.cpClassificacaoConta+"</td>";
							contasReceber +="<td>R$ "+dados.cpValorConta+"</td>";
							contasReceber +="<td><a href='#' title='Cadastrado por: "+dados.cpUsuario+" no dia "+dataCadastroConta+" às "+horaCad+" Ùltima alteração "+msgAlteracao+"'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a></td>";
							contasReceber +="<td>"+dados.cpDataVencimentoConta+"</td>";
							contasReceber +="<td>"+dados.cpObservacaoConta+"</td>";
							contasReceber += "<td><a href='Contas.php?acao=editar&id="+dados.idContas+"'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";
							contasReceber += "<td><a href='../controller/Contas_Controller.php?acao=deletar&id="+dados.idContas+"'><span class='glyphicon glyphicon-remove' id='exluirConta' aria-hidden='true'></span></a></td>";
							contasReceber +="</tr>";
							
							msgReceber += dados.idContas;
						}
					
					});		
						$("#tableContasPagar tbody").html(contasPagar);
						$("#tableContasReceber tbody").html(contasReceber);
						$(".contas").html("");
						
						if(msgPagar == "") {
							
							$(".listaContasPagarVazia").html("Nenhuma conta para Pagar no momento !");
						
						}else if(msgReceber == "") {
							
							$(".listaContasReceberVazia").html("Nenhuma conta para receber no momento !")
						}	
				},1200);		
				
				}
			}
			
		});
	}
	
	var carregaInfoContasAjaxDB = function() {
		
		carregaInfoContas("http://localhost/startDemand/service/Service_Contas.php");
	}
	
	
	return {
		
		carregaInfoContasAjaxDB: carregaInfoContasAjaxDB
	}
	
})();