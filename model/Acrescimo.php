<?php require_once 'DB.php';

	class Acrescimo {
		
		protected $table ="tuAcrescimo";
		private $idAcresimo,
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
				  	(cpValorBaseAcrescimo,cpAcrescimo,cpQtdAcrescimo,cpValorAcrescimo)
				  VALUES
				  	(:cpValorBaseAcrescimo,:cpAcrescimo,:cpQtdAcrescimo,:cpValorTotalAcrescimo)";
			
			$in=DB::prepare($sql);
			$in->bindParam(":cpValorBaseAcrescimo", $this->cpValorBaseAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpAcrescimo", $this->cpAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpQtdAcrescimo",$this->cpQtdAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalAcrescimo",$this->table , PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
			
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	}
