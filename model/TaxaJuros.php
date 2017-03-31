<?php require_once '../core/include.php';

	class TaxaJuros {
		
		protected $table = "teTaxasJuros";
		private $idTaxaJuros,
				$cpFormaPagamentoTaxa,
				$cpPlanoPagSeguro,
				$cpBandeiraCartao,
				$cpPorcentagemTaxa;
		
	  public function __set($attr,$valor) {
	  	
	  	$this->$attr = $valor;
	  }
	  
	  public function INSERT() {
	  	
	  	$sql="INSERT INTO 
	  				$this->table
	  			(cpFormaPagamentoTaxa,cpPlanoPagSeguro,cpBandeiraCartao,cpPorcentagemTaxa)
	  		   VALUES
	  		   	(:cpFormaPagamentoTaxa,:cpPlanoPagSeguro,:cpBandeiraCartao,:cpPorcentagemTaxa)";
	  	$in=DB::prepare($sql);
	  	$in->bindParam(":cpFormaPagamentoTaxa",$this->cpFormaPagamentoTaxa,PDO::PARAM_STR);
	  	$in->bindParam(":cpPlanoPagSeguro",$this->cpPlanoPagSeguro,PDO::PARAM_INT);
	  	$in->bindParam(":cpBandeiraCartao",$this->cpBandeiraCartao,PDO::PARAM_STR);
	  	$in->bindParam(":cpPorcentagemTaxa",$this->cpPorcentagemTaxa,PDO::PARAM_STR);
	  	
	  	try{
	  		
	  		return $in->execute();
	  		
	  	}catch(PDOException $e){
	  		
	  		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	  	}
	  	
	  }
	  
	  public function getJSON_TAXA_JUROS() {
	  	
	  	$sql="SELECT 
	  			idTaxaJuros,cpFormaPagamentoTaxa,cpPlanoPagSeguro,cpBandeiraCartao,cpPlanoPagSeguro,cpPorcentagemTaxa
	  		  FROM 
	  			$this->table
	  		  ";
	  	$s=DB::prepare($sql);
	  	$s->execute();
	  	
	  	try{
	  		
	  		$assoc = PDO::FETCH_ASSOC;
	  		$all = $s->fetchAll($assoc);
	  		echo json_encode($all, JSON_PRETTY_PRINT);
	  	
	  	}catch(PDOException $e){
	  		
	  		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	  	}
	  }
	  
	 public function getId($id) {
	 	
	 	$sql="SELECT
	 			 idTaxaJuros,cpFormaPagamentoTaxa,cpPlanoPagSeguro,cpBandeiraCartao,cpPorcentagemTaxa
	 	      FROM 
	 			$this->table
	 		  WHERE
	 		  	idTaxaJuros=:idTaxaJuros";
	 	
	 	$s=DB::prepare($sql);
	 	$s->bindParam(":idTaxaJuros", $id, PDO::PARAM_INT);
	 	$s->execute();
	 	
	 	try{
	 		return $s->fetch();
	 		
	 	}catch(PDOException $e) {
	 		
	 		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	 	}	
	 }
	 
	 public function DELETE($id) {
	 	
	 	$sql="DELETE FROM 
	 			$this->table
	 		  WHERE 
	 		  	idTaxaJuros=:idTaxaJuros";
	 	
	 	$del=DB::prepare($sql);
	 	$del->bindParam(":idTaxaJuros",$id,PDO::PARAM_INT);
	 	
	 	try{
	 		
	 		return $del->execute();
	 	
	 	}catch(PDOException $e) {
	 		
	 		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	 	}
	 }
	 
	 public function UPDATE($id) {
	 	
	 	$sql = "UPDATE 
	 				$this->table
	 			 SET
	 				cpFormaPagamentoTaxa=:cpFormaPagamentoTaxa,cpPlanoPagSeguro=:cpPlanoPagSeguro,
	 				cpBandeiraCartao=:cpBandeiraCartao,cpPorcentagemTaxa=:cpPorcentagemTaxa
	 	         WHERE 
	 				idTaxaJuros=:idTaxaJuros";
	 	
	 	$up=DB::prepare($sql);
	 	$up->bindParam(":idTaxaJuros", $id,PDO::PARAM_INT);
	 	$up->bindParam(":cpFormaPagamentoTaxa",$this->cpFormaPagamentoTaxa,PDO::PARAM_STR);
	 	$up->bindParam(":cpPlanoPagSeguro",$this->cpPlanoPagSeguro,PDO::PARAM_INT);
	 	$up->bindParam(":cpBandeiraCartao",$this->cpBandeiraCartao,PDO::PARAM_STR);
	 	$up->bindParam(":cpPorcentagemTaxa",$this->cpPorcentagemTaxa,PDO::PARAM_STR);
	 	
	 	try{
	 		
	 		return $up->execute();
	 	
	 	}catch(PDOException $e) {
	 		
	 		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	 	}
	 }
	  
	 
	}
