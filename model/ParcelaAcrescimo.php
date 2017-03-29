<?php require_once 'DB.php';

	class ParcelaAcrescimo {
		
		protected $table = "tuParcelaAcrescimo";
		private $tuAcrescimo_idAcrescimo,
				$cpDataLancamento,
				$cpDataVencimentoParcelaAcrescimo;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(tuAcrescimo_idAcrescimo,cpDataVencimentoParcelaAcrescimo,cpDataLancamento)
				  VALUES
				    (:tuAcrescimo_idAcrescimo,:cpDataVencimentoParcelaAcrescimo,now())";
			
			$in=DB::prepare($sql);
			$in->bindParam(":tuAcrescimo_idAcrescimo", $this->tuAcrescimo_idAcrescimo,PDO::PARAM_INT);
			$in->bindParam(":cpDataVencimentoParcelaAcrescimo", $this->cpDataVencimentoParcelaAcrescimo,PDO::PARAM_STR);
			
			try{
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	}
 
