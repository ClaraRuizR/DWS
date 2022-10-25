<?php 
  /*Funcion que devuelve la posición en la que está uno de los números del array*/
    $numeros = [1,7,2,4,3,4,5,6,7,8,9];

    $numero = 7;

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    

    function buscarPosicion($num, $arrayNumeros){

        $contador = count($arrayNumeros);
        $i=0;
        while ($i < $contador){
            if($arrayNumeros[$i]==$num){
                return $i;
            }else{
                $i++;
            }
            
        }

    }
    $posicion = buscarPosicion($numero, $numeros);

    if ($posicion!=-1){
        echo "El número $numero se encuentra en la posición ".$posicion.".";
    }else{
        echo 'No se ha encontrado el numero';
    }
?>