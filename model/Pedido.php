<?php require_once 'DB.php';

	class Pedido {
		
		protected $table = "tuPedido";
		protected $idPedido,
				  $cpCodPedido, 
				  $cpValorTotalPedido,
				  $cpStatusPedido,
				  $tuProduto_idProduto,
				  $tsPreparaProduto_idPreparaProduto,
				  $cpQtdProduto,
				  $cpComplementoUm,
				  $cpComplementoDois,
				  $cpValorTotalProduto,
				  $cpObservacaoPedido;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
			
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(tuProduto_idProduto,tsPreparaProduto_idPreparaProduto,cpCodPedido,cpQtdProduto,cpComplementoUm,cpComplementoDois,cpValorTotalProduto,cpHoraPedido,cpValorTotalPedido,cpObservacaoPedido)
				  VALUES
					(:tuProduto_idProduto,:tsPreparaProduto_idPreparaProduto,:cpCodPedido,:cpQtdProduto,:cpComplementoUm,:cpComplementoDois,:cpValorTotalProduto,now(),:cpValorTotalPedido,:cpObservacaoPedido)";
			
			$in=DB::prepare($sql);
			$in->bindParam(":tuProduto_idProduto",$this->tuProduto_idProduto,PDO::PARAM_INT);
			$in->bindParam(":tsPreparaProduto_idPreparaProduto",$this->tsPreparaProduto_idPreparaProduto,PDO::PARAM_INT);
			$in->bindParam(":cpCodPedido", $this->cpCodPedido,PDO::PARAM_INT);
			$in->bindParam(":cpQtdProduto", $this->cpQtdProduto,PDO::PARAM_INT);
			$in->bindParam(":cpComplementoUm", $this->cpComplementoUm,PDO::PARAM_STR);
			$in->bindParam(":cpComplementoDois", $this->cpComplementoDois,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalProduto",$this->cpValorTotalProduto,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalPedido", $this->cpValorTotalPedido,PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoPedido", $this->cpObservacaoPedido,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mesangem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getId($id) {
			
			$sql="SELECT 
					idPedido,cpCodPedido
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
		
		public function getInfoPedidoJSON() {
			
			$sql="SELECT
					ped.idPedido,p.cpNomeProduto,ped.cpCodPedido,ped.cpQtdProduto,ped.cpHoraPedido,ped.cpComplementoUm,
					ped.cpComplementoDois,ped.cpValorTotalProduto,ped.cpValorTotalPedido,ped.cpStatusPedido,ped.cpObservacaoPedido
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
						idPedido,cpCodPedido
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
					ped.tsPreparaProduto_idPreparaProduto,prepProd.idPreparaProduto 
				  FROM 
					$this->table as ped INNER JOIN tsPreparaProduto as prepProd ON ped.tsPreparaProduto_idPreparaProduto = prepProd.idPreparaProduto
				  WHERE 
				  	ped.tsPreparaProduto_idPreparaProduto = prepProd.idPreparaProduto";
			
		    $row=DB::prepare($sql);
		    $row->execute(array($this->idPedido,$this->tsPreparaProduto_idPreparaProduto));
		    
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
					cpStatusPedido";
			
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
	
		
	}
