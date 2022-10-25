<html>
<head>
    <title>DWS Clara Ruiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">Variables y tipos</h1>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">

                <h2>Ejercicios</h2>

                <a href="..">Volver a la carpeta</a>

            </div>
            <div class="segunda_columna">
                <p class="texto1">
                    <?php 
                       $numero_entero = 5;
                       $numero_flotante = 6.5;
                       $cadena = "hi";
                       $booleano = false;

                       echo gettype($numero_entero)." ".$numero_entero . "<br>";
                       echo gettype($numero_flotante)." ".$numero_flotante . "<br>";
                       echo gettype($cadena)." ".$cadena . "<br>";
                       echo gettype($x)." ".$booleano . "<br>";

                    
                    ?>
                </p>
            </div>
            <div class="tercera_columna"></div>

        </div>
        <div class="tercera_caja">Clara Ruiz Ruiz - 2º DAW - Curso 22/23</div>
    <div>
</body>
</html>