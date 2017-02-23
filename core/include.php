<?php  function __autoLoad($className) {
		
		$diretorios = [
						'../model/',
						'../controller/'
						
					   ];
		
		foreach($diretorios as $key => $dir):
		
			if(file_exists($dir.$className.'.php')) {
				try {
				
					require_once $dir . $className . '.php';
			
				} catch (PDOException $e) {
				
					echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
				}
			}
			
		endforeach;
		
}
