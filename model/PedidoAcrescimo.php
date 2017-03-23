<?php require_once '../core/include.php';

class PedidoAcrescimo{

	protected $table = "tuPedidoAcrescimo";
	private $tuPedido_idPedido,
			$tuAcrescimo_idAcrescimo;
	
	public function __set($attr,$valor) {
		
		$this->$attr = $valor;
	}
	
	public function __get($attr) {
		
		return $this->$attr;
	}
	
	public function INSERT() {
			
		$sql="INSERT INTO
					$this->table
				(tuPedido_idPedido,tuAcrescimo_idAcrescimo,cpDataLancamento)
			  VALUES
				(:tuPedido_idPedido,:tuAcrescimo_idAcrescimo,now())";
			
		$in=DB::prepare($sql);
		$in->bindParam(":tuPedido_idPedido", $this->tuPedido_idPedido,PDO::PARAM_INT);
		$in->bindParam(":tuAcrescimo_idAcrescimo", $this->tuAcrescimo_idAcrescimo,PDO::PARAM_INT);
			
		try{
	
			return $in->execute();
				
		}catch(PDOException $e){
	
			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}
			
	public function getInfoFinanceiroJSONPEDIDO_ACRESCIMO() {
			
		$sql=" SELECT
		
				ped.idPedido,ped.cpFormaPagamento,ped.cpQtdParcela,ped.cpValorParcela,pedAcr.cpDataLancamento,acr.cpAcrescimo
			
			FROM 
			
				$this->table as pedAcr
			
			INNER JOIN tuPedido as ped ON pedAcr.tuPedido_idPedido = ped.idPedido	
			INNER JOIN tuAcrescimo as acr ON  acr.idAcrescimo = pedAcr.tuAcrescimo_idAcrescimo";
			
		$s=DB::prepare($sql);
		$s->execute();
			
		try {

			$assoc=PDO::FETCH_ASSOC;
			$all = $s->fetchAll($assoc);
			echo json_encode($all, JSON_PRETTY_PRINT);
				
		}catch(PDOException $e) {

			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}



}

