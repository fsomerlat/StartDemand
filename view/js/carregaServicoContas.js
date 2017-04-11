var Service_Contas = (function(){
	
	var carregaInfoContas = function(url) {
		
		var contasPagar = '',
			contasReceber = '',
			msgPagar = '',
			msgReceber = '',
			msgcadastro = '';
			msgAlteracao = '',
			msgfechamento = '',
			tipoConta = '',
			horaAlt = '',
			horaFecha = '',
			status = '',
			countContas = '';
		
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
		
				setTimeout(function(){
					
					retorno.map(function(dados){
			
						(dados.cpTipoConta == "P") ? tipoConta = "Pagar" : tipoConta = "Receber";
						(dados.cpStatusConta == "A") ? status = "Aberto" : status = "Fechado";
						
						//LOG DE CADASTRO POR USUÁRIO
						var objDataCadastroConta  = dados.cpDataCadastroConta;
						
						dataCadastroConta = objDataCadastroConta.substring(0,10).split("-");
					
						diaCad = dataCadastroConta[2];
						mesCad = dataCadastroConta[1];
						anoCad = dataCadastroConta[0];
						
						horaCad = objDataCadastroConta.substring(10,19);
						var dataCadastroConta = diaCad +"/"+mesCad+"/"+anoCad;
						
						usuario = dados.cpUsuario;
						msgcadastro = usuario +" no dia " +dataCadastroConta+" - " + horaCad;
													
						
						//LOG DE ULTIMA ALTERÇÃO DO POR USUÁRIO
						if(dados.cpDataUltimaAlteracao != null) {
							
							var objDataUltimaAlteracao = dados.cpDataUltimaAlteracao;
							
							dataUltimaAlteracao = objDataUltimaAlteracao.substring(0,10).split("-");
								
								diaAlt = dataUltimaAlteracao[2],
								mesAlt = dataUltimaAlteracao[1];
								anoAlt = dataUltimaAlteracao[0];
							
							horaAlt = objDataUltimaAlteracao.substring(10,19);
							var dataAlteracao = diaAlt+"/"+mesAlt+"/"+ano;
							
							usuario = dados.cpAlteracaoUltimoUsuario;
							
							msgAlteracao = usuario +" no dia "+ dataAlteracao+" - " + horaAlt;
						
						} else {
							
							msgAlteracao = "Não há alterações no momento !";
						}						
						
						//LOG DE FECHAMENTO POR USUÁRIO
						if(dados.cpDataFechamentoConta != null) {
							
							var objDataFechamento =  dados.cpDataFechamentoConta;
								
								dataFechamento = objDataFechamento.substring(0,10).split("-");
								diaFecha = dataFechamento[2];
								mesFecha = dataFechamento[1];
								anoFecha = dataFechamento[0];
								
							horaFecha = objDataFechamento.substring(10,19);
							
							var dataFechamento = diaFecha+"/"+mesFecha+"/"+anoFecha;
							
							usuario = dados.cpUsuarioFechamentoConta;
							msgfechamento = usuario +" no dia "+ dataFechamento + " - " + horaFecha;
						
						} else{
						
							msgfechamento = " Aguardando...";
						}						
						
						if(tipoConta == "Pagar") {
														
							contasPagar += "<tr>";
							
							switch(status){
							    
							    case "Aberto" : contasPagar += "<td >"+status+"</td>"; break;
								case "Fechado" : contasPagar += "<td >"+status+"</td>"; break;
							}
							contasPagar +="<td>"+tipoConta+"</td>";
							contasPagar +="<td>"+dados.cpClassificacaoConta+"</td>";
							contasPagar +="<td>R$ "+dados.cpValorConta+"</td>";
							contasPagar +="<td><a href='#' title='Cadastrado por: "+msgcadastro+ "\n Ùltima alteração: "+msgAlteracao +"\n Fechamento: "+msgfechamento+"'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a></td>"; 
							
							if(dados.cpDataVencimentoConta  != Utils.carregaDataDeHoje(new Date()) && status == "Aberto"){
								contasPagar +="<td class='tdConta'>"+dados.cpDataVencimentoConta+"</td>";
							}else if(dados.cpDataVencimentoConta  == Utils.carregaDataDeHoje(new Date()) && status == "Aberto") {
								contasPagar +="<td class='tdContaDia'>"+dados.cpDataVencimentoConta+"</td>";
							}else{
								contasPagar +="<td>"+dados.cpDataVencimentoConta+"</td>";
							}
							
							contasPagar +="<td>"+dados.cpObservacaoConta+"</td>";							
							contasPagar += "<td><a href='Contas.php?acao=editar&id="+dados.idContas+"' title='editar'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";
							contasPagar += "<td><a href='../controller/Contas_Controller.php?acao=deletar&id="+dados.idContas+"' title='remover'><span class='glyphicon glyphicon-remove' id='exluirConta' aria-hidden='true'></span></a></td>";
							contasPagar += "<td><a href='../controller/Contas_Controller.php?acao=fechar&id="+dados.idContas+"' title='fechar'><span class='glyphicon glyphicon-stop' id='cpConfirmaContaReceber' aria-hidden='true'></span></a></td>";							
							contasPagar +="</tr>";
							
							msgPagar += dados.idContas;
							
						}else if(tipoConta == "Receber") {
																
							contasReceber += "<tr>";
							
							switch(status){
						    
							    case "Aberto" : contasReceber += "<td >"+status+"</td>"; break;
								case "Fechado" : contasReceber += "<td >"+status+"</td>"; break;
							}
							contasReceber += "<td>"+dados.idContas+"</td>";
							contasReceber +="<td>"+tipoConta+"</td>";
							contasReceber +="<td>"+dados.cpClassificacaoConta+"</td>";
							contasReceber +="<td>R$ "+dados.cpValorConta+"</td>";
							contasReceber +="<td><a href='#' title='Cadastrado por: "+msgcadastro+"\n Ùltima alteração: "+msgAlteracao +"\n Fechamento: "+msgfechamento+"'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a></td>";
							
							if(dados.cpDataVencimentoConta  != Utils.carregaDataDeHoje(new Date()) && status == "Aberto") {
								contasReceber +="<td class='tdConta'>"+dados.cpDataVencimentoConta+"</td>";
							}else if(dados.cpDataVencimentoConta  == Utils.carregaDataDeHoje(new Date()) && status == "Aberto"){
								contasReceber += "<td class='tdContaDia'>"+dados.cpDataVencimentoConta+"</td>";
							}else{
								contasReceber +="<td>"+dados.cpDataVencimentoConta+"</td>";
							}
							contasReceber +="<td>"+dados.cpObservacaoConta+"</td>";
							contasReceber += "<td><a href='Contas.php?acao=editar&id="+dados.idContas+"' title='editar'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";
							contasReceber += "<td><a href='../controller/Contas_Controller.php?acao=deletar&id="+dados.idContas+"' title='remover'><span class='glyphicon glyphicon-remove' id='exluirConta' aria-hidden='true'></span></a></td>";
							contasReceber += "<td><a href='../controller/Contas_Controller.php?acao=fechar&id="+dados.idContas+"' title='fechar'><span class='glyphicon glyphicon-stop' id='cpConfirmaContaReceber' aria-hidden='true'></span></a></td>";							
							contasReceber +="</tr>";
						
							msgReceber += dados.idContas;
						
						}
						
						if( dados.cpDataVencimentoConta == Utils.carregaDataDeHoje(new Date()) && status == "Aberto") {
										
								setInterval(function(){
									$(".msgVencimentoContas").html(Utils.msgInfo("Existem contas vencendo hoje !")).fadeOut(5000);
								},1000);
						}					
					});						
						$("#tableContasPagar tbody").html(contasPagar);
						$("#tableContasReceber tbody").html(contasReceber);
						$(".contas").html("");
						
						if(msgPagar == "") {
							
							$(".listaContasPagarVazia").html("Nenhuma conta para Pagar no momento !");
						
						}
						if(msgReceber == "") {
							
							$(".listaContasReceberVazia").html("Nenhuma conta para receber no momento !")
						}	
				},1200);		
				
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