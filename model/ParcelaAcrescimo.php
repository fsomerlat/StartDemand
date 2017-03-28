<?php require_once 'DB.php';

	class ParcelaAcrescimo {
		
		protected $table = "tuParcelaAcrescimo";
		private $tuAcrescimo_idAcrescimo,
				$cpDataLancamento;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(tuAcrescimo_idAcrescimo,cpDataLancamento)
				  VALUES
				    (:tuAcrescimo_idAcrescimo,now())";
			$in=DB::prepare($sql);
			$in->bindParam(":tuAcrescimo_idAcrescimo", $this->tuAcrescimo_idAcrescimo,PDO::PARAM_INT);
			
			try{
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	}
 
