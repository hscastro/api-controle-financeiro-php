<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:16/12/2020 as 14:00 - 16:20
    //http://github.com/hscastro
    
        //$str = "({[()]})"; 
        $str = "[{()}][(){}]";        
        //$str = "{[]}";  tamanho 4 / 2 = 2
        //$padrao = "/^[a-z0-9]{1,4}$/i";  
        $padrao = "/^[{\[\(]{1,7}+[)\]\}]{1,7}$/i"; 
        $tamnho = strlen($str);
        $t = $tamnho;
        $s1;
        $s2;
        
        if($tamnho%2==1){
            echo 'Invalido!';
            echo "<hr>";
            echo $str;               
        }else{

            if(preg_match($padrao, $str)) {

                for($i= 0; $i < $tamnho/2; $i++){
                    $s1 .= $str[$i];
                    $s2 = $str[$t-1]; 
                    $str[$t-1] = $s2;
                    $s2 .= $str[$t];
                    $t--;                
                }

                $s1 = $s1.$s2;

                if($s1 === $str){
                   echo 'válido!';
                   echo "<hr>";
                   echo $str;   
                }

            }

            echo 'válido!';
            echo "<hr>";
            echo $str;        
        }
   
    
?>