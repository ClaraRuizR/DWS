<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class PartidosAccesoDatos
{
    function __construct()
    {
    }

	function obtener()
	{
		$conexion = mysqli_connect('localhost','root','root');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "SELECT ID, Fecha, Estado, Ronda, Jugador_A, Jugador_B, Ganador, Torneo FROM T_Partidos ");
        $consulta->execute();
        $result = $consulta->get_result();

		$partidos =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($partidos,$myrow);

        }
		return $partidos;
	}

    function crearPartidos($ronda, $partido, $idTorneo, $ganador){
		$jugadorA = $partido[0];
		$jugadorB = $partido[1];
		
		$conexion = mysqli_connect('localhost','root','root');
		
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}

 		mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta1 = mysqli_prepare($conexion, "INSERT INTO T_Partidos (Ronda, Jugador_A, Jugador_B, Torneo, Ganador) VALUES ('$ronda', $jugadorA, $jugadorB, $idTorneo, $ganador);");

		$consulta2 = mysqli_prepare($conexion, "UPDATE T_Jugadores SET partidos_jugados = (partidos_jugados + 1) WHERE ID = $jugadorA;");

		$consulta3 = mysqli_prepare($conexion, "UPDATE T_Jugadores SET partidos_jugados = (partidos_jugados + 1) WHERE ID = $jugadorB;");

		$consulta4 = mysqli_prepare($conexion, "UPDATE T_Jugadores SET partidos_ganados = (partidos_ganados + 1) WHERE ID = $ganador;");

        $result = $consulta1->execute();
		$result2 = $consulta2->execute();
		$result3 = $consulta3->execute();

		if($ganador != 0){
			$result4 = $consulta4->execute();
		}

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
			$mensaje .= 'Consulta realizada: ' . $consulta;
	
		} else if ($result){
			$mensaje = "Partido guardado con éxito.";
		}

		if(!$result2){
			$mensaje .= ' Consulta inválida. ' .mysqli_error($conexion) . "\n";
			$mensaje .= ' Consulta realizada: ' . $consulta;
		}

		if(!$result3){
			$mensaje .= ' Consulta inválida. ' .mysqli_error($conexion) . "\n";
			$mensaje .= ' Consulta realizada: ' . $consulta;
	
		} 
		
		if(isset($result4)){
			if(!$result4){
				$mensaje .= ' Consulta inválida. ' .mysqli_error($conexion) . "\n";
				$mensaje .= ' Consulta realizada: ' . $consulta;
			}else if ($result2 && $result3 && $result4){
				$mensaje .= " Perfiles de los jugadores actualizados con éxito.";
			}
		}else{
			if ($result2 && $result3){
				$mensaje .= " Perfiles de los jugadores actualizados con éxito.";
			}
		}
		

        return $mensaje;

	}

	function modificarPartidos($idPartido, $ganador){
		$conexion = mysqli_connect('localhost','root','root');
		
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
		
 		mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "UPDATE T_Partidos SET Ganador = $ganador WHERE ID = $idPartido;");
		$consulta2 = mysqli_prepare($conexion, "UPDATE T_Jugadores SET partidos_ganados = (partidos_ganados + 1) WHERE ID = $ganador;");
        
		$result = $consulta->execute();
		$result2 = $consulta2->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
			$mensaje .= 'Consulta realizada: ' . $consulta;
	
		}else if ($result){
			$mensaje = "Partido modificado con éxito.";
		}

		if(!$result2){
			$mensaje .= ' Consulta inválida. ' .mysqli_error($conexion) . "\n";
			$mensaje .= ' Consulta realizada: ' . $consulta;
	
		} else if ($result && $result2){
			$mensaje .= " Perfil del ganador actualizado con éxito.";
		}

        return $mensaje;

	}
}

// $partidosDB = new PartidosAccesoDatos();
// $rs = $partidosDB->crearPartidos('Semifinales', [2, 3], 2, 2);
// var_dump($rs);

// $partidosDB = new PartidosAccesoDatos();
// $rs = $partidosDB->modificarPartidos(6,5);
// var_dump($rs);