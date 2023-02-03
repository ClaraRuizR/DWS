<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once('../Negocio/partidosNegocio.php');

$partidos = new PartidosNegocio;


$jugadorA = htmlspecialchars($_POST["jugA"]);
$jugadorB = htmlspecialchars($_POST["jugB"]);
$ronda = htmlspecialchars($_POST["ronda"]);
$idTorneo = htmlspecialchars($_POST["idTorneo"]);
$ganador = htmlspecialchars($_POST["ganador"]);
$idPartido = htmlspecialchars($_POST["idPartido"]);


$partido = [$jugadorA, $jugadorB];

if($idPartido == 0){
    //var_dump($ronda, $partido, $idTorneo, $ganador);
    $mensaje = $partidos->crearUnPartido($ronda, $partido, $idTorneo, $ganador);

} else{
    //var_dump($idPartido, $ganador);
    $mensaje = $partidos->modificarUnPartido($idPartido, $ganador);

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partido Creado</title>
</head>
<body>
    
</body>
</html>
<div id="mensaje">
            <?php
                echo "$mensaje";
            
                echo "<a href='gestionTorneosVista.php?modoCreacion=false&idTorneo=$idTorneo'>Volver a la lista de partidos</a>";
            
            ?>
        </div>

