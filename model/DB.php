<?php
	
	class DB {
		
		private static $instancia;
		
		public function getInstance() {
			
			if(!isset(self::$instancia)):
				
			try {
				
					self::$instancia = new PDO('mysql:host=localhost;dbname=startdemand','root','26154879');
					self::$instancia->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			
			} catch (PDOException $e) {
				
				echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
			
			endif;
			return self::$instancia;
		}
		
		public function prepare($sql) {
			
			return self::getInstance()->prepare($sql);
		}
		
	}