<html>
<head>
    <title>DWS Clara Ruiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">Variables super globales</h1>
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

                        function obtenerInformacion($variable){

                            $cadena='[ ';
                            foreach($variable as $key=>$val){
                                $cadena.=$key.'=>'.$val.",<br>";
                            }

                            $cadena='[ ';
                            return $cadena;
                        }
                       
                    ?>

                   
ccc

                <?php
                    //+Tarea con solución: ¿Cómo mostrar uno de los valores de una de las variables?
                    echo 'Variable $_SERVER[]'. $_SERVER["HTTP_USER_AGENT"]."<br>";

                    echo 'Variable $_SERVER'. obtenerInformacion($_SERVER);

                    //echo 'Variable $_GET'. obtenerInformacion($_GET);
                ?>


            </div>

            
       

            <!-- Ver variables globales y su uso
         $_GLOBALS
                $_GET
                $_POST
                $_REQUEST
                $_ENV

                El protocolo de una página web es sin estado: si no envias la información de una página a otra, se pierde. GET obtiene la información que viene en la URL, los parámetros de la llamada de la página vienen a partir del "?" (?parametro=valor).
            -->
            <div class="tercera_columna"></div>

        </div>
        <div class="tercera_caja">Clara Ruiz Ruiz - 2º DAW - Curso 22/23</div>
    <div>
</body>
</html>