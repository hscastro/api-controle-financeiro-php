<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:15/12/2020 as 20:03
    //http://github.com/hscastro
    
	 require_once('Conta.class.php');
	 require_once('ContaService.class.php');
     
	 header("Content-type: application/json");

	class TestContaService {

	
		public function __construct(){
    
        }
    }    
   
    // $conta = new Conta;
    // $conta-setId(5);
    // $conta-setNumero('1923-2');
    // $conta-setSaldo(1200);

	$tester = new ContaService;
    //$res = $tester->listarTodos();
    
    //$res = $tester->editar($conta);

    $c1 = '1923-2';
	$c2 = '8725-9';

    $valor = 200.00;
    
	//$res = $tester->setTransferencias($c1,$c2, $valor);
    
    //echo $res;
	//$cliente = new Cliente;
	///$cliente->setNome('Maria da Silva');
	//$cliente->setCpf('18194230202');
    //$conta = new Conta;
	// $dataAtual = date('y-m-d');
	// $conta->setDataCadastro($dataAtual);
	// $conta->setSaldo(8500.01);
	//$conta = new Conta;
	//$conta->setId(5);
	//$conta->setNumero('1923-2');
	//$valor = 500.00;
	
	$objet = new ContaController;
	
	$res = $objet->listar();
	echo $res;
	//$res = $objet->buscarContaPorCpf($cliente->getCpf());
	///$res = $objet->buscarContaPorNumero($conta->getNumero());
	//$res = $objet->buscarClientePorNome($cliente->getNome());
	//$res = $objet->existsConta($conta);
	//$res = $objet->existsContaRetornaSaldo($conta->getNumero());
	//$res = $objet->setCredito($conta, $valor);
	//$res = $objet->setDebito($conta, $valor);
	//$res = $objet->editar($conta);
		
?>


	