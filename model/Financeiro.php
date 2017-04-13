<?php require_once '../core/include.php';

	class Financeiro {
		
		protected $table = "teFinanceiro";
		private $idFinanceiro,
				$cpStatusFinanceiro,
				$cpValorTotal,
				$cpValorLiquidoTotal,
				$cpDataBaixa,
				$cpDataLancamento;
	
		public function __set($attr, $valor) {
			
			$this->$attr = $valor;
		}
		
		public function INSERT(){
			
			$sql="INSERT INTO 
						$this->table
				 	(cpStatusFinanceiro,cpValorTotal,cpValorLiquidoTotal,cpDataBaixa,cpDataLancamento)
				 VALUES
				 	(:cpStatusFinanceiro,:cpValorTotal,:cpValorLiquidoTotal,:cpDataBaixa,now())";
			
			$in=DB::prepare($sql);
			$in->bindParam(":cpStatusFinanceiro", $this->cpStatusFinanceiro,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotal", $this->cpValorTotal,PDO::PARAM_STR);
			$in->bindParam(":cpValorLiquidoTotal", $this->cpValorLiquidoTotal,PDO::PARAM_STR);
			$in->bindParam(":cpDataBaixa", $this->cpDataBaixa,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function UPDATE($dataFechamento) {
			
			$sql="UPDATE $this->table SET
				  	cpValorTotal=:cpValorTotal,cpValorLiquidoTotal=:cpValorLiquidoTotal
				  WHERE
				  	cpDataBaixa=:cpDataBaixa";
			$up=DB::prepare($sql);
			$up->bindParam(":cpValorTotal", $this->cpValorTotal,PDO::PARAM_STR);
			$up->bindParam(":cpValorLiquidoTotal", $this->cpValorLiquidoTotal,PDO::PARAM_STR);
			$up->bindParam(":cpDataBaixa", $dataFechamento, PDO::PARAM_STR);
			
			try{
				
				return $up->execute();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getInfoFinanceiro($dt) {
			
			$sql="SELECT 
					cpValorTotal,cpValorLiquidoTotal,cpDataBaixa
				  FROM
					$this->table
				  WHERE
				  	cpDataBaixa=:cpDataBaixa";
			
			$s=DB::prepare($sql);
			$s->bindParam(":cpDataBaixa", $dt,PDO::PARAM_STR);
			$s->execute();
			
			try {
				
				return $s->fetch();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getRow() {
			
			$sql="SELECT 
					idFinanceiro
				  FROM
					$this->table";
			
			$row=DB::prepare($sql);
			$row->execute();
			
			try{
				
				return $row->rowCount();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function verificaData($data) {
			
			$sql="SELECT 
					cpDataBaixa
				  FROM
					$this->table
				  WHERE 
				  	cpDataBaixa = ?";
			
			$s=DB::prepare($sql);	
			$s->bindParam(":cpDataBaixa", $data,PDO::PARAM_STR);
			$s->execute(array($this->cpDataBaixa));
			
			try{
				
				return $s->rowCount();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo " .$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}	
		}
	}