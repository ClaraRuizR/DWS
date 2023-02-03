<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../../css/partidos.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
     <title>Torneo</title>
</head>
<body>
     
    <div class="contenedor">
          <a href='logout.php'>Cerrar sesión</a>
          <?php

          ini_set('display_errors', 'On');
          ini_set('html_errors', 0);
          require_once('../Negocio/gestionTorneosNegocio.php');
          require_once('../Negocio/partidosNegocio.php');
          require_once('../Negocio/torneosReglasNegocio.php');    

          $idTorneo = htmlspecialchars($_GET["id"]);

               $jugadores = new GestionJugadoresNegocio();
               $datosJugadores = $jugadores->obtener();

               $partidos = new PartidosNegocio();
               $partidosTorneo = $partidos->buscarPartidosPorTorneo($idTorneo);

               $torneos = new TorneosReglasNegocio();
               $torneo = $torneos->buscarTorneo($idTorneo);
               $nombreTorneo = $torneo->getNombre();
     
               echo "<header>";
               echo "<h1>$nombreTorneo</h1>";

               echo "</header>";
     ?>
        <div class="cabeceraFases">
          <div class="faseCabecera">Cuartos</div>
          <div class="separadorCabecera"></div>

          <div class="faseCabecera">Semifinales</div>
          <div class="separadorCabecera"></div>

          <div class="faseCabecera">Final</div>
          <div class="separadorCabecera"></div>

          <div class="faseCabecera">Campeón</div>
        </div>
        <div class="cuerpo">
           <div class="fase">
               <?php

               foreach ($partidosTorneo as $partido){
                    $idJugadorA = $partido->getJugadorA();
                    $idJugadorB = $partido->getJugadorB();

                    $jugadorA = $jugadores->buscarJugador($idJugadorA);
                    $jugadorB = $jugadores->buscarJugador($idJugadorB);

                    echo"<div class='partidoCuartos'>";
                    echo"<div class='jugador'>";
                    print($jugadorA->getNombre());
                    echo"</div>";
                    echo"<div class='jugador'>";
                    print($jugadorB->getNombre());
                    echo"</div>";
                    echo"</div>";
               }

               echo "</div>";
               echo "<div class='separador'></div>";
               echo "<div class='fase'>";              
               //Función buscar partido
               //Si hay partidos con un id de un torneo, los muestra
               //Si no los hay, muestra lo siguiente:
               for($i = 0; $i < 2;$i++){
                    echo "<div class='partidoSemi'>";
                    for($j = 0; $j < 2;$j++){
                         echo "<div class='jugador'>-</div>"; 
                    }
                    echo "</div>";
               }

               echo "</div>";
               echo "<div class='separador'></div>";
               echo "<div class='fase'>";

               echo "<div class='partido'>";
               for($j = 0; $j < 2;$j++){
                    echo "<div class='jugador'>-</div>"; 
               }
               echo "</div>";

               echo "</div>";
               echo "<div class='separador'></div>";
               echo "<div class='fase'>";

               echo "<div class='partido'>";
               
               echo "<div class='jugadorCampeon'>-</div>"; 

               echo "</div>";

               echo "</div>";
               ?>
           

        


    </div>
    <footer><div class="pie">Hola</div></footer> 
</div>
    
</body>
</html>