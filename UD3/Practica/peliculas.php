<?php

    require('clasePelicula.php');
    require_once('consulta.php');

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    $p = new Pelicula();
    $q = new Consulta();
        
    $categoria = $p->revisarCategoria();
    $ordenacion = $p->revisarOrdenacion();

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

                if($ordenacion == 'def'){
                    $orden = " ";
                } else{ 
                    $valores = explode(",", $ordenacion);
                    $orden = "ORDER BY ". $valores[0] . " " . strtoupper($valores[1]);
                }

                $datos = $q-> obtenerConsultaPeliculas($categoria, $orden);

                $nombre = $q->obtenerNombreCategoria($categoria);
                     
                echo"Películas de $nombre"
                
                ?>
            </p>
        </div>

        <div class="centro">
                
            <?php
                $p->pintarPelicula($datos, $categoria);
            ?>
          
        </div>

        <div class="pie"><p class="textoPie">Clara Ruiz Ruiz - DWS</p></div>

    </div>
</body>
</html>