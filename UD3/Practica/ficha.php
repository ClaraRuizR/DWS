<?php
        require('claseFicha.php');

        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);

        $f = new Ficha();

        $idPelicula = $f->revisarId();

        $ficha = $f->obtenerDatosFicha($idPelicula);

    ?>

<head>
    <title>Ficha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Oswald:wght@300&family=Rajdhani&family=Rubik+Glitch&family=Syne+Mono&family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilosFichas.css">
</head>
<body>

    <div class='contenedor'>
        
        <?php 
            $f->pintarFicha($ficha);
        ?>

        <div class="pie"><p class="textoPie">Clara Ruiz Ruiz - DWS</p></div>

    </div>

    
    
</body>
</html>