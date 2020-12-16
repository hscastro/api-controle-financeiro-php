<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:15/12/2020 as 19:10
	//http://github.com/hscastro

	 require_once('Cliente.class.php');
	 require_once('ClienteController.class.php');

	 header("Content-type: application/json");

	class ClienteService {

		private $service;

		public function __construct(){
			$this->service = new ClienteController;
		}

		public function salvar($cliente){
			return $this->service->salvar($cliente);
		}

		public function editar($cliente){
			return $this->service->editar($cliente);
		}

		public function excluir($cliente){
			return $this->service->excluir($cliente);
		}

		public function listarTodos(){
			return $this->service->listar();
        }

		public function buscarPorNome($nome){
			return $this->service->buscarPorNome($nome);
        }
        
        public function buscarPorCpf($cpf){
			return $this->service->buscarPorCpf($cpf);
        }
                
	}

	
		
?>


	