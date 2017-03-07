<?php require_once 'Acrescimo.php';

	class PreparaAcrescimo extends Acrescimo {
		
		protected $table = "tuPreparaAcrescimo";
		private $idPreparaAcrescimo;
		
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(cpAcrescimo,cpQtdAcrescimo,cpValorBaseAcrescimo,cpValorTotalAcrescimo,cpObservacaoAcrescimo)
				  VALUES 
				  	(:cpAcrescimo,:cpQtdAcrescimo,:cpValorBaseAcrescimo,:cpValorTotalAcrescimo,:cpObservacaoAcrescimo)";
			$in=DB::prepare($sql);
			$in->bindParam(":cpAcrescimo",$this->cpAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpQtdAcrescimo",$this->cpQtdAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorBaseAcrescimo",$this->cpValorBaseAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalAcrescimo",$this->cpValorTotalAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoAcrescimo",$this->cpObservacaoAcrescimo,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	
		public function getSomaTotalAcrescimo() {
			
			$sql="SELECT
						SUM(cpValorTotalAcrescimo) AS somaTotalAcrescimo
				   FROM 
						$this->table";
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				$assoc = PDO::FETCH_ASSOC;
				$all = $s->fetchAll($assoc);
				
				echo json_encode($all,JSON_PRETTY_PRINT);
			
			}catch(PDOException $e) {
				
				echo "Error no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getInfoAcrescimoJSON() {
			
			$sql="SELECT 
					idPreparaAcrescimo,cpAcrescimo,cpQtdACrescimo,cpValorBaseAcrescimo,cpValorTotalAcrescimo,cpObservacaoAcrescimo
				  FROM  
				  	$this->table";
						
			 $s = DB::prepare($sql);						
			 $s->execute();
			 
			 try {
			 	
			 	$assoc = PDO::FETCH_ASSOC;
			 	
			 	$all = $s->fetchAll($assoc);
			 	echo json_encode($all, JSON_PRETTY_PRINT);
			 	
			 }catch(PDOException $e) {
			 	
			 	echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			 }
			
		}
		 public function DELETE($id) {
		 	
		 	$sql="DELETE FROM 
		 			$this->table 
		 		  WHERE
		 			idPreparaAcrescimo=:idPreparaAcrescimo";
		 	$del=DB::prepare($sql);
		 	$del->bindParam(":idPreparaAcrescimo",$id,PDO::PARAM_INT);
		 	 
		 	try{
		 		
		 		return $del->execute();
		 	
		 	}catch(PDOException $e) {
		 		
		 		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		 	}
		 }
		 
		 public function getAll() {
		 	
		 	$sql="SELECT 
		 				cpAcrescimo,cpQtdAcrescimo,cpValorBaseAcrescimo,cpValorTotalAcrescimo,cpObservacaoAcrescimo
		 		  FROM 
		 			$this->table";
		 	
		 	$s=DB::prepare($sql);
		 	$s->bindParam(":cpAcrescimo",$this->cpAcrescimo,PDO::PARAM_STR);
		 	$s->bindParam(":cpQtdAcrescimo",$this->cpQtdAcrescimo,PDO::PARAM_STR);
		 	$s->bindParam(":cpValorBaseAcrescimo",$this->cpValorBaseAcrescimo,PDO::PARAM_STR);
		 	$s->bindParam(":cpValorTotalAcrescimo",$this->cpValorTotalAcrescimo,PDO::PARAM_STR);
		 	$s->bindParam(":cpObservacaoAcrescimo",$this->cpObservacaoAcrescimo,PDO::PARAM_STR);
		 	$s->execute();
		 	
		 	try {
		 		
		 		return $s->fetchAll();
		 	
		 	}catch(PDOException $e) {
		 		
		 		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		 	}
		 }
	}
