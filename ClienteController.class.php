<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:15/12/2020 as 10:21
	//http://github.com/hscastro

	require_once('Conexao.class.php');
	require_once('Cliente.class.php');

	//classe responsável pelas operaões na entidade cliente
	class ClienteController {

		private $conn;

		private $conexao;

		public function __construct(){
			//instancia um objeto do tipo conexao
			$conexao = new Conexao();	
			//abre a conexão com a base dados
			$this->conn = $conexao->openConexao();							
		}
		

		//método para salva uma cliente no banco de dados
		public function salvar(Cliente $cliente){
			
			$stmt = $this->conn->prepare('INSERT INTO tb_clientes (NOME, CPF, DATANASCIMENTO,
			 	EMAIL) VALUES (:nome, :cpf, :dataNascimento ,:email)');
			 
			$nome = $cliente->getNome();
			$cpf = $cliente->getCpf();
			$dataNascimento = $cliente->getDataNascimento();
			$email = $cliente->getEmail();
			 
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':cpf', $cpf);
			$stmt->bindParam(':dataNascimento', $dataNascimento);
			$stmt->bindParam(':email', $email);	
			$stmt->execute();
			
			$this->conn = NULL;

			if($stmt != NULL){
				echo 'Cliente inserido com sucesso!';
				
			}else{
				echo 'Erro no cadastro do cliente';
			}		
		}

		//método para exclusão de um cliente no banco de dados
		public function excluir(Cliente $cliente){
			$stmt = NULL;
			$stmt = $this->conn->prepare('DELETE FROM tb_clientes WHERE id = :id');
			
			$id = $cliente->getId();
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);	
			$stmt->execute();
			$this->conn = NULL;

			if($stmt != NULL){
				echo 'Registro excluído com sucesso!';
			}else{
				echo 'Erro na exclusão!';
			}		
		}


		//método para atualização de um cliente no banco de dados
		public function editar(Cliente $cliente){
			$update = 'UPDATE tb_clientes SET nome=:nome, cpf=:cpf, dataNascimento=:dataNascimento,
			 		email=:email WHERE id = :id';
			$stmt = NULL;
			$stmt = $this->conn->prepare($update);
						 
			$id = $cliente->getId();
			$nome = $cliente->getNome();
			$cpf = $cliente->getCpf();
			$dataNascimento = $cliente->getDataNascimento();
			$email = $cliente->getEmail();
			 
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':cpf', $cpf);
			$stmt->bindParam(':dataNascimento', $dataNascimento);
			$stmt->bindParam(':email', $email);	
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			
			$this->conn = NULL;

			if($stmt != NULL){
				echo 'Registro atualizado com sucesso!';
			}else{
				echo 'Erro na atualizado!';
			}		
		}

		public function listar(){
		   //sql para selecionar todos os clientes da base dados
		   $sql = "SELECT * FROM tb_clientes ORDER BY ID";		   		
		   $stmt = $this->conn->prepare($sql);		   
		   $stmt->execute();

		   $lista = array();
		   $i = 0;

		   //percorre a lista de registros cadastro no banco de dados
		   while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   		//echo $rows['id']. ' - '. $rows['descricao']. ' - '. $rows['valor']. '<br>';
		   		$lista[$i] = [
		   			   "ID" => $rows['ID'],
					   "NOME" => $rows['NOME'],
					   "CPF" => $rows['CPF'],
					   "DATANASCIMENTO" => $rows['DATANASCIMENTO'],
		   			   "EMAIL" => $rows['EMAIL'],
		   		];
		   		$i++;
		   }
		   //finaliza a conexão com banco de dados
		   //$this->conn = NULL;
		   //retorno em formato json
		   $resultado = json_encode($lista);
		   
		   return $resultado;		  		
		}


		//retorno um cliente a partir do NOME
		public function buscarPorNome($nome){
		   $sql = 'SELECT * FROM tb_clientes WHERE nome LIKE :nome';
		   $stmt = $this->conn->prepare($sql);
		   $stmt->bindParam(':nome', $nome);
		   $stmt->execute();

		   $lista = array();
		   $i = 0;
		   
		   //percorre a lista de registros cadastro no banco de dados
		   while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$lista[$i] = [
					"ID" => $rows['ID'],
					"NOME" => $rows['NOME'],
					"CPF" => $rows['CPF'],
					"DATANASCIMENTO" => $rows['DATANASCIMENTO'],
					"EMAIL" => $rows['EMAIL'],
				];
				$i++;
	        }

		   //finaliza a conexão com banco de dados
		   //$this->conn = NULL;
		   //retorno em formato json
		   $resultado = json_encode($lista);
		   
		   return $resultado;				   		
		}

		//retorno um cliente a partir do CPF
		public function buscarPorCpf($cpf){
			$sql = 'SELECT * FROM tb_clientes WHERE cpf LIKE :cpf';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':cpf', $cpf);
			$stmt->execute();
 
			$lista = array();
			$i = 0;
			
			//percorre a lista de registros cadastro no banco de dados
			while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
				 $lista[$i] = [
					 "ID" => $rows['ID'],
					 "NOME" => $rows['NOME'],
					 "CPF" => $rows['CPF'],
					 "DATANASCIMENTO" => $rows['DATANASCIMENTO'],
					 "EMAIL" => $rows['EMAIL'],
				 ];
				 $i++;
			 }
 
			//finaliza a conexão com banco de dados
			//$this->conn = NULL;
			//retorno em formato json
			$resultado = json_encode($lista);
			
			return $resultado;				   		
		 }
 

	}
    

?>

