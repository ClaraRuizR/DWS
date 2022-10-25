<?php

    class Calculadora{

        public function factorialWhile($operando1){

            try{
                if ($operando1==0){
                    return 1;
                } elseif ($operando1>0) {
                                        
                    $resultado = 1;
        
                    while ($operando1 > 0){
                        $resultado = $resultado * $operando1;
                        $operando1 = $operando1 - 1;
                    }
                           
                    return $resultado;
        
                } else{
                    return 'Error: el valor de x ha de ser >=0.';
                }

            }catch(TypeError){
                return 'Error: debes introducir un número';
            }        
            
        }

        public function coeficienteBinomial($operando1, $operando2){
            try{
                $diferencia = $operando1 - $operando2;
                $factorialN = $this->factorialWhile($operando1);
                $factorialK = $this->factorialWhile($operando2);
                $factorialDiferencia = $this->factorialWhile($diferencia);

                $resultado = $factorialN / ($factorialK * $factorialDiferencia);

            }catch(TypeError){
                return 'Error: debes introducir un número';
            }  

            return $resultado;
        }

        

       public function convierteBinarioDecimal($cadenaBits){

            $contadorCadena = strlen($cadenaBits);
            $resultado = 0;

            try{
                for ($i=1; $i <= $contadorCadena; $i++){
                    $bits = substr($cadenaBits, -($i), 1);
    
                    if ($bits == '1'){
                        $potencia = 2 ** ($i-1);
                        $resultado = $resultado + $potencia;
                    } elseif ($bits == '0'){
                        continue;
                    } else{
                        return 'Error: debes introducir una cadena únicamente con 0 y 1.';
                    }
                }
            }catch(TypeError){
                return 'Error: debes introducir una cadena';
            }  

            return $resultado;
        }

        public function sumaNumerosPares($array){
            $resultado = 0;
            $contadorArray= count($array);

            try{
                for ($i=0; $i < $contadorArray; $i++){
                
                    if ($array[$i] % 2 == 0){
                        $resultado = $resultado + $array[$i];
                    }
                }
            }catch(TypeError){
                return 'Error: debes introducir un array de números.';
            }
            

            return $resultado;
        }

        public function esPalindromo($cadena1, $cadena2){
            $contadorCadena1 = strlen($cadena1);
            $contadorCadena2 = strlen($cadena2);
            $letrasIguales = false;

                
            if($contadorCadena1 == 0 || $contadorCadena2 == 0){
                return 'Error, la cadena no puede estar vacía.';

            }elseif ($contadorCadena1 != $contadorCadena2){
                
                $letrasIguales = false;
    
            }else { 
                for ($i = 0; $i < $contadorCadena1; $i++){
                        
                    if(substr($cadena1, -($i+1), 1) !== substr($cadena2, $i, 1)){
                        return false;
    
                    }
                }
            }

            return true;         
        }

        public function sumaMatrices($primeraMatriz, $segundaMatriz){
            try{
                $matrizResultado = [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]];
            
                for($i = 0; $i < count($primeraMatriz); $i++){
                    for($j = 0; $j < count($primeraMatriz[$i]); $j++){
                        $matrizResultado[$i][$j] = $primeraMatriz[$i][$j] + $segundaMatriz[$i][$j];
                    }
                }
    
                
            }catch(TypeError){
                return 'Error: debes introducir un array de números.';
            }

            return $matrizResultado;
            

        }

    }