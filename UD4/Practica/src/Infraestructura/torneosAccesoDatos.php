<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class TorneosAccesoDatos
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
		$consulta = mysqli_prepare($conexion, "SELECT ID, nombre, Fecha, Estado, jugadores, Ganador FROM T_Torneos ");
        $consulta->execute();
        $result = $consulta->get_result();

		$torneos =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($torneos,$myrow);

        }
		return $torneos;
	}

	function crearTorneo($nombre, $fecha){
		$conexion = mysqli_connect('localhost','root','root');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Torneos (nombre, Fecha) VALUES ('$nombre', '$fecha');");
        $resultado = $consulta->execute();

		if(!$resultado){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
			$mensaje .= 'Consulta realizada: ' . $consulta;
	
		} else if ($resultado){
			$mensaje = "Torneo creado con éxito.";
		}

		return $mensaje;
	}

	
}
