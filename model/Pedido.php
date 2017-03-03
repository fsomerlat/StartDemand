<?php require_once 'DB.php';

	class Pedido {
		
		protected $table = "tuPedido";
		protected $idPedido,
				  $cptuProduto_idProduto,
				  $cptuAcrescimo_idAcrescimo,
				  $cpCodPedido,
				  $cpQtdProduto,
				  $cpComplementoUm,
				  $cpComplementoDois,
				  $cpValorTotalProduto,
				  $cpValorTotalPedido,
				  $cpStatusPedido,
				  $cpObservacaoPedido;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
			
			return $this->$attr;
		}
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(cptuProduto_idProduto,cptuAcrescimo_idAcrescimo,cpCodPedido,cpQtdProduto,cpComplementoUm,cpComplementoDois,cpValorTotalProduto,cpValorTotalPedido,cpStatusPedido,cpObservacaoPedido)
				  VALUES
					(:cptuProduto_idProduto,:cptuAcrescimo_idAcrescimo,:cpCodPedido,:cpQtdProduto,:cpComplementoUm,:cpComplementoDois,:cpValorTotalProduto,:cpValorTotalPedido,:cpStatusPedido,:cpObservacaoPedido)";
			
			$in=DB::prepare($sql);
			$in->bindParam(":cptuProduto_idProduto",$this->cptuProduto_idProduto,PDO::PARAM_INT);
			$in->bindParam(":cptuAcrescimo_idAcrescimo",$this->cptuAcrescimo_idAcrescimo,PDO::PARAM_INT);
			$in->bindParam(":cpCodPedido", $this->cpCodPedido,PDO::PARAM_INT);
			$in->bindParam(":cpQtdProduto", $this->cpQtdProduto,PDO::PARAM_INT);
			$in->bindParam(":cpComplementoUm", $this->cpComplementoUm,PDO::PARAM_STR);
			$in->bindParam(":cpComplementoDois", $this->cpComplementoDois,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalProduto",$this->cpValorTotalProduto,PDO::PARAM_STR);
			$in->bindParam(":cpValorTotalPedido", $this->cpValorTotalPedido,PDO::PARAM_STR);
			$in->bindParam(":cpStatusPedido",$this->cpStatusPedido,PDO::PARAM_STR);
			$in->bindParam(":cpObservacaoPedido", $this->cpObservacaoPedido,PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			}catch(PDOException $e) {
				
				echo "Erro no arquivo ".$e->getFile()." referente a mesangem ".$e->getMessage()." na linha ".$e->getLine();
			}
		}
	}
