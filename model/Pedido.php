<?php require_once 'DB.php';

	class Pedido {
		
		protected $table = "tuPedido";
		protected $idPedido,
				  $cpCodPedido, 
				  $cpValorTotalPedido,
				  $cpStatusPedido,
				  $cpSituacaoPedido,
				  $tuProduto_idProduto,
				  $tsPreparaProduto_idPreparaProduto,
				  $cpQtdProduto,
				  $cpComplementoUm,
				  $cpComplementoDois,
				  $cpValorTotalProduto,
				  $cpFormaPagamento,
				  $cpQtdParcela,
				  $cpValorParcela,
				  $cpDataBaixa,
				  $cpUsuarioBaixa,
				  $cpPlanoPagSeguroPedido,
				  $cpBandeiraCartaoPedido,
				  $cpPorcentagemJurosPedido,
				  $cpValorTaxaJurosPedido,
				  $cpValorTotalLiquidoPedido,
				  
				  $cpObservacaoPedido;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
			
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(tuProduto_idProduto,tsPreparaProduto_idPreparaProduto,cpCodPedido,cpQtdProduto,cpComplementoUm,cpComplementoDois,
					cpValorTotalProduto,cpHoraPedido,cpValorTotalPedido,cpFormaPagamento,cpQtdParcela,cpValorParcela,cpPlanoPagSeguroPedido,
					cpBandeiraCartaoPedido,cpPorcentagemJurosPedido,cpValorTaxaJurosPedido,cpValorTotalLiquidoPedido,cpObservacaoPedido)
				  VALUES
					(:tuProduto_idProduto,:tsPreparaProduto_idPreparaProduto,:cpCodPedido,:cpQtdProduto,:cpComplementoUm,:cpComplementoDois,
					:cpValorTotalProduto,now(),:cpValorTotalPedido,:cpFormaPagamento,:cpQtdParcela,:cpValorParcela,:cpPlanoPagSeguroPedido,
					:cpBandeiraCartaoPedido,:cpPorcentagemJurosPedido,:cpValorTaxaJurosPedido,:cpValorTotalLiquidoPedido,:cpObservacaoPedido)";
			
			$in=DB::prepare($sql);

			$in->bindParam(":tuProduto_idProduto",$this->tuProduto_idProduto,PDO::PARAM_INT);
			$in->bindParam(":tsPreparaProduto_idPreparaProduto",$this->tsPreparaProduto_idPreparaProduto,PDO::PARAM_INT);
			$in->bindParam(":cpCodPedido", $this->cpCodPedido,PDO::PARAM_INT);
			$in->bindParam(":cpQtdProduto", $this->cpQtdProduto,PDO::PARAM_INT);
			$in->bindParam(":cpComplementoUm", $this->cpComplementoUm,PDO::PARAM_STR);
			$in->bindParam(":cpComplementoDois", $this->cpComplementoDois,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalProduto",$this->cpValorTotalProduto,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalPedido", $this->cpValorTotalPedido,PDO::PARAM_STR);
			$in->bindParam(":cpFormaPagamento",$this->cpFormaPagamento,PDO::PARAM_STR);
			$in->bindParam(":cpQtdParcela",$this->cpQtdParcela,PDO::PARAM_INT);
			$in->bindParam(":cpValorParcela",$this->cpValorParcela,PDO::PARAM_STR);
			$in->bindParam(":cpPlanoPagSeguroPedido",$this->cpPlanoPagSeguroPedido,PDO::PARAM_INT);
			$in->bindParam(":cpBandeiraCartaoPedido",$this->cpBandeiraCartaoPedido,PDO::PARAM_STR);
			$in->bindParam(":cpPorcentagemJurosPedido",$this->cpPorcentagemJurosPedido,PDO::PARAM_STR);
			$in->bindParam(":cpValorTaxaJurosPedido",$this->cpValorTaxaJurosPedido,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalLiquidoPedido",$this->cpValorTotalLiquidoPedido,PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoPedido", $this->cpObservacaoPedido,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mesangem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getId($id) {
			
			$sql="SELECT 
					idPedido,cpCodPedido,cpFormaPagamento,cpQtdParcela,cpValorParcela,cpStatusPedido,
					tsPreparaProduto_idPreparaProduto,cpValorTotalPedido,cpValorTotalLiquidoPedido,cpDataBaixa,cpHoraPedido
				  FROM 
					$this->table
				  WHERE 
					idPedido=:idPedido";
			
			$s=DB::prepare($sql);
			$s->bindParam(":idPedido",$id,PDO::PARAM_INT);
			$s->execute();
			try {
			
				return $s->fetch();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine(); 
			}
		}
		
			
		//NÃO BUSCA PEDIDOS EM ANDAMENTO
		public function getPedidoInProduto() {
			
			$sql="SELECT 
					ped.idPedido,prod.cpQtdProduto,prod.cpNomeProduto,ped.cpStatusPedido,ped.cpFormaPagamento,ped.cpQtdParcela,ped.cpValorParcela,
					ped.cpValorTotalPedido,ped.cpValorTotalLiquidoPedido,ped.cpPlanoPagSeguroPedido,ped.cpBandeiraCartaoPedido,ped.cpPorcentagemJurosPedido,
					ped.cpValorTaxaJurosPedido,ped.cpComplementoUm,ped.cpComplementoDois,ped.cpObservacaoPedido,ped.cpHoraPedido,
					ped.cpDataBaixa,ped.cpUsuarioBaixa
				 FROM
					$this->table as ped INNER JOIN tuProduto as prod 
				 ON 
				 	ped.tuProduto_idProduto = prod.idProduto
				 WHERE 
					ped.cpStatusPedido = 'F' OR ped.cpStatusPedido = 'C' ORDER BY ped.cpStatusPedido DESC"; 
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try{
				
				return $s->fetchAll();
			
			}catch(PDOException $e){
				
				echo "Errono arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}	
		}
		
		
		public function getBuscaPorData($status,$dataInicio,$dataFinal) {
			
			
			$sql="SELECT
					ped.idPedido,prod.cpQtdProduto,prod.cpNomeProduto,ped.cpStatusPedido,ped.cpFormaPagamento,ped.cpQtdParcela,ped.cpValorParcela,
					ped.cpValorTotalPedido,ped.cpValorTotalLiquidoPedido,ped.cpPlanoPagSeguroPedido,ped.cpBandeiraCartaoPedido,ped.cpPorcentagemJurosPedido,
					ped.cpValorTaxaJurosPedido,ped.cpComplementoUm,ped.cpComplementoDois,ped.cpObservacaoPedido,ped.cpHoraPedido,
					ped.cpDataBaixa,ped.cpUsuarioBaixa
				FROM
					$this->table as ped INNER JOIN tuProduto as prod
				ON
					ped.tuProduto_idProduto = prod.idProduto
				WHERE
					ped.cpStatusPedido = '$status'  AND ped.cpHoraPedido BETWEEN '$dataInicio' AND '$dataFinal' ORDER BY ped.cpStatusPedido DESC";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				return $s->fetchAll();
				
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getInfoPedidoJSON() {
			
			$sql="SELECT
					ped.idPedido,p.cpNomeProduto,ped.cpCodPedido,ped.cpQtdProduto,ped.cpHoraPedido,ped.cpComplementoUm,p.cpValorProduto,ped.cpSituacaoPedido,
					ped.cpComplementoDois,ped.cpValorTotalProduto,ped.cpValorTotalPedido,ped.cpStatusPedido,ped.cpObservacaoPedido,ped.cpQtdParcela,ped.cpValorParcela
					
				  FROM 
					$this->table as ped 
				  
					INNER JOIN tuProduto as p ON p.idProduto = ped.tuProduto_idProduto
				
 				  ORDER BY ped.cpHoraPedido ASC ";
			
			$s=DB::prepare($sql);
								
			$s->execute();
			
			try {
				
				$assoc = PDO::FETCH_ASSOC;
				$all = $s->fetchAll($assoc);
				
				echo json_encode($all,JSON_PRETTY_PRINT);
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		
		public function VerificaStatus($FkPreparaProduto) {
		
			$sql="SELECT
		
				cpStatusPedido,tsPreparaProduto_idPreparaProduto
		
			FROM
		
				$this->table
			 
			WHERE
				tsPreparaProduto_idPreparaProduto=:tsPreparaProduto_idPreparaProduto  AND cpStatusPedido = 'F'";
		
			$s=DB::prepare($sql);
			$s->bindParam(":tsPreparaProduto_idPreparaProduto", $FkPreparaProduto,PDO::PARAM_INT);
			$s->execute();
			
			try {
					
				return $s->rowCount();
		
			}catch(PDOException $e) {
					
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		//	RETORNA INFORMAÇÕES ATRAVÉS DA FK tsPreparaPedido_idPreparaPedido
		public function getInfoPedidoFK($fkPreparaProduto) {
		
			$sql="SELECT
			 	idPedido,tsPreparaProduto_idPreparaProduto,cpStatusPedido
			FROM
				$this->table
			WHERE
				tsPreparaProduto_idPreparaProduto=:tsPreparaProduto_idPreparaProduto";
		
			$s=DB::prepare($sql);
			$s->bindParam(":tsPreparaProduto_idPreparaProduto",$fkPreparaProduto,PDO::PARAM_INT);
			$s->execute();
		
			try{
					
				return $s->fetch();
		
			}catch(PDOException $e) {
					
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getFile." na linha ".$e->getLine();
			}
		}
		
		public function UPDATESTATUS($id) {
			
			$sql = "UPDATE 
						$this->table 
					SET 
						cpStatusPedido=:cpStatusPedido 
					WHERE 
						idPedido=:idPedido";
			$up=DB::prepare($sql);
			$up->bindParam(":idPedido",$id,PDO::PARAM_INT);
			$up->bindParam(":cpStatusPedido",$this->cpStatusPedido,PDO::PARAM_STR);
			
			try {
				
				return $up->execute();
				
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}	
		
		//RETORNA SEMPRE O ULTIMO REGISTRO
		public function getInfoPedido() {
			
			$sql="SELECT 
						idPedido,cpCodPedido,cpValorTotalPedido
				  FROM 
						$this->table
				  WHERE
				  		idPedido in
				  (SELECT 
						MAX(idPedido) FROM $this->table) ";
				  
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				return $s->fetch();
			
			}catch(PDOException $e) {
				
				echo "Erro no aquivo ".$e->getFile()." referente a seguinte mensagem ".$e->getMessage()." na linha ".$e->getLine(); 
			}
		}
		
		public function getRow() {
			
			$sql="SELECT 
					cpCodPedido
				  FROM 
					$this->table";
		
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				return $s->rowCount();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagen ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function comparaRelacionamentoIds() {
			
			$sql="SELECT 
					ped.tsPreparaProduto_idPreparaProduto,prepProd.idPreparaProduto,ped.cpStatusPedido
				  FROM 
					$this->table as ped INNER JOIN tsPreparaProduto as prepProd ON ped.tsPreparaProduto_idPreparaProduto = prepProd.idPreparaProduto
				  WHERE 
				  	ped.tsPreparaProduto_idPreparaProduto = prepProd.idPreparaProduto AND ped.cpStatusPedido = 'A'";
			
		    $row=DB::prepare($sql);
		    $row->execute(array($this->idPedido,$this->tsPreparaProduto_idPreparaProduto,$this->cpStatusPedido));
		    
		    try {
		    	
		    	return $row->rowCount();
		    
		    }catch(PDOException $e) {
		    	
		    	echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		    }		
		}
		
		public function getContaPedidos() {
			
			$sql="SELECT
					COUNT(idPedido) as contaPedido,cpStatusPedido
				  FROM 
					$this->table
				  GROUP BY
					cpStatusPedido 
				  ";
			
			$row=DB::prepare($sql);
			$row->execute();		
			try {
				
				$assoc = PDO::FETCH_ASSOC;
				$all = $row->fetchAll($assoc);
				
				echo json_encode($all,JSON_PRETTY_PRINT);
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function relacionaPedidoAcrescimo($id) {
			
			$sql="SELECT 
					ped.idPedido ,acr.tuPedido_idPedido
				  FROM 
				 	$this->table as ped INNER JOIN tuAcrescimo as acr ON ped.idPedido = acr.tuPedido_idPedido
				  WHERE
					ped.idPedido = $id AND acr.tuPedido_idPedido = $id AND ped.cpStatusPedido = 'A' AND acr.cpStatusAcrescimo = 'A'";
			
			$row=DB::prepare($sql);
			$row->execute();
			try {
				
				return $row->rowCount();;
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linda ".$e->getLine();
			}
		}
		
		public function pedidoAndamentoIndividual($id) {
			
			$sql="SELECT 
					idPedido
				  FROM 
					$this->table
				  WHERE 
				  	idPedido = $id AND cpStatusPedido = 'A'";
			
			$row=DB::prepare($sql);
			$row->execute();
			
			try {
				
				return $row->rowCount();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function verificaPedidoFinalizado($id) {
			
			$sql="SELECT 
					idPedido,cpStatusPedido
				  FROM 
					$this->table
				  WHERE 
				  	idPedido = $id AND cpStatusPedido = 'F'";
			
			$row=DB::prepare($sql);
			$row->execute();
			
			try {
				
				return $row->rowCount();
				
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}	
		}
		
		public function UPDATE_SITUACAO_PEDIDO($id) {
			
			$sql="UPDATE 
					$this->table 
				  SET 
				  	cpSituacaoPedido=:cpSituacaoPedido,cpUsuarioBaixa=:cpUsuarioBaixa,cpDataBaixa=now()
				  WHERE 
				  	idPedido=:idPedido";
			
			$up=DB::prepare($sql);
			$up->bindParam(":idPedido", $id,PDO::PARAM_INT);
			$up->bindParam(":cpSituacaoPedido", $this->cpSituacaoPedido,PDO::PARAM_STR);
			$up->bindParam(":cpUsuarioBaixa",$this->cpUsuarioBaixa,PDO::PARAM_STR);
			
			try {
				
				return $up->execute();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function UPDATE_VALORES($id) {
			
			$sql="UPDATE 
					$this->table
				  SET
				  	cpValorParcela=:cpValorParcela,cpValorTotalPedido=:cpValorTotalPedido,
				  	cpValorTaxaJurosPedido=:cpValorTaxaJurosPedido,cpValorTotalLiquidoPedido=:cpValorTotalLiquidoPedido
				  WHERE
				  	idPedido=:idPedido";
			
			$up=DB::prepare($sql);
			$up->bindParam(":idPedido", $id,PDO::PARAM_INT);
			$up->bindParam(":cpValorParcela", $this->cpValorParcela,PDO::PARAM_STR);
			$up->bindParam(":cpValorTotalPedido", $this->cpValorTotalPedido,PDO::PARAM_STR);
			$up->bindParam(":cpValorTaxaJurosPedido",$this->cpValorTaxaJurosPedido,PDO::PARAM_STR);
			$up->bindParam(":cpValorTotalLiquidoPedido", $this->cpValorTotalLiquidoPedido,PDO::PARAM_STR);
			
			try {
				
				return $up->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
	}
