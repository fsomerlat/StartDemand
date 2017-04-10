<?php require_once '../core/include.php';


	class Contas {
		
		protected $table = "teContas";
		private $idContas,
			    $cpTipoConta,
			    $cpClassificacaoConta,
			    $cpValorConta,
			    $cpDataVencimentoConta,
			    $cpUsuario,
			    $cpAlteracaoUltimoUsuario,
			    $cpObservacaoConta,
				$cpStatusConta,
				$cpUsuarioFechamentoConta;
		
	    public function __get($attr) {
	    	
	    	return $this->$attr;
	    }
	    
	    public function __set($attr, $valor) {
	    	
	    	$this->$attr = $valor;
	    }
	    
	    
	    public function INSERT() {
	    	
	    	$sql="INSERT INTO 
	    			 $this->table
	    		   (cpTipoConta,cpClassificacaoConta,cpValorConta,cpDataVencimentoConta,cpObservacaoConta,cpUsuario,cpDataCadastroConta)
	    		  VALUES
	    		  	(:cpTipoConta,:cpClassificacaoConta,:cpValorConta,:cpDataVencimentoConta,:cpObservacaoConta,:cpUsuario,now())";
	    	
	    	$in=DB::prepare($sql);
	    	$in->bindParam(":cpTipoConta",$this->cpTipoConta,PDO::PARAM_STR);
	    	$in->bindParam(":cpClassificacaoConta",$this->cpClassificacaoConta,PDO::PARAM_STR);
	    	$in->bindParam(":cpValorConta",$this->cpValorConta,PDO::PARAM_STR);
	    	$in->bindParam(":cpDataVencimentoConta",$this->cpDataVencimentoConta,PDO::PARAM_STR);
	    	$in->bindParam(":cpObservacaoConta",$this->cpObservacaoConta,PDO::PARAM_STR);
	    	$in->bindParam(":cpUsuario",$this->cpUsuario,PDO::PARAM_STR);
			
	    	try {
	    		
	    		return $in->execute();
	    	
	    	}catch(PDOException $e) {
	    		
	    		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	    	}
	    }
	    
	    public function UPDATE($id) {
	    	
	    	$sql="UPDATE $this->table SET 
	    		  	cpTipoConta=:cpTipoConta,cpClassificacaoConta=:cpClassificacaoConta,cpValorConta=:cpValorConta,
	    		  	cpDataVencimentoConta=:cpDataVencimentoConta,cpObservacaoConta=:cpObservacaoConta
	    		  WHERE
	    		    idContas=:idContas";
	    	
	    	$up=DB::prepare($sql);
	    	$up->bindParam(":idContas", $id,PDO::PARAM_INT);
	    	$up->bindParam(":cpTipoConta", $this->cpTipoConta, PDO::PARAM_STR);
	    	$up->bindParam(":cpClassificacaoConta", $this->cpClassificacaoConta, PDO::PARAM_STR);
	    	$up->bindParam(":cpValorConta", $this->cpValorConta, PDO::PARAM_STR);
	    	$up->bindParam(":cpDataVencimentoConta", $this->cpDataVencimentoConta, PDO::PARAM_STR);
	    	$up->bindParam(":cpObservacaoConta", $this->cpObservacaoConta, PDO::PARAM_STR);
	    	
	    	try{
	    		
	    		return $up->execute();
	    		
	    	}catch(PDOException $e) {
	    		
    			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine(); 
	    	}
	    }
	    
	    public function DELETE($id) {
	    	
	    	$sql="DELETE FROM 
	    				$this->table
	    		  WHERE 
	    		  	idContas=:idContas";
	    	
	    	$del=DB::prepare($sql);
	    	$del->bindParam(":idContas", $id,PDO::PARAM_INT);
			
	    	try {
	    		
	    		return $del->execute();
	    	
	    	}catch(PDOException $e) {
	    		
    			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine(); 
	    	}
	    }
	    
	   	public function  getInfoContasJSON() {
	   		
	   		$sql="SELECT
	   					idContas,cpTipoConta,cpClassificacaoConta,cpValorConta,cpDataVencimentoConta,cpObservacaoConta,
	   					cpUsuario,cpDataCadastroConta,cpAlteracaoUltimoUsuario,cpDataUltimaAlteracao,cpStatusConta,cpUsuarioFechamentoConta,
	   					cpDataFechamentoConta
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
	    
	    public function listId($id) {
	    	
	    	$sql="SELECT
	    				cpTipoConta,cpClassificacaoConta,cpValorConta,cpDataVencimentoConta,cpObservacaoConta
	    		   FROM
	    				$this->table
	    			WHERE
	    			   idContas=:idContas";
	    	
	    	$s=DB::prepare($sql);
	    	$s->bindParam(":idContas",$id,PDO::PARAM_INT);
	    	$s->execute();
	    	
	    	try {
	    		
	    		return $s->fetch();
	    	
	    	}catch(PDOException $e) {
	    		
	    		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	    	}
	    }
	    
	    public function UPDATE_POR_USUARIO($id) {
	    	
	    	$sql="UPDATE $this->table SET
	    			 cpAlteracaoUltimoUsuario=:cpAlteracaoUltimoUsuario,cpDataUltimaAlteracao=now()
	    		  WHERE
	    		  	idContas=:idContas";
	    	
	    	$up=DB::prepare($sql);
	    	$up->bindParam(":idContas", $id,PDO::PARAM_INT);
	    	$up->bindParam(":cpAlteracaoUltimoUsuario", $this->cpAlteracaoUltimoUsuario,PDO::PARAM_STR);

	    	try{
	    		
	    		return $up->execute();
	    	
	    	}catch(PDOException $e){
	    		
	    		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	    	}
	    }
	    
	    public function UPDATE_STATUS($id) {
	    	
	    	$sql="UPDATE $this->table SET 
	    			cpStatusConta=:cpStatusConta
	    		  WHERE 
	    		  	idContas=:idContas";
	    	
	    	$up=DB::prepare($sql);
	    	$up->bindParam(":idContas", $id,PDO::PARAM_INT);
	    	$up->bindParam(":cpStatusConta",$this->cpStatusConta,PDO::PARAM_STR);
	    	
	    	try{
	    		
	    		return $up->execute();
	    	
	    	}catch(PDOException $e) {
	    		
	    		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	    	}
	    }
	    
	    public function getSomaContasAbertasJSON(){
	    	
	    	$sql="SELECT 
	    			SUM(cpValorConta) as somaConta,cpTipoConta
	    		  FROM	
	    			$this->table
	    		
	    		WHERE 
	    			cpStatusConta = 'A'
	    		GROUP BY
	    		 	 cpTipoConta ";
	    	
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
	    
	    public function UPDATE_USUARIO_FECHAMENTO($id) {
	    	
	    	$sql="UPDATE $this->table SET
	    			cpUsuarioFechamentoConta=:cpUsuarioFechamentoConta,cpDataFechamentoConta = now()
	    		  WHERE 	
	    		  	idContas=:idContas";
	    	$up=DB::prepare($sql);
	    	$up->bindParam(":idContas", $id, PDO::PARAM_INT);
	    	$up->bindParam(":cpUsuarioFechamentoConta", $this->cpUsuarioFechamentoConta,PDO::PARAM_STR);
	    	
	    	try{
	    		
	    		return $up->execute();
	    	
	    	}catch(PDOException $e) {
	    		
	    		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	    	}
	    }
	    
	    public function getSomaContasFechadasJSON(){
	    	
	    	$sql="SELECT
	    			SUM(cpValorConta) as somaConta,cpStatusConta,cpTipoConta
	    		  FROM
	    			$this->table
	    		  WHERE
	    		  	cpStatusConta = 'F'
	    		  GROUP BY
		    		 cpTipoConta";
	    	
	    	$s=DB::prepare($sql);
	    	$s->execute();
	    	
	    	try{
	    		
	    		$assoc = PDO::FETCH_ASSOC;
	    		$all = $s->fetchAll($assoc);
	    		echo json_encode($all, JSON_PRETTY_PRINT);
	    	
	    	}catch(PDOException $e){
	    		
	    		echo "Erro no arquivo ".$e->getFile()." referente a a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	    	}
	    		
	    }	 
	}