<?php require_once '../core/include.php';


	class Contas {
		
		protected $table = "teContas";
		private $idContas,
			    $cpTipoConta,
			    $cpClassificacaoConta,
			    $cpValorConta,
			    $cpDataVencimentoConta,
			    $cpUsuario,
			    $cpDataCadastroConta,
			    $cpObservacaoConta;
		
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
	    		  	cpDataVencimentoConta=:cpDataVencimentoConta,cpObservacaoConta=:cpObservacaoConta,cpUsuario=:cpUsuario
	    		  WHERE
	    		    idContas=:idContas";
	    	
	    	$up=DB::prepare($sql);
	    	$up->bindParam(":cpTipoConta",$this->cpTipoConta,PDO::PARAM_STR);
	    	$up->bindParam(":cpClassificacaoConta", $this->cpClassificacaoConta,PDO::PARAM_STR);
	    	$up->bindParam(":cpValorConta", $this->cpValorConta,PDO::PARA,_STR);
	    	$up->bindParam(":cpDataVencimentoConta", $this->cpDataVencimentoConta,PDO::PARAM_STR);
	    	$up->bindParam(":cpObservacaoConta",$this->cpObservacaoConta,PDO::PARA,M_STR);
	    	$up->bindParam(":cpUsuario", $this->cpUsuario, PDO::PARAM_STR);
	    	
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
	   					cpUsuario,cpDataCadastroConta
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
	    
	}