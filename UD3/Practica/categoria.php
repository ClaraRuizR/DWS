<?php

require('claseCategoria.php');

?>


<html>
<head>
    <title>Categoría</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/estilosCategorias.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rajdhani&family=Rubik+Glitch&family=Syne+Mono&family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor">

        <div class="centro">
            <div class='textoCartelera'>
                <h1 class='tituloCartelera'>CARTELERA</h1>
                <p class='subtituloCartelera'>Elige la categoría que quieres ver:</p>

                <?php

                ini_set('display_errors', 'On');
                ini_set('html_errors', 0);

                $c = new Categoria();

                $datos = $c->obtenerDatos();
                
                $c->pintarCategoria($datos);

                ?>
            </div>        
        </div>

        <div class="pie"><p class="textoPie">Clara Ruiz Ruiz - DWS</p></div>
    </div>
</body>
</html>