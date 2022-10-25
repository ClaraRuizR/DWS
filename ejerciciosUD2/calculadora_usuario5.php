<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<p>EJERCICIO 5: Añade una función booleana “esPalindromo(cadena1, cadena2)”.</p>

    <?php
        require("calculadora.php");

        $calculadora1 = new Calculadora();

        $cadena1 = 'amor';
        $cadena2 = 'roma';

        $resultado5 = $calculadora1->esPalindromo($cadena1, $cadena2);
        

        if ($resultado5 == true){
            echo "Las palabras $cadena1 y $cadena2 son palíndromas.";
        } else{
            echo "Las palabras $cadena1 y $cadena2 no son palíndromas.";
        }

    ?>
</body>
</html>