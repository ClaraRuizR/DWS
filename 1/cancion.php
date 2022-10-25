<?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    $cadena = 'Una mosca volava per la llum';

    $vocales = ["a", "e", "i", "o", "u"];

    

    echo $cadena." // ";
    
    $fraseCambiada = escribirFrase($cadena, $vocales);
    
    echo $fraseCambiada;

    function escribirFrase($cadena, $vocales){

        $contadorCadena = strlen($cadena);
        $contadorVocales = count ($vocales);
        $letra = '';

        
        for ($i = 0; $i < $contadorVocales; $i++){
            for($j = 0; $j < $contadorCadena; $j++){
                $letra = substr($cadena, $j, 1);
                $esVocal = esVocal($letra);
                
                if($esVocal == true){
                    $letra = $vocales[$i];
                    
                }
                echo $letra;
            }

            echo" // ";
            
        }
    }

    function esVocal($letra){
        if($letra == 'a' || $letra == 'e'|| $letra == 'i' || $letra == 'o' || $letra == 'u'){
            return true;
        } else {
            return false;
        }
    }