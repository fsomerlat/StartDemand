<?php require_once 'DB.php';

	class Acrescimo {
		
		protected $table;
		private $idAcrescimo,
				$cpStatusAcrescimo,
				$cpSituacaoAcrescimo,
				$tuPedido_idPedido,
				$tuPedido_cpCodPedido,
				$cpValorBaseAcrescimo,
				$cpAcrescimo,
				$cpQtdAcrescimo,
				$cpTipoAcrescimo,
				$cpValorTotalAcrescimo,
				$cpFormaPagamentoAcrescimo,
				$cpBandeiraCartao,
				$cpQtdParcelaAcrescimo,
				$cpValorParcelaAcrescimo,
				$cpDataCompraAcrescimo,
				$cpPorcentagemTaxa,
				$cpValorTaxaJuros,
				$cpValorTotalLiquido,
				$cpObservacaoAcrescimo;
		
				
		public function __construct($table = "tuAcrescimo") {
			
			parent::__construct();
			
			$this->table = $table;
		}
				
		public function __set($attr,$valor){
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
		
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table 
				  	(tuPedido_idPedido,tuPedido_cpCodPedido,cpTipoAcrescimo,cpValorBaseAcrescimo,cpAcrescimo,cpQtdAcrescimo,cpValorTaxaJuros,cpBandeiraCartao,
				  	cpValorTotalLiquido,cpPorcentagemTaxa,cpValorTotalAcrescimo,cpFormaPagamentoAcrescimo,cpQtdParcelaAcrescimo,cpValorParcelaAcrescimo,cpObservacaoAcrescimo,cpDataCompraAcrescimo)
				  VALUES
				  	(:tuPedido_idPedido,:tuPedido_cpCodPedido,:cpTipoAcrescimo,:cpValorBaseAcrescimo,:cpAcrescimo,:cpQtdAcrescimo,:cpValorTaxaJuros,:cpBandeiraCartao,
					:cpValorTotalLiquido,:cpPorcentagemTaxa,:cpValorTotalAcrescimo,:cpFormaPagamentoAcrescimo,:cpQtdParcelaAcrescimo,:cpValorParcelaAcrescimo,:cpObservacaoAcrescimo,now())";
			
			$in=DB::prepare($sql);
			
			$in->bindParam(":tuPedido_idPedido",$this->tuPedido_idPedido,PDO::PARAM_INT);
			$in->bindParam(":tuPedido_cpCodPedido", $this->tuPedido_cpCodPedido,PDO::PARAM_INT);
			$in->bindParam(":cpTipoAcrescimo",$this->cpTipoAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorBaseAcrescimo", $this->cpValorBaseAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpAcrescimo", $this->cpAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpQtdAcrescimo",$this->cpQtdAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalAcrescimo",$this->cpValorTotalAcrescimo , PDO::PARAM_STR);
			$in->bindParam(":cpFormaPagamentoAcrescimo",$this->cpFormaPagamentoAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpBandeiraCartao",$this->cpBandeiraCartao,PDO::PARAM_STR);
			$in->bindParam(":cpQtdParcelaAcrescimo",$this->cpQtdParcelaAcrescimo,PDO::PARAM_INT);
			$in->bindParam(":cpValorParcelaAcrescimo",$this->cpValorParcelaAcrescimo,PDO::PARAM_STR);
			$in->bindParam(":cpPorcentagemTaxa",$this->cpPorcentagemTaxa,PDO::PARAM_STR);
			$in->bindParam(":cpValorTaxaJuros",$this->cpValorTaxaJuros,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalLiquido",$this->cpValorTotalLiquido,PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoAcrescimo",$this->cpObservacaoAcrescimo,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
			
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getAcrescJSON() {
			
			$sql="SELECT 
					acr.idAcrescimo,acr.cpValorBaseAcrescimo,acr.tuPedido_idPedido,acr.cpAcrescimo,acr.cpQtdAcrescimo,acr.cpSituacaoAcrescimo, 
					acr.cpValorTotalAcrescimo,acr.cpStatusAcrescimo,acr.cpTipoAcrescimo, acr.cpObservacaoAcrescimo,ped.cpCodPedido
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
		
		
		public function UPDATE_STATUS_AVULSO($id) {
			
			$sql="UPDATE 
					 $this->table 
				  SET 
				   	 cpStatusAcrescimo=:cpStatusAcrescimo
				  WHERE
				  	idAcrescimo=:idAcrescimo";
			$up=DB::prepare($sql);
			$up->bindParam(":idAcrescimo", $id,PDO::PARAM_INT);
			$up->bindParam(":cpStatusAcrescimo", $this->cpStatusAcrescimo,PDO::PARAM_STR);
			
			try {
				return  $up->execute();
				
			} catch (PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getAcrescimosAvulsosJSON() {
			
			$sql="SELECT 
					idAcrescimo,cpStatusAcrescimo,cpAcrescimo,cpQtdAcrescimo,cpValorBaseAcrescimo,cpSituacaoAcrescimo,
					cpValorTotalAcrescimo,cpObservacaoAcrescimo,cpTipoAcrescimo,tuPedido_cpCodPedido
				  FROM 
					$this->table";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
				
				$assoc = PDO::FETCH_ASSOC;
				
				$all = $s->fetchAll($assoc);
				echo json_encode($all,JSON_PRETTY_PRINT);
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linda ".$e->getLine();
			}
		}
		
		public function verifcaStatus($id) {
			
			$sql="SELECT 
					cpStatusAcrescimo,idAcrescimo
				  FROM 
					$this->table
				  WHERE 
				  	idAcrescimo = $id AND cpStatusAcrescimo = 'F'";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try {
			 	
				return $s->rowCount();				
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		
		public function UPDATE_SITUACAO_ACRESCIMO_PEDIDO($id) {
			
			$sql="UPDATE 
					$this->table
				  SET
				  	cpSituacaoAcrescimo=:cpSituacaoAcrescimo
				  WHERE 
				    tuPedido_idPedido=:tuPedido_idPedido";
			
			$up=DB::prepare($sql);
			$up->bindParam(":tuPedido_idPedido",$id,PDO::PARAM_INT);
			$up->bindParam(":cpSituacaoAcrescimo", $this->cpSituacaoAcrescimo,PDO::PARAM_STR);
			
			try{
				
				return $up->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getFile();
			}
		}
		
		public function UPDATE_SITUACAO_ACRESCIMO_AVULSO($id) {
			
			
			$sql="UPDATE 
					$this->table
				  SET
				  	cpSituacaoAcrescimo=:cpSituacaoAcrescimo,cpDataBaixa=now()
				  WHERE
				  	idAcrescimo=:idAcrescimo";
			
			$up=DB::prepare($sql);
			$up->bindParam(":idAcrescimo", $id,PDO::PARAM_INT);
			$up->bindParam(":cpSituacaoAcrescimo", $this->cpSituacaoAcrescimo,PDO::PARAM_STR);
			
			try{
				
				return $up->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getId($fk) {
			
			
			$sql="SELECT 
						idAcrescimo,tuPedido_idPedido,cpAcrescimo,cpQtdAcrescimo,cpValorBaseAcrescimo,cpValorTotalAcrescimo
				  FROM 
						$this->table
				  WHERE  
					tuPedido_idPedido=:tuPedido_idPedido";
			
			$s=DB::prepare($sql);
			$s->bindParam(":tuPedido_idPedido", $fk,PDO::PARAM_INT);
			$s->execute();
			try{
				
				return $s->fetch();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function getRow(){
			
			$sql="SELECT 
						idAcrescimo
				  FROM 
						$this->table";
			
		     $row=DB::prepare($sql);
			 $row->execute();
			 
			 try {
			 	
			 	return $row->rowCount();
			 
			 }catch(PDOException $e) {
			 	
			 	echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			 }
		}
				
		public function getInfoAcrescimo($id) {
			
			
			$sql="SELECT
					idAcrescimo,cpFormaPagamentoAcrescimo,cpQtdParcelaAcrescimo,cpValorParcelaAcrescimo,
					cpStatusAcrescimo,cpDataCompraAcrescimo,cpDataBaixa,cpValorTotalAcrescimo,cpValorTotalLiquido
				  FROM 
					$this->table
				  WHERE 
				  	idAcrescimo=:idAcrescimo";
			
			$s=DB::prepare($sql);
			$s->bindParam(":idAcrescimo",$id,PDO::PARAM_INT);
			$s->execute();
			try {
				
				return $s->fetch();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getLine()." na linha ".$e->getLine();
			}
		}
		
		
	}
	
	
	
