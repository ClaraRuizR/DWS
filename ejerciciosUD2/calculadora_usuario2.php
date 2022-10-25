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
        EJERCICIO 2: Añade la operación coeficienteBinomial(n, k) a la calculadora.
    </p>

    <?php

        require("calculadora.php");

        $calculadora1 = new Calculadora();

        $operando1 = 7;
        $operando2 = 5;

        $resultado2 = $calculadora1->coeficienteBinomial($operando1, $operando2);

        if(str_contains($resultado2, 'Error')){
            echo $resultado2;
        } else{
            echo "El coeficiente binomial de ".$operando1." y ". $operando2 . " = ".$resultado2;
        }
        
    ?>
</body>
</html>