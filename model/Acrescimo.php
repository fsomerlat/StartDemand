<?php require_once 'DB.php';

	class Acrescimo {
		
		protected $table ="tuAcrescimo";
		private $idAcrescimo,
				$cpStatusAcrescimo,
				$tuPedido_idPedido,
				$tuPedido_cpCodPedido,
				$cpValorBaseAcrescimo,
				$cpAcrescimo,
				$cpQtdAcrescimo,
				$cpValorTotalAcrescimo,
				$cpObservacaoAcrescimo;
		
		public function __set($attr,$valor){
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
		
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table 
				  	(tuPedido_idPedido,tuPedido_cpCodPedido,cpValorBaseAcrescimo,cpAcrescimo,cpQtdAcrescimo,cpValorTotalAcrescimo,cpObservacaoAcrescimo)
				  VALUES
				  	(:tuPedido_idPedido,:tuPedido_cpCodPedido,:cpValorBaseAcrescimo,:cpAcrescimo,:cpQtdAcrescimo,:cpValorTotalAcrescimo,:cpObservacaoAcrescimo)";
			
			$in=DB::prepare($sql);
			$in->bindParam(":tuPedido_idPedido", $this->tuPedido_idPedido,PDO::PARAM_INT);
			$in->bindParam(":tuPedido_cpCodPedido", $this->tuPedido_cpCodPedido,PDO::PARAM_INT);
			$in->bindParam(":cpValorBaseAcrescimo", $this->cpValorBaseAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpAcrescimo", $this->cpAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpQtdAcrescimo",$this->cpQtdAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalAcrescimo",$this->cpValorTotalAcrescimo , PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoAcrescimo",$this->cpObservacaoAcrescimo,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
			
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getAcrescJSON() {
			
			$sql="SELECT 
					acr.idAcrescimo,acr.cpValorBaseAcrescimo,acr.tuPedido_idPedido,acr.cpAcrescimo,acr.cpQtdAcrescimo, 
					acr.cpValorTotalAcrescimo,acr.cpStatusAcrescimo, acr.cpObservacaoAcrescimo,ped.cpCodPedido
				  FROM 
				  	$this->table as acr INNER JOIN tuPedido as ped 
				  ON acr.tuPedido_idPedido = ped.idPedido
			      ORDER BY cpCodPedido ASC";
			
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
		
		public  function UPDATESTATUS($id) {
			
			$sql="UPDATE 
			  		 $this->table 
				  SET 
					 cpStatusAcrescimo=:cpStatusAcrescimo 
			      WHERE  
					tuPedido_idPedido=:tuPedido_idPedido";
			
			$up=DB::prepare($sql);
			$up->bindParam(":tuPedido_idPedido",$id, PDO::PARAM_INT);
			$up->bindParam(":cpStatusAcrescimo", $this->cpStatusAcrescimo,PDO::PARAM_STR);
			
			try {
				
				return $up->execute();
				
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	}
	
	
	
