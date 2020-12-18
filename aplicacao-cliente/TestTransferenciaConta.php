<?php

    $num_conta1 = $_POST['num_conta1'];
    $num_conta2 = $_POST['num_conta2'];
    $valor = $_POST['valor'];
        

    $url = "http://localhost/api-controle-financeiro";

    $script = "transferenciaSave.php";

    $concat = "?";
    $incr = "&";
    $param_1 = "num_conta1=".$num_conta1;
    $param_2 = "num_conta2=".$num_conta2;
    $param_3 = "valor=".$valor;

    $url_ = $url."/".$script . $concat . $param_1 . $incr . $param_2. $incr . $param_3;

    $result = file_get_contents($url_);

    print_r(json_decode($result, 1));

?>