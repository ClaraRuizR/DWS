<?php

class GestionJugadoresAccesoDatos
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
		$consulta = mysqli_prepare($conexion, "SELECT ID, nombre FROM T_Jugadores ");
        $consulta->execute();
        $result = $consulta->get_result();

		$jugadores =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($jugadores,$myrow);

        }
		return $jugadores;
	}




}
