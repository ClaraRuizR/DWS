<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo</title>
</head>
<body>
    <?php
    require_once('../Negocio/torneosReglasNegocio.php');

    $torneo = new TorneosReglasNegocio();

    $n = htmlspecialchars($_POST["nombre"]);
    $f = htmlspecialchars($_POST["fecha"]);

    $mensaje = $torneo->crearTorneo($n, $f);

    $torneos = $torneo->obtener();
    $torneoCreado = end($torneos);
    $id = $torneoCreado-> getId();

    $partidos = $torneo->crearPartidosCuartos($id);
    
    ?>
    
    <div id="contenedor">
        <div id="mensaje">
            <?php
                echo "$mensaje";
            
                echo "<a href='torneosVista.php'>Volver a la lista de torneos</a>";
                echo "<a href='gestionTorneosVista.php?modoCreacion=false&idTorneo=$id'>Ver el torneo</a>";
            ?>
        </div>
    </div>

</body>
</html>