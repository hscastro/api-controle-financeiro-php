<?php

    require_once('Conexao.class.php');
    require_once('Cliente.class.php');
	require_once('Conta.class.php');
	

	//classe responsável pelas operaões na entidade conta
	class ContaController {

		private $conn;

		private $conexao;

		public function __construct(){
			//instancia um objeto do tipo conexao
			$conexao = new Conexao();	
			//abre a conexão com a base dados
			$this->conn = $conexao->openConexao();							
		}
		

		//método para salva na banco de dados uma conta para um cliente 
		public function salvar(Cliente $cliente, Conta $conta){
			
			// try {  
			// 		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  
			// 		$this->conn->beginTransaction();
			// 		$this->conn->exec("insert into staff (id, first, last) values (23, 'Joe', 'Bloggs')");
			// 		$this->conn->exec("insert into salarychange (id, amount, changedate) 
			// 		values (23, 50000, NOW())");
			// 		$this->conn->commit();
				
			//   }catch (Exception $e) {
			// 	$this->conn->rollBack();
			// 	echo "Failed: " . $e->getMessage();
			//   }

			

			$stmt = $this->conn->prepare('INSERT INTO tb_contas (NUMERO, DATACADASTRO,
			 	VALOR, CLIENTE_ID) VALUES (:numero, :dataCadastro, :valor, :cliente_id)');
			 
			$num_conta = $conta->getNumero();
			$datacadastro = $conta->getCadastro();
			$valor = $conta->getValor();
			$cliente_id = $cliente->getCliente()->getId();

			$stmt->bindParam('numero', $num_conta);
			$stmt->bindParam(':dataCadastro', $datacadastro);
			$stmt->bindParam(':valor', $valor);
			$stmt->bindParam(':cliente_id', $cliente_id);	
			$stmt->execute();
			
			$this->conn = NULL;

			if($stmt != NULL){
				echo 'Conta cadastrada com sucesso!';
				
			}else{
				echo 'Erro no cadastro da Conta';
			}		
		}

		//método para exclusão de um cliente no banco de dados
/*		public function excluir(Cliente $cliente){
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
		}*/

		public function listar(){
		   //sql para selecionar todos os clientes da base dados
		   $sql = "SELECT * FROM tb_contas AS c1 INNER JOIN  tb_clientes AS c2 ON c1.cliente_id = c2.id";		   		
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
					   "NUMERO" => $rows['NUMERO'],
					   "DATACADASTRO" => $rows['DATACADASTRO'],  
					   "VALOR" => $rows['VALOR'],
					   "CLIENTE_ID" => $rows['CLIENTE_ID'],					   
						
		   		];
		   		$i++;
		   }

		   //finaliza a conexão com banco de dados
		   //$this->conn = NULL;
		   //retorno em formato json
		   $resultado = json_encode($lista);
		   
		   return $resultado;		  		
		}

		//retorno os dados de uma conta a partir do 'NOME' do cliente
		public function buscarClientePorNome($nome){
			//sql para selecionar todos os clientes da base dados
			$sql = "SELECT * FROM tb_contas AS c1 INNER JOIN  tb_clientes AS c2 
					ON c1.cliente_id = c2.id AND c2.nome ='$nome'";

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
						"NUMERO" => $rows['NUMERO'],
						"DATACADASTRO" => $rows['DATACADASTRO'],  
						"VALOR" => $rows['VALOR'],
						"CLIENTE_ID" => $rows['CLIENTE_ID'],					   
						 
					];
					$i++;
			}
 
			//finaliza a conexão com banco de dados
			//$this->conn = NULL;
			//retorno em formato json
			$resultado = json_encode($lista);
			
			return $resultado;		  		
		 }


		//retorno os dados uma conta a partir do numero do 'CPF' do cliente
		public function buscarContaPorCpf($cpf){
			//sql para selecionar todos os clientes da base dados
			$sql = "SELECT * FROM tb_contas AS c1 INNER JOIN  tb_clientes AS c2 
					ON c1.cliente_id = c2.id AND c2.cpf ='$cpf'";

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
						"NUMERO" => $rows['NUMERO'],
						"DATACADASTRO" => $rows['DATACADASTRO'],  
						"VALOR" => $rows['VALOR'],
						"CLIENTE_ID" => $rows['CLIENTE_ID'],					   
						 
					];
					$i++;
			}
 
			//finaliza a conexão com banco de dados
			//$this->conn = NULL;
			//retorno em formato json
			$resultado = json_encode($lista);
			
			return $resultado;		  		
		 }

		//retorno os dados uma conta a partir do 'NUMERO' da conta do cliente
		public function buscarContaPorNumero($numero){
			//sql para selecionar todos os clientes da base dados
			$sql = "SELECT * FROM tb_contas AS c1 INNER JOIN  tb_clientes AS c2 
					ON c1.cliente_id = c2.id AND c1.numero ='$numero'";
	

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
							"NUMERO" => $rows['NUMERO'],
							"DATACADASTRO" => $rows['DATACADASTRO'],  
							"VALOR" => $rows['VALOR'],
							"CLIENTE_ID" => $rows['CLIENTE_ID'],	
					];
					$i++;
			}
 
			//finaliza a conexão com banco de dados
			//$this->conn = NULL;
			//retorno em formato json
			$resultado = json_encode($lista);
			
			return $resultado;		  		
		 }
		 
		//retorno os dados uma conta a partir do numero do 'CPF' do cliente
		public function existsConta(Conta $conta){
			//sql para selecionar todos os clientes da base dados
			$numero = $conta->getNumero();
			$sql = "SELECT * FROM tb_contas AS c1 INNER JOIN  tb_clientes AS c2 
					ON c1.cliente_id = c2.id AND c1.numero ='$numero'";
		

			$stmt = $this->conn->prepare($sql);		   
			$stmt->execute();
			$NUMERO = 0;
			$SALDO = 0;
			 
			//percorre a lista de registros cadastro no banco de dados
			while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
				   $NUMERO = $rows['NUMERO'];
				   $SALDO = $rows['VALOR'];
			}

			if($numero === $NUMERO){		
				return true;
			} 
		
		}	

		//retorno os dados uma conta a partir do numero do 'CPF' do cliente
		public function existsContaRetornaSaldo($numero){
			//sql para selecionar todos os clientes da base dados
			$sql = "SELECT * FROM tb_contas AS c1 INNER JOIN  tb_clientes AS c2 
							ON c1.cliente_id = c2.id AND c1.numero ='$numero'";
		

			$stmt = $this->conn->prepare($sql);		   
			$stmt->execute();
			$NUMERO = 0;
			$SALDO = 0;
			 
			//percorre a lista de registros cadastro no banco de dados
			while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
				   $NUMERO = $rows['NUMERO'];
				   $SALDO = $rows['VALOR'];
			}

			if($numero === $NUMERO){		
				return $SALDO;
			} 
		
		}		
		
		
			
		//Crédito: Essa operação deverá adicionar ao saldo da pessoa o valor informado na requisição.
		public function setCredito(Conta $conta, $valor){
			
			if($saldo = $this->existsContaRetornaSaldo($conta->getNumero())){
				
				$novoSaldo = $saldo;
				$novoSaldo += $valor;

				return $novoSaldo;
			}		
			
		}


        //Transferências: Essa operação deverá realizar o débito do saldo de uma pessoa e realizar um crédito na outra pessoa.        
        public function setTransferencias($numeroContaDebitada, $numeroContaBeneciado, $valor){

            //verifica se as contas existem na base de dados, caso existam retornara o valor true
            if(existsConta($numeroContaBeneciado) AND existsConta($numeroContaDebitada)){

                //Em seguida será verificado se existe saldo na conta do transferente
                if($numeroContaDebitada->getSaldo() <= $valor){
                    $this->setNumero($numeroContaBeneciado);
                    $this->setCredito($numeroContaBeneciado, $valor);

                    echo 'Transferência efetivada com sucesso!';

                }else{
                    echo 'O [VALOR] é maior que o salda em conta.';
                }

            }else{
                echo 'Conta (as) não existe (m) em nossa base de dados';
            }

        } 
		

	}

	//$cliente = new Cliente;
	///$cliente->setNome('Maria da Silva');
	//$cliente->setCpf('18194230202');
	 $conta = new Conta;
	// $dataAtual = date('y-m-d');
	// $conta->setDataCadastro($dataAtual);
	// $conta->setSaldo(8500.01);
	//$conta = new Conta;
	$conta->setNumero('1923-7');
	
	$objet = new ContaController;
	
	//$res = $objet->listar();
	//$res = $objet->buscarContaPorCpf($cliente->getCpf());
	///$res = $objet->buscarContaPorNumero($conta->getNumero());
	//$res = $objet->buscarClientePorNome($cliente->getNome());
	//$res = $objet->existsConta($conta);
	//$res = $objet->existsContaRetornaSaldo($conta->getNumero());
	$res = $objet->setCredito($conta, 120000.09);
	echo $res;
	
?>

