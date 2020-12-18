<?php

    $numero = $_POST['numero'];
    $valor = $_POST['valor'];
        
    $url = "http://localhost/api-controle-financeiro";

    $script = "debitoSave.php";

    $concat = "?";
    $incr = "&";
    $param_1 = "numero=".$numero;
    $param_2 = "valor=".$valor;

    $url_ = $url."/".$script . $concat . $param_1 . $incr . $param_2;

    $result = file_get_contents($url_);

    print_r(json_decode($result, 1));

?>