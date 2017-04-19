<?php require_once '../core/include.php';
	
	$financeiro  = new Financeiro();
	$td = '';
	if($_REQUEST["filtroFinanceiro"] == "filtroFinanceiro"):
	
		if($_REQUEST["tipoPesquisa"] == "D"):
		
			$status = $_REQUEST["status"];
			
			$dataInicio = $_REQUEST["dataInicio"];
			$dataI = explode("/",$dataInicio);
			
			$diaI = $dataI[0];
			$mesI = $dataI[1];
			$anoI = $dataI[2];
			
			$dataIn = $anoI."-".$mesI."-".$diaI;
			
			$dataFinal = $_REQUEST["dataFinal"];
			
				$dataF = explode("/",$dataFinal);
				$diaF = $dataF[0];
				$mesF = $dataF[1];
				$anoF = $dataF[2];
				
				$dataF = $anoF."-".$mesF."-".$diaF;
	
			
			$flt = $financeiro->getFiltroSelecionado($status,$dataIn,$dataF);
			
			foreach($flt as $key => $res):
				
				($res->cpStatusFinanceiro == "F") ? $status="Finalizado" : $status = "Cancelado" ;
				
				$valorTotal = $res->cpValorTotal;
				$valorLiquido = $res->cpValorLiquidoTotal;
				
				$dataC= explode("-",$res->cpDataCompra);
				
				$diaC = $dataC[2];
				$mesC = $dataC[1];
				$anoC = $dataC[0];
				
				$dataCompra = $diaC."/".$mesC."/".$anoC;
				
				$dataL = explode("-",substr($res->cpDataLancamento,0,10));
				$horaL = substr($res->cpDataLancamento,10,18);		
					
				$diaL = $dataL[2];
				$mesL = $dataL[1];
				$anoL = $dataL[0];
				
				$dataLancamento = $diaL."/".$mesL."/".$anoL." - ".$horaL; 
				
				$td .= "<tr>";
				$td .= "<td>".$status."</td>";
				$td .= "<td>".$dataCompra."</td>";
				$td .= "<td>R$ ".$valorTotal."</td>";
				$td .= "<td>R$ ".$valorLiquido."</td>";
				$td .= "<td>".$dataLancamento."</td>";
				$td .= "</tr>";
			
			endforeach;
			
				if(!empty($td)):
						
					echo $td;
				
				else:
				
					echo "<h4 class='isResultadoPesquisaFinanceiro'>Nenhum resultado para a pesquisa realizada !</h4>";
						
				endif;
				
			elseif($_REQUEST["tipoPesquisa"] == "T"):
			
			
			$flt = $financeiro->getAll();
			
			foreach($flt as $key => $res):
			
				($res->cpStatusFinanceiro == "F") ? $status = "Finalizado" : $status = "Cancelado";
				
				$valorTotal = substr($res->valorTotal,0,6);
				$valorLiquido = substr($res->valorLiquido,0,6);
				
				$td .= "<tr>";
				$td .= "<td>".$status."</td>";	
				$td .= "<td>------//------</td>";
				$td .= "<td>".$valorTotal."</td>";
				$td .= "<td>".$valorLiquido."</td>";
				$td .= "<td>------//------</td>";
				$td .= "</tr>";
				
			endforeach;
		
				
				if(!empty($td)):
				
					echo $td;
				
				else:
		
					echo "<h4 class='isResultadoPesquisaFinanceiro'>Nenhum resultado para a pesquisa realizada !</h4>";
				
				endif;
			
			
		endif;
	endif;
