<?php  require_once '../core/include.php'; require_once('mpdf60/mpdf.php'); 

	$financeiro = new Financeiro();
	
	//iniciar o buffer
	ob_start();
	$html = ob_get_clean();
	
	if($_REQUEST["tipoPesquisa"] == "T"): //<img src='http://localhost/startDemand/view/img/logoPDF.png'>
	
	$html .= "<h3 class='isH3TituloPDF'>Pedidos finalizados e cancelados</h3>";
	$html .= "<p>Os valores aqui apresentados podem conter algum desconto referente a vendas incluindo possíveis taxas de cartões de crédito / débito
			ou algum outro plano contrato pela empresa.</p>";
	$html .= "<table class='table table-bordered'>";
	$html .= "<head>"; 
	$html .= "<tr>";
	$html .= "<th>Status</th>";
	$html .= "<th>Data / compra</th>";
	$html .= "<th>Valor / total</th>";
	$html .= "<th>Valor líquido</th>";
	$html .= "<th>Data / lançamento</th>";
	$html .= "</tr>";
    $html .= "</head>";

	$getInfoALL= $financeiro->getAll();
	
		foreach($getInfoALL as $key => $res):
			
			($res->cpStatusFinanceiro == "F") ? $status = "Finalizado" : $status = "Cancelado";
			
			$html.= "<tr>";
			$html.= "<td>".$status."</td>";
			$html.= "<td>Todas</td>";
			$html.= "<td>R$ ".substr($res->valorTotal,0,6)."</td>";
			$html.= "<td>R$ ".substr($res->valorLiquido,0,6)."</td>";
			$html.= "<td>Todas</td>";
			$html.= "</tr>";
		
		endforeach;
		
	$html .= "</table>";
	
	endif;	
	
	if($_REQUEST["tipoPesquisa"] == "D"):
    	
	$html .= "<h3 class='isH3TituloPDF'>Relatório personalizado</h3>";
	$html .= "<p>Os valores aqui apresentados podem conter algum desconto referente a vendas incluindo possíveis taxas de cartões de crédito / débito
			ou algum outro plano contrato pela empresa.</p>";
	$html .= "<table class='table table-bordered'>";
	$html .= "<head>";
	$html .= "<tr>";
	$html .= "<th>Status</th>";
	$html .= "<th>Data / compra</th>";
	$html .= "<th>Valor / total</th>";
	$html .= "<th>Valor líquido</th>";
	$html .= "<th>Data / lançamento</th>";
	$html .= "</tr>";
	$html .= "</head>";
	
	$status = $_REQUEST["status"];
	
	$dataInicio  = explode("/",$_REQUEST["dataI"]);
	$diaI = $dataInicio[0];
	$mesI = $dataInicio[1];
	$anoI = $dataInicio[2];
	
	$dataIn = $anoI."-".$mesI."-".$diaI;
	
	$dataFinal  = explode("/",$_REQUEST["dataF"]);
	$diaF = $dataFinal[0];
	$mesF = $dataFinal[1];
	$anoF = $dataFinal[2];
	
	$dataF = $anoF."-".$mesF."-".$diaF;
	
	$getInfoPorData = $financeiro->getFiltroSelecionado($status, $dataIn, $dataF);
	
		foreach($getInfoPorData as $key => $res):
			
			($res->cpStatusFinanceiro == "F") ? $status="Finalizado" : $status = "Cancelado";
		
			$dataC = date_create($res->cpDataCompra);
			$nova_dataCompra = date_format($dataC,"d/m/Y");
			
			$dataL =  date_create($res->cpDataLancamento);
			$nova_dataLancamento = date_format($dataL,"d/m/Y H:i:s");
			
			$html .= "<tr>";
			$html .= "<td>".$status."</td>";
			$html .= "<td>".$nova_dataCompra."</td>";
			$html .= "<td>R$ ".substr($res->cpValorTotal,0,6)."</td>";
			$html .= "<td>R$ ".substr($res->cpValorLiquidoTotal,0,6)."</td>";
			$html .= "<td>".$nova_dataLancamento."</td>";
			$html .= "</tr>";
			
		endforeach;
		
		$html .= "</table>";	
		
	endif;
			
	$mpdf = new mPDF('','A4',8,'',20,20,20,10); //8 = TAMANHO TR >TH >TD  -  DEFINE FORMATO, ESPAÇAMENTO DO PDF
	
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
