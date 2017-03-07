<?php require_once 'DB.php';

	class Pedido {
		
		protected $table = "tuPedido";
		protected $idPedido,
				  $tuProduto_idProduto,
				  $cpCodPedido,
				  $cpQtdProduto,
				  $cpComplementoUm,
				  $cpComplementoDois,
				  $cpValorTotalProduto,
				  $cpValorTotalPedido,
				  $cpStatusPedido,
				  $cpObservacaoPedido;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
			
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(tuProduto_idProduto,cpCodPedido,cpQtdProduto,cpComplementoUm,cpComplementoDois,cpValorTotalProduto,cpStatusPedido,cpHoraPedido,cpValorTotalPedido,cpObservacaoPedido)
				  VALUES
					(:tuProduto_idProduto,:cpCodPedido,:cpQtdProduto,:cpComplementoUm,:cpComplementoDois,:cpValorTotalProduto,:cpStatusPedido,now(),:cpValorTotalPedido,:cpObservacaoPedido)";
			
			$in=DB::prepare($sql);
			$in->bindParam(":tuProduto_idProduto",$this->tuProduto_idProduto,PDO::PARAM_INT);
			$in->bindParam(":cpCodPedido", $this->cpCodPedido,PDO::PARAM_INT);
			$in->bindParam(":cpQtdProduto", $this->cpQtdProduto,PDO::PARAM_INT);
			$in->bindParam(":cpComplementoUm", $this->cpComplementoUm,PDO::PARAM_STR);
			$in->bindParam(":cpComplementoDois", $this->cpComplementoDois,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalProduto",$this->cpValorTotalProduto,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalPedido", $this->cpValorTotalPedido,PDO::PARAM_STR);
			$in->bindParam(":cpStatusPedido",$this->cpStatusPedido,PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoPedido", $this->cpObservacaoPedido,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mesangem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getInfoPedido() {
			
			$sql="SELECT
					ped.idPedido,p.cpNomeProduto,ped.cpCodPedido,ped.cpQtdProduto,ped.cpHoraPedido,ped.cpComplementoUm,
					ped.cpComplementoDois,ped.cpValorTotalProduto,ped.cpValorTotalPedido,ped.cpStatusPedido,ped.cpObservacaoPedido
				  FROM 
					$this->table as ped INNER JOIN tuProduto as p ON p.idProduto = ped.tuProduto_idProduto
				  ORDER BY ped.cpHoraPedido ASC";
			
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
		
		public function UPDATESTATUS($cod) {
			
			$sql = "UPDATE 
						$this->table 
					SET 
						cpStatusPedido=:cpStatusPedido 
					WHERE 
						cpCodPedido=:cpCodPedido";
			$up=DB::prepare($sql);
			$up->bindParam(":cpCodPedido",$cod,PDO::PARAM_INT);
			$up->bindParam(":cpStatusPedido",$this->cpStatusPedido,PDO::PARAM_STR);
			
			try {
				
				return $up->execute();
				
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}	
		
		public function getInfoPedido() {
			
			$sql="SELECT 
						idPedido,cpCodPedido
				  FROM 
						$this->table";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				return $s->fetch();
			
			}catch(PDOException $e) {
				
				echo "Erro no aquivo ".$e->getFile()." referente a seguinte mensagem ".$e->getMessage()." na linha ".$e->getLine(); 
			}
		}
	}
