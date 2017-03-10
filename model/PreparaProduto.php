<?php require_once 'Pedido.php';

class PreparaProduto extends Pedido{

	protected $table = "tsPreparaProduto";
	private $idPreparaProduto;

	
	public function INSERT() {
			
		$sql="INSERT INTO $this->table
				(tuProduto_idProduto,cpQtdProduto,cpComplementoUm,cpCodPedido,
				cpComplementoDois,cpValorTotalProduto,cpObservacaoPedido)
			  VALUES
				(:tuProduto_idProduto,:cpQtdProduto,:cpComplementoUm,
				:cpCodPedido,:cpComplementoDois,:cpValorTotalProduto,:cpObservacaoPedido)";
			
		$in=DB::prepare($sql);
		$in->bindParam(":tuProduto_idProduto", $this->tuProduto_idProduto,PDO::PARAM_INT);
		$in->bindParam(":cpQtdProduto", $this->cpQtdProduto,PDO::PARAM_INT);
		$in->bindParam(":cpComplementoUm", $this->cpComplementoUm,PDO::PARAM_STR);
		$in->bindParam(":cpCodPedido",$this->cpCodPedido,PDO::PARAM_INT);
		$in->bindParam(":cpComplementoDois", $this->cpComplementoDois,PDO::PARAM_STR);
		$in->bindParam(":cpValorTotalProduto", $this->cpValorTotalProduto,PDO::PARAM_STR);
		$in->bindParam(":cpObservacaoPedido", $this->cpObservacaoPedido,PDO::PARAM_STR);
			
		try {

			return $in->execute();
				
		}catch(PDOException $e) {

			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}

	public function getInfoJSON(){
			
		$sql="SELECT
			prep.idPreparaProduto,prep.tuProduto_idProduto,prod.cpQtdProduto,prep.cpComplementoUm,prep.cpCodPedido,
			prep.cpComplementoDois,prep.cpValorTotalProduto,prod.cpValorProduto,prod.cpNomeProduto,prep.cpObservacaoPedido
		FROM
			$this->table as prep INNER JOIN tuProduto as prod
			
			ON prod.idProduto = prep.tuProduto_idProduto
		";
			
		$s=DB::prepare($sql);
		$s->execute();
			
		try {

			$assoc = PDO::FETCH_ASSOC;
			$all = $s->fetchAll($assoc);

			$json = json_encode($all,JSON_PRETTY_PRINT);

			echo $json;
				
		} catch(PDOException $e) {

			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}


	public function listId($id) { // PARACE QUE NÃO ESTÁ SENDO UTILIZADO

		$sql="SELECT
			prep.cpCodPedido,prep.cpQtdProduto,prep.cpComplementoUm,
			prep.cpComplementoDois,prod.cpValorProduto,prep.cpValorTotalProduto,
			prep.cpStatusPedido,prep.cpObservacaoPedido
		FROM
			$this->table as prep INNER JOIN tuProduto as prod
			ON prod.idProduto  = prep.tuProduto_idProduto
		WHERE idPreparaProduto=:idPreparaProduto";
			
		$list=DB::prepare($sql);
		$list->bindParam(":idPreparaProduto",$id,PDO::PARAM_INT);
		$list->execute();
		try {

			return $list->fetch();
				
		}catch(PDOException $e) {

			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
			
	}

	public function DELETE($id) {
			
		$sql="DELETE FROM $this->table WHERE idPreparaProduto=:idPreparaProduto";
		$del=DB::prepare($sql);
		$del->bindParam(":idPreparaProduto",$id,PDO::PARAM_INT);

			
		try {

			return $del->execute();
				
		}catch(PDOException $e) {

			echo "Erro no arquvio ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}

	public function getRow() {
			
		$sql="SELECT
				idPreparaProduto
			 FROM
				$this->table";
			
		$s=DB::prepare($sql);
		$s->execute();
		try {

			return $s->rowCount();
				
		}catch(PDOException $e) {

			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}

	public function UPDATE($id) {
			
		$sql="UPDATE
			$this->table
		SET
			tuProduto_idProduto=:tuProduto_idProduto,cpQtdProduto=:cpQtdProduto,cpComplementoUm=:cpComplementoUm,
			cpComplementoDois=:cpComplementoDois,cpValorTotalProduto=:cpValorTotalProduto,cpObservacaoPedido=:cpObservacaoPedido
		WHERE
			idPreparaProduto=:idPreparaProduto";
			
		$up=DB::prepare($sql);
		$up->bindParam(":idPreparaProduto",$id,PDO::PARAM_INT);
		$up->bindParam(":tuProduto_idProduto",$this->tuProduto_idProduto,PDO::PARAM_INT);
		$up->bindParam(":cpQtdProduto",$this->cpQtdProduto,PDO::PARAM_INT);
		$up->bindParam(":cpComplementoUm",$this->cpComplementoUm,PDO::PARAM_STR);
		$up->bindParam(":cpComplementoDois",$this->cpComplementoDois,PDO::PARAM_STR);
		$up->bindParam(":cpValorTotalProduto",$this->cpValorTotalProduto,PDO::PARAM_STR);
		$up->bindParam(":cpObservacaoPedido",$this->cpObservacaoPedido,PDO::PARAM_STR);
			
		try {

			return $up->execute();
				
		}catch(PDOException $e) {

			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}

	public function getSomaProduto() {
			
		$sql="SELECT
				SUM(cpValorTotalProduto) as somaTotalProduto
			FROM
				$this->table";
		$s=DB::prepare($sql);
		$s->execute();
			
		try {

			$assoc = PDO::FETCH_ASSOC;
			$all = $s->fetchAll($assoc);
			echo json_encode($all,JSON_PRETTY_PRINT);
				
		}catch(PDOException $e) {

			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}

	public function getProduto() {
			
		$sql="SELECT
				idPreparaProduto,tuProduto_idProduto,cpCodPedido,cpQtdProduto,cpComplementoUm,cpComplementoDois,cpValorTotalProduto,cpObservacaoPedido
			 FROM
				$this->table";

		$s=DB::prepare($sql);
		$s->execute();
		try {

			return $s->fetch();
		  
		}catch(PDOException $e) {

			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}
	
	public function DELETATUDO() {
		
		$sql="DELETE FROM $this->table";
		$del=DB::prepare($sql);
		
		try {
			
			return $del->execute();
		
		}catch(PDOException $e) {
			
			echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
		}
	}
}
