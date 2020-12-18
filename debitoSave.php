<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:16/12/2020 as 21:10
    //http://github.com/hscastro
    
    require_once('Conta.class.php');
    require_once('ContaService.class.php');

    $numero = $_GET['numero'];
    $valor = $_GET['valor'];
        
    
    $tester = new ContaService;

    $conta = new Conta;
    
    $conta->setNumero($numero);
    
    //salva no banco de daos
    $res = $tester->setDebitoConta($conta, $valor);

    echo $res;
    //print_r(json_encode($res));

?>