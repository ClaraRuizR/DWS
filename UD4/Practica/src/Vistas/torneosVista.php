<?php
    require_once('../Negocio/torneosReglasNegocio.php');
    require_once('../Negocio/gestionTorneosNegocio.php');


    $torneosBL = new TorneosReglasNegocio();
    $datosTorneos = $torneosBL->obtener();

    $jug = new GestionJugadoresNegocio();
    
        
    $contador = count($datosTorneos);
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
    <title>Torneos</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="nav">
                <a href='logout.php'>Cerrar sesión</a>
            
                <a href='gestionTorneosVista.php?modoCreacion=true&idTorneo=0'>Crear torneo</a>
            </div>
            <h1>Lista de torneos</h1>
        </header>
        <div class="cuerpo">
            <table>
                
                <?php
                echo "<p>Número de registros: $contador</p><br>";
                ?>
                
                
                <tr>
                    <th>ID</th>
                    <th>Nombre del torneo</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Campeón</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                    

                    foreach ($datosTorneos as $torneo)
                    {
                        echo "<tr>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        print($torneo->getID());
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        print($torneo->getNombre());
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        print($torneo->getFecha());
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        print($torneo->getEstado());
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";

                        $idGanador = $torneo->getGanador();
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
                        echo "<a href='gestionTorneosVista.php?modoCreacion=false&idTorneo=".$torneo->getID()."'>Editar torneo</a>";
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p id='dato'>";
                        echo "<a href='torneosVista.php'>Borrar</a>";
                        echo "</p>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    
                    echo "</table>";

                    
               
               ?>
               
            
        </div>
        <footer></footer>
    </div>
    
    
</body>
</html>