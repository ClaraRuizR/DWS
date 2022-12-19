<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once('consulta.php');

    function revisarId(){
        $idPelicula = "-";
        $id= htmlspecialchars($_POST['id']);
        if(isset($id)){
            
            $idPelicula = $id;
        }

        return $idPelicula;
    }

$idPelicula = revisarId();

$q = new Consulta();

$voto = $q->sumarVoto($idPelicula);

//Query con el director y los actores

?>

<head>
    <title>Voto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Oswald:wght@300&family=Rajdhani&family=Rubik+Glitch&family=Syne+Mono&family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilosVoto.css">
</head>
<body>

    <div class='contenedor'>

        <?php

        echo "<div class='mensaje'><p class='textoMensaje'>$voto<br><a href='categoria.php' class='enlaceVolver'>Volver a la página de categorías</a></p></div>";

        ?>

    </div>

    
    
</body>
</html>





