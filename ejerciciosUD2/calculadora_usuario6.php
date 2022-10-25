<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>EJERCICIO 6: Añade una operación sumaMatrices(primera_matriz, segunda_matriz) y devuelva una matriz. Los 2 parámetros tendrán el mismo número de filas y columnas.</p>
    <?php
        require("calculadora.php");

        $calculadora1 = new Calculadora();

        $primeraMatriz = [
            [2, 3, 5],
            [8, 4, 6],
            [3, 0, 7]
        ];
        $segundaMatriz = [
            [1, 3, 2],
            [0, 5, 4],
            [9, 2, 6]
        ];

        $resultado6 = $calculadora1->sumaMatrices($primeraMatriz, $segundaMatriz);

        if(is_array($resultado6)){
            echo "El resultado de la suma de las matrices es el siguiente:<br>";

            for($i = 0; $i < count($resultado6); $i++){
                for($j = 0; $j < count($resultado6[$i]); $j++){
                    echo $resultado6[$i][$j]." ";
                }
            echo "<br>";
            }
        }
        else{
            echo $resultado6;
        }

    ?>
</body>
</html>