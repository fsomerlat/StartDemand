<?php  require_once '../core/include.php'; require_once('mpdf60/mpdf.php');

$pedido = new Pedido();
$acrescimo = new Acrescimo();


//iniciar o buffer
ob_start();
$html = ob_get_clean();

// 	if($_REQUEST["tipoPesquisa"] == "T"): //<img src='http://localhost/startDemand/view/img/logoPDF.png'>
	
// 	$html .= "<h3 class='isH3TituloPDF'>Pedidos finalizado e cancelados</h3>";
// 	$html .= "<p>Os valores aqui apresentados podem conter algum desconto referente a vendas incluindo possíveis taxas de cartões de crédito / débito
// 				ou algum outro plano contrato pela empresa.</p>";
// 	$html .= "<table class='table table-bordered'>";
// 	$html .= "<head>";
// 	$html .= "<tr>";
// 	$html .= "<th>Status</th>";
// 	$html .= "<th>Produto</th>";
// 	$html .= "<th>QT/prod</th>";
// 	$html .= "<th>Acréscimo</th>";
// 	$html .= "<th>QT/acres</th>";
// 	$html .= "<th>Val/base/acr</th>";
// 	$html .= "<th>Val/T/acr</th>";
// 	$html .= "<th>Valor/T/Ped</th>";
// 	$html .= "<th>QT/parcelas</th>";
// 	$html .= "<th>val/parcela</th>";
// 	$html .= "<th>Forma/pag</th>";
// 	$html .= "<th>Band/cartão</th>";
// 	$html .= "<th>%</th>";
// 	$html .= "<th>val/%</th>";
// 	$html .= "<th>Val/líq/Ped</th>";
// 	$html .= "<th>baixa</th>";
// 	$html .= "</tr>";
// 	$html .= "</head>";
	
// 	$getInfoALL= $pedido->getPedidoInProduto();
	
// 	foreach($getInfoALL as $key => $res):
		
// 		($res->cpStatusPedido == "F") ? $status = "Finalizado" : $status = "Cancelado";
// 		$getInfoAcrescimo = $acrescimo->getId($res->idPedido);	
		
		
// 		$html.= "<tr>";
// 		$html.= "<td>".$status."</td>";
// 		$html.= "<td>".$res->cpNomeProduto."</td>";
// 		$html.= "<td>".$res->cpQtdProduto."</td>";
// 		$html.= "<td>".$getInfoAcrescimo->cpAcrescimo."</td>";
// 		$html.= "<td>".$getInfoAcrescimo->cpQtdAcrescimo."</td>";
// 		$html.= "<td>R$ ".$getInfoAcrescimo->cpValorBaseAcrescimo."</td>";
// 		$html.= "<td>R$ ".$getInfoAcrescimo->cpValorTotalAcrescimo."</td>";
// 		$html.= "<td>R$ ".$res->cpValorTotalPedido."</td>";
// 		$html.= "<td>".$res->cpQtdParcela."</td>";
// 		$html.= "<td>R$ ".$res->cpValorParcela."</td>";
// 		$html.= "<td>".$res->cpFormaPagamento."</td>";
// 		$html.= "<td>".$res->cpBandeiraCartaoPedido."</td>";
// 		$html.= "<td>".$res->cpPorcentagemJurosPedido."</td>";
// 		$html.= "<td>R$ ".$res->cpValorTaxaJurosPedido."</td>";
// 		$html.= "<td>R$ ".$res->cpValorTotalLiquidoPedido."</td>";
// 		$html.= "<td>".$res->cpDataBaixa."</td>";
// 		$html.= "</tr>";
	
// 	endforeach;
	
// 	$html .= "</table>";
	
// endif;

