<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadrado mágico</title>
    <link rel="stylesheet" href="css/estilos_cuadrado_magico.css">

</head>

<body>

    <?php

        require("objetoCuadradoMagico.php");


        //ini_set('display_errors', 'On');
        //ini_set('html_errors', 0);

        $arrayCuadrado = [
            [4, 9, 2],
            [3, 5, 7],
            [8, 1, 6]
        ];

        
        //$cuadrado1 = analizarCuadradoMagico($arrayCuadrado);
        //pintarCuadradoMagico($cuadrado1);
        
        function analizarCuadradoMagico($arrayCuadrado){
            $contadorArray = count($arrayCuadrado);
            $primerResultado = 0;
            
            for ($i = 0; $i < $contadorArray; $i++){
                $primerResultado = $primerResultado + $arrayCuadrado[0][$i];
            }

            $resultadoFilas = sumarFilas($arrayCuadrado, $contadorArray);
            $resultadoColumnas = sumarColumnas($arrayCuadrado, $contadorArray);
            $resultadoDiagonales = sumarDiagonales($arrayCuadrado, $contadorArray);

            $esCuadradoMagico = true;

            for($i = 0; $i < count($resultadoFilas); $i++){

                if($resultadoFilas[$i] != $primerResultado){
                    $esCuadradoMagico = false;
                }

                if($resultadoColumnas[$i] != $primerResultado){
                    $esCuadradoMagico = false;
                }

                for($i = 0; $i < count($resultadoDiagonales); $i++){

                    if($resultadoDiagonales[$i] != $primerResultado){
                        $esCuadradoMagico = false;
                    }
                }
            }

            $cuadrado1 = new CuadradoMagico($esCuadradoMagico, $resultadoFilas, $resultadoColumnas, $resultadoDiagonales, $arrayCuadrado, $primerResultado);

            return $cuadrado1;

        }

        function sumarFilas($arrayCuadrado, $contadorArray){
            if(!isset($arrayCuadrado)){
                throw new Exception("Error inesperado en sumar filas, comprueba arrayCuadrado");
            }

                $arrayResultado = [];

                for ($i = 0; $i < $contadorArray; $i++){
                    $resultado = 0;
                    $j;
                
                    for($j = 0; $j < $contadorArray; $j++){
                        $resultado = $resultado + $arrayCuadrado[$i][$j];
                    }
                
                    array_push($arrayResultado, $resultado);
                
                }
                
                return $arrayResultado;
            

            
        }

        function sumarColumnas($arrayCuadrado, $contadorArray){

            if(!isset($arrayCuadrado)){
                throw new Exception("Error inesperado en sumar filas, comprueba arrayCuadrado");
            }

            $arrayResultado = [];

            for ($i = 0; $i < $contadorArray; $i++){
                $resultado = 0;
                for($j = 0; $j < $contadorArray; $j++){
                    $resultado = $resultado + $arrayCuadrado[$j][$i];
                }
                array_push($arrayResultado, $resultado);
            }

            return $arrayResultado;

        }

        function sumarDiagonales($arrayCuadrado, $contadorArray){

            if(!isset($arrayCuadrado)){
                throw new Exception("Error inesperado en sumar filas, comprueba arrayCuadrado");
            }

            $arrayResultado = [];
            $resultado = 0;

            for ($i = 0; $i < $contadorArray; $i++){
                $resultado = $resultado + $arrayCuadrado[$i][$i];
            }

            array_push($arrayResultado, $resultado);

            $resultado = 0;
            $j = $contadorArray-1;
            for ($i = 0; $i < $contadorArray; $i++){

                $resultado = $resultado + $arrayCuadrado[$i][$j];
                $j--;

            }
            array_push($arrayResultado, $resultado);

            return $arrayResultado;
        }
        
        function pintarCuadradoMagico($cuadrado1){

            $contadorArray = count($cuadrado1->arrayCuadrado);

            echo "<div><h1>Cuadrado mágico</h1></div>";

            if($cuadrado1->esCuadradoMagico){
                echo "<table id='verde'>";
            } else{
                echo "<table id='rojo'>";
            }

            for($i = 0; $i < $contadorArray; $i++){
                echo "<tr>";

                for($j = 0; $j < $contadorArray; $j++){
                    echo "<td><p>".$cuadrado1->arrayCuadrado[$i][$j]."</p></td>";
                }

                echo "</tr>";
            }
            
            echo "<table>";

            if($cuadrado1->esCuadradoMagico){
                echo "<p id='texto_verde'>ES UN CUADRADO MÁGICO</p>";
                echo"<div id='analisis'>Respecto a la suma de la primera fila, que es $cuadrado1->primerResultado:
                <br><br>Las filas iguales a $cuadrado1->primerResultado son:<br>";

                for($i = 0; $i < count($cuadrado1->resultadoFilas); $i++){
                    if($cuadrado1->resultadoFilas[$i] == $cuadrado1->primerResultado){
                        echo "Fila ".($i+1)."<br>";
                    }                  
                }

                echo"<br>Las columnas iguales a $cuadrado1->primerResultado son:<br>";

                for($i = 0; $i < count($cuadrado1->resultadoColumnas); $i++){
                    if($cuadrado1->resultadoColumnas[$i] == $cuadrado1->primerResultado){
                        echo "Columna ".($i+1)."<br>";
                    }    
                }

                echo"<br>Las digonales iguales a $cuadrado1->primerResultado son:<br>";

                for($i = 0; $i < count($cuadrado1->resultadoDiagonales); $i++){
                    if($cuadrado1->resultadoDiagonales[$i] == $cuadrado1->primerResultado && $i == 0){
                        echo "Primera diagonal";
                    }
                    if ($cuadrado1->resultadoDiagonales[$i] == $cuadrado1->primerResultado && $i == 1){
                        echo "<br>Segunda diagonal";
                    }
                }
                
                echo"</div>";


            } else{
                echo "<p id='texto_rojo'>NO ES UN CUADRADO MÁGICO</p>";

                echo"<div id='analisis'>Respecto a la suma de la primera fila, que es $cuadrado1->primerResultado:
                <br><br>Las filas diferentes a $cuadrado1->primerResultado son:<br>";

                for($i = 0; $i < count($cuadrado1->resultadoFilas); $i++){
                    if($cuadrado1->resultadoFilas[$i] != $cuadrado1->primerResultado){
                        echo "Fila ".($i+1)."<br>";
                    }                  
                }

                echo"<br>Las columnas distintas a $cuadrado1->primerResultado son:<br>";

                for($i = 0; $i < count($cuadrado1->resultadoColumnas); $i++){
                    if($cuadrado1->resultadoColumnas[$i] != $cuadrado1->primerResultado){
                        echo "Columna ".($i+1)."<br>";
                    }    
                }

                echo"<br>Las digonales distintas a $cuadrado1->primerResultado son:<br>";

                for($i = 0; $i < count($cuadrado1->resultadoDiagonales); $i++){
                    if($cuadrado1->resultadoDiagonales[$i] != $cuadrado1->primerResultado && $i == 0){
                        echo "Primera diagonal";
                    }
                    if ($cuadrado1->resultadoDiagonales[$i] != $cuadrado1->primerResultado && $i == 1){
                        echo "<br>Segunda diagonal";
                    }
                }
                
                echo"</div>";
            }

        }

    ?>
</body>
</html>