<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:16/12/2020 as 20:00
    //http://github.com/hscastro
    
        $str = "halisonsc5@gmail.com";    
        //$padrao = "/^[a-z0-9]{1,4}$/i";  
        $padrao = "/^[a-z0-9.\-\_]+@[a-z0-9.\-\_]+\.(com|org|br)$/i"; 

        if(preg_match($padrao, $str)) {
         
            echo 'válido!';
            echo "<hr>";
            echo $str;            
        
        }else{
            echo 'Invalido!';
            echo "<hr>";
            echo $str;            
        }    
    
?>