if($_REQUEST["tipoPesquisa"] == "D"):
 
	$html .= "<h3 class='isH3TituloPDF'>Relatório personalizado por data e status do pedido</h3>";
	$html .= "<p>Os valores aqui apresentados podem conter algum desconto referente a vendas incluindo possíveis taxas de cartões de crédito / débito
				ou algum outro plano contrato pela empresa.</p>";
	$html .= "<table class='table table-bordered'>";
	$html .= "<head>";
	$html .= "<tr>";
	$html .= "<th>Status</th>";
	$html .= "<th>Produto</th>";
	$html .= "<th>QT/prod</th>";
	$html .= "<th>Acréscimo</th>";
	$html .= "<th>QT/acres</th>";
	$html .= "<th>Val/base/acr</th>";
	$html .= "<th>Val/T/acr</th>";
	$html .= "<th>Valor/T/Ped</th>";
	$html .= "<th>QT/parcelas</th>";
	$html .= "<th>val/parcela</th>";
	$html .= "<th>Forma/pag</th>";
	$html .= "<th>Band/cartão</th>";
	$html .= "<th>%</th>";
	$html .= "<th>val/%</th>";
	$html .= "<th>Val/líq/Ped</th>";
	$html .= "<th>baixa</th>";
	$html .= "</tr>";
	$html .= "</head>";
	
	$status = $_REQUEST["status"];
	
	$dataInicio  = explode("/",$_REQUEST["dataInicio"]);
		$diaI = $dataInicio[0];
		$mesI = $dataInicio[1];
		$anoI = $dataInicio[2];
	
	$dataIn = $anoI."-".$mesI."-".$diaI;
	
	$dataFinal  = explode("/",$_REQUEST["dataFinal"]);
		$diaF = $dataFinal[0];
		$mesF = $dataFinal[1];
		$anoF = $dataFinal[2];
	
	$dataF = $anoF."-".$mesF."-".$diaF;
	
	$getInfoPorData = $pedido->getBuscaPorData($status, $dataIn, $dataF);
	
	foreach($getInfoPorData as $key => $res):
		
		($res->cpStatusPedido == "F") ? $status= "Finalizado" : $status = "Cancelado";
		$getInfoAcrescimo = $acrescimo->getId($res->idPedido);
		
		$dataC = date_create($res->cpHoraPedido);
		$nova_dataCompra = date_format($dataC,"d/m/Y");
			
		$dataB =  date_create($res->cpDataBaixa);
		$nova_dataBaixa = date_format($dataB,"d/m/Y H:i:s");
			
		$html.= "<tr>";
		$html.= "<td>".$status."</td>";
		$html.= "<td>".$res->cpNomeProduto."</td>";
		$html.= "<td>".$res->cpQtdProduto."</td>";
		$html.= "<td>".$getInfoAcrescimo->cpAcrescimo."</td>";
		$html.= "<td>".$getInfoAcrescimo->cpQtdAcrescimo."</td>";
		$html.= "<td>R$ ".$getInfoAcrescimo->cpValorBaseAcrescimo."</td>";
		$html.= "<td>R$ ".$getInfoAcrescimo->cpValorTotalAcrescimo."</td>";
		$html.= "<td>R$ ".$res->cpValorTotalPedido."</td>";
		$html.= "<td>".$res->cpQtdParcela."</td>";
		$html.= "<td>R$ ".$res->cpValorParcela."</td>";
		$html.= "<td>".$res->cpFormaPagamento."</td>";
		$html.= "<td>".$res->cpBandeiraCartaoPedido."</td>";
		$html.= "<td>".$res->cpPorcentagemJurosPedido."</td>";
		$html.= "<td>R$ ".$res->cpValorTaxaJurosPedido."</td>";
		$html.= "<td>R$ ".$res->cpValorTotalLiquidoPedido."</td>";
		$html.= "<td>".$nova_dataBaixa."</td>";
		$html.= "</tr>";
	
	endforeach;

$html .= "</table>";

endif;
	
$mpdf = new mPDF('','A4',10,'',10,10,20,10); // 10 = texto a e cabecalho  -  DEFINE FORMATO, tamaho DO PDF

date_default_timezone_set('America/Sao_Paulo');

$mpdf->SetDisplayMode("fullpage");

$mpdf->allow_charset_conversion = true;

$mpdf->charset_in = "UTF-8";

//$mpdf->SetWatermarkImage("http://localhost/startDemand/view/img/logoPDF2.png", 1,'', array(20,10)); INCLUI IMAGEM NO PDF

$mpdf->showWatermarkImage = True;

$mpdf->SetHeader($logo."<h3 class='isTituloPDF'>GECSistemas para Internet</h3>");

$mpdf->SetFooter('Impresso em '.date('d/m/Y / H:i:s').'|{PAGENO}/{nb}|Contagem MG'); // CRIAR RODAPÉ NAS PÁGINAS

$css = file_get_contents('css/stilo.css');

$mpdf->WriteHTML($css,1);

$mpdf->WriteHTML($html);

$mpdf->Output("meu-pdf","I");

exit;
