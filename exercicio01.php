<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:16/12/2020 as 20:00
    //http://github.com/hscastro
    
    function validarCaracteres($str){
        
        $contador = 0;
        $tamanho = strlen($str);
        $newString;

        for($i = 0; $i < $tamanho; $i++){

            if(preg_match('/^[ }(-[{-{(-]} ]+/', $str[$i])) {
                $contador+=1; 
                $newString .= $str[$i];
            }         
        }


        if($contador > 1 &&  $newString == $str){
            echo 'válidos';
        
        }else{
            echo 'InValido!';
        }            
           
    }    

    $str_ = "{}";
    $teste = validarCaracteres($str_);
    echo $teste;

?>