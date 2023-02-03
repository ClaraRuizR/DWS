<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo</title>
</head>
<body>
    <div id="contenedor">
    <?php
    require_once('../Negocio/gestionTorneosNegocio.php');
    require_once('../Negocio/partidosNegocio.php');

    $idPartido = htmlspecialchars($_GET["idPartido"]);
    
    $partidos = new PartidosNegocio;

    $jugadores = new GestionJugadoresNegocio;
    $listaJugadores = $jugadores->obtener();

    $idTorneo = htmlspecialchars($_GET["idTorneo"]);
    $modoEdicion = htmlspecialchars($_GET["modoEdicion"]);

    if($idPartido == 0){
        echo "<form action='partidoCreadoVista.php' method='POST' id='formularioPartido'>";
        
        echo "<label for='jugA'>Jugador A</label>";
        echo "<select id='jugA' name='jugA'>";
        foreach ($listaJugadores as $jugador){
            echo "<option value='".$jugador->getID()."'>".$jugador->getNombre()."</option>";
        }
        echo "</select>";
    
        echo "<label for='jugA'>Jugador B</label>";
        echo "<select id='jugB' name='jugB'>";
        foreach ($listaJugadores as $jugador){
            echo "<option value='".$jugador->getID()."'>".$jugador->getNombre()."</option>";
        }
        echo "</select>";
    
        echo "<label for='ronda'>Ronda</label>";
        echo "<select id='ronda' name='ronda'>";
        echo "<option value='Cuartos'>Cuartos</option>";
        echo "<option value='Semifinales'>Semifinales</option>";
        echo "<option value='Final'>Final</option>";
        echo "</select>";

        echo "<label for='ganador'>Ganador</label>";
        echo "<select id='ganador' name='ganador'>";
        echo "<option value='0'>Sin ganador</option>";
        foreach ($listaJugadores as $jugador){
            echo "<option value='".$jugador->getID()."'>".$jugador->getNombre()."</option>";
        }
        echo "</select>";
        echo "<input name='idTorneo' type='hidden' value='$idTorneo'>";
        echo "<input name='idPartido' type='hidden' value='$idPartido'>";

        echo "<input type='submit' value='Guardar'>";
    
        echo "<form>";
    }

    if($modoEdicion=='true'){
        $elPartido = $partidos->buscarUnPartido($idPartido);
        $ronda = $elPartido->getRonda();

        $idJugA = $elPartido->getJugadorA();
        $idJugB = $elPartido->getJugadorB();

        $jugadorA = $jugadores->buscarJugador($idJugA);
        $jugadorB = $jugadores->buscarJugador($idJugB);

        echo "<form action='partidoCreadoVista.php' method='POST' id='formularioPartido'>";
        
        echo "<label for='jugadorA'>Jugador A: </label>";
        echo "<p class='jugadorA'>";
        print($jugadorA->getNombre());
        echo "</p>";

        echo "<label for='jugadorB'>Jugador B: </label>";
        echo "<p class='jugadorB'>";
        print($jugadorB->getNombre());
        echo "</p>";
    
        echo "<label for='ronda'>Ronda: </label>";
        echo "<p class='ronda'>$ronda</p>";

        echo "<label for='ganador'>Ganador</label>";
        echo "<select id='ganador' name='ganador'>";
        echo "<option value='sinGanador'>Sin ganador</option>";
        echo "<option value='".$jugadorA->getID()."'>".$jugadorA->getNombre()."</option>";
        echo "<option value='".$jugadorB->getID()."'>".$jugadorB->getNombre()."</option>";
        echo "</select>";

        echo "<input name='jugA' type='hidden' value='$idJugA'>";
        echo "<input name='jugB' type='hidden' value='$idJugB'>";
        echo "<input name='ronda' type='hidden' value='$ronda'>";
        echo "<input name='idTorneo' type='hidden' value='$idTorneo'>";
        echo "<input name='idPartido' type='hidden' value='$idPartido'>";
        echo "<input type='submit' value='Guardar'>";
    
        echo "<form>";
    }

    
    ?>
        
    </div>

</body>
</html>