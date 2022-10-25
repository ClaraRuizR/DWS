<html>
<head>
    <title>DWS Clara Ruiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">Constantes</h1>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">

                <h2>Ejercicios</h2>

                <a href="..">Volver a la carpeta</a>

            </div>
            <div class="segunda_columna">
               
                <?php 

                    $personas = ["Carlos", "Oscar", "Jose"];

                    
                ?>

                <ul>

                    <?php

                       define ("MAX_VALUE" , 10);

                       echo "el valor de la constante MAX_VALUE es: ".MAX_VALUE."<br>";

                       const MIN_VALUE = 1;

                       echo "el valor de la constante MIN_VALUE es: ".MIN_VALUE."<br>";

                    ?>

                   

                </ul>


            </div>
            <div class="tercera_columna"></div>

        </div>
        <div class="tercera_caja">Clara Ruiz Ruiz - 2º DAW - Curso 22/23</div>
    <div>
</body>
</html>