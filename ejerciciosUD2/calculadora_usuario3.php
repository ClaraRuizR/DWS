<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>EJERCICIO 3: Añade la operación “convierteBinarioDecimal(cadenaBits)”.</p>

    <?php

    require("calculadora.php");

    $calculadora1 = new Calculadora();

    $cadenaBits = '1000';

    $resultado3 = $calculadora1->convierteBinarioDecimal($cadenaBits);

    if(str_contains($resultado3, 'Error')){
        echo $resultado3;
    } else{
        echo "El número ".$cadenaBits." en decimal es ".$resultado3;
    }


    ?>
</body>
</html>