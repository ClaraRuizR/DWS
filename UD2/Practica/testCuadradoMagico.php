<?php

        require("cuadradoMagico.php");

        //ini_set('display_errors', 'On');
        //ini_set('html_errors', 0);


        function testPintarCuadrado1(){

            $arrayCuadrado = [
                [4, 9, 2],
                [3, 5, 7],
                [8, 1, 6]
            ];

            $filas = [15,15,15];
            $columnas = [15,15,15];
            $diagonales = [15, 15];

            $resultado = analizarCuadradoMagico($arrayCuadrado);
            pintarCuadradoMagico($resultado);

        }

        function testPintarCuadrado2(){

            $arrayCuadrado = [
                [4, 9, 2],
                [8, 5, 7],
                [8, 1, 2]
            ];

            $filas = [15,15,15];
            $columnas = [15,15,15];
            $diagonales = [15, 15];

            $resultado = analizarCuadradoMagico($arrayCuadrado);
            pintarCuadradoMagico($resultado);

        }
        
        function testAnalizarCuadradoCorrecto(){

            $arrayCuadrado = [
                [4, 9, 2],
                [3, 5, 7],
                [8, 1, 6]
            ];

            $filas = [15,15,15];
            $columnas = [15,15,15];
            $diagonales = [15, 15];

            $resultadoEsperado = new CuadradoMagico(true, $filas, $columnas, $diagonales, $arrayCuadrado, 15);

            $resultado = analizarCuadradoMagico($arrayCuadrado);

            return ($resultado == $resultadoEsperado);
        }

        function testAnalizarCuadradoErroneo(){

            $arrayCuadrado = [
                [4, 9, 2],
                [8, 5, 7],
                [8, 1, 2]
            ];

            $filas = [15,15,15];
            $columnas = [15,15,15];
            $diagonales = [15, 15];

            $resultadoEsperado = new CuadradoMagico(true, $filas, $columnas, $diagonales, $arrayCuadrado, 15);

            $resultado = analizarCuadradoMagico($arrayCuadrado);

            return ($resultado == $resultadoEsperado);
        }

        function testAnalizarCuadradoPequeño(){

            $arrayCuadrado = [[4]];

            $filas = [4];
            $columnas = [4];
            $diagonales = [4, 4];

            $resultadoEsperado = new CuadradoMagico(true, $filas, $columnas, $diagonales, $arrayCuadrado, 4);

            $resultado = analizarCuadradoMagico($arrayCuadrado);

            return ($resultado == $resultadoEsperado);
        }

        function testsumarFilasValorCorrecto(){

            
            $arrayCuadrado = [
                [4, 9, 2],
                [3, 5, 7],
                [8, 1, 6]
            ];
            
            $resultadoEsperado = [15, 15, 15];
            $contadorArray = count($arrayCuadrado);
            
            $resultado = sumarFilas($arrayCuadrado, $contadorArray);
            
            return ($resultado == $resultadoEsperado);
        }

        function testsumarFilasValorErroneo(){

            $arrayCuadrado = [
                [4, 9, 2],
                [8, 5, 7],
                [8, 1, 2]
            ];

            $resultadoEsperado = [15, 15, 15];
            $contadorArray = count($arrayCuadrado);
            
            $resultado = sumarFilas($arrayCuadrado, $contadorArray);
            
            return ($resultado == $resultadoEsperado);
        }

        function testsumarFilasMatrizIndefinida(){

            $arrayCuadrado;
            $resultadoEsperado = "Error inesperado en sumar filas, comprueba arrayCuadrado";
            $contadorArray = 1;

            try{
                sumarFilas($arrayCuadrado, $contadorArray);
            }catch (Exception $e){

                return ($e->getMessage() == $resultadoEsperado);
            }                    
        }

        function testsumarColumnasValorCorrecto(){

            
            $arrayCuadrado = [
                [4, 9, 2],
                [3, 5, 7],
                [8, 1, 6]
            ];
            
            $resultadoEsperado = [15, 15, 15];
            $contadorArray = count($arrayCuadrado);
            
            $resultado = sumarColumnas($arrayCuadrado, $contadorArray);
            
            return ($resultado == $resultadoEsperado);
        }

        function testsumarColumnasValorErroneo(){

            $arrayCuadrado = [
                [4, 9, 2],
                [8, 5, 7],
                [8, 1, 2]
            ];

            $resultadoEsperado = [15, 15, 15];
            $contadorArray = count($arrayCuadrado);
            
            $resultado = sumarColumnas($arrayCuadrado, $contadorArray);
            
            return ($resultado == $resultadoEsperado);
        }

        function testsumarColumnasMatrizIndefinida(){

            $arrayCuadrado;
            $resultadoEsperado = "Error inesperado en sumar filas, comprueba arrayCuadrado";
            $contadorArray = 1;

            try{
                sumarColumnas($arrayCuadrado, $contadorArray);
            }catch (Exception $e){

                return ($e->getMessage() == $resultadoEsperado);
            }                    
        }


        function testsumarDiagonalesValorCorrecto(){

            
            $arrayCuadrado = [
                [4, 9, 2],
                [3, 5, 7],
                [8, 1, 6]
            ];
            
            $resultadoEsperado = [15, 15];
            $contadorArray = count($arrayCuadrado);
            
            $resultado = sumarDiagonales($arrayCuadrado, $contadorArray);
            
            return ($resultado == $resultadoEsperado);
        }

        function testsumarDiagonalesValorErroneo(){

            $arrayCuadrado = [
                [4, 9, 2],
                [8, 5, 7],
                [8, 1, 2]
            ];

            $resultadoEsperado = [15, 15];
            $contadorArray = count($arrayCuadrado);
            
            $resultado = sumarDiagonales($arrayCuadrado, $contadorArray);
            
            return ($resultado == $resultadoEsperado);
        }

        function testsumarDiagonalesMatrizIndefinida(){

            $arrayCuadrado;
            $resultadoEsperado = "Error inesperado en sumar filas, comprueba arrayCuadrado";
            $contadorArray = 1;

            try{
                sumarDiagonales($arrayCuadrado, $contadorArray);
            }catch (Exception $e){

                return ($e->getMessage() == $resultadoEsperado);
            }                    
        }
        




        function test($testEjecutar){
            try {
                echo "<br>";
                $resultadoTest = $testEjecutar();
                $mensaje = 'El test: '.$testEjecutar.' ';
                $mensajeResultado = $resultadoTest ? 'OK' : 'KO';
                echo $mensaje.$mensajeResultado;

            }
            catch(Exception $e){
                echo "<br>"."Se ha producido una excepción al ejecutar:".$testEjecutar."<br>";

            } 
        }

        echo"<br>Test pintar cuadrado<br>";
        testPintarCuadrado1();
        testPintarCuadrado2();

        echo"<br>-------------------------------------------------------------------------------";

        echo"<br><br>Tests analizar cuadrado<br>";
        test("testAnalizarCuadradoCorrecto");
        test("testAnalizarCuadradoErroneo");
        test("testAnalizarCuadradoPequeño");

        echo"<br>-------------------------------------------------------------------------------";

        echo "<br><br>Tests sumar filas<br>";
        test("testsumarFilasValorCorrecto");
        test("testsumarFilasValorErroneo");
        test("testsumarFilasMatrizIndefinida");

        echo"<br>-------------------------------------------------------------------------------";

        echo "<br><br>Tests sumar columnas<br>";
        test("testsumarColumnasValorCorrecto");
        test("testsumarColumnasValorErroneo");
        test("testsumarColumnasMatrizIndefinida");

        echo"<br>-------------------------------------------------------------------------------";

        echo "<br><br>Tests sumar diagonales<br>";
        test("testsumarDiagonalesValorCorrecto");
        test("testsumarDiagonalesValorErroneo");
        test("testsumarDiagonalesMatrizIndefinida");


        
