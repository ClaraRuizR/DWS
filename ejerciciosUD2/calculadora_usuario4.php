<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>EJERCICIO 4: Añade la operación “sumaNumerosPares(array)” que devolverá la suma de los números pares del array.</p>

    <?php

        require("calculadora.php");

        $calculadora1 = new Calculadora();

        $array = [2,4,3,3,5,2,7];

        $resultado4 = $calculadora1->sumaNumerosPares($array);

        if(str_contains($resultado4, 'Error')){
            echo $resultado4;
        } else{
            echo "La suma de los números pares del array es igual a ".$resultado4;
        }
        
    ?>
</body>
</html>