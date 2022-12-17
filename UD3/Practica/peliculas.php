<?php

require('clasePelicula.php');

?>

<html>
<head>
    <title>Películas</title>
    <link rel="stylesheet" href="css/estilosPeliculas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rajdhani&family=Rubik+Glitch&family=Syne+Mono&family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>

    <div class="contenedor">
    
        <div class="cabecera">
            <p class="textoCabecera">
                <?php

                ini_set('display_errors', 'On');
                ini_set('html_errors', 0);

                $p = new Pelicula(); 
                $categoria = $p->revisarCategoria();

                $titulo = '';

                if($categoria == 1){
                    $nombre = 'Terror';
                } elseif($categoria == 2){
                    $nombre = 'Ciencia-Ficción';
                }
                echo"Películas de $nombre"
                
                ?>
            </p>
        </div>

        <div class="centro">
                
            <?php
                

                $datos = $p-> obtenerDatos($categoria);
                $p->pintarPelicula($datos, $categoria);
            ?>
          
        </div>

        <div class="pie"><p class="textoPie">Clara Ruiz Ruiz - DWS</p></div>

    </div>
</body>
</html>