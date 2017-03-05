<?php require_once 'Pedido.php';

	class PreparaPedido extends Pedido {
		
		protected $table = "tsPreparaPedido";
		private $idPreparaPedido;
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
						(tuProduto_idProduto,cpCodPedido,cpQtdProduto,cpComplementoUm,cpComplementoDois,cpValorTotalProduto,cpStatusPedido,cpObservacaoPedido)
				  	VALUES 
				  		(:tuProduto_idProduto,:cpCodPedido,:cpQtdProduto,:cpComplementoUm,:cpComplementoDois,:cpValorTotalProduto,:cpStatusPedido,:cpObservacaoPedido)";
			
			$in=DB::prepare($sql);
			$in->bindParam(":tuProduto_idProduto", $this->tuProduto_idProduto,PDO::PARAM_INT);
			$in->bindParam(":cpCodPedido", $this->cpCodPedido,PDO::PARAM_INT);
			$in->bindParam(":cpQtdProduto", $this->cpQtdProduto,PDO::PARAM_INT);
			$in->bindParam(":cpComplementoUm", $this->cpComplementoUm,PDO::PARAM_STR);
			$in->bindParam(":cpComplementoDois", $this->cpComplementoDois,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalProduto", $this->cpValorTotalProduto,PDO::PARAM_STR);;
			$in->bindParam(":cpStatusPedido", $this->cpStatusPedido,PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoPedido", $this->cpObservacaoPedido,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine(); 
			}
		}
	
	
		public function getInfoJSON(){
			
			$sql="SELECT
					prep.idPreparaPedido,prep.tuProduto_idProduto,prep.cpCodPedido,prep.cpQtdProduto,prep.cpComplementoUm,
					prep.cpComplementoDois,prep.cpValorTotalProduto,prep.cpStatusPedido,prep.cpObservacaoPedido,
					prod.cpValorProduto
				  FROM 
					$this->table as prep INNER JOIN tuProduto as prod 
			     ON prod.idProduto = prep.tuProduto_idProduto		
				";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				$assoc = PDO::FETCH_ASSOC;
				$all = $s->fetchAll($assoc);
				
				$json = json_encode($all,JSON_PRETTY_PRINT);
				
				echo $json;
			
			} catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		

		public function listId($id) {
				
			$sql="SELECT 
					prep.cpCodPedido,prep.cpQtdProduto,prep.cpComplementoUm,
					prep.cpComplementoDois,prod.cpValorProduto,prep.cpValorTotalProduto,
					prep.cpStatusPedido,prep.cpObservacaoPedido
				  FROM 
				  	$this->table as prep INNER JOIN tuProduto as prod
				  ON prod.idProduto  = prep.tuProduto_idProduto
				  WHERE idPreparaPedido=:idPreparaPedido";
			
			$list=DB::prepare($sql);
			$list->bindParam(":idPreparaPedido",$id,PDO::PARAM_INT);
			$list->execute();
			try {
				
				return $list->fetch();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
			
		}
		
		public function DELETE($id) {
			
			$sql="DELETE FROM $this->table WHERE idPreparaPedido=:idPreparaPedido";
			$del=DB::prepare($sql);
			$del->bindParam(":idPreparaPedido",$id,PDO::PARAM_INT);
	
			
			try {
				
				return $del->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquvio ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getRow() {
			
			$sql="SELECT 	
					idPreparaPedido 
				  FROM
					$this->table";
			
			$s=DB::prepare($sql);
			$s->execute();
			try {
				
				return $s->rowCount();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function UPDATE($id) {
			
			$sql="UPDATE 
						$this->table 
				   SET
				   		tuProduto_idProduto=:tuProduto_idProduto,cpQtdProduto=:cpQtdProduto,cpComplementoUm=:cpComplementoUm,
				   		cpComplementoDois=:cpComplementoDois,cpValorTotalProduto=:cpValorTotalProduto,cpObservacaoPedido=:cpObservacaoPedido
				   WHERE 
						idPreparaPedido=:idPreparaPedido";
			
			$up=DB::prepare($sql);
			$up->bindParam(":idPreparaPedido",$id,PDO::PARAM_INT);
			$up->bindParam(":tuProduto_idProduto",$this->tuProduto_idProduto,PDO::PARAM_INT);
			$up->bindParam(":cpQtdProduto",$this->cpQtdProduto,PDO::PARAM_INT);
			$up->bindParam(":cpComplementoUm",$this->cpComplementoUm,PDO::PARAM_STR);
			$up->bindParam(":cpComplementoDois",$this->cpComplementoDois,PDO::PARAM_STR);
			$up->bindParam(":cpValorTotalProduto",$this->cpValorTotalProduto,PDO::PARAM_STR);
			$up->bindParam(":cpObservacaoPedido",$this->cpObservacaoPedido,PDO::PARAM_STR);
			
			try {
				
				return $up->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	}