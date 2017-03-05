<?php require_once 'Acrescimo.php';

	class PreparaAcrescimo extends Acrescimo {
		
		protected $table = "tuPreparaAcrescimo";
		private $idPreparaAcrescimo;
		
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(cpAcrescimo,cpQtdAcrescimo,cpValorBaseAcrescimo,cpValorTotalAcrescimo)
				  VALUES 
				  	(:cpAcrescimo,:cpQtdAcrescimo,:cpValorBaseAcrescimo,:cpValorTotalAcrescimo)";
			$in=DB::prepare($sql);
			$in->bindParam(":cpAcrescimo",$this->cpAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpQtdAcrescimo",$this->cpQtdAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorBaseAcrescimo",$this->cpValorBaseAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalAcrescimo",$this->cpValorTotalAcrescimo,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		public function getInfoAcrescimoJSON() {
			
			$sql="SELECT 
					idPreparaAcrescimo,cpAcrescimo,cpValorBaseAcrescimo,cpValorTotalAcrescimo
				  FROM 
					$this->table";
			 $s=DB::prepare($sql);
			 $s->execute();
			 
			 try {
			 	
			 	$assoc = PDO::FETCH_ASSOC;
			 	$all = $s->fetchAll($assoc);
			 	echo json_encode($all, JSON_PRETTY_PRINT);
			 	
			 }catch(PDOException $e) {
			 	
			 	echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			 }
			
		}
	}
