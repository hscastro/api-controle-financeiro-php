<?php

	 require_once('Cliente.class.php');
	 require_once('ClienteService.class.php');
     //require_once('ClienteController.class.php');

	 header("Content-type: application/json");

	class TestClienteService {

	
		public function __construct(){
    
        }
    }    
   
	$tester = new ClienteService;
    $res = $tester->listarTodos();
    echo $res;
    //$cl1 = new Cliente;
    
     //$nome = 'Pedro Lucas Almeida';   
     //$cl1->setNome($nome);
    //  $data = date('y-m-d');
    //  $cl1->setDataNascimento($data);
    //$cl1->setCpf('82727374942');
    //  $cl1->setId(3);
    //  $cl1->setEmail('p.lucas07@gmail.com');
     
    //  $res = $tester->editar($cl1);
     // $res = $tester->listarTodos();

    //  $res = $tester->buscarPorNome($cl1->getNome());
    //  echo $res;

     //$res = $tester->buscarPorCpf($cl1->getCpf());
     //echo $res;     
	//$p1 = new Produto();
	//$desc = 'Camisa feminina G';
	//$data = date('y-m-d');
	//$vlr = 22.19;
	//$p1->setDescricao($desc);
	//$p1->setDataVencimento($data);
	//$p1->setValor($vlr);
	//$p1->setCodigo(3);
		
?>


	