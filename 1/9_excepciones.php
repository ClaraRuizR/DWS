<html>
<head>
    <title>DWS Clara Ruiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">Try catch</h1>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">

                <h2>Ejercicios</h2>

                <a href="..">Volver a la carpeta</a>

            </div>

            <div class="segunda_columna">

                <p class="texto1">

                    <?php 
                        ini_set('display_errors', 'On');
                        ini_set('html_errors', 0);

                        try{
                            $x = 56;
                            echo $x/0;
                        }
                        
                        catch(DivisionByZeroError $e){
                            echo "$e";
                        }
                    ?>
                </p>

            </div>


            <div class="tercera_columna"></div>

        </div>
        <div class="tercera_caja">Clara Ruiz Ruiz - 2º DAW - Curso 22/23</div>
    <div>
</body>
</html>