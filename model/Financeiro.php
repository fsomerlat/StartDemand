<?php require_once '../core/include.php';

	class Financeiro {
		
		protected $table = "teFinanceiro";
		private $idFinanceiro,
				$cpStatusFinanceiro,
				$cpValorTotal,
				$cpValorLiquidoTotal,
				$cpDataCompra,
				$cpDataLancamento;
	
		public function __set($attr, $valor) {
			
			$this->$attr = $valor;
		}
		
		public function INSERT(){
			
			$sql="INSERT INTO 
						$this->table
				 	(cpStatusFinanceiro,cpValorTotal,cpValorLiquidoTotal,cpDataCompra,cpDataLancamento)
				 VALUES
				 	(:cpStatusFinanceiro,:cpValorTotal,:cpValorLiquidoTotal,:cpDataCompra,now())";
			
			$in=DB::prepare($sql);
			$in->bindParam(":cpStatusFinanceiro", $this->cpStatusFinanceiro,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotal", $this->cpValorTotal,PDO::PARAM_STR);
			$in->bindParam(":cpValorLiquidoTotal", $this->cpValorLiquidoTotal,PDO::PARAM_STR);
			$in->bindParam(":cpDataCompra", $this->cpDataCompra,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function UPDATE($data,$status) {
			
			$sql="UPDATE $this->table SET
				  	cpValorTotal=:cpValorTotal,cpValorLiquidoTotal=:cpValorLiquidoTotal
				  WHERE
				  	cpDataCompra=:cpDataCompra AND cpStatusFinanceiro=:cpStatusFinanceiro";
			$up=DB::prepare($sql);
			$up->bindParam(":cpValorTotal", $this->cpValorTotal,PDO::PARAM_STR);
			$up->bindParam(":cpValorLiquidoTotal", $this->cpValorLiquidoTotal,PDO::PARAM_STR);
			$up->bindParam(":cpDataCompra", $data, PDO::PARAM_STR);
			$up->bindParam(":cpStatusFinanceiro", $status,PDO::PARAM_STR);
			
			try{
				
				return $up->execute();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getInfoFinanceiro($dt) {
			
			$sql="SELECT 
					cpValorTotal,cpValorLiquidoTotal,cpDataCompra
				  FROM
					$this->table
				  WHERE
				  	cpDataCompra=:cpDataCompra";
			
			$s=DB::prepare($sql);
			$s->bindParam(":cpDataCompra", $dt,PDO::PARAM_STR);
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
		
		
		public function getFiltroSelecionado($status,$dataInicio,$dataFinal) {
			
			$sql="SELECT 
						cpValorTotal,cpValorLiquidoTotal,cpStatusFinanceiro,cpDataCompra,cpDataLancamento
				  FROM
						$this->table
				  WHERE
					cpStatusFinanceiro = '$status' AND cpDataCompra BETWEEN '$dataInicio' AND '$dataFinal'";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try{
				
				return $s->fetchAll();
			
			}catch(PDOException $e){
				
				echo "Erro arquivo ".$e->getFile()." referetne a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getAll() {
			
			$sql="SELECT
					cpStatusFinanceiro,SUM(cpValorTotal) as valorTotal,SUM(cpValorLiquidoTotal) as valorLiquido
				  FROM	
					$this->table
				  GROUP BY
				  	cpStatusFinanceiro";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try{
				
				return $s->fetchAll();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		
		public function verificaSituacao($data, $status) {
			
			$sql="SELECT 
					cpDataCompra,cpStatusFinanceiro
				  FROM
					$this->table
				  WHERE 
				  	cpDataCompra = ? AND cpStatusFinanceiro = ?";
			
			$s=DB::prepare($sql);	
			$s->bindParam(":cpDataCompra", $data,PDO::PARAM_STR);
			$s->bindParam(":cpStatusFinanceiro", $status,PDO::PARAM_STR);
			$s->execute(array($this->cpDataCompra,$this->cpStatusFinanceiro));
			
			try{
				
				return $s->rowCount();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo " .$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}	
		}
	}