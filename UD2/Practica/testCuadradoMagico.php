<?php

        require("cuadradoMagico.php");

        //ini_set('display_errors', 'On');
        //ini_set('html_errors', 0);

        /*$arrayCuadrado = [
            [4, 9, 2],
            [8, 5, 7],
            [8, 1, 2]
        ];

        $arrayCuadrado2 = [
            [4, 9, 2],
            [3, 5, 7],
            [8, 1, 6]
        ];*/

        //Pasar array que no sea cuadrado
        //Pasar un string
        //Tests que den KO
        //Tests que pinten

        function testPintarCuadradoCorrecto(){

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

        function testPintarCuadradoErroneo(){

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

        /*--------------------------------------ANALIZAR CUADRADO-------------------------------------*/
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

        

        /*------------------------------------------SUMA FILAS--------------------------------------------*/ 

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

        function testsumarFilasValorCero(){

            $arrayCuadrado = [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0]
            ];
            $resultadoEsperado = [0, 0, 0];
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

        function testsumarFilasContadorIndefinido(){

            $arrayCuadrado = [
                [4, 9, 2],
                [3, 5, 7],
                [8, 1, 6]
            ];
            $resultadoEsperado = "Error inesperado en sumarFilas, comprueba contadorArray";
            $contadorArray;
            

            try{
                sumarFilas($arrayCuadrado, $contadorArray);
            }catch (Exception $e){

                return ($e->getMessage() == $resultadoEsperado);
            }                    
        }

        
        
        /*------------------------------------------EJECUTAR TESTS--------------------------------------------*/



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
        testPintarCuadradoCorrecto();
        testPintarCuadradoErroneo();

        echo"<br>Tests analizar cuadrado<br>";
        test("testAnalizarCuadradoCorrecto");
        test("testAnalizarCuadradoErroneo");
        test("testAnalizarCuadradoPequeño");

        echo "<br><br>Tests sumar filas<br>";
        test("testsumarFilasValorCorrecto");
        test("testsumarFilasValorErroneo");


        test("testsumarFilasValorCero");
        test("testsumarFilasMatrizIndefinida");
        test("testsumarFilasContadorIndefinido");

        
