<?php require_once 'DB.php';


	class Produto {
		
		
		protected $table = "tuProduto";
		private $cpNomeProduto,
				$cpQtdProduto,
				$cpTipoProduto,
				$cpValorProduto,
				$cpObservacaoProduto;
		
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
			
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
				 	(cpNomeProduto,cpQtdProduto,cpTipoProduto,cpValorProduto,cpObservacaoProduto)
				 VALUES 
				 (:cpNomeProduto,:cpQtdProduto,:cpTipoProduto,:cpValorProduto,:cpObservacaoProduto)";
			
			$in=DB::prepare($sql);
			$in->bindParam(":cpNomeProduto",$this->cpNomeProduto,PDO::PARAM_STR);
			$in->bindParam(":cpQtdProduto",$this->cpQtdProduto,PDO::PARAM_STR);
			$in->bindParam(":cpTipoProduto",$this->cpTipoProduto,PDO::PARAM_STR);
			$in->bindParam(":cpValorProduto",$this->cpValorProduto,PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoProduto",$this->cpObservacaoProduto,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
				
			} catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
		}
		
		public function getJSON() {
			
			$sql="SELECT 
					
					idProduto,cpNomeProduto,cpQtdProduto,cpTipoProduto,cpValorProduto,cpObservacaoProduto
						
				  FROM $this->table";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				$associativo = PDO::FETCH_ASSOC;
				$arry = $s->fetchAll($associativo);
				echo json_encode($arry,JSON_PRETTY_PRINT);
			
			}catch(PDOException $e) {
				
				echo 'Erro no arquivo '.$e->getFile().' referente a menssagem '.$e->getMessage().' na linha '.$e->getLine(); 
			}
		}
		
		public function listId($id) {
			
			$sql="SELECT 
					cpNomeProduto, cpQtdProduto,cpTipoProduto,cpValorProduto,cpObservacaoProduto
				  FROM 
				  	$this->table
				  WHERE 
					idProduto=:idProduto";
			
			$list=DB::prepare($sql);
			$list->bindParam(":idProduto", $id,PDO::PARAM_INT);
			$list->execute();
			
			try {
				
				return $list->fetch();
			
			}catch(PDPException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function UPDATE($id) {
			
			$sql="UPDATE $this->table 
			      
			      SET cpNomeProduto=:cpNomeProduto,cpQtdProduto=:cpQtdProduto,cpTipoProduto=:cpTipoProduto,
			      cpValorProduto=:cpValorProduto,cpObservacaoProduto=:cpObservacaoProduto
				 
				 WHERE  idProduto=:idProduto";
			
			$up=DB::prepare($sql);
			$up->bindParam(":idProduto", $id, PDO::PARAM_INT);
			$up->bindParam(":cpNomeProduto", $this->cpNomeProduto,PDO::PARAM_STR);
			$up->bindParam(":cpQtdProduto", $this->cpQtdProduto,PDO::PARAM_INT);
			$up->bindParam(":cpTipoProduto", $this->cpTipoProduto,PDO::PARAM_STR);
			$up->bindParam(":cpValorProduto", $this->cpValorProduto,PDO::PARAM_INT);
			$up->bindParam(":cpObservacaoProduto", $this->cpObservacaoProduto,PDO::PARAM_STR);
			
			try {
				
				return $up->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		
		public function DELETE($id) {
			
			$sql="DELETE FROM $this->table WHERE idProduto=:idProduto";
			
			$del=DB::prepare($sql);
			$del->bindParam(":idProduto",$id,PDO::PARAM_INT);
			
			try {
				
				return $del->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	}

		
