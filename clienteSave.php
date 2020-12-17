<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:15/12/2020 as 20:03
    //http://github.com/hscastro
    
    require_once('Cliente.class.php');
    require_once('ClienteService.class.php');

    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $dataNascimento = $_GET['dataNascimento'];
    $email = $_GET['email'];
        
    $tester = new ClienteService;
    $cl1 = new Cliente;
    
    $cl1->setNome($nome);
    $data = date('y-m-d');
    $cl1->setDataNascimento($data);
    $cl1->setCpf($cpf);
    $cl1->setEmail($email);

    //salva no banco de daos
    $res = $tester->salvar($cl1);

    echo $res;
    //print_r(json_encode($res));

?>