<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        EJERCICIO 1: Crea 2 ficheros PHP. Uno se ha de llamar “calculadora_usuario.php” y el otro “calculadora.php”. Dentro del fichero “calculadora.php”, define una clase “calculadora”. Prueba todos los ejercicios invocando los métodos de la clase
        “calculadora” desde “calculadora_usuario.php”. Añade la operación factorial de X a la calculadora.
    </p>
    <?php

        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);

        $operando1 = 7;

        require("calculadora.php");

        $calculadora1 = new Calculadora();

        $resultado = $calculadora1->factorialWhile($operando1);

        if(str_contains($resultado, 'Error')){
            echo $resultado;
        } else{
            echo $operando1." != ".$resultado;
        }
        
    ?>
</body>
</html>


    