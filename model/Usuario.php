<?php require_once 'DB.php';

	class Usuario {
		
		
		protected $table = "tsUsuario";
		private $idUsuario,
				$cpNome,
				$cpSenha,
				$cpStatus,
				$cpNivelAcesso,
				$cpAlteracaoUsuario;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
			
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(cpNome,cpSenha,cpStatus,cpNivelAcesso,cpDataCadastro)
				 VALUES
				 	(:cpNome,:cpSenha,:cpStatus,:cpNivelAcesso,now())";
			
			$in=DB::prepare($sql);
			$in->bindParam(":cpNome",$this->cpNome,PDO::PARAM_STR);
			$in->bindParam(":cpSenha", $this->cpSenha,PDO::PARAM_STR);
			$in->bindParam(":cpStatus", $this->cpStatus,PDO::PARAM_STR);
			$in->bindParam(":cpNivelAcesso",$this->cpNivelAcesso,PDO::PARAM_STR);
			
			try{
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()."  na linha ".$e->getLine();
			}
		}
		
		
		public function getInfoUsuarioJSON(){
			
			$sql="SELECT 
					idUsuario,cpNome,cpSenha,cpStatus,cpNivelAcesso
				  FROM	
					$this->table";
			
			$s=DB::prepare($sql);
			$s->execute();
			
			try{
				
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
				  	idUsuario=:idUsuario";
			
			$del=DB::prepare($sql);
			$del->bindParam(":idUsuario", $id,PDO::PARAM_INT);
			
			try{
				
				return $del->execute();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function listId($id) {
			
			$sql="SELECT 	
					cpNome,cpStatus,cpNivelAcesso
				  FROM
					$this->table
				  WHERE
				  	idUsuario=:idUsuario";
			
			$s=DB::prepare($sql);
			$s->bindParam(":idUsuario", $id,PDO::PARAM_INT);
			$s->execute();
			
			try{
				
				return $s->fetch();
			
			}catch(PDOException  $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		
		public function UPDATE($id) {
			
			$sql="UPDATE $this->table SET
					cpNome=:cpNome,cpSenha=:cpSenha,cpStatus=:cpStatus,cpNivelAcesso=:cpNivelAcesso,
					cpAlteracaoUsuario=:cpAlteracaoUsuario,cpDataAlteracaoUsuario=now()
				  WHERE 
				  	idUsuario=:idUsuario";
			
			$up=DB::prepare($sql);
			$up->bindParam(":idUsuario", $id,PDO::PARAM_INT);
			$up->bindParam(":cpNome", $this->cpNome,PDO::PARAM_STR);
			$up->bindParam(":cpSenha", $this->cpSenha,PDO::PARAM_STR);
			$up->bindParam(":cpStatus", $this->cpStatus,PDO::PARAM_STR);
			$up->bindParam(":cpNivelAcesso", $this->cpNivelAcesso,PDO::PARAM_STR);
			$up->bindParam(":cpAlteracaoUsuario",$this->cpAlteracaoUsuario,PDO::PARAM_STR);
			
			try{
				
				return $up->execute();
			
			}catch(PDOException $e){
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
		
		public function verificaDuplicidade() {
			
			$sql="SELECT
					cpNome
				  FROM
					$this->table
				  WHERE 
				  	cpNome = ?";
			
			$row=DB::prepare($sql);
			$row->bindParam(":cpNome", $this->cpNome,PDO::PARAM_STR);
			$row->execute(array($this->cpNome));
			
			try{
				
				return $row->rowCount();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getFile();
			}
		}
	}
	
