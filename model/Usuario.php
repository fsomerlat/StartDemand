<?php require_once 'DB.php';

	class Usuario {
		
		
		protected $table = "tsUsuario";
		private $cpNome,
				$cpSenha,
				$spStatus,
				$cpNivelAcesso;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
			
			return $this->$attr;
		}
	}
