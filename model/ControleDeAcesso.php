<?php require_once 'Usuario.php';

	class ControleDeAcesso extends Usuario {
		
		public function getInfoUser($name,$password) {
			
			$sql="SELECT 
					cpNome,cpSenha,cpNivelAcesso,cpStatus 
				  FROM 
				    $this->table
				  WHERE 
			        cpNome = '$name' AND cpSenha ='".sha1($password)."'";
			
		    $list=DB::prepare($sql);
			$list->bindParam(":cpNome",$name,PDO::PARAM_STR);
			$list->bindParam(":cpSenha",$password,PDO::PARAM_STR);
			$list->execute();
			try {
				
				return $list->fetch();
			
			} catch(PDOException $e) {
				
				echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
		}
		
		public function getSessaoUser($name,$password,$status,$nivelAcesso) {
			
			$sql="SELECT 
					cpNome,cpSenha,cpStatus, cpNivelAcesso
				  FROM 
					$this->table
				  WHERE 
					cpNome = ? AND cpSenha = ? AND cpStatus = ? AND cpNivelAcesso = ?";
			
			$verifica=DB::prepare($sql);
			$verifica->bindParam(1,$name,PDO::PARAM_STR);
			$verifica->bindParam(2,$password,PDO::PARAM_STR);
			$verifica->bindParam(3,$status,PDO::PARAM_STR);
			$verifica->bindParam(4,$nivelAcesso,PDO::PARAM_STR);
			$verifica->execute();
			
			try {
				
				return $verifica->fetch(PDO::FETCH_ASSOC);
			
			}catch(PDOException $e) {
				
				echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
			
		}
	}
	
	
