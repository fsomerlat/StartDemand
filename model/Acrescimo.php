<?php require_once 'DB.php';

	class Acrescimo {
		
		protected $table ="tuAcrescimo";
		private $idAcrescimo,
				$tuPedido_idPedido,
				$tuPedido_cpCodPedido,
				$cpValorBaseAcrescimo,
				$cpAcrescimo,
				$cpQtdAcrescimo,
				$cpValorTotalAcrescimo;
		
		public function __set($attr,$valor){
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
		
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table 
				  	(tuPedido_idPedido,tuPedido_cpCodPedido,cpValorBaseAcrescimo,cpAcrescimo,cpQtdAcrescimo,cpValorTotalAcrescimo)
				  VALUES
				  	(:tuPedido_idPedido,:tuPedido_cpCodPedido,:cpValorBaseAcrescimo,:cpAcrescimo,:cpQtdAcrescimo,:cpValorTotalAcrescimo)";
			
			$in=DB::prepare($sql);
			$in->bindParam(":tuPedido_idPedido", $this->tuPedido_idPedido,PDO::PARAM_INT);
			$in->bindParam(":tuPedido_cpCodPedido", $this->tuPedido_cpCodPedido,PDO::PARAM_INT);
			$in->bindParam(":cpValorBaseAcrescimo", $this->cpValorBaseAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpAcrescimo", $this->cpAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpQtdAcrescimo",$this->cpQtdAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalAcrescimo",$this->cpValorTotalAcrescimo , PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
			
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getAcrescJSON() {
			
			$sql="SELECT 
					idAcrescimo,cpValorBaseAcrescimo,cpAcrescimo,cpQtdAcrescimo, cpValorTotalAcrescimo
				  FROM 
				  	$this->table ORDER BY cpAcrescimo";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				$assoc = PDO::FETCH_ASSOC;
				$all = $s->fetchAll($assoc);
				
				return  json_encode($all, JSON_PRETTY_PRINT);
				
				
			
			} catch(PDOException $e) {
				
				echo  "Error no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()."  na linha ".$e->getLine();
			}
		}
		
		public function DELETE($id) {
			
			$sql="DELETE FROM $this->table WHERE idAcrescimo=:idAcrescimo";
			
			$del=DB::prepare($sql);
			$del->bindParam(":idAcrescimo",$id,PDO::PARAM_INT);
			try {
				
				return $del->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	}
	
	
	
