<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:16/12/2020 as 21:10
    //http://github.com/hscastro
    
    require_once('Conta.class.php');
    require_once('ContaService.class.php');

    $num_conta1 = $_GET['num_conta1'];
    $num_conta2 = $_GET['num_conta2'];
    $valor = $_GET['valor'];
        
    
    $tester = new ContaService;

    $conta1 = new Conta;
    $conta2 = new Conta;

    $conta1->setNumero($num_conta1);
    $conta2->setNumero($num_conta2);
    
    //salva no banco de daos
    $res = $tester->setTransferencias($conta1, $conta2, $valor);

    echo $res;
    //print_r(json_encode($res));

?>