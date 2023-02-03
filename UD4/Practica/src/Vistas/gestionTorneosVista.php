<?php
    require_once('../Negocio/partidosNegocio.php');
    require_once('../Negocio/gestionTorneosNegocio.php');

    $idTorneo = htmlspecialchars($_GET["idTorneo"]);

    $partidosBD = new PartidosNegocio();
    
    $datosPartidos = $partidosBD->buscarPartidosPorTorneo($idTorneo);

    $jug = new GestionJugadoresNegocio();
    $contador = count($datosPartidos);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/torneos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>partidos</title>
</head>
<body>
    <div class="contenedor">
        <?php
            $modoCreacion = htmlspecialchars($_GET["modoCreacion"]);
    
            if($modoCreacion == 'true'){
                echo "<form action='torneoCreadoVista.php' method='POST' id='formularioCrearTorneo'>";
        
                echo "<label for='nombre'>Nombre</label>";
                echo "<input type='text' id='nombre' name='nombre'>";
                echo "<label for='fecha'>Fecha</label>";
                echo "<input type='text' id='fecha' name='fecha'>";
                echo "<input type='submit' value='Crear torneo'>";
            }else{
        ?>
        <header>
            <div class="nav">
                <a href='logout.php'>Cerrar sesión</a>
                <?php
                echo "<a href='resultadoPartidaVista.php?modoEdicion=false&idPartido=0&idTorneo=$idTorneo'>Crear partido</a>";
                ?>
            </div>
            <h1>Lista de partidos</h1>
        </header>
        <div class="cuerpo">
            <table>
                
                <?php
                echo "<p>Número de registros: $contador</p><br>";
                ?>
                
                
                <tr>
                    <th>ID</th>
                    <th>Jugador A</th>
                    <th>Jugador B</th>
                    <th>Ronda</th>
                    <th>Ganador</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    

                    foreach ($datosPartidos as $partido)
                    {
                        echo "<tr>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        print($partido->getID());
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        $idJA = $partido->getJugadorA();
                        $jugA = $jug->buscarJugador($idJA);
                         print($jugA->getNombre());
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        $idJB = $partido->getJugadorB();
                        $jugB = $jug->buscarJugador($idJB);
                        print($jugB->getNombre());
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        print($partido->getRonda());
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";

                        $idGanador = $partido->getGanador();
                        if($idGanador == 0){
                            print("-");
                        } else{
                            $ganador = $jug->buscarJugador($idGanador);
                            print($ganador->getNombre());
                        }

                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        echo "<a href='resultadoPartidaVista.php?modoEdicion=true&idPartido=".$partido->getID()."&idTorneo=$idTorneo'>Editar partido</a>";
                        echo "</p>";
                        echo "</td>";
                        echo "<td>";
                        echo "<p id='dato'>";
                        echo "<a href='tgestionpartidosVista.php'>Borrar</a>";
                        echo "</p>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    
                    echo "</table>";

                    
               
               ?>
               
            
        </div>
            <?php
            }
            ?>
        <footer></footer>
    </div>
    
    
</body>
</html>