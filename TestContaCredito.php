<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:15/12/2020 as 20:03
    //http://github.com/hscastro
    
	 require_once('Conta.class.php');
	 require_once('ContaService.class.php');     
	 header("Content-type: application/json");
    
	$object = new ContaService;
    $conta = new Conta;
    $num = '1923-2';
    $valor = 200.00;
    $conta->setNumero($num);
    	
	$res = $object->setCreditoConta($conta, $valor);
    echo $res;
	
?>


	