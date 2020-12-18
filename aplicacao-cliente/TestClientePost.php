<?php

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];       

    $url = "http://localhost/api-controle-financeiro";

    $script = "clienteSave.php";

    $concat = "?";
    $incr = "&";
    $param_1 = "nome=".$nome;
    $param_2 = "cpf=".$cpf;
    $param_3 = "dataNascimento=".$dataNascimento;
    $param_4 = "email=".$email;

    $url_ = $url."/".$script . $concat . $param_1 . $incr . $param_2 . $incr 
        . $param_3 . $incr . $param_4;

    $result = file_get_contents($url_);

    print_r(json_decode($result, 1));

?>