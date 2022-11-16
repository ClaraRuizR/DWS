<html>
<head>
    <title>DWS Clara Ruiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">TÍTULO AQUÍ</h1>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">

                <h2>Ejercicios</h2>

                <a href="..">Volver a la carpeta</a>

            </div>

            <div class="segunda_columna">

                <p class="texto1">

                    <?php
                        function validarParametro(){
                            $res = "";
                            $letra = htmlspecialchars($_GET["letra"]);

                            if(isset($letra)){
                                $res = $letra;
                            }
                            return $res;
                        }
                        
                        ini_set('display_errors', 'On');
                        ini_set('html_errors', 0);
                            
                        $variable_letra = validarParametro("letra");


    

                        if ($variable_letra=="")
                        {
                            echo "Parámetro vacio";
                        }
                        else
                        {
                            require("7_funciones_y_condiciones.php"); 

                            $esVocal = esVocal($variable_letra);

                            $mensaje = 'El caracter '.$variable_letra.' ';
                            $mensaje_es_vocal = esVocal($variable_letra) ? 'es una vocal' : 'no es una vocal';
                            echo $mensaje.$mensaje_es_vocal;
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