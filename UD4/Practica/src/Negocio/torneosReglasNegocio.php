<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Infraestructura/torneosAccesoDatos.php");
require_once("../Infraestructura/partidosAccesoDatos.php");
require_once("gestionTorneosNegocio.php");

class TorneosReglasNegocio
{
    private $_ID;
    private $nombre;
    private $fecha;
    private $estado;
    private $jugadores;
    private $ganador;

	function __construct()
    {
    }

    function init($id, $nombre, $fecha, $estado, $jugadores, $ganador)
    {
        $this->_ID = $id;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->jugadores = $jugadores;
        $this->ganador = $ganador;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function getJugadores()
    {
        return $this->jugadores;
    }

    function getGanador()
    {
        return $this->ganador;
    }

    function obtener()
    {
        $torneosDAL = new TorneosAccesoDatos();
        $rs = $torneosDAL->obtener();

		$listaTorneos =  array();

        foreach ($rs as $torneo)
        {
            $oTorneosReglasNegocio = new TorneosReglasNegocio();
            $oTorneosReglasNegocio->Init($torneo['ID'], $torneo['nombre'], $torneo['Fecha'], $torneo['Estado'], $torneo['jugadores'], $torneo['Ganador']);
            array_push($listaTorneos,$oTorneosReglasNegocio);
         
        }
                
        return $listaTorneos;
    }

    function crearTorneo($nombre, $fecha){

        $torneo = new TorneosAccesoDatos();
        $rs = $torneo->crearTorneo($nombre, $fecha);

        return $rs;
    }

    function generarEmparejamiento($arrayJug){

        shuffle($arrayJug);

        return $arrayJug;
    }

    function crearPartidosCuartos($idTorneo){

        $ronda = 'Cuartos';
        $jugadores = new GestionJugadoresNegocio();
        $arrayJugadores = $jugadores->obtener();
        $ganador = 0;

        $emparejamiento = $this->generarEmparejamiento($arrayJugadores);

        $contador = (count($emparejamiento));

        $partidosDB = new PartidosAccesoDatos();

        $arrayPartidos = [];

        for($i = 0; $i < $contador; $i = $i+2){
            $partido = [];
           
                for($j = 0; $j < 2; $j++){
                    $pareja = $emparejamiento[$i+$j]->getID();
                    array_push ($partido, $pareja);
                }

             $rs = $partidosDB->crearPartidos($ronda, $partido, $idTorneo, $ganador);
            
        }
    }

    function buscarTorneo($idTorneo){
        $torneos = $this->obtener();

        foreach ($torneos as $torneo){
            if($torneo->_ID == $idTorneo){
                return $torneo;
            }
        }
    }
    
}