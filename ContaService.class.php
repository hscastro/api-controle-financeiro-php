<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:16/12/2020 as 20:14
	//http://github.com/hscastro

	 require_once('Conta.class.php');
	 require_once('ContaController.class.php');

	 header("Content-type: application/json");

	class ContaService {

		private $service;

		public function __construct(){
			$this->service = new ContaController;
		}

		public function salvar($conta){
			return $this->service->salvar($conta);
		}

		public function editar($conta){
			return $this->service->editar($conta);
		}

		public function excluir($conta){
			return $this->service->excluir($conta);
		}

		public function listarTodos(){
			return $this->service->listar();
		}

		public function setDebitoConta($conta, $valor){
			return $this->service->setDebito($conta, $valor);
		}

		public function setCreditoConta($conta, $valor){
			return $this->service->setCredito($conta, $valor);
		}

		public function setTransferencias($conta1, $conta2, $valor){
			return $this->service->setTransferencias($conta1, $conta2, $valor);
		}

		public function buscarPorNumero($numero){
			return $this->service->buscarPorNumero($numero);
        }
        
        public function buscarContaPorCpf($cpf){
			return $this->service->buscarContaPorCpf($cpf);
        }
                
	}

	
		
?>


	