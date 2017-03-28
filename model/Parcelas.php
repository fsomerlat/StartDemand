<?php require_once '../core/include.php';

	class Parcelas  {
		
		protected $table = "tuParcelas";
		private $tuPedido_idPedido,
			    $cpDataLancamento;
		
			    
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}

		public function INSERT(){
			
			$sql="INSERT INTO $this->table
					(tuPedido_idPedido,cpDataLancamento)
				  VALUES
				  	(:tuPedido_idPedido,now())";
			$in=DB::prepare($sql);
			$in->bindParam(":tuPedido_idPedido",$this->tuPedido_idPedido,PDO::PARAM_INT);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
			}
			
		}
	}
