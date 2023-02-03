<?php

require_once("../Infraestructura/partidosAccesoDatos.php");

class PartidosNegocio
{
    private $_ID;
    private $fecha;
    private $estado;
    private $ronda;
    private $jugadorA;
    private $jugadorB;
    private $ganador;
    private $torneo;

	function __construct()
    {
    }

    function init($id, $fecha, $estado, $ronda, $jugadorA, $jugadorB, $ganador, $torneo)
    {
        $this->_ID = $id;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->ronda = $ronda;
        $this->jugadorA = $jugadorA;
        $this->jugadorB = $jugadorB;
        $this->ganador = $ganador;
        $this->torneo = $torneo;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function getRonda()
    {
        return $this->ronda;
    }

    function getJugadorA()
    {
        return $this->jugadorA;
    }

    function getJugadorB()
    {
        return $this->jugadorB;
    }

    function getGanador()
    {
        return $this->ganador;
    }

    function getTorneo()
    {
        return $this->torneo;
    }

    function obtener()
    {
        $partidosDB = new PartidosAccesoDatos();
        $rs = $partidosDB->obtener();

		$listaPartidos =  array();

        foreach ($rs as $torneo)
        {
            $partidos = new PartidosNegocio();
            $partidos->Init($torneo['ID'], $torneo['Fecha'], $torneo['Estado'], $torneo['Ronda'], $torneo['Jugador_A'], $torneo['Jugador_B'], $torneo['Ganador'], $torneo['Torneo']);
            array_push($listaPartidos,$partidos);
         
        }
                
        return $listaPartidos;
    }

    function buscarPartidosPorTorneo($idTorneo){
        $partidos = $this->obtener();

        $arrayPartidos = [];
        foreach ($partidos as $partido){
            if($partido->torneo == $idTorneo){
                array_push($arrayPartidos, $partido);
            }
        }

        return $arrayPartidos;
    }

    function crearUnPartido($ronda, $partido, $idTorneo, $ganador){

        $partidosDB = new PartidosAccesoDatos();
        $rs = $partidosDB->crearPartidos($ronda, $partido, $idTorneo, $ganador);
        
        return $rs;
    }

    function buscarUnPartido($idPartido){
        $partidos = $this->obtener();

        foreach ($partidos as $partido){
            if($partido->_ID == $idPartido){
                return $partido;
            }
        }
    }

    function modificarUnPartido($idPartido, $ganador){
        $partidosDB = new PartidosAccesoDatos();
        $rs = $partidosDB->modificarPartidos($idPartido, $ganador);

        return $rs;
    }

}